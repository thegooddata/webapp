<?php

class m151019_144810_alter_usage_data_table extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE tbl_usage_data_daily ADD COLUMN user_id character varying(255) NULL");
	}

	public function down()
	{
		echo "m151019_144810_alter_usage_data_table does not support migration down.\n";
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