<?php

class m150416_161659_tbl_active_users_add_column_country extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE tbl_active_users ADD COLUMN country character varying(10);");
	}

	public function down()
	{
		echo "m150416_161659_tbl_active_users_add_column_country does not support migration down.\n";
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