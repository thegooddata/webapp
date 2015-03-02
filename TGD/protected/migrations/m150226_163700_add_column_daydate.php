<?php

class m150226_163700_add_column_daydate extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE tbl_browsing ADD COLUMN daydate date DEFAULT date(now());");

        $this->execute("CREATE INDEX ix_browsing_daydate ON tbl_browsing USING btree (daydate);");

        $this->execute("UPDATE tbl_browsing SET daydate = date(created_at);");



        $this->execute("ALTER TABLE tbl_queries ADD COLUMN daydate date DEFAULT date(now());");

        $this->execute("CREATE INDEX ix_queries_daydate ON tbl_queries USING btree (daydate);");

        $this->execute("UPDATE tbl_queries SET daydate = date(created_at);");



        $this->execute("ALTER TABLE tbl_adtracks ADD COLUMN daydate date DEFAULT date(now());");

        $this->execute("CREATE INDEX ix_adtracks_daydate ON tbl_adtracks USING btree (daydate);");

        $this->execute("UPDATE tbl_adtracks SET daydate = date(created_at);");



        $this->execute("
            CREATE OR REPLACE VIEW view_adtracks_month_users AS
             SELECT tbl_adtracks.member_id,
                count(*) AS queries
               FROM tbl_adtracks
              WHERE tbl_adtracks.daydate >= date_trunc('month'::text, now())::date AND tbl_adtracks.daydate <= (date_trunc('month'::text, date_trunc('month'::text, now()) + '1 mon'::interval) - '00:00:01'::interval)
              GROUP BY tbl_adtracks.member_id;
        ");
        $this->execute(" ALTER TABLE view_adtracks_month_users OWNER TO tgd;");

        $this->execute("
            CREATE OR REPLACE VIEW view_adtracks_week_users AS
             SELECT tbl_adtracks.member_id,
                count(*) AS queries
               FROM tbl_adtracks
              WHERE tbl_adtracks.daydate >= date_trunc('week'::text, now())::date AND tbl_adtracks.daydate <= (date_trunc('week'::text, now()) + '6 days'::interval)
              GROUP BY tbl_adtracks.member_id;
        ");
        $this->execute("ALTER TABLE view_adtracks_week_users OWNER TO tgd;");

        $this->execute("
            CREATE OR REPLACE VIEW view_adtracks_year_users AS
             SELECT tbl_adtracks.member_id,
                count(*) AS queries
               FROM tbl_adtracks
              WHERE tbl_adtracks.daydate >= date_trunc('year'::text, now())::date AND tbl_adtracks.daydate <= (date_trunc('month'::text, date_trunc('year'::text, now()) + '1 year'::interval) - '00:00:01'::interval)
              GROUP BY tbl_adtracks.member_id;
        ");
        $this->execute("ALTER TABLE view_adtracks_year_users OWNER TO tgd;");

        $this->execute("
            CREATE OR REPLACE VIEW view_queries_month AS
             SELECT count(*) AS total
               FROM tbl_queries
              WHERE tbl_queries.daydate >= (now() - '1 mon'::interval) AND tbl_queries.daydate <= now();
        ");
        $this->execute("ALTER TABLE view_queries_month OWNER TO tgd;");

        $this->execute("
            CREATE OR REPLACE VIEW view_queries_trade_month AS
             SELECT count(*) AS total
               FROM tbl_queries
              WHERE tbl_queries.share::text = 'true'::text AND tbl_queries.daydate >= (now() - '1 mon'::interval) AND tbl_queries.daydate <= now();
        ");
        $this->execute("ALTER TABLE view_queries_trade_month OWNER TO tgd;");


    }

	public function down()
	{
		echo "m150226_163700_add_column_daydate does not support migration down.\n";
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