<?php

class m150128_180358_indexing_table_tbl_browsing extends CDbMigration
{
	public function up()
	{
        $this->execute('CREATE INDEX idx_browsing_domainmemberid ON tbl_browsing USING btree (member_id, domain COLLATE pg_catalog."default")');

	}

	public function down()
	{
        $this->execute('DROP INDEX  idx_browsing_domainmemberid');
//		echo "m150128_180358_indexing_table_tbl_browsing does not support migration down.\n";
//		return false;
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