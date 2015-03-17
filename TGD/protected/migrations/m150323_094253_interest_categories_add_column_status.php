<?php

class m150323_094253_interest_categories_add_column_status extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE tbl_interest_categories ADD status integer NOT NULL DEFAULT 1;");

        $this->execute('
            CREATE OR REPLACE FUNCTION _getcategoriesrating(
                IN id_p integer,
                IN id_member integer,
                IN datefrom date,
                IN dateinto date)
              RETURNS TABLE(id integer, rating double precision, category character varying) AS
            $BODY$

                        SELECT 	c.id,
                            _get_member_category_rating(c.id, id_member, datefrom, dateinto) as counter,
                            c.category
                        FROM tbl_interest_categories c
                        WHERE c.parent_id = id_p
                    AND c.status = 1
                        ;
                        $BODY$
              LANGUAGE sql VOLATILE
              COST 100
              ROWS 1000;
        ');

        $this->execute("ALTER FUNCTION _getcategoriesrating(integer, integer, date, date) OWNER TO tgd;");

        $this->execute('
            CREATE OR REPLACE FUNCTION _getsubcategories(
                IN id_p integer,
                IN status_p integer)
              RETURNS TABLE(id integer) AS
            $BODY$

                        SELECT id FROM tbl_interest_categories WHERE id = id_p
                        UNION
                            SELECT c1.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            WHERE c.id = id_p AND (c1.status = status_p OR status_p = 2)
                        UNION
                            SELECT c2.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            JOIN tbl_interest_categories c2
                                ON c2.parent_id = c1.id
                            WHERE c.id = id_p AND (c1.status = status_p OR status_p = 2)
                        UNION
                            SELECT c3.id
                            FROM tbl_interest_categories c
                            JOIN tbl_interest_categories c1
                                ON c1.parent_id = c.id
                            JOIN tbl_interest_categories c2
                                ON c2.parent_id = c1.id
                            JOIN tbl_interest_categories c3
                                ON c3.parent_id = c2.id
                            WHERE c.id = id_p AND (c1.status = status_p OR status_p = 2)
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
                            WHERE c.id = id_p AND (c1.status = status_p OR status_p = 2)
                        ;

                        $BODY$
              LANGUAGE sql VOLATILE
              COST 100
              ROWS 1000;
        ');

        $this->execute("ALTER FUNCTION _getsubcategories(integer, integer) OWNER TO tgd;");

        $this->execute('
            CREATE OR REPLACE FUNCTION _getcategoriesvisitcounter(
                IN id_p integer,
                IN datefrom date,
                IN dateinto date)
              RETURNS TABLE(member_id integer, counter bigint) AS
            $BODY$

            SELECT u.member_id, SUM(u.counter) as counter
            FROM _getsubcategories(id_p, 1) c
            JOIN tbl_interest_categories_sites s
                ON s.category_id = c.id
            JOIN tbl_interest_categories_counts u
                ON u.site = s.site
            WHERE u.date_visit BETWEEN datefrom AND dateinto
            GROUP BY u.member_id

            ;

            $BODY$
              LANGUAGE sql VOLATILE
              COST 100
              ROWS 1000;
        ');

        $this->execute("ALTER FUNCTION _getcategoriesvisitcounter(integer, date, date) OWNER TO tgd;");
	}

	public function down()
	{
		echo "m150323_094253_interest_categories_add_column_status does not support migration down.\n";
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