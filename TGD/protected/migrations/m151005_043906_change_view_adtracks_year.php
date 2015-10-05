<?php

class m151005_043906_change_view_adtracks_year extends CDbMigration
{
	public function up()
	{
		$this->execute('
            CREATE OR REPLACE VIEW view_adtracks_year_users AS
        		SELECT d.member_id, sum(d.value) AS queries
   				FROM tbl_usage_data_daily d
  				WHERE d.name::text = \'adtracks\'::text AND d.daydate >= (now() - \'1 year\'::interval)
  				GROUP BY d.member_id;
  		');
	}

	public function down()
	{
		echo "m151005_043906_change_view_adtracks_year does not support migration down.\n";
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