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

                        SELECT id FROM tbl_interest_categories WHERE id = i
                        UNION
                            SELECT c1.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            WHERE c.id = i AND (c1.status = s OR s = 2)
                        UNION
                            SELECT c2.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            JOIN tbl_interest_categories c2
                                ON c2.parent_id = c1.id
                            WHERE c.id = i AND (c1.status = s OR s = 2)
                        UNION
                            SELECT c3.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            JOIN tbl_interest_categories c2
                                ON c2.parent_id = c1.id
                            JOIN tbl_interest_categories c3
                                ON c3.parent_id = c2.id
                            WHERE c.id = i AND (c1.status = s OR s = 2)
                        UNION
                            SELECT c4.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            JOIN tbl_interest_categories c2
                                ON c2.parent_id = c1.id
                            JOIN tbl_interest_categories c3
                                ON c3.parent_id = c2.id
                            JOIN tbl_interest_categories c4
                                ON c4.parent_id = c3.id
                            WHERE c.id = i AND (c1.status = s OR s = 2)
                        ;

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