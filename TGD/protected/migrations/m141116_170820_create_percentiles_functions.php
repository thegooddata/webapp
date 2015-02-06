<?php

class m141116_170820_create_percentiles_functions extends CDbMigration
{
	public function up()
	{
		$function = 'CREATE OR REPLACE FUNCTION _getUserPercentileYear (i integer)
					RETURNS float AS $total$
					declare
					  members float;
					  count float;
					  total float;
					BEGIN
					  total:=0;
					  SELECT count(*) into members FROM view_adtracks_year_users;
					  SELECT rownum into count FROM (
					    SELECT row_number() over (order by queries) as rownum, member_id FROM view_adtracks_year_users ORDER BY queries ASC
					  ) x
					  WHERE member_id = i;  

					  total:=100*count/members;
					  total:=round(total::numeric, 1);
					  
					   RETURN total;
					END;
					$total$ LANGUAGE plpgsql;';
		$this->execute($function);

		$function = 'CREATE OR REPLACE FUNCTION _getUserPercentileMonth (i integer)
					RETURNS float AS $total$
					declare
					  members float;
					  count float;
					  total float;
					BEGIN
					  total:=0;
					  SELECT count(*) into members FROM view_adtracks_month_users;
					  SELECT rownum into count FROM (
					    SELECT row_number() over (order by queries) as rownum, member_id FROM view_adtracks_month_users ORDER BY queries ASC
					  ) x
					  WHERE member_id = i;  

					  total:=100*count/members;
					  total:=round(total::numeric, 1);
					  
					   RETURN total;
					END;
					$total$ LANGUAGE plpgsql;';
		$this->execute($function);

		$function = 'CREATE OR REPLACE FUNCTION _getUserPercentileWeek (i integer)
					RETURNS float AS $total$
					declare
					  members float;
					  count float;
					  total float;
					BEGIN
					  total:=0;
					  SELECT count(*) into members FROM view_adtracks_week_users;
					  SELECT rownum into count FROM (
					    SELECT row_number() over (order by queries) as rownum, member_id FROM view_adtracks_week_users ORDER BY queries ASC
					  ) x
					  WHERE member_id = i;  

					  total:=100*count/members;
					  total:=round(total::numeric, 1);
					  
					   RETURN total;
					END;
					$total$ LANGUAGE plpgsql;';
		$this->execute($function);
	}

	public function down()
	{
		echo "m141116_170820_create_percentiles_functions does not support migration down.\n";
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
