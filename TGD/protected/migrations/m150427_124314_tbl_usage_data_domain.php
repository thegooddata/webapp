<?php

class m150427_124314_tbl_usage_data_domain extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE IF NOT EXISTS tbl_usage_data_domain
            (
              id serial NOT NULL,
              member_id integer DEFAULT 0,
              name character varying(128) NOT NULL,
              domain character varying(255),
              value integer DEFAULT 0,
              created_at timestamp with time zone DEFAULT now(),
              updated_at timestamp with time zone DEFAULT now(),
              CONSTRAINT tbl_usage_data_domain_pkey PRIMARY KEY (id)
            )
            WITH (
                OIDS=FALSE
            );
        ");

        $this->execute("DROP VIEW view_adtracks_members;");

        $this->execute("
            CREATE OR REPLACE VIEW view_adtracks_members AS
             SELECT member_id, domain, SUM(adtracks) as adtracks FROM (
                 SELECT tbl_adtracks.member_id,
                    tbl_adtracks.domain,
                    count(*) AS adtracks
                   FROM tbl_adtracks
                  GROUP BY tbl_adtracks.domain, tbl_adtracks.member_id

                  UNION SELECT member_id,
                    domain,
                    value AS adtracks
                   FROM tbl_usage_data_domain
                   WHERE name = 'adtracks'
                  ) a
                  GROUP BY domain, member_id
                  ORDER BY adtracks
        ");

        $this->execute("DROP VIEW view_browsing_members;");

        $this->execute("
            CREATE OR REPLACE VIEW view_browsing_members AS
             SELECT member_id, domain, SUM(visited) as visited FROM (
                 SELECT tbl_browsing.member_id,
                    tbl_browsing.domain,
                    count(*) AS visited
                   FROM tbl_browsing
                  GROUP BY tbl_browsing.member_id, tbl_browsing.domain

                  UNION SELECT member_id,
                    domain,
                    value AS visited
                   FROM tbl_usage_data_domain
                   WHERE name = 'browsing'
                  ) a
                  GROUP BY member_id, domain
                  ORDER BY visited
        ");
	}

	public function down()
	{
		echo "m150427_124314_tbl_usage_data_domains does not support migration down.\n";
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