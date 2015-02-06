<?php

class m141012_070146_active_users extends CDbMigration
{
	public function up()
	{
      $this->execute("SET default_with_oids = false");
	  $this->execute("CREATE TABLE tbl_active_users (
          id integer NOT NULL,
          member_id integer,
          user_id character varying(255) DEFAULT ''::character varying,
          member_or_user_id character varying(255) DEFAULT ''::character varying,
          created_at timestamp with time zone DEFAULT now(),
          updated_at timestamp with time zone DEFAULT now()
      )");
	  $this->execute("ALTER TABLE public.tbl_active_users OWNER TO tgd");
	  $this->execute("CREATE SEQUENCE tbl_active_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1");
	  $this->execute("ALTER TABLE public.tbl_active_users_id_seq OWNER TO tgd");
	  $this->execute("ALTER SEQUENCE tbl_active_users_id_seq OWNED BY tbl_active_users.id");
	  $this->execute("ALTER TABLE ONLY tbl_active_users ALTER COLUMN id SET DEFAULT nextval('tbl_active_users_id_seq'::regclass)");
	  $this->execute("ALTER TABLE ONLY tbl_active_users
    ADD CONSTRAINT tbl_active_users_pkey PRIMARY KEY (id)");
	}

	public function down()
	{
		echo "m141012_070146_active_users does not support migration down.\n";
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