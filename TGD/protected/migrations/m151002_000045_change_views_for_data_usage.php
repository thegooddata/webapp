<?php

class m151002_000045_change_views_for_data_usage extends CDbMigration
{
	public function up()
	{
		$this->execute('
            CREATE OR REPLACE VIEW view_adtracks_month_users AS
        		SELECT d.member_id, sum(d.value) AS queries
   				FROM tbl_usage_data_daily d
  				WHERE d.name::text = \'adtracks\'::text AND d.daydate >= (now() - \'1 mon\'::interval)
  				GROUP BY d.member_id;
  		');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_week_users AS
         		SELECT d.member_id, sum(d.value) AS queries
				FROM tbl_usage_data_daily d
				WHERE d.name::text = \'adtracks\'::text AND d.daydate >= (now() - \'7 days\'::interval)
				GROUP BY d.member_id;
  		');
	}

	public function down()
	{
		echo "m151002_000045_change_views_for_data_usage does not support migration down.\n";
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