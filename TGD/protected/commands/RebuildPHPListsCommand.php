<?php

class RebuildPHPListsCommand extends CConsoleCommand{
	private $_PHPList;
	private $_status = [
			STATUS_PRE_ACCEPTED =>'pre-accepted',
			STATUS_ACCEPTED => 'accepted'];
	

	private function _fetchMembers(){
		$members = array();
	    $criteria = new CDbCriteria(array(
	        'condition' => 'status IN ('.User::STATUS_PRE_ACCEPTED.','.User::STATUS_ACCEPTED.')',
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
		$this->_PHPList->reset();
		print("Fetching members...".PHP_EOL);
		$members = $this->_fetchMembers();
		print("Fetched ".count($members)." members.".PHP_EOL);
		foreach ($members as $member) {
			$pref = ($member['notify'])?'YES':'NO';
			printf("Adding user %s with status %s and preference set to [%s]...".PHP_EOL, $member['email'],$this->_status[$member['status']],$pref);
			$this->_PHPList->addUserToList($member['email'], $member['status'], $member['notify']==0);
		}
	}

	/**
	 * Default command action.
	 * 
	 * @return integer 0 for success, 1 for failure.
	 */
	public function actionIndex() {

		try{
			$this->_PHPList = new PHPList(PHPLIST_HOST, PHPLIST_DB, PHPLIST_LOGIN, PHPLIST_PASSWORD);
			$this->_rebuildPHPList();
		}catch(Exception $e){
			print $e->getMessage().PHP_EOL;
		}
	}
}

