<?php

class m150226_090538_add_members_avatar_url_notification_pref extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE tbl_members ADD COLUMN avatar character varying(255);");
        $this->execute("ALTER TABLE tbl_members ADD COLUMN url character varying(255);");
        $this->execute("ALTER TABLE tbl_members ADD COLUMN notification_preferences integer NOT NULL DEFAULT 0;");
	}

	public function down()
	{
		echo "m150226_090538_add_members_avatar_url_notification_pref does not support migration down.\n";
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