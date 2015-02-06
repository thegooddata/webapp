<?php

class m150109_001309_trans_currency extends CDbMigration
{
	public function up()
	{
      $this->execute("DELETE FROM {{transactions}} WHERE currency='[currency]'");
	}

	public function down()
	{
		echo "m150109_001309_trans_currency does not support migration down.\n";
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