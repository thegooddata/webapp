<?php
//    * 04 * * * /usr/bin/php /var/www/tgd/protected/yiic.php DeleteUserData DeleteData
class DeleteUserDataCommand extends CConsoleCommand
{
    public $userData;

    public function __init(){
        $this->userData = new UserData();
        parent::init();
    }

    //Delete all usage data that is older than 3 months except the totals needed to show yearly figures
    //Working
    public function actionDeleteUsageDataOlder(){
        $this->userData = new UserData();
        $date = date('Y-m-d', strtotime('-3 month'));
        $this->userData->deleteAllUsageData($date);
    }

    //Delete all user data of those members that have been inactive for more than 3 months
    //Working
    public function actionDeleteUserDataInactive(){
        $this->userData = new UserData();
        $date = date('Y-m-d', strtotime('-3 months'));

        $users = members::model()->findAll(array('condition'=>'date(updated_at)<:date', 'params'=>array(':date'=>$date)));
        if(!empty($users)) {
            foreach ($users as $user) {
                $this->userData->deleteAllUserData($user->id);

                //$this->sendInactiveMail($user->email);
            }
        }
    }

    //Delete all usage data after resignation
    //Working
    public function actionDeleteUsageDataAfterResign(){
        $this->userData = new UserData();
        $date = date('Y-m-d', strtotime('-1 day'));
        $users = members::model()->findAll(array('condition'=>'status=-4 AND date(updated_at)<:date', 'params'=>array(':date'=>$date)));
        if(!empty($users)) {
            foreach ($users as $user) {
                $this->userData->deleteAllUsageDataByUser($user->id);
            }
        }
    }
    //Delete all user and member data of members 1 month after resignation
    public function actionDeleteUserAndMemberDataAfterResign(){
        $this->userData = new UserData();
        $date = date('Y-m-d', strtotime('-1 month'));
        $users = members::model()->findAll(array('condition'=>'status=-4 AND date(updated_at)<:date', 'params'=>array(':date'=>$date)));
        if(!empty($users)) {
            foreach ($users as $user) {
                $this->userData->deleteAllUserData($user->id);
                $this->userData->deleteAllMemberData($user->id);
            }
        }
    }

    //Delete all user and member data if they have been inactive more than 6 months
    public function actionDeleteUserAndMemberDataInactive(){
        $date = date('Y-m-d', strtotime('-6 month'));
        $users = members::model()->findAll(array('condition'=>'date(updated_at)<:date', 'params'=>array(':date'=>$date)));
        if(!empty($users)) {
            foreach ($users as $user) {
                $this->userData->deleteAllUserData($user->id);
                $this->userData->deleteAllMemberData($user->id);
            }
        }
    }

    protected function sendInactiveMail($email){
        $subject = 'TGD: Inactive more than 3 months';
        $content = 'Your account is not used for 3 months. After 6 months of inactivity it will be removed with all data';

        $message = new YiiMailMessage;
        $message->subject = $subject;
        $message->setBody($content,'text/html');
        $message->setTo(array($email));
        $message->setFrom(array(Yii::app()->params['senderGenericEmail'] => Yii::app()->params['senderGenericEmailName']));
        return Yii::app()->mail->send($message);
    }


}