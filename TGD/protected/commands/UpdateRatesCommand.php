<?php

class UpdateRatesCommand extends CConsoleCommand{
	/**
	 * Gets the currencies stored in the database table tbl_currencies and builds the 
	 * curreny pair taking GBP as the base currency.
	 * 
	 * @return array The currency pairs to look for later on.
	 */
	private function _getCurrencyPairs(){
		// SELECT code FROM tbl_currencies
		$data = Yii::app()->db->createCommand()->select('code')->from('{{currencies}}')->queryAll();

		$codes = array();
		foreach ($data as $key => $value) {
			// prepend "GBP" to form the pair and wrap with '
			$codes[] = "'GBP".$value['code']."'";
		}

		return $codes;
	}

	/**
	 * Filters the data returned by Yahoo!Finance and leaves only the currency pair and the rate value.
	 *  
	 * @param array $rates The 'rates' provided by Yahoo!Finance.
	 * @return array
	 */
	private function _filterRates($rates){
		$result = array();

		foreach ($rates as $key => $value) {
			$result[$value->id] = $value->Rate;
		}

		return $result;
	}

	/**
	 * Updates the database table tbl_currencies with the new rates.
	 * 
	 * @param array $rates The filtered rates in an array with currency pairs as keys and rates as values. 
	 * @return array The affected rows.
	 */
	private function _updateRates($rates){
		$result = array();
		$command = Yii::app()->db->createCommand();

		foreach ($rates as $code => $rate) {
			// trim "GBP" from the pair
			$code = substr($code,3); 

			// UPDATE "tbl_currencies" SET "exchange_rate"=:exchange_rate WHERE code=:code
			if(0 < $command->update('{{currencies}}', array('exchange_rate'=>$rate), 'code=:code', array(':code'=>$code))){
				// save those that where affected
				$result[$code] = $rate;
			}
		}
		
		// return the affected rows
		return $result;		
	}

	/**
	 * Default command action.
	 * 
	 * @return integer 0 for success, 1 for failure.
	 */
	public function actionIndex() {
		
		$yahoo_query = 'select * from yahoo.finance.xchange where pair in ('.join(',',$this->_getCurrencyPairs()).')';
		$env = 'store://datatables.org/alltableswithkeys';
		$service_url = 'https://query.yahooapis.com/v1/public/yql?q='.urlencode($yahoo_query).'&format=json&env='.urlencode($env).'&callback=';
		
		$curl = curl_init();
		// Deal with SSL
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		curl_setopt($curl, CURLOPT_URL, $service_url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);

		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if($httpcode == 200){

			$curl_response = json_decode($curl_response);

			// select only the rates from the response data
			$rates = $curl_response->query->results->rate;

			// select only the currencypair and the rate value
			$rates = $this->_filterRates($rates);

			// update database table with ghe new rates
			$count = $this->_updateRates($rates);
			
			return 0;
		}else{
			return 1;
		}
	}
}

