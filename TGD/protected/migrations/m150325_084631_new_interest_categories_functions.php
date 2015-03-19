<?php

class m150325_084631_new_interest_categories_functions extends CDbMigration
{
	public function up()
	{
        $this->execute('
             CREATE OR REPLACE FUNCTION _getsubcategories(id_p integer, status_p integer)
              RETURNS TABLE(id integer) AS $$
            BEGIN

                        RETURN QUERY
                        SELECT c.id FROM tbl_interest_categories c WHERE c.id = id_p
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
                            WHERE c.id = id_p AND (c1.status = status_p OR status_p = 2);

            END;
            $$
              LANGUAGE plpgsql VOLATILE
              COST 100
              ROWS 1000;
        ');

        $this->execute('
            CREATE OR REPLACE FUNCTION _get_member_category_rating(
                id_category integer,
                id_member integer,
                datefrom date,
                dateinto date)
              RETURNS double precision AS
            $$
            declare
              rating float;
              all_members bigint;
              min_members bigint;
              user_counter bigint;
            BEGIN

            rating:=-100;
            all_members:=0;
            min_members:=0;
            user_counter:=0;

            SELECT COUNT(*) as count, SUM(CASE WHEN c.member_id = id_member THEN c.counter ELSE 0 END) as user_count
            INTO all_members, user_counter
            FROM _getcategoriesvisitcounter(id_category, datefrom, dateinto) c;

            IF(all_members = 0) THEN RETURN rating; END IF;
            IF(user_counter = 0) THEN RETURN rating; END IF;

            SELECT COUNT(*) as count INTO min_members FROM _getcategoriesvisitcounter(id_category, datefrom, dateinto) c WHERE c.counter <= user_counter;

            rating:=(min_members*100.0/all_members);
            rating:=(rating - 50)*2;

            RETURN rating;

            END;
            $$
              LANGUAGE plpgsql VOLATILE
              COST 100;
        ');

        $this->execute('
            CREATE OR REPLACE FUNCTION _getcategoriesrating(
                IN id_p integer,
                IN id_member integer,
                IN datefrom date,
                IN dateinto date)
              RETURNS TABLE(id integer, rating double precision, category character varying) AS
            $BODY$
            BEGIN
                RETURN QUERY

                SELECT 	c.id,
                    _get_member_category_rating(c.id, id_member, datefrom, dateinto) as counter,
                    c.category
                FROM tbl_interest_categories c
                WHERE c.parent_id = id_p
                    AND c.status = 1;
            END;
            $BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100
              ROWS 1000;
        ');

        $this->execute('
            CREATE OR REPLACE FUNCTION _getcategoriesvisitcounter(
                IN id_p integer,
                IN datefrom date,
                IN dateinto date)
              RETURNS TABLE(member_id integer, counter bigint) AS
            $$
            BEGIN
                RETURN QUERY

                SELECT u.member_id, SUM(u.counter) as counter
                FROM _getsubcategories(id_p, 1) c
                JOIN tbl_interest_categories_sites s
                    ON s.category_id = c.id
                JOIN tbl_interest_categories_counts u
                    ON u.site = s.site
                WHERE u.date_visit BETWEEN datefrom AND dateinto
                GROUP BY u.member_id;
            END;
            $$
              LANGUAGE plpgsql VOLATILE
              COST 100
              ROWS 1000;
        ');

        $this->execute('
            CREATE OR REPLACE FUNCTION _getcategorycount(
                id_p integer,
                member_id_p integer,
                datefrom_p date,
                dateinto_p date)
              RETURNS integer AS
            $$
            declare
              total integer;
            BEGIN
              total:=0;
              SELECT SUM(coalesce(u.counter,0)) + _getcategorycount(c.id, member_id_p, datefrom_p, dateinto_p) as count
               into total
              FROM tbl_interest_categories c
              LEFT JOIN tbl_interest_categories_sites s
                ON s.category_id = c.id
              LEFT JOIN tbl_interest_categories_counts u
                ON u.member_id = member_id_p AND u.site = s.site
                AND u.date_visit BETWEEN datefrom_p AND dateinto_p
              WHERE c.parent_id = id_p;
               RETURN coalesce(total,0);
            END;
            $$
              LANGUAGE plpgsql VOLATILE
              COST 100;
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