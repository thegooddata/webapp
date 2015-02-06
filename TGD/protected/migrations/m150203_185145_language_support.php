<?php

class m150203_185145_language_support extends CDbMigration
{
	public function up()
	{
        $this->execute("UPDATE tbl_languages_support SET lang='en-us' WHERE id=2;");
//        $this->execute(" DELETE FROM tbl_languages_support WHERE id=3;");
	}

	public function down()
	{
		echo "m150203_185145_language_support does not support migration down.\n";
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