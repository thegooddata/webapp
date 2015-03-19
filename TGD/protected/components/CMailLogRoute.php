<?php

class CMailLogRoute extends CEmailLogRoute {

    protected function sendEmail($email, $subject, $text) {
        $message = new YiiMailMessage;
        $message->subject = $subject;
        $message->setBody($text,'text/html');
        $message->addTo($email);
        $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);
        return Yii::app()->mail->send($message);
    }
}