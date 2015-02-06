<?php

class m141012_075159_active_users_populate extends CDbMigration
{
	public function up()
	{
      
      
      $user_ids=Yii::app()->db->createCommand("
      SELECT user_id
  FROM tbl_adtracks 
  WHERE
  tbl_adtracks.created_at >= (now() - '1 mon'::interval) 
  AND tbl_adtracks.created_at <=  now()  
  AND member_id=0
  group by user_id 
      ")->queryAll();
      foreach ($user_ids as $row) {
        if (!empty($row['user_id'])) {
          $model = new ActiveUsers();
          $model->user_id = $row['user_id'];
          $model->member_or_user_id = $row['user_id'];
          $model->save();
          echo "adding user_id {$model->member_or_user_id}\n";
        }
      }
      
      
      $member_ids=Yii::app()->db->createCommand("
      SELECT member_id
  FROM tbl_adtracks 
  WHERE
  tbl_adtracks.created_at >= (now() - '1 mon'::interval) 
  AND tbl_adtracks.created_at <=  now()  
  AND member_id<>0
  group by member_id 
      ")->queryAll();
      
      foreach ($member_ids as $row) {
        if (!empty($row['member_id'])) {
          $model = new ActiveUsers();
          $model->member_id = $row['member_id'];
          $model->member_or_user_id = $row['member_id'];
          $model->save();
          echo "adding member_id {$model->member_or_user_id}\n";
        }
      }
      
      
	}

	public function down()
	{
		echo "m141012_075159_active_users_populate does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}