<?php

class m150402_122956_tbl_seniority_levels_update extends CDbMigration
{
	public function up()
	{
        $this->execute("UPDATE tbl_seniority_levels SET type=1 WHERE id IN(1,2);");
        $this->execute("UPDATE tbl_seniority_levels SET type=2 WHERE id IN(3,4);");
        $this->execute("UPDATE tbl_seniority_levels SET type=3 WHERE id IN(5,6);");
	}

	public function down()
	{
		echo "m150402_122956_tbl_seniority_levels_update does not support migration down.\n";
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