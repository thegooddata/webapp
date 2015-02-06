<?php

class m141012_073003_active_nulls extends CDbMigration
{
	public function up()
	{
      $this->execute("ALTER TABLE tbl_active_users ALTER COLUMN member_id SET DEFAULT NULL;");
      $this->execute("ALTER TABLE tbl_active_users ALTER COLUMN user_id SET DEFAULT NULL;");
      $this->execute("ALTER TABLE tbl_active_users ALTER COLUMN member_or_user_id SET DEFAULT NULL;");
	}

	public function down()
	{
		echo "m141012_073003_active_nulls does not support migration down.\n";
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