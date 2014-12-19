<?php

class m141219_150456_ip extends CDbMigration
{
	public function up()
	{
      $this->execute("ALTER TABLE tbl_active_users ALTER COLUMN host TYPE varchar (32)");
      $this->execute("UPDATE tbl_active_users SET host=MD5(host)");
	}

	public function down()
	{
		echo "m141219_150456_ip does not support migration down.\n";
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