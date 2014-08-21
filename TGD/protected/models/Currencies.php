<?php

Yii::import('application.models._base.BaseCurrencies');

class Currencies extends BaseCurrencies
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        /**
         * Converts amount from default currency to specified
         * @param float $amount The amount to convert
         * @param type $toCurrency To what currency (ISO code)
         */
        public static function convertDefaultTo($amount, $toCurrency) {
         
            $to=Currencies::model()->find("t.code=:code", array(':code'=> $toCurrency));
            
            if ($to == null)
                throw new CHttpException(500, Yii::t('app', "Invalid currency $toCurrency."));
                        
            return $amount*$to->exchange_rate;
        }
        
        /**
         * Fetches currency exchange rate from Google
         * @param type $from
         * @param type $to
         * @return type
         */
        static public function fetch_currency_exchange_rate($from, $to) {
            $json=  file_get_contents("http://rate-exchange.appspot.com/currency?from=$from&to=$to");
            $response=  json_decode($json, true);
            return $response['rate'];
        }
        
        static public function getDefaultCurrencyModel() {
            return Currencies::model()->find("t.code=:code", array(':code'=> Yii::app()->params['defaultCurrency']));
        }
}