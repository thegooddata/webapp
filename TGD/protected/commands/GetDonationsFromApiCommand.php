<?php

require_once('/extensions/yii-stripe/stripe/lib/Stripe.php');

class GetDonationsFromApiCommand extends CConsoleCommand{

public function run($args)
    {
        $command = Yii::app()->db->createCommand();
        $model = new Incomes;
        // Setting API Key 
        Stripe::setApiKey('sk_live_Gy5OxwwFqtxeuMJRxFGwHWMi');
        // Getting time minus 1 day
        $time = time() - 24*60*60;
        // Getting charges 1 day before actual time
        $charge = Stripe_Charge::all(array("limit" => 5));
        // Json to Array charge
        $charge = json_decode($charge, true);
        foreach ($charge['data'] as $singleCharge) {
            // Filtering only charges succeeded
            if($singleCharge['object'] == 'charge' && $singleCharge['status'] == 'succeeded' || $singleCharge['status'] == 'paid'){
                //Getting currency ID
                $sql = "SELECT id FROM tbl_currencies WHERE code = '" . strtoupper($singleCharge["currency"]) . "'";   // like where id IN(1,2,3,4)
                $currency = Yii::app()->db->createCommand($sql)->queryRow();
                if($singleCharge['application_fee'] == NULL){
                    $singleCharge['application_fee'] = 0;
                }
                // Inserting charge in DB
                $result = $command->insert('tbl_incomes', array(
                    'type'         => 1,
                    'income_date'  => date("Y-m-d H:i:s", $singleCharge['created']),
                    'source_name'  => "Stripe " . $singleCharge['id'],
                    'gross_amount' =>  number_format((float)$singleCharge['amount']/100, 2),
                    'currency'     => $currency['id'],
                    'expenses'     => $singleCharge['application_fee'] ));
            }

        }

    }

}


?>