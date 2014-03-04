<?php

class RegistrationController extends Controller
{
	public $defaultAction = 'registration';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	/**
	 * Registration user
	 */
	public function actionRegistration() {

        Yii::app()->theme = 'tgd';
        $this->layout = '//layouts/blank';

        // set title
        $this->pageTitle = " - Register";


        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.validate.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/additional-methods.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/register.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBIqMM7HGjLXLXHpvBemGUj7sADxe7zEJ0&sensor=false&libraries=places', CClientScript::POS_END);
        
        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-register";



        $registration_form = array();
        $error = '';
        $success = '';

        // ajax validator
        if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
        {
            echo UActiveForm::validate(array($model,$profile));
            Yii::app()->end();
        }

        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->controller->module->profileUrl);
        } else {
            if(isset($_POST['RegistrationForm'])) {
                

                $registration_form=$_POST['RegistrationForm'];

                $pii = new MembersPii();
                $pii->id = uniqid();
                $pii->firstname =$registration_form['firstName'];
                $pii->lastname=$registration_form['lastName'];
                $pii->streetname=$registration_form['streetName'];
                $pii->streetnumber=$registration_form['streetNumber'];
                $pii->streetdetails=$registration_form['streetDetails'];
                $pii->city=$registration_form['city'];
                $pii->statecounty=$registration_form['stateCounty'];
                $pii->country=$registration_form['country'];
                $pii->postcode=$registration_form['postCode'];
                $pii->daybirthday=$registration_form['dayBirthday'];
                $pii->monthbirthday=$registration_form['monthBirthday'];
                $pii->yearbirthday=$registration_form['yearBirthday'];
                $pii->agree=true;

                
                if($pii->validate())
                {
                    $username=$registration_form['userName'];
                    $password=$registration_form['password'];
                    $verifyPassword=$registration_form['passwordConfirm'];
                    $email=$registration_form['userEmail'];
                    
                    if (!preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $password))
                    {
                        $error.="Password has to contains at least one letter and one number";
                    }
                    else
                    {

                        $member = Yii::app()->getModule('user')->createUser($email,$username,$password,$verifyPassword);

                        if (isset($member->id)){
                            $pii->save();

                            $mensaje = Yii::app()->redoctober->encrypt($pii->id);
                            $member->key=$mensaje;
                            $member->save();

                            $success="Registro realizado con exito";

                            $registration_form = array();

                            //SEND EMAIL
                            $message = new YiiMailMessage;
                            $message->subject = '[TGD] - New User';
                            $message->setBody(
                                '<pre>'.print_r($pii->attributes,true).'</pre>'.
                                '<hr>'.
                                '<pre>'.print_r($member->attributes,true).'</pre>',
                                
                            'text/html');
                            $message->addTo(Yii::app()->params['adminEmail']);
                            $message->from = Yii::app()->params['senderEmail'];
                            Yii::app()->mail->send($message);

                        }
                        else
                        {
                            foreach($member as $key => $value){
                                $error.="<li>".$value[0]."</li>";
                            }

                        }
                    }
                    
                }
                else
                {
                    foreach($pii->getErrors() as $key => $value){
                        $error.="<li>".$value[0]."</li>";
                    }

                }
            }

            if ($error != "")
                $error = "<ul>".$error."</ul>";

            $this->render('/user/registration',array(
                'registration_form'=>$registration_form,
                'error'=>$error,
                'success'=>$success
                )
            );
        }
	}
}