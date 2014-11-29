<?php

class SiteController extends Controller {

   public $displayMenu = true;
   private $_captchaBackgroundcolor = 0xFFFFFF;

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
                'backColor' => $this->_captchaBackgroundcolor,
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
        $this->pageTitle = " - The company";
        $this->bodyId = "tgd-company";
        
        $this->render('company');
    }

    public function actionIndex() {
      
        Yii::app()->theme = 'tgd';
        
        // set title
        $this->pageTitle = "";

        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.stellar.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/main.js', CClientScript::POS_END);

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
        Yii::app()->theme = 'tgd';

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
     * Displays the sugestions page
     */
    public function actionSuggestion($ajax=0) {
        // default values
        $redirectURL = '/suggestion/thanks';
        $renderFile = 'suggestion'; 
        $renderMethod = 'render';
        $actionSufix = '';

        if($ajax==0) // if it's NOT an ajax request
        { 

            Yii::app()->theme = 'tgd';
            $this->pageTitle = " - Suggest Improvements";
            $this->displayMenu = false;
            $this->bodyId = "tgd-suggestions";

        }
        else // if it's an ajax request
        { 

            //$this->_captchaBackgroundcolor = 0xFAFAF3;
            $redirectURL .= '/ajax';
            $renderFile .= '_ajax';
            $renderMethod .= 'Partial';
            $actionSufix .= '/ajax';
        }

        $model = new SuggestionForm;
        $username = 'Guest';

        if (isset($_POST['SuggestionForm']) && isset($_POST['id'])) 
        {
            if($_POST['id']!='0') // it's not a Guest. Don't expect an email and find it out based on username and hash.
            { 
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';

                // query database for user.
                // $user = $this->_checkUser($username, $password);
                
                $user=null;
                if (!Yii::app()->user->isGuest) {
                  $user = Yii::app()->getModule('user')->user(Yii::app()->user->id);
                }

                if($user) // user found. Fill in the model's 'email' attribute and username.
                {
                    $model->email = $user->email;
                    $username = $user->username;
                }
                else // something went wrong.
                {
                    $this->renderPartial('ops_ajax', array('id'=>$_POST['id'], 'username'=>$username, 'password'=>$password));
                    Yii::app()->end();
                }
            }
            else // it's a guest. Expect email and save it in the model.
            {
                $model->email = isset($_POST['SuggestionForm']['email']) ? $_POST['SuggestionForm']['email'] : '';
            }

            $model->body = isset($_POST['SuggestionForm']['body']) ? $_POST['SuggestionForm']['body'] : '';
            
            if ($model->validate()) // if it validates, send email and redirect to 'thanks' page
            {
                $this->_sendSuggestionEmail($model, $username, $redirectURL);
            }
        }
        $this->$renderMethod($renderFile, array('actionSufix' => $actionSufix, 'model' => $model));
    }

    /**
     * Queries the database for a user with a given username and password
     * @param username
     * @param password
     * @return false if n user is found or the User model instance otherwise
     */
    private function _checkUser($username, $password) {
        $user = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('*')
            ->from('tbl_members u')
            ->where(
                array(
                        'and',
                        '(UPPER(u.username) = :value or UPPER(u.email) = :value)',
                        'u.password = :password'),
                array(
                        ':value'=>strtoupper($username),
                        ':password'=>$password)
                )
            ->queryAll();

        if(empty($user)) {
            return false;
        }

        return User::model()->findByPk($user[0]->id);            
    }

    /**
     * Sends Email and redirects
     */
    private function _sendSuggestionEmail($formModel, $username, $redirect){

        //SEND EMAIL
        $content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'suggestion.html');
        $content = str_replace('[USERNAME]',$username, $content);
        $content = str_replace('[EMAIL]',$formModel->email, $content);
        $content = str_replace('[BODY]',nl2br(strip_tags($formModel->body)), $content);

        $message = new YiiMailMessage;
        $message->subject = 'Suggestion from '.$username.' about TheGoodData.';
        $message->setBody($content,'text/html');
        $message->addTo(Yii::app()->params['adminEmail']);

        $message->setFrom(array(Yii::app()->params['senderGenericEmail'] => Yii::app()->params['senderGenericEmailName']));
        
        if ($formModel->email) {
          if ($username!='Guest') {
            $message->replyTo = array($formModel->email => $username);
          } else {
            $message->replyTo = $formModel->email;
          }
        }
        
        if (!Yii::app()->mail->send($message)) {
          die('Your message could not be sent, please try again later.');
        } else {
          // die("Message sent to.. ".Yii::app()->params['adminEmail']);
        }

        $this->redirect($redirect);
    }
    
    /**
     * Shows thanks message
     */
    public function actionSuggestionThanks($ajax=0) {
        $renderFile = 'suggestionThanks';
        $renderMethod = 'render';

        if($ajax==0){
            Yii::app()->theme = 'tgd';
            $this->pageTitle = " - Thanks for your suggestion! ";
            $this->displayMenu = false;
            $this->bodyId = "tgd-suggestions";
        }else{
            $renderFile .= '_ajax';
            $renderMethod .= 'Partial';
        }

        $this->$renderMethod($renderFile);

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
    
    public function actionRobots() {
      $robots_txt_path=dirname(__FILE__).'/../robots/'.$_SERVER['SERVER_NAME'].'.txt';
      header('Content-Type: text/plain; charset=utf-8');
      if (file_exists($robots_txt_path)) {
        readfile($robots_txt_path);
      }
      Yii::app()->end();
    }

}
