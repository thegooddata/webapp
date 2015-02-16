<?php

class GetPairRateCommand extends CConsoleCommand{
	public function actionIndex($pair, $format='json', $json=false) {
	
		$yahoo_query = 'select * from yahoo.finance.xchange where pair in ("'.$pair.'")';
		$env = 'store://datatables.org/alltableswithkeys';
		$service_url = 'https://query.yahooapis.com/v1/public/yql?q='.urlencode($yahoo_query).'&format='.$format.'&env='.urlencode($env).'&callback=';
		
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
			if($json === true){
				echo json_encode($curl_response->query->results->rate);
			}else{
				echo $curl_response->query->results->rate->Rate;
			}
		}else{
			echo 0;
		}
	}
}

