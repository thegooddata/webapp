<?php

class m150217_091915_create_interest_categories_tables extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE tbl_interest_categories
            (
              id serial NOT NULL,
              parent_id integer,
              category character varying(128) NOT NULL,
              url character varying(128) NOT NULL,
              counter integer DEFAULT 0,
              updated_at timestamp with time zone DEFAULT now(),
              CONSTRAINT tbl_interest_categories_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");
        $this->execute("ALTER TABLE tbl_interest_categories OWNER TO tgd;");

        $this->execute(
            "CREATE TABLE tbl_interest_categories_counts
                (
                  id serial NOT NULL,
                  member_id integer,
                  user_id character varying(255) DEFAULT ''::character varying,
                  site_id integer,
                  counter integer NOT NULL DEFAULT 0,
                  date_visit date NOT NULL DEFAULT now(),
                  CONSTRAINT tbl_interest_categories_counts_pkey PRIMARY KEY (id)
                )
                WITH (
                  OIDS=FALSE
                );
        ");
        $this->execute("ALTER TABLE tbl_interest_categories_counts OWNER TO tgd;");

        $this->execute("
            CREATE TABLE tbl_interest_categories_sites
            (
              id serial NOT NULL,
              category_id integer NOT NULL DEFAULT 0,
              site character varying(128) NOT NULL,
              status integer NOT NULL DEFAULT 0,
              created_at timestamp with time zone NOT NULL DEFAULT now(),
              updated_at timestamp with time zone NOT NULL DEFAULT now(),
              CONSTRAINT tbl_interest_categories_sites_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");
        $this->execute("ALTER TABLE tbl_interest_categories_sites OWNER TO tgd;");
	}

	public function down()
	{
		echo "m150217_091915_create_interest_categories_tables does not support migration down.\n";
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