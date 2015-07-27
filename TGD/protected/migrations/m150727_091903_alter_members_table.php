<?php

class m150727_091903_alter_members_table extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE tbl_members ADD COLUMN country character varying(10) NULL");

		$data = Yii::app()->db->createCommand("SELECT b.member_id, a.country FROM tbl_active_users a,(SELECT member_id, max(updated_at) updated_at FROM tbl_active_users GROUP BY member_id order by member_id) b WHERE a.member_id = b.member_id AND a.updated_at = b.updated_at ORDER BY b.member_id")->select()->queryAll();
		foreach ($data as $key => $value) {
			$member_id = $value['member_id'];
			$country   = $value['country'];

			$this->execute("UPDATE tbl_members SET country = '${country}' WHERE id = '${member_id}'");
		}
	}

	public function down()
	{
		echo "m150727_091903_alter_members_table does not support migration down.\n";
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