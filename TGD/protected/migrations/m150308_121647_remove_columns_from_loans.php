<?php

class m150308_121647_remove_columns_from_loans extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE tbl_members DROP COLUMN IF EXISTS loan_date;");
		$this->execute("ALTER TABLE tbl_members DROP COLUMN IF EXISTS loan_update;");
	
	}

	public function down()
	{
		$this->execute("ALTER TABLE tbl_loans ADD COLUMN loan_date timestamp with time zone DEFAULT now();");
		$this->execute("ALTER TABLE tbl_loans ADD COLUMN loan_update timestamp with time zone DEFAULT now();");
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