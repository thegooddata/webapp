<?php

class m150905_172517_drop_column_loan_identifier_in_tbl_loans extends CDbMigration
{
	public function up()
	{
		$migrated = !array_key_exists("loan_identifier", Loans::model()->attributes);
		$loansWithErrors = array();

		// First: rename pictures.
		$loans = Loans::model()->findAll();

		if($loans != null) {
			$uploads = Yii::app()->basePath."/../uploads/";
			foreach($loans as $index => $loan){

				if(!empty($loan->image)){
					// for current files
	                $src = ($migrated)?sprintf("%s-%s", $uploads.$loan->id, $loan->image):sprintf("%s-%s", $uploads.$loan->loan_identifier, $loan->image);
	                $existsSrc = file_exists($src)?"EXISTS":"DOESN'T EXIST";

	                // for current files whose name format has no prefix (legacy)
	                $src2 = $uploads.$loan->image;
	                $existsSrc2 = file_exists($src2)?"EXISTS":"DOESN'T EXIST";

	                $dest = sprintf("%s-%s", $uploads.$loan->id, $loan->image);
	                $existsDest = file_exists($dest)?"EXISTS":"DOESN'T EXIST";

	                print("> from ($existsSrc): $src\n");
	                print("> from ($existsSrc2): $src2\n");
	                print("> to   ($existsDest): $dest\n");

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
	                        $loansWithErrors[] = $loan->id;
	                }else{
	                        print("$dest already copied\n\n");
	                }
				} else{
					print("No image in loan {$loan->id}. Skipping...\n");
				}
			}
		}

		// Second: alter table.
		if(sizeof($loansWithErrors)){
			print("There's been a problem processing the images. (The following loans: ".join(", ",$loansWithErrors)."  have images associated but those files do not exist in the filesystem).\n");
			print("The database migration will not take place until these error is solved.\n");
			return false;
		}

		if(!$migrated){
			$this->execute("ALTER TABLE tbl_loans DROP COLUMN IF EXISTS loan_identifier;");
		} else{
			print("Database migration has been already executed successfully previously and there's nothing to be done now.\n");
		}
	}

	public function down()
	{
		echo "m150905_172517_drop_column_loan_identifier_in_tbl_loans supoport migrating down but does not revert any change.\n";
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