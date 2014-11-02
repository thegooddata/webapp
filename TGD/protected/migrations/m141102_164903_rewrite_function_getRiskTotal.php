<?php

class m141102_164903_rewrite_function_getRiskTotal extends CDbMigration
{
	public function up()
	{
		$function = 'CREATE OR REPLACE FUNCTION _getRiskTotal ()
		RETURNS float AS $total$
		declare
		  total float;
		BEGIN
		  SELECT ( (select COUNT(*) from tbl_adtracks) / (select COUNT(*) from tbl_browsing) ) as ratio
		   into total FROM tbl_adtracks LIMIT 1;
		   RETURN total;
		END;
		$total$ LANGUAGE plpgsql';
		$this->execute($function);
	}

	public function down()
	{
		echo "m141102_164903_rewrite_function_getRiskTotal does not support migration down.\n";
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