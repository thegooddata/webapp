<?php

class m140820_180610_currencies extends CDbMigration
{
	public function up()
	{
            // remove x rate from incomes
            $this->execute("ALTER TABLE tbl_incomes DROP COLUMN xrate_usd_spot");
 
            // add x rate to currencies
            $this->execute("ALTER TABLE tbl_currencies ADD COLUMN exchange_rate numeric(13,6)");
            $this->execute("UPDATE tbl_currencies SET exchange_rate =1");
            $this->execute("ALTER TABLE tbl_currencies ALTER COLUMN exchange_rate SET NOT NULL");
            $this->execute("ALTER TABLE tbl_currencies ALTER COLUMN exchange_rate SET DEFAULT 1");
            
            
            
	}

	public function down()
	{
		echo "m140820_180610_currencies does not support migration down.\n";
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