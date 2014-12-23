<?php

class m141223_131717_update_blacklist_terms extends CDbMigration
{
	public function up()
	{
		$view = "update tbl_queries_blacklist set stem = regexp_replace(stem,'^/b','\b');";
		$this->execute($view);
		$view = "update tbl_queries_blacklist set stem = regexp_replace(stem,'/b$','\b');";
		$this->execute($view);		
		$view = "update tbl_queries_blacklist set stem = regexp_replace(stem,'^/','');";
		$this->execute($view);		
	}


	public function down()
	{
		echo "m141223_131717_update_blacklist_terms does not support migration down.\n";
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