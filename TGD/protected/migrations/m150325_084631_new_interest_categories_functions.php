<?php

class m150325_084631_new_interest_categories_functions extends CDbMigration
{
	public function up()
	{
        $this->execute('DROP FUNCTION IF EXISTS _getsubcategories_test();');

        $this->execute('
             CREATE OR REPLACE FUNCTION _getsubcategories_test(i integer, s integer)
              RETURNS TABLE(id integer) AS
            $BODY$

                        SELECT id FROM tbl_interest_categories WHERE parent_id = 0;

                        $BODY$
              LANGUAGE sql VOLATILE
              COST 100
              ROWS 1000;
        ');
	}

	public function down()
	{
		echo "m150325_084631_new_interest_categories_functions does not support migration down.\n";
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