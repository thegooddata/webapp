<?php
//    0 0 * * * /usr/bin/php /srv/webapp/current/protected/yiic.php RenameLoansPictures 1>&2

class RenameLoansPicturesCommand extends CConsoleCommand{
	
	/**
	 * Default command action.
	 * 
	 * @return integer 0 for success, 1 for failure.
	 */
	public function actionIndex() {
		// fetch loans
		$loans = Loans::model()->findAll();

		if($loans != null) {
			$uploads = Yii::app()->basePath."/../uploads/";

			foreach($loans as $index => $loan){

				$src = sprintf("%s-%s", $uploads.$loan->loan_identifier, $loan->image);
				$dest = sprintf("%s-%s", $uploads.$loan->id, $loan->image);

				print("from: $src\n");
				print("to  : $dest\n");

				if(file_exists($src) && !file_exists($dest)){
					print("copying files...");
					print(copy($src, $dest)?"done!\n":"fail!\n");
					print("changing group...");
					print(chgrp($dest, "www-data")?"done!\n":"fail!\n");
					print("changing permissions...");
					print(chmod($dest, 0664)?"done!\n\n":"fail!\n\n");
				}else if(!file_exists($src)){
					print("$src does not exist\n\n");
				}else{
					print("$dest already copied\n\n");
				}
			}
		}
	}
}

