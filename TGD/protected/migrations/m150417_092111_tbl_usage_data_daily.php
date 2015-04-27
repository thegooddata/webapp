<?php

class m150417_092111_tbl_usage_data_daily extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE tbl_usage_data_daily
            (
              id serial NOT NULL,
              member_id integer DEFAULT 0,
              name character varying(128) NOT NULL,
              value integer DEFAULT 0,
              daydate date DEFAULT date(now()),
              CONSTRAINT tbl_usage_data_daily_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");
	}

	public function down()
	{
		echo "m150417_092111_tbl_deleted_data_daily does not support migration down.\n";
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