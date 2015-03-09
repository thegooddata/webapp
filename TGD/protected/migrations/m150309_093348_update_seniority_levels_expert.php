<?php

class m150309_093348_update_seniority_levels_expert extends CDbMigration
{
	public function up()
	{
        $this->execute("UPDATE tbl_seniority_levels SET percentile=90 WHERE id=4;");
	}

	public function down()
	{
		echo "m150309_093348_update_seniority_levels_expert does not support migration down.\n";
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