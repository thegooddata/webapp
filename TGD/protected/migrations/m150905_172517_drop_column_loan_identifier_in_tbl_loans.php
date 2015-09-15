<?php

class m150905_172517_drop_column_loan_identifier_in_tbl_loans extends CDbMigration
{
	public function up()
	{
		// First: rename pictures.
		$loans = Loans::model()->findAll();
		$errorFlag = false;

		if($loans != null) {
			$uploads = Yii::app()->basePath."/../uploads/";
			foreach($loans as $index => $loan){

                $src = sprintf("%s-%s", $uploads.$loan->loan_identifier, $loan->image);
                $existsSrc = file_exists($src)?"EXISTS":"DOESN'T EXIST";

                $src2 = $uploads.$loan->image;
                $existsSrc2 = file_exists($src2)?"EXISTS":"DOESN'T EXIST";

                $dest = sprintf("%s-%s", $uploads.$loan->id, $loan->image);
                $existsDest = file_exists($dest)?"EXISTS":"DOESN'T EXIST";

                print("from ($existsSrc): $src\n");
                print("from ($existsSrc2): $src2\n");
                print("to ($existsDest): $dest\n");

                if(file_exists($src) && !file_exists($dest)){
                        print("copying files...");
                        print(copy($src, $dest)?"done!\n":"fail!\n");
                        print("changing group...");
                        print(chgrp($dest, "www-data")?"done!\n":"fail!\n");
                        print("changing permissions...");
                        print(chmod($dest, 0664)?"done!\n\n":"fail!\n\n");
                }else if(file_exists($src2) && !file_exists($dest)){
                        print("copying files...");
                        print(copy($src2, $dest)?"done!\n":"fail!\n");
                        print("changing group...");
                        print(chgrp($dest, "www-data")?"done!\n":"fail!\n");
                        print("changing permissions...");
                        print(chmod($dest, 0664)?"done!\n\n":"fail!\n\n");
                }else if(!file_exists($src) && !file_exists($src2)){
                        print("$src does not exist\n\n");
                        $errorFlag = true;
                }else{
                        print("$dest already copied\n\n");
                }
			}
		}

		// Second: alter table.
		if($errorFlag){
			return false;
		}

		$this->execute("ALTER TABLE tbl_loans DROP COLUMN IF EXISTS loan_identifier;");
	}

	public function down()
	{
		echo "m150905_172517_drop_column_loan_identifier_in_tbl_loans does not support migration down.\n";
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