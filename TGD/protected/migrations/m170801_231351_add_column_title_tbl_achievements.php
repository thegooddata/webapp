<?php

class m170801_231351_add_column_title_tbl_achievements extends CDbMigration
{
	public function up()
	{
          $this->execute("ALTER TABLE tbl_achievements ADD COLUMN title character varying(255);");
          $this->execute("ALTER TABLE tbl_achievements ALTER COLUMN title SET DEFAULT ''::character varying;");
	}

	public function down()
	{
		echo "m170801_231351_add_column_title_tbl_achievements does not support migration down.\n";
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