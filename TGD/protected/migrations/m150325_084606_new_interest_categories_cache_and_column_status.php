<?php

class m150325_084606_new_interest_categories_cache_and_column_status extends CDbMigration
{
	public function up()
	{
        $this->execute("
            DO $$
                BEGIN
                    BEGIN
                        ALTER TABLE tbl_interest_categories ADD COLUMN status integer NOT NULL DEFAULT 1;
                    EXCEPTION
                        WHEN duplicate_column THEN RAISE NOTICE 'status already exists in tbl_interest_categories.';
                    END;
                END;
            $$
        ");

        $this->execute("DROP TABLE IF EXISTS tbl_interest_categories_cache;");

        $this->execute("
            CREATE TABLE tbl_interest_categories_cache
            (
              id serial NOT NULL,
              member_id integer,
              data text NOT NULL,
              daydate date DEFAULT now(),
              CONSTRAINT tbl_interest_categories_cache_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");

        $this->execute("ALTER TABLE tbl_interest_categories_cache OWNER TO tgd;");

        $this->execute("
          CREATE INDEX idx_tbl_interest_categories_cache
              ON tbl_interest_categories_cache
              USING btree
              (member_id, daydate);
        ");
	}

	public function down()
	{
		echo "m150325_084606_new_interest_categories_cache_and_column_status does not support migration down.\n";
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