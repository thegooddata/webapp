<?php

class SiteController extends Controller {

   public $displayMenu = true;

   public function init() {
        Yii::app()->theme = 'tgd';
        $this->layout = '//layouts/blank';
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

        // set body id 
        $this->bodyId = "tgd-partners";

        $this->render('partners');
    }
    
    public function actionFaq(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - FAQ";

        // dont display menu
        $this->displayMenu = false;

        // set body id
        $this->bodyId = "tgd-faq";
        
         // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/tree_navigator.js', CClientScript::POS_END);
        

        
        $this->render('faq');
    }

    public function actionCoders(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Coders";

        // dont display menu
        $this->displayMenu = false;

        // set body id
        $this->bodyId = "tgd-coders";
        

        
        $this->render('coders');
    }
    
    
    public function actionProduct(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Product";

        // set body id
        $this->bodyId = "tgd-product";
        

        
        $this->render('product');
    }
    
    public function actionTerms(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Terms of service";

        // set body id
        $this->bodyId = "tgd-terms";
        
        $this->render('terms');
    }
    
    public function actionPrivacy(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Privacy policy";

        // set body id
        $this->bodyId = "tgd-privacy";
        
        $this->render('privacy');
    }
    
    public function actionRules(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Company rules";

        // set body id
        $this->bodyId = "tgd-rules";
        
        $this->render('rules');
    }
    
    public function actionLegal(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Legal stuff";

        // set body id
        $this->bodyId = "tgd-legal";

        // dont display menu
        $this->displayMenu = false;

         // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/tree_navigator.js', CClientScript::POS_END);
        
        $this->render('legal');
    }
    
    public function actionCompany(){
        Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - The company";

        // set body id 
        $this->bodyId = "tgd-company";
        
        $this->render('company');
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

        // dont display menu
        $this->displayMenu = false;

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
