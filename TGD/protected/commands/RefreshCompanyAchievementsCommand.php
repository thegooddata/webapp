<?php

class RefreshCompanyAchievementsCommand extends CConsoleCommand{
	
	/**
	 * Default command action.
	 * 
	 * @return integer 0 for success, 1 for failure.
	 */
	public function actionIndex() {
		$goodEvilCache = new GoodEvilCache();
		$result        = $goodEvilCache->setGoodCompanyAchievementsData();	

		if(is_array($result) && count($result)){
			print_r($result);
			return 0;
		}
		
		return 1;
	}
}

