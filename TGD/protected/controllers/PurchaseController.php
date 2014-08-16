<?php

class PurchaseController extends Controller {

    const INIT = 1;
    const RETURN_FROM_GATEWAY = 2;

    const TRANSACTION_OK = 'OK';
    const TRANSACTION_ERROR = 'ERROR';

    const TYPE_LOAN = "LOAN";
    const TYPE_SHARE = "SHARE";
    const TYPE_DONATION = "DONATION";

    public $transaction_id = '';
    public $user_id = '';
    public $type ='';
    public $status ='';
    public $currency='';
    public $amount='';

    public $bodyId = 'tgd-user-data';
    public $displayMenu = false;

    public function init() {
        Yii::app()->theme = 'tgd';
        $this->layout = '//layouts/blank';

        // set title
        $this->pageTitle = " - Share Purchase";
        
        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/share_purchase.js', CClientScript::POS_END);
        
        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-share-purchase";

        parent::init();
    }

    public function filters() {
        return array('accessControl'); // perform access control for CRUD operations
    }

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

        $this->user_id = Yii::app()->user->id;
        
        $user_model=null;
        $user_model=Yii::app()->user->model(Yii::app()->user->id);
        
        // Check user status and forward to the correct page if necessary
        switch ($user_model->status) {
          case User::STATUS_PRE_ACCEPTED: {
            // nothing to do, just show this page
            break;
          }
          case User::STATUS_ACCEPT: {
            // if already accepted, redirect to thanks
            $this->redirect(array('purchase/thanks'));
            break;
          }
          default:
            // default if not pre-accepted or accepted, then redirect to not applicable
            $this->redirect(array('purchase/notApplicable'));
            break;
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
            $this->amount = (float)$_GET['amount'] / 100;
            
            /*
            CVarDumper::dump($_GET, true, 10);
            CVarDumper::dump($_POST, true, 10);
            CVarDumper::dump($token, true, 10);
            die();
            */
            
            $user = Yii::app()->db->createCommand()
                                ->setFetchMode(PDO::FETCH_OBJ)
                                ->select('*')
                                ->from('tbl_members_pii u')
                                ->where(array(
                                            'and',
                                            'u.member_id = :user_id',
                                            ),
                                    array(
                                            ':user_id'=>$this->user_id
                                            )
                                    )
                                ->queryAll();
                                
            /* if user paid with Stripe, charge the card */ 
            if (isset($_GET['gateway']) && $_GET['gateway']=='stripe') {
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
            
            if (count($errors)) {
              $this->status=PurchaseController::TRANSACTION_ERROR;
            }

            // Commented the following line because it was activating users only if the type was LOAN, shouldn't it activate in all cases?
            /*if ($this->type == PurchaseController::TYPE_LOAN && $this->status=PurchaseController::TRANSACTION_OK)*/
            if ($this->status=PurchaseController::TRANSACTION_OK)
            {
                //Change status
                $userObj=User::model()->findByPk($this->user_id);
                $userObj->status=User::STATUS_ACCEPT;
                $userObj->save();

                
                //Remove link to memberPii
                $memberObj=MembersPii::model()->findByPk($user[0]->id);
                $oldMemberId = $memberObj->member_id;
                $memberObj->member_id=0;
                $memberObj->save();

                //SEND EMAIL
                $content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'membership_acceptance.html');
                $content = str_replace('[MEMBER_ID]',$oldMemberId,  $content);
                $content = str_replace('[USERNAME]',$userObj->username,  $content);

                $message = new YiiMailMessage;
                $message->subject = 'Your are now a Member of TheGoodData';
                $message->setBody($content,'text/html');
                $message->addTo($userObj->email);
                $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);

                Yii::app()->mail->send($message);




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

            if (count($errors)==0) {
              $this->redirect(array('purchase/thanks'));
            }

            $this->render('index', array(
                'transaction_id'=>$this->transaction_id,
                'user_token' => $this->user_token,
                'state' => PurchaseController::RETURN_FROM_GATEWAY,
                'status' => $this->status,
                'errors'=>$errors,
                'user'=>$user,
                )
            );

        }
        else
        {

            $user = Yii::app()->db->createCommand()
                                ->setFetchMode(PDO::FETCH_OBJ)
                                ->select('*')
                                ->from('tbl_members_pii u')
                                ->where(array(
                                            'and',
                                            'u.member_id = :user_id',
                                            ),
                                    array(
                                            ':user_id'=>$this->user_id
                                            )
                                    )
                                ->queryAll();

            $this->transaction_id = uniqid();

            //var_dump($user);die;

            $this->render('index', array(
                'user_model'=>$user_model,
                'transaction_id'=>$this->transaction_id,
                'state' => PurchaseController::INIT,
                'user'=>$user)
            );

        }

        
    }

    public function actionThanks() {
        $this->displayMenu=true;
        $this->render('thanks');
    }
    
    public function actionNotApplicable() {
      $this->render('notApplicable');
    }

}
