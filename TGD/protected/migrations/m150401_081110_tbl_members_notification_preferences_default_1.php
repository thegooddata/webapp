<?php

class m150401_081110_tbl_members_notification_preferences_default_1 extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE tbl_members ALTER COLUMN notification_preferences DROP DEFAULT;");
        $this->execute("ALTER TABLE tbl_members ALTER COLUMN notification_preferences SET DEFAULT 1;");
        $this->execute("UPDATE tbl_members SET notification_preferences = 1;");
	}

	public function down()
	{
		echo "m150401_081110_tbl_members_notification_preferences_default_1 does not support migration down.\n";
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