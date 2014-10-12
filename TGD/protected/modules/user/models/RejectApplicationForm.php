<?php

class RejectApplicationForm extends CFormModel
{
    /**
     *
     * @var User
     */
	public $member;
	public $reason;
	public $other_reason;
    
    public $rejected=false;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('member, reason', 'required'),
			array('other_reason', 'validate_other_reason'),
		);
	}
    
    public function validate_other_reason($attribute, $params=array()) {
      if ($this->reason=='other') {
        if (empty($this->{$attribute})) {
          $this->addError($attribute, 'You must specify a reason.');
        }
      }
    }

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}
    
    public function reject() {
      
      $this->member->status=User::STATUS_DENIED;
      $this->member->update(array('status'));
      
      $firstname='';
      
      $memberPii=  MembersPii::model()->findByAttributes(array('member_id'=>$this->member->id));
      if ($memberPii) {
        $firstname=$memberPii->firstname;
      }
      
      $reason='';
      
      if ($this->reason=='other') {
        $reason=$this->other_reason;
      } else {
        $reason=Yii::app()->getModule('user')->rejectReasons[$this->reason];
      }
      
      //SEND EMAIL
      $content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'application_not_accepted.html');

      $content = str_replace('[FIRST_NAME]', $firstname,  $content);
      $content = str_replace('[REASON]', $reason,  $content);

      $message = new YiiMailMessage;
      $message->subject = 'Application not accepted';
      $message->setBody($content,'text/html');
      $message->addTo($this->member->email);
      $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);
      return Yii::app()->mail->send($message);
    }
}
