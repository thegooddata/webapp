<?php

class m141208_185649_update_company_achievements_views extends CDbMigration
{
	public function up()
	{
		$view = "CREATE OR REPLACE VIEW view_members_month AS 
  select count(*) as total FROM tbl_members where lastvisit_at between NOW()-'1 month'::interval and NOW();";
		$this->execute($view);

		$view = "CREATE OR REPLACE VIEW view_queries_month AS 
  select count(*) as total  FROM tbl_queries where created_at between NOW()-'1 month'::interval and NOW();";
		$this->execute($view);
	}

	public function down()
	{
		echo "m141208_185649_update_company_acievements_views does not support migration down.\n";
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