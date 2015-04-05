<?php

class CMailLogRoute extends CEmailLogRoute {
  
    protected function processLogs($logs)
	{
		$message='';
		foreach($logs as $log)
			$message.=$this->formatLogMessage($log[0],$log[1],$log[2],$log[3]);
		$subject=$this->getSubject();
		if($subject===null)
			$subject=Yii::t('yii','Application Log');
		foreach($this->getEmails() as $email)
			$this->sendEmail($email,$subject,$message);
	}

    protected function sendEmail($email, $subject, $text) {
        $message = new YiiMailMessage;
        $message->subject = $subject;
        $message->setBody(nl2br($text),'text/html');
        $message->addTo($email);
        $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);
        return Yii::app()->mail->send($message);
    }
}