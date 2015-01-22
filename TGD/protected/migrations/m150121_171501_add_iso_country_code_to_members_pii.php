<?php

class m150121_171501_add_iso_country_code_to_members_pii extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE {{members_pii}} ADD COLUMN country_code char(2) NULL");
	}

	public function down()
	{
		$this->execute("ALTER TABLE {{members_pii}} DROP COLUMN IF EXISTS country_code");
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