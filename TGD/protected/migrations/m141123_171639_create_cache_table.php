<?php

class m141123_171639_create_cache_table extends CDbMigration
{
	/**
	* NOTE: type values are
	* For members
	*	RiskMember
	* 	RiskRatioMember
	*	AdtracksRatioMember
	*	DataThreatsYear
	*	DataThreatsMonth
	* 	DataThreatsWeek
	* For total
	*	RiskTotal
	*	RiskRatioTotal
	* 	AdtracksRatioTotal
	*/
	public function up()
	{

		$this->createTable('tbl_cache_data',
			array(
				'id'=>'pk',
				'member_id' => 'integer NULL DEFAULT NULL REFERENCES tbl_members (id)',
				'type' => 'varchar(128) NOT NULL', // 
				'updated_at' => 'TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP',
				'data' => 'text NOT NULL',
			)
		);
	}

	public function down()
	{
		$this->execute('DROP TABLE IF EXISTS tbl_cache_data');
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