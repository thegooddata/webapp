<?php

class m150402_125812_tbl_browsing_flagged extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE tbl_browsing_flagged
            (
              id serial NOT NULL,
              member_id integer,
              domain character varying(255) NOT NULL DEFAULT ''::character varying,
              url text NOT NULL DEFAULT ''::text,
              usertime timestamp without time zone DEFAULT now(),
              created_at timestamp with time zone DEFAULT now(),
              updated_at timestamp with time zone DEFAULT now(),
              CONSTRAINT tbl_browsing_flagged_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");
	}

	public function down()
	{
		echo "m150402_125812_tbl_browsing_flagged does not support migration down.\n";
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