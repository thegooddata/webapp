<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SuggestionForm extends CFormModel
{
	public $email = '';
	public $body = '';

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('body', 'required', 'message'=>'Please provide your feedback'),
			// email has to be a valid email address
			array('email', 'email', 'message'=>'Invalid email address'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		//return array(
		//	'verifyCode'=>'Verification Code',
		//);
	}
}