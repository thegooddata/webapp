<?php

class m140816_135320_trans_amount_num extends CDbMigration
{
	public function up()
	{
            // change amount from string to numeric field type
            $this->execute("ALTER TABLE tbl_transactions
   ADD COLUMN amount_num numeric(12,2) NOT NULL DEFAULT 0");
            $this->execute("UPDATE tbl_transactions SET amount_num=amount::numeric");
            $this->execute("ALTER TABLE tbl_transactions DROP COLUMN amount");
            $this->execute("ALTER TABLE tbl_transactions RENAME amount_num  TO amount");
	}

	public function down()
	{
		echo "m140816_135320_trans_amount_num does not support migration down.\n";
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