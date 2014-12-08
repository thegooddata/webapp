<?php

class m141208_191152_update_company_achievements_views_2 extends CDbMigration
{
	public function up()
	{
		$view = "CREATE OR REPLACE VIEW view_queries_trade_month AS 
  select count(*) as total  FROM tbl_queries where tbl_queries.share='true' and created_at between  NOW()-'1 month'::interval and NOW();";
		$this->execute($view);
	}

	public function down()
	{
		echo "m141208_191152_update_company_achievements_views_2 does not support migration down.\n";
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