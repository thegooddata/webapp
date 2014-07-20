<?php

class m140719_193044_add_content_adtrack_source extends CDbMigration
{
	public function up()
	{
	  // Check if ad track type "Content" exists in database and if not found, create it.
	  $model = AdtracksTypes::model()->find("t.name=:name", array(':name'=>'Content'));
	  if (!$model) {
	    $model=new AdtracksTypes();
	    $model->name='Content';
	    $model->save();
	  }
	}

	public function down()
	{
		echo "m140719_193044_add_content_adtrack_source does not support migration down.\n";
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