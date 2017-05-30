<?php

class m170530_053758_add_column_image_tbl_achievements extends CDbMigration
{
	public function up()
	{
          $this->execute("ALTER TABLE tbl_achievements ADD COLUMN image character varying(255);");
          $this->execute("ALTER TABLE tbl_achievements ALTER COLUMN image SET DEFAULT ''::character varying;");
	}

	public function down()
	{
		echo "m170530_053758_add_column_image_tbl_achievements does not support migration down.\n";
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