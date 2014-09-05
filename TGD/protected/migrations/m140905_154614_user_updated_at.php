<?php

class m140905_154614_user_updated_at extends CDbMigration
{
	public function up()
	{
            $this->execute("ALTER TABLE tbl_members ADD COLUMN updated_at timestamp with time zone NOT NULL DEFAULT now()");
	}

	public function down()
	{
		return true;
	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->execute("ALTER TABLE tbl_members ADD COLUMN updated_at timestamp with time zone");
            $this->execute("ALTER TABLE tbl_members ALTER COLUMN updated_at SET NOT NULL");
            $this->execute("ALTER TABLE tbl_members ALTER COLUMN updated_at SET DEFAULT now()");
	}

	public function safeDown()
	{
            
	}
	
}