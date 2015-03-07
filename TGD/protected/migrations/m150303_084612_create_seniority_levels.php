<?php

class m150303_084612_create_seniority_levels extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE tbl_members ADD COLUMN seniority_level integer NOT NULL DEFAULT 0;");

        $this->execute("
            CREATE TABLE tbl_seniority_levels
            (
              id serial NOT NULL,
              level character varying(255) NOT NULL,
              color character varying(255) NOT NULL,
              icon character varying(255) NOT NULL,
              percentile integer NOT NULL DEFAULT 0,
              type integer NOT NULL DEFAULT 1,
              created_at timestamp with time zone DEFAULT now(),
              updated_at timestamp with time zone DEFAULT now(),
              CONSTRAINT tbl_seniority_levels_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
        ");

        $this->execute("ALTER TABLE tbl_seniority_levels OWNER TO tgd;");

        $this->execute("
            INSERT INTO tbl_seniority_levels(
                    level, color, icon, type, percentile)
            VALUES ('Apprentice', 'black', 'apprentice.png', 1, 0),
                ('Journeyman', 'black', 'journeyman.png', 1, 5),
                ('Owner', 'black', 'owner.png', 1, 10),
                ('Expert', 'black', 'expert.png', 1, 20),
                ('Collaborator', 'black', 'collaborator.png', 2, 0),
                ('Director', 'black', 'director.png', 2, 0);
        ");
	}

	public function down()
	{
		echo "m150303_084612_create_seniority_levels does not support migration down.\n";
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