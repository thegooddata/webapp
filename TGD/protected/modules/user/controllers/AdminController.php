<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	
	public $layout='//layouts/column2';
	
	public $displayMenu = true;


        // set title
    public $pageTitle = " - Manage Members";

	private $_model;

	private $statusToList = array(
		User::STATUS_APPLIED => PHPLIST_APPLIED_LIST,
		User::STATUS_PRE_ACCEPTED => PHPLIST_PRE_ACCEPTED_LIST,
		User::STATUS_ACCEPTED => PHPLIST_ACCEPTED_LIST,
		User::STATUS_DENIED => PHPLIST_DENIED_LIST,
		User::STATUS_LEFT => PHPLIST_LEFT_LIST,
		User::STATUS_EXPELLED => PHPLIST_EXPELLED_LIST,
		);

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/admin.js', CClientScript::POS_END);

		$model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
            $model->attributes=$_GET['User'];

        $columns = $this->_getTableColumns('members');
        $this->render('index',array(
            'model'=>$model,
            'columns'=>$columns,
        ));
		/*$dataProvider=new CActiveDataProvider('User', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();

		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$profile=new Profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{

			$previous_status=$model->status;

			$model->attributes=$_POST['User'];

			$new_status=$model->status;


			$profile->attributes=((isset($_POST['Profile']) ? $_POST['Profile'] : array()));;
			
			
			if($model->validate() && $profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);

				if ($old_password->password != $model->password) {
					$model->password = Yii::app()->controller->module->encrypting($model->password);
					$model->activkey = Yii::app()->controller->module->encrypting(microtime().$model->password);
				}

				$model->save();
				$profile->save();

				if ($previous_status != $new_status){
					
					$phplist = new PHPList(PHPLIST_HOST, PHPLIST_DB, PHPLIST_LOGIN, PHPLIST_PASSWORD);

					$email = $model->email;
					$to_list = $this->statusToList[$new_status];
					$from_list = $this->statusToList[$previous_status];

                    //if notification preferences: subscribe and phplist segments are 24 or 25. Issue:Add more membership details #20
                    if(($to_list != PHPLIST_PRE_ACCEPTED_LIST && $to_list != PHPLIST_ACCEPTED_LIST) ||
                        (($to_list == PHPLIST_PRE_ACCEPTED_LIST  || $to_list == PHPLIST_ACCEPTED_LIST) && $model->notification_preferences))
                    {


                        // There's a special case when the user changes from status Applied to status Pre-accepted.
                        // In this case, the user doesn't move from one list to another, but instead is added to the list.
                        if ($previous_status == User::STATUS_APPLIED && $new_status == User::STATUS_PRE_ACCEPTED) {
                            // send email
                            Yii::app()->getModule('user')->sendApplicationApproval($model);
                            // add user to list
                            $result = $phplist->addUserToList($email, $to_list);

                            if ($result == 1) {
                                Yii::app()->user->setFlash('userAdmin', "The user has been added to PHPList pre-accepted list.");
                            }

                        } // if both of the lists assigned to each status, exists in config.

                        elseif ($from_list * $to_list > 0) {
                            // move user between lists
                            $result = $phplist->moveUser($email, $from_list, $to_list);

                            if ($result == 1) {
                                Yii::app()->user->setFlash('userAdmin', "The user has been moved from list {$from_list} to list {$to_list} .");
                            }
                        } elseif ($to_list == 0) {
                            // delete user from lists
                            $result = $phplist->removeUserFromList($email, $from_list);
                        }


                    //if notification preferences: unsubscribe remove segment 24 and 25. Issue:Add more membership details #20
                    }else{
                        $phplist->removeUserFromList($email, PHPLIST_ACCEPTED_LIST);
                        $phplist->removeUserFromList($email, PHPLIST_PRE_ACCEPTED_LIST);
                    }

				}

				$this->redirect(array('view','id'=>$model->id));
			} else {
				$profile->validate();
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}
    
    /**
     * Link to approve a member application
     * @param type $id
     */
    public function actionApproveApplication($id) {
      $model=$this->loadModel($id);

      if ($model && $model->status != User::STATUS_ACCEPTED) {
        $model->status = User::STATUS_PRE_ACCEPTED;
        $model->update(array('status'));
        Yii::app()->getModule('user')->sendApplicationApproval($model);
        Yii::app()->user->setFlash('userAdmin', "The user {$model->username} has been pre-accepted.");
      }
      $this->redirect(array('admin'));
    }
    
    public function actionRejectApplication($id, $reason=null) {
      
      $member = $this->loadModel($id);
      $model = new RejectApplicationForm();
      $model->member=$member;
      $model->reason=$reason;
      $rejected=false;
      
      if (isset($_POST['RejectApplicationForm'])) {
        $model->attributes = $_POST['RejectApplicationForm'];
        if ($model->validate()) {
          $model->reject();
          $rejected=true;
        }
      }
      
      // if form not sent, but we've got reason by $_GET then auto-reject
      if ($reason != null && $reason != 'other') {
        $model->reject();
        $rejected=true;
      }
            
      if ($rejected) {
        Yii::app()->user->setFlash('userAdmin', "The user {$member->username} has been rejected.");
        $this->redirect(array('admin'));
      }
      
      $this->render('rejectApplication', compact('model','member'));
    }

  /**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		// if(Yii::app()->request->isPostRequest)
		// {
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profile::model()->findByPk($model->id);
			
			// Make sure profile exists
			if ($profile)
				$profile->delete();

			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/admin'));
		// }
		// else
		// 	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	

	public function actionExcel() {
		if(isset($_GET['cols'])){
			$cols = explode('|', $_GET['cols']);
		}
		
      	ExcelHelper::sendData('members', $cols);
    }
    
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel($id=null)
	{
        if ($id==null && isset($_GET['id'])) {
          $id=$_GET['id'];
        }
		if($this->_model===null)
		{
			if($id)
				$this->_model=User::model()->notsafe()->findbyPk($id);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}
