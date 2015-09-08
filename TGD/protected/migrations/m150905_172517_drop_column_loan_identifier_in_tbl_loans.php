<?php

class m150905_172517_drop_column_loan_identifier_in_tbl_loans extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE tbl_loans DROP COLUMN loan_identifier;");
	}

	public function down()
	{
		echo "m150905_172517_drop_column_loan_identifier_in_tbl_loans does not support migration down.\n";
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