<?php


class GetDonationsFromApiCommand extends CConsoleCommand{

public function run($args)
    {
        $command = Yii::app()->db->createCommand();
        $model = new Incomes;
        // Getting time minus 1 days
        $time = time() - 1*24*60*60;
        // Getting transfers 1 day before actual time and with 'paid' status
        $transfers = Yii::app()->stripe->transfers(array("date[gte]" => $time, 'status' => 'paid'));
        // Json to Array transfer
        $transfers = json_decode($transfers, true);
        foreach ($transfers['data'] as $transfer) {
            //Verifying if this transfer already exist
            $transferExist = Yii::app()->db->createCommand()
            ->select("id")
            ->from("tbl_incomes")
            ->where("source_name = :source", array(":source" => "Stripe " . $transfer['id']))
            ->queryScalar();

            if($transferExist === false){
                    //Getting currency ID
                    $sql = "SELECT id FROM tbl_currencies WHERE code = '" . strtoupper($transfer["currency"]) . "'"; 
                    $currency = Yii::app()->db->createCommand($sql)->queryRow();
                    if($transfer['application_fee'] == NULL){
                        $transfer['application_fee'] = 0;
                    }
                    // Inserting transfer in DB
                    $result = $command->insert('tbl_incomes', array(
                        'type'         => 1,
                        'income_date'  => date("Y-m-d H:i:s", $transfer['date']),
                        'source_name'  => "Stripe " . $transfer['id'],
                        'gross_amount' =>  number_format((float)$transfer['amount']/100, 2),
                        'currency'     => $currency['id'],
                        'expenses'     => $transfer['application_fee'] ));
            }
        }

    }

}


?>