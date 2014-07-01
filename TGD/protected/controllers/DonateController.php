<?php

class DonateController extends Controller {

    const INIT = 1;
    const RETURN_FROM_GATEWAY = 2;

    const TRANSACTION_OK = 'OK';
    const TRANSACTION_ERROR = 'ERROR';

    const TYPE_LOAN = "LOAN";
    const TYPE_SHARE = "SHARE";
    const TYPE_DONATION = "DONATION";

    public $transaction_id = '';
    public $user_id = 0;
    public $type ='';
    public $status ='';
    public $currency='';
    public $amount='';
    
    public $displayMenu = true;

    public $bodyId = 'tgd-user-data';

    public function init() {

        $this->layout = '//layouts/blank';
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Donate";

        // set body id to #tgd-donate
        $this->bodyId = "tgd-donate";
        
        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/share_purchase.js', CClientScript::POS_END);
        
        parent::init();
    }

    // public function filters() {
    //     return array('accessControl'); // perform access control for CRUD operations
    // }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users' => array('@'),
            ),
            array('deny'),
        );
    }

    public function actionResponse($user_token,$status,$transaction_id,$type) {

        
    }

    public function actionIndex() {
      
        $errors=array();

        if (isset(Yii::app()->user)){
            $this->user_id = Yii::app()->user->id;
        }


        if (isset($_GET['token']) && $_GET['token']!='')
        {
            $token = $_GET['token'];

            

            $token = base64_decode($token);
            $token = json_decode( $token);

            $this->type = $token->type;
            $this->transaction_id = $token->transaction_id;
            $this->status = $token->status;
            $this->currency = $_GET['currency'];
            $this->amount = (int)$_GET['amount'] / 100;
            
           
            
            /* if user paid with Stripe, charge the card */ 
            if ($_GET['gateway']=='stripe') {
              Yii::app()->stripe->charge(array(
                  "amount" => $_GET['amount'], // amount in cents, again
                  "currency" => $_GET['currency'],
                  "card" => $_POST['stripeToken'],
                  "description" => "Donation to The Good Data",
              ));
              if (Yii::app()->stripe->hasError()) {
                $errors[]=Yii::app()->stripe->getError();
              }
            }
            
            
            
            if ( Transactions::model()->find('transaction_id=:id_transaction', array(':id_transaction'=>$this->transaction_id)) == null)
            {
                $transaction = new Transactions();
                $transaction->transaction_id=$this->transaction_id;
                $transaction->type=$this->type;
                $transaction->status=$this->status;
                $transaction->currency=$this->currency;
                $transaction->amount=$this->amount;
                $transaction->member_id=$this->user_id;
                $transaction->save();
            }
            
            if (count($errors)) {
              $this->status=DonateController::TRANSACTION_ERROR;
            } else {
              $this->redirect(array('donate/thanks'));
            }

            $this->render('index', array(
                'transaction_id'=>$this->transaction_id,
                'state' => DonateController::RETURN_FROM_GATEWAY,
                'status' => $this->status,
                'errors'=>$errors,
                )
            );

        }
        else
        {

            $this->transaction_id = uniqid();

            //var_dump($user);die;

            $this->render('index', array(
                'transaction_id'=>$this->transaction_id,
                'state' => DonateController::INIT
                )
            );
        }
    }

    public function actionThanks() {
         $this->render('thanks');
    }

}
