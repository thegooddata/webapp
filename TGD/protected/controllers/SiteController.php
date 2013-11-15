<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		

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
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}