<?php

class m141102_161918_create_indexes extends CDbMigration
{
	public function up()
	{
		$this->execute("DROP INDEX IF EXISTS idx_adtracks_domainMemberId;");
		$this->execute("DROP INDEX IF EXISTS idx_adtracks_createdAtMemberId;");
  		$this->execute("CREATE INDEX idx_adtracks_domainMemberId ON tbl_adtracks(domain, member_id);");
  		$this->execute("CREATE INDEX idx_adtracks_createdAtMemberId ON tbl_adtracks(member_id, created_at);");
	}

	public function down()
	{
		$this->execute("DROP INDEX IF EXISTS idx_adtracks_domainMemberId;");
		$this->execute("DROP INDEX IF EXISTS idx_adtracks_createdAtMemberId;");
		return true;
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