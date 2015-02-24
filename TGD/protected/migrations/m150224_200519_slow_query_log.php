<?php

class m150224_200519_slow_query_log extends CDbMigration
{
	public function up()
	{
    $this->execute("

      CREATE TABLE tbl_slow_query_log
      (
        id serial NOT NULL,
        query text,
        count integer,
        total_s numeric(13,6),
        avg_s numeric(13,6),
        min_s numeric(13,6),
        max_s numeric(13,6),
        created_at time with time zone DEFAULT now(),
        updated_at time with time zone DEFAULT now(),
        CONSTRAINT tgd_slow_query_log_pk PRIMARY KEY (id)
      )
      WITH (
        OIDS=FALSE
      );

    ");
    $this->execute("

      ALTER TABLE tbl_slow_query_log
        OWNER TO tgd;

    ");
	}

	public function down()
	{
		echo "m150224_200519_slow_query_log does not support migration down.\n";
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