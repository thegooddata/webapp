<?php

class SiteController extends Controller {

   public function init() {
        Yii::app()->theme = 'tgd';
        $this->layout = '//layouts/blank';
//        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap.min.css');
//        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/font-awesome.min.css');
        //Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/header-and-footer.css');
//        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/webfonts.css');
        // add css specific for the site controller
//        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/new-main.css');

//        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/vendor/jquery-1.9.1.min.js', CClientScript::POS_END);
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootstrap.js', CClientScript::POS_END);
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/sign-in.js', CClientScript::POS_END);
        parent::init();
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionSubscribelist() {
        if ($_POST['b_c536df10462fb6afe72117895_b5320da781'] != '')
            die('spam spam spam');

        // require_once 'mailchimp-api-php/src/Mailchimp.php';
        // require_once 'mailchimp-api-php/config.php';
        $apikey = "4e0891dc6249ea5d20e206083727bfd2-us3";
        $mailchimp = new Mailchimp($apikey);
        $lists = new Mailchimp_Lists($mailchimp);

        //$id = $lists->getList(array('id'=>$_POST['id']));
        $id = $lists->getList(array('id' => 'b5320da781'));

        $email = array('email' => $_POST['MERGE0']);
        //$email = array('email' => 'juan.menendez.buitrago@gmail.com');

        $result = $lists->subscribe('b5320da781', $email, null, 'html', false, false, true, false);

        if (is_array($result) && isset($result['email'])) {
            ?>
            <div>
                <div>
                    <span class="glyphicon glyphicon-ok-circle"></span>
                </div>
                <p>We'll send you an invite once we're ready.</p>
                <p>For frequent updates, follow us <a href="https://www.twitter.com/thegooddata" target="blank">@thegooddata</a></p>
            </div>

            <?php
        }
        die;
    }

    public function actionSignup() {
        Yii::app()->theme = 'blank';
        $this->render('signup');
    }

    public function actionSignin() {
        Yii::app()->theme = 'blank';
        Yii::app()->clientScript->reset();
        $this->render('signin');
    }

    public function actionPartners() {
        // set theme
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Our partners";

        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/partners.js', CClientScript::POS_END);

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-partners";

        $this->render('partners');
    }

    //     public function actionProfile() {
    //     Yii::app()->theme = 'tgd';

    //     // set title
    //     $this->pageTitle = " - Edit profile";

    //     // set body id to #tgd-share-purchase
    //     $this->bodyId = "tgd-edit-profile";



    //     $this->render('profile');
    // }
    
    public function actionFaq(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - FAQ";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-faq";
        
         // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/tree_navigator.js', CClientScript::POS_END);
        

        
        $this->render('faq');
    }

    public function actionCoders(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Coders";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-coders";
        

        
        $this->render('coders');
    }
    
    
    public function actionProduct(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Product";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-product";
        

        
        $this->render('product');
    }
    
    public function actionTerms(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Terms of service";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-terms";
        
        $this->render('terms');
    }
    
    public function actionPrivacy(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Privacy policy";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-privacy";
        
        $this->render('privacy');
    }
    
    public function actionRules(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Company rules";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-rules";
        
        $this->render('rules');
    }
    
    public function actionLegal(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Legal stuff";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-legal";

         // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/tree_navigator.js', CClientScript::POS_END);
        
        $this->render('legal');
    }
    
    public function actionCompany(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - The company";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-company";
        
        $this->render('company');
    }
    
    public function actionPurchase() {
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Share Purchase";

        // add css specific for this page
//        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/share_purchase.css');

        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/share_purchase.js', CClientScript::POS_END);
        
        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-share-purchase";

        $this->render('share_purchase');
    }

    public function actionIndex() {
        Yii::app()->theme = 'tgd';

        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.stellar.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/main.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/early-access.js', CClientScript::POS_END);

        // set body id to #landing-page
        $this->bodyId = "landing-page";

        // //CREACION DE UN USUARIO
        // $username='daniel'.rand(0,1000);
        // $password='dani1234';
        // $verifyPassword='dani1234';
        // //$email='da@da.com'.rand(0,1000);
        // $email='';
        // $member = Yii::app()->getModule('user')->createUser($email,$username,$password,$verifyPassword);
        // $pii = new MembersPii();
        // $pii->firstname='AAA';
        // $pii->surname='BBB';
        // $pii->streetnumber='CCC';
        // $pii->street='DDD';
        // $pii->streetdetails='EEE';
        // $pii->city='FFF';
        // $pii->state='GGG';
        // $pii->zipcode='HHH';
        // $pii->id_countries=1;
        // $pii->email='JJJ';
        // $pii->birthdate='08/09/1982';
        // $pii->agreerules=true;
        // if($pii->validate())
        //       {
        //           $pii->save();
        //       }
        //       else
        //       {
        //       	print_r($pii->getErrors());
        //       }
        // $mensaje = Yii::app()->redoctober->encrypt($pii->id);
        // $member->key=$mensaje;
        // $member->save();
        //       echo 'USUARIO CREADO CON EXITO<br>';
        //       echo 'CODIGO<hr>'.$member->key;
        //       die;
        // $mensaje = Yii::app()->redoctober->decrypt('eyJWZXJzaW9uIjoxLCJWYXVsdElkIjo3MDQ2NDA1MTAsIktleVNldCI6W3siTmFtZSI6WyJ1c2VyMSIsInVzZXIyIl0sIktleSI6Ii9DcVVkSTJIWko5MmwyY2VmRldkTnc9PSJ9LHsiTmFtZSI6WyJ1c2VyMiIsInVzZXIxIl0sIktleSI6IkJvMGRPaGdMYW40b0lKNXl4S216OUE9PSJ9XSwiS2V5U2V0UlNBIjp7InVzZXIxIjp7IktleSI6IkJnRTlYa2YwWmdMek52WjNwcnF1NmZ0Y3NqT2d0QTU2NDVIZEZUUVZCY1JENnU3ZmVjZEtaa3pDNjJGS0c1MW5jb09yU1RNMmIzVWE1M2FXaFdvZVJqK05RYjJ0OXEvc0RsV2pPWkJqWlhLNmNJTUlvbzNXaVU1WVE5RkFYNGh6LzhGTlVCdFJrbk5hTU9uZlFENmxmazJEOVBqYVRBOUtYNlZLSGpTVWhvak1DNExzckNUTkt3dzRFLzltSUN4c1cwVTdHbHRrZi9zUkZRL1FvRFJWRVNPajV2ZFNNRWtMUnpUaFp1U1VYMXJHM3I0aUE1RGQzY0RKR2hJU1RDYTcvaGhqSE9QOE1SM0xXSVUwRUUxV0wxQkZ3N09QOWgyRlBCcnJFYUN0NUpKem96YWNGWmpEWXdHaklDMkRhODR3L3NRNng0TGRGR0UwSzZUamx4L2Jtdz09In0sInVzZXIyIjp7IktleSI6IkRsU2U0cG9McFRobU9Sa3FOS2gwUTc5c0pGbFZ1YXVrZU9uVk15dXBQUjlZNmNkQldpeDJZWjJWaHZvOEJIcWJ2czFONHNxSG5rRG1xYjZyU1JTWDV1TnV0MnJUWlJVT3JhcFBhSWd0cFVON1pOMU5QQ0JhQldzZFpZdHp4TjlUM2pZYitLbTYvaG5mQS9YM0tGQUhtT0ZBQW9yVTRxc0Jxc2tZTXR3SmZUOEd2RmJZdGJJVVQxRFRLaHFjWUVNTFF0bWdyUUhBTXNZU3hGenNSZ0tqaXN6UWswVU9BVUw2d3pQTzRLYWtOWVB0YkYrTk5WR2JXcUNmbkxIQ21iU2tCVURVQ3Awa2h4UTVqVFZLaUloUlRmRGljZk8weFZQSDFsV2hKOU4rckN0KzZ0SkxpZkVzTE1JUDU4dDVsS1NkTllKYXk1T0xYOGV5K2pBU2VMQ3pxZz09In19LCJJViI6IkZKQmZpNVJNSUlhQ1MyOVNIeEFoenc9PSIsIkRhdGEiOiJEQ2MxUWFRYWRHWitNRzE1WmsvRitBPT0iLCJTaWduYXR1cmUiOiJNaU80SzdGVEFWNE92TFlxTkZIQUlMd1pSZTQ9In0=');
        // //$mensaje = Yii::app()->redoctober->encrypt('dani');
        // var_dump($mensaje);
        // die;
        // $ls = LoansStatus::model()->findByPk(1);
        // $ls->name = 'daniel';
        // $ls->save();
        // die;
        // $user_id='1';
        //       $category='Disco1nnect';
        //       $service_name='Facebook';
        //       $service_url='https://facebook.com/';
        //       $domain='dddd';
        //       $url='aaaa';
        //       $data = Yii::app()->db->createCommand()
        //                       ->setFetchMode(PDO::FETCH_OBJ)
        //                       ->select('s.id as service_id, c.id as category_id')
        //                       ->from('tbl_categories c, tbl_services s')
        //                       ->where(array(
        //                                   'and',
        //                                   'c.name = :category',
        //                                   's.name = :service_name'),
        //                           array(
        //                                   ':category'=>$category,
        //                                   ':service_name'=>$service_name)
        //                           )
        //                       ->queryAll();
        //       if (count($data)>0){
        //       	$service_id = $data[0]->service_id;
        //       }
        //       else{
        //       	$data = Yii::app()->db->createCommand()
        //                        ->setFetchMode(PDO::FETCH_OBJ)
        //                        ->select('c.id as category_id')
        //                        ->from('tbl_categories c')
        //                        ->where(array(
        //                                    'and',
        //                                    'c.name = :category'),
        //                            array(
        //                                    ':category'=>$category)
        //                            )
        //                        ->queryAll();
        //           if (count($data)>0){
        //           	$category_id = $data[0]->category_id;
        //           	$service = new Services; 
        //        	$service->category_id=$category_id ;
        //        	$service->name=$service_name;
        //        	$service->url=$service_url;
        //        	if (!$service->save()){
        //     		var_dump($service->errors);die;
        //     	}else{
        //     		$service_id = $service->service_id;
        //     	}
        // 	}
        //           else{
        //           	die('error fatal');
        //           	//ERROR FATAL NO EXISTE CATEGORIA
        //           }
        //       }
        //       if (isset($service_id)){
        //        $model = new Threats; 
        //    	$model->user_id=3;
        //    	$model->service_id=$service_id;
        //    	$model->domain=$domain;
        //    	$model->url=$url;
        // 	$model->created_at = date('Y-m-d H:i:s');
        //    	if (!$model->save()){
        //    		var_dump($model->errors);die;
        //    	}
        //   	}
        //       var_dump($model);
        // die();
        //       //Check Services and Category exist
        //       $criteria = new CDbCriteria(); 
        //       $criteria->with = array('category', array('services'));
        // $criteria->addInCondition('category.name' , array($category));
        // //$criteria->addInCondition('services.name' , $service_name);
        // $data = Services::model()->findAll($criteria);
        // var_dump($data);
        // die();
        // $message            = new YiiMailMessage;
        //          //this points to the file test.php inside the view path
        //       $message->view = "test";
        //       // $sid                 = 1;
        //       // $criteria            = new CDbCriteria();
        //       // $criteria->condition = "studentID=".$sid."";            
        //       // $studModel1          = Student::model()->findByPk($sid);        
        //       $params              = array('studentName'=>'Dani');
        //       $message->subject    = 'My TestSubject';
        //       $message->setBody($params, 'text/html');                
        //       $message->addTo('info@x3factory.com');
        //       $message->from = 'info@x3factory.com';   
        //       Yii::app()->mail->send($message);       
        //       die;
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        Yii::app()->theme = 'blank';

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        Yii::app()->theme = 'blank';

        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        Yii::app()->theme = 'blank';

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->theme = 'blank';

        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
