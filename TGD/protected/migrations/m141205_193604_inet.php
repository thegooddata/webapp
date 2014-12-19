<?php

class m141205_193604_inet extends CDbMigration
{
	public function up()
	{
      $this->execute("ALTER TABLE tbl_active_users ADD COLUMN host inet");
	}

	public function down()
	{
		echo "m141205_193604_inet does not support migration down.\n";
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