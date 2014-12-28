<?php

class m141228_040012_deleteted_achievements extends CDbMigration
{
	public function up()
	{
      $this->execute("ALTER TABLE tbl_achievements ADD COLUMN deleted smallint NOT NULL DEFAULT 0");
      $this->execute("CREATE INDEX idx_achievements_deleted ON tbl_achievements(deleted)");
	}

	public function down()
	{
		echo "m141228_040012_deleteted_achievements does not support migration down.\n";
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