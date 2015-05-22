<?php

Yii::import('application.models._base.BaseMembers');

class Members extends BaseMembers
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function getOurPeople(){
        $people = array();
        $users = Yii::app()->db
            ->createCommand("
                 SELECT id, username, avatar, url, seniority_level
                  FROM tbl_members
                  WHERE avatar IS NOT NULL AND avatar != '' AND status = 2 AND superuser != 1
                  ORDER BY seniority_level DESC, RANDOM();")
            ->queryAll();
        
        if(!empty($users)){
            foreach($users as $key => $user) {
                if(!file_exists(Yii::app()->basePath ."/../uploads/avatars/" . $user['id'] . "/thumb/" . $user['avatar'])) {
                    unset($users[$key]);
                }
            }
        }

        $directors = 0;
        $collaborators = 0;
        $owners = 0;
        $i = 0;
        while(!empty($users)){
            foreach($users as $key => $user){
                if($directors + $collaborators + $owners == 20){
                    $i++;
                }
                if($user['seniority_level'] == 6 && $directors <= 13){
                    $people[$i][$user['id']] = array(
                        'seniority_level' => $user['seniority_level'],
                        'url' => $user['url'],
                        'avatar' => $user['avatar'],
                        'username' => $user['username'],
                        'id'=>$user['id'],
                    );
                    unset($users[$key]);
                    $directors++;
                }
                if($user['seniority_level'] == 5 && $collaborators <= 20 - $directors - 7){
                    $people[$i][$user['id']] = array(
                        'seniority_level' => $user['seniority_level'],
                        'url' => $user['url'],
                        'avatar' => $user['avatar'],
                        'username' => $user['username'],
                        'id'=>$user['id'],
                    );
                    unset($users[$key]);
                    $collaborators++;
                }
                if(($user['seniority_level'] == 3 || $user['seniority_level'] == 0) && $owners <= 20 - $directors - $collaborators){
                    $people[$i][$user['id']] = array(
                        'seniority_level' => $user['seniority_level'],
                        'url' => $user['url'],
                        'avatar' => $user['avatar'],
                        'username' => $user['username'],
                        'id'=>$user['id'],
                    );
                    unset($users[$key]);
                    $collaborators++;
                }
            }
        }

        foreach($people as $key => $member){
            shuffle($people[$key]);
        }

        return $people;
    }
}