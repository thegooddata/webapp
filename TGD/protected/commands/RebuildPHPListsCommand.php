<?php

class RebuildPHPListsCommand extends CConsoleCommand{
	private $_PHPList;
	private $_statusText = [STATUS_PRE_ACCEPTED =>'pre-accepted', 
							STATUS_ACCEPTED => 'accepted', 
							STATUS_APPLIED => 'applied', 
							STATUS_EXPELLED => 'expelled', 
							STATUS_DENIED => 'denied', 
							STATUS_LEFT => 'left' ];
							

	private function _fetchMembers(){
		$members = array();
	    $criteria = new CDbCriteria(array(
	        'condition' => 'status IN ('.STATUS_PRE_ACCEPTED.','.STATUS_ACCEPTED.')',
	    ));
		$models = Members::model()->findAll($criteria);
		foreach ($models as $member) {
			$members[] = [
				'email'=>$member->email,
				'status'=>$member->status,
				'notify'=>$member->notification_preferences];
			}

		return $members;
	}

	private function _rebuildPHPList(){
		print("Resetting lists...".PHP_EOL);
		$this->_PHPList->resetLists();

		print("Fetching members...".PHP_EOL);
		$members = $this->_fetchMembers();
		printf("Fetched %d members with status %s or %s.".PHP_EOL, count($members), $this->_statusText[STATUS_ACCEPTED], $this->_statusText[STATUS_PRE_ACCEPTED]);

		foreach ($members as $member) {
			$prefText = ($member['notify'])?'YES':'NO';
			$preferencesChanges = ['old'=>null, 'new'=>$member['notify']];
			$statusChanges = ['old'=>null, 'new'=>$member['status']];
			
			printf(" Adding %s \n - status: %s \n - preference: [%s]".PHP_EOL.PHP_EOL, $member['email'], $this->_statusText[$member['status']], $prefText);
			$result = $this->_PHPList->processUserByStatus($member['email'], $statusChanges, $preferencesChanges);
			echo " result: $result\n";
		}
	}

	/**
	 * Default command action.
	 * 
	 * @return integer 0 for success, 1 for failure.
	 */
	public function actionIndex() {
		echo "Debugging: ".(YII_DEBUG?"YES":"NO")."\n";
		try{
			$this->_PHPList = new PHPList(PHPLIST_HOST, PHPLIST_DB, PHPLIST_LOGIN, PHPLIST_PASSWORD);
		}catch(Exception $e){
			print $e->getMessage().PHP_EOL;
			return 1;
		}
		
		$this->_rebuildPHPList();
	}
}

