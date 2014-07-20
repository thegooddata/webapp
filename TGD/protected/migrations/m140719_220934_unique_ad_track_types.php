<?php

class m140719_220934_unique_ad_track_types extends CDbMigration
{
	public function up()
	{
	  // preventing duplicate adtracks_sources
	  $this->execute('ALTER TABLE "tbl_adtracks_sources" ADD CONSTRAINT "adtracks_sources_type_and_name" UNIQUE ("adtrack_type_id","name")');
	}

	public function down()
	{
		echo "m140719_220934_unique_ad_track_types does not support migration down.\n";
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