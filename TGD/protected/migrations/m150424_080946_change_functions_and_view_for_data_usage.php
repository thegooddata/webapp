<?php

class m150424_080946_change_functions_and_view_for_data_usage extends CDbMigration
{
	public function up()
	{
        $this->execute('
            CREATE OR REPLACE FUNCTION _getrisktotal()
              RETURNS double precision AS
            $BODY$
                    declare
                      total float;
                    BEGIN
                      SELECT ( ((select COUNT(*) from tbl_adtracks) + coalesce((select value from tbl_usage_data_total WHERE name = \'adtracks\'  and member_id = 0), 0)) /
                       ((select COUNT(*) from tbl_browsing)  + coalesce((select value from tbl_usage_data_total WHERE name = \'browsing\' and member_id = 0), 0)) ) as ratio
                       into total FROM tbl_adtracks LIMIT 1;
                       RETURN total;
                    END;
                    $BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100;
        ');


        $this->execute('
            CREATE OR REPLACE FUNCTION _getriskratiototal()
              RETURNS double precision AS
            $BODY$declare
              block float;
              allow float;
              total float;
              ratio float;
            BEGIN

              ratio:=0;

              select count(*) + coalesce((select value from tbl_usage_data_total where name=\'adtracksBlocked\' and member_id = 0), 0) into block from tbl_adtracks where status=\'blocked\';
              select count(*) + coalesce((select value from tbl_usage_data_total where name=\'adtracksAllowed\' and member_id = 0), 0) into allow from tbl_adtracks where status=\'allowed\';

              total:=block+allow;

              if ( allow > 0 ) THEN
                ratio:=allow/total;
                ratio:=ratio*100;
              END IF;

              RETURN ratio;

            END;$BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100;
        ');


        $this->execute('
            CREATE OR REPLACE FUNCTION _getriskratiomember(i integer)
              RETURNS double precision AS
            $BODY$declare
              block float;
              allow float;
              total float;
              ratio float;
            BEGIN

              ratio:=0;

             select count(*) + coalesce((select value from tbl_usage_data_total where name=\'adtracksBlocked\' and member_id = i), 0) into block from tbl_adtracks where member_id= i and status=\'blocked\';
              select count(*) + coalesce((select value from tbl_usage_data_total where name=\'adtracksAllowed\' and member_id = i), 0) into allow from tbl_adtracks where member_id= i and status=\'allowed\';

              total:=block+allow;

              if ( allow > 0 ) THEN
                ratio:=allow/total;
                ratio:=ratio*100;
              END IF;

              RETURN ratio;

            END;$BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100;
        ');

        $this->execute('
            CREATE OR REPLACE FUNCTION _getriskmember(i integer)
              RETURNS double precision AS
            $BODY$
            declare
              total float;
            BEGIN
              total:=0;
              SELECT ( ((select count(*) from tbl_adtracks where member_id= i) + coalesce((select value from tbl_usage_data_total WHERE name = \'adtracks\'  and member_id = i), 0))::float /
               ((select count(*) from tbl_browsing where member_id= i) + coalesce((select value from tbl_usage_data_total WHERE name = \'browsing\'  and member_id = i), 0))::float ) as ratio
               into total FROM tbl_adtracks LIMIT 1;
               RETURN total;
            END;
            $BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_month_users AS
             SELECT a.member_id,
                count(*) + coalesce((SELECT SUM(d.value) FROM tbl_usage_data_daily d WHERE d.name = \'adtracks\' AND d.member_id = a.member_id AND d.daydate >= (now() - \'1 mon\'::interval)), 0) AS queries
               FROM tbl_adtracks a
              WHERE a.daydate >= (now() - \'1 mon\'::interval)
              GROUP BY a.member_id;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_sources_members AS
             SELECT a.member_id,
                t.name,
                count(*) + coalesce((SELECT SUM(d.value) FROM tbl_usage_data_total d WHERE d.name = \'adtracksSources\' AND d.subname = t.name AND d.member_id = a.member_id), 0) AS count
               FROM tbl_adtracks a,
                tbl_adtracks_sources s,
                tbl_adtracks_types t
              WHERE a.adtracks_sources_id = s.id AND s.adtrack_type_id = t.id
              GROUP BY t.name, a.member_id
              ORDER BY t.name;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_sources_total AS
             SELECT t.name,
                count(*) + coalesce((SELECT d.value FROM tbl_usage_data_total d WHERE d.name = \'adtracksSources\' AND d.subname = t.name AND d.member_id = 0), 0) AS count
               FROM tbl_adtracks a,
                tbl_adtracks_sources s,
                tbl_adtracks_types t
              WHERE a.adtracks_sources_id = s.id AND s.adtrack_type_id = t.id
              GROUP BY t.name
              ORDER BY t.name;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_users AS
             SELECT a.member_id,
                count(*) + coalesce((SELECT d.value FROM tbl_usage_data_total d WHERE d.name = \'adtracks\' AND d.member_id = a.member_id), 0) AS queries
               FROM tbl_adtracks a
              GROUP BY a.member_id;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_week_users AS
             SELECT a.member_id,
                count(*) + coalesce((SELECT SUM(d.value) FROM tbl_usage_data_daily d WHERE d.name = \'adtracks\' AND d.member_id = a.member_id AND d.daydate >= (now() - \'1 week\'::interval)), 0) AS queries
               FROM tbl_adtracks a
              WHERE a.daydate >=  (now() - \'1 week\'::interval)
              GROUP BY a.member_id;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_adtracks_year_users AS
             SELECT a.member_id,
                count(*) + coalesce((SELECT SUM(d.value) FROM tbl_usage_data_daily d WHERE d.name = \'adtracks\' AND d.member_id = a.member_id AND d.daydate >= (now() - \'1 year\'::interval)), 0) AS queries
               FROM tbl_adtracks a
              WHERE a.daydate >= (now() - \'1 year\'::interval)
              GROUP BY a.member_id;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_queries_members AS
             SELECT q.member_id,
                count(*) + coalesce((SELECT d.value FROM tbl_usage_data_total d WHERE d.name = \'queries\' AND d.member_id = q.member_id), 0) AS queries
               FROM tbl_queries q
              WHERE q.member_id IS NOT NULL
              GROUP BY q.member_id;
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_queries_month AS
             SELECT count(*) + coalesce((SELECT SUM(d.value) FROM tbl_usage_data_daily d WHERE d.name = \'queries\' AND d.member_id = 0 AND d.daydate >= (now() - \'1 mon\'::interval)), 0) AS total
               FROM tbl_queries
              WHERE tbl_queries.daydate >= (now() - \'1 mon\'::interval);
        ');

        $this->execute('
            CREATE OR REPLACE VIEW view_queries_trade_month AS
             SELECT count(*) + coalesce((SELECT d.value FROM tbl_usage_data_daily d WHERE d.name = \'queriesShared\' AND d.member_id = 0 AND d.daydate >= (now() - \'1 mon\'::interval)), 0) AS total
               FROM tbl_queries
              WHERE tbl_queries.share::text = \'true\'::text AND tbl_queries.daydate >= (now() - \'1 mon\'::interval);
        ');




	}

	public function down()
	{
		echo "m150424_080946_change_functions_getriskratio_and_getriskratiototal does not support migration down.\n";
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