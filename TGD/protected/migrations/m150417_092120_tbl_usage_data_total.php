<?php

class m150417_092120_tbl_usage_data_total extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE tbl_usage_data_total
            (
              id serial NOT NULL,
              member_id integer DEFAULT 0,
              name character varying(128) NOT NULL,
              subname character varying(128),
              value integer DEFAULT 0,
              created_at timestamp with time zone DEFAULT now(),
              updated_at timestamp with time zone DEFAULT now(),
              CONSTRAINT tbl_usage_data_total_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");
	}

	public function down()
	{
		echo "m150417_092120_tbl_deleted_data_total does not support migration down.\n";
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