<?php

class m141003_173946_ext_settings extends CDbMigration
{
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	  $this->execute("SET default_with_oids = false");
	  $this->execute("CREATE TABLE tbl_extension_settings (
    id integer NOT NULL,
    member_id integer,
    name character varying(255) DEFAULT ''::character varying NOT NULL,
    value character varying(255) DEFAULT ''::character varying NOT NULL,
    created_at timestamp with time zone DEFAULT now(),
    updated_at timestamp with time zone DEFAULT now()
)");
	  $this->execute("ALTER TABLE public.tbl_extension_settings OWNER TO tgd");
	  $this->execute("CREATE SEQUENCE tbl_extension_settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1");
	  $this->execute("ALTER TABLE public.tbl_extension_settings_id_seq OWNER TO tgd");
	  $this->execute("ALTER SEQUENCE tbl_extension_settings_id_seq OWNED BY tbl_extension_settings.id");
	  $this->execute("ALTER TABLE ONLY tbl_extension_settings ALTER COLUMN id SET DEFAULT nextval('tbl_extension_settings_id_seq'::regclass)");
	  $this->execute("ALTER TABLE ONLY tbl_extension_settings
    ADD CONSTRAINT tbl_extension_settings_pkey PRIMARY KEY (id)");
	}
  /*
	public function safeDown()
	{
	}
	*/
}