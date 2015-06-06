<?php

/**
* Manages the basic operations that the webapp needs to perfor on the PHList side.
* So far, these operations are:
*  - Creation of users.
*  - Addition of users to a list.
* 
*  @author Juan Menéndez 
*/
class PHPList
{
    /**
     * @var string Database host.
     */
    private $_dbhost;

    /**
     * @var dstring Database name.
     */
    private $_dbname;

    /**
     * @var string Database user.
     */
    private $_dbuser;

    /**
     * @var string Database password.
     */
    private $_dbpass;

    /**
     * @var PDO PDO object with the database connection.
     */
    private $_db = false;

    /**
     * Status to list correspondence.
     * @var array
     */
    private $_lists = [
        'status' => [
            STATUS_PRE_ACCEPTED => array(PHPLIST_PRE_ACCEPTED_LIST, PHPLIST_PRE_ACCEPTED_LEGAL_COMMS_LIST),
            STATUS_ACCEPTED => array(PHPLIST_ACCEPTED_LIST, PHPLIST_ACCEPTED_LEGAL_COMMS_LIST)
        ],
        'browser' => [
            'firefox'=>PHPLIST_FIREFOX_LIST,
            'safari'=>PHPLIST_SAFARI_LIST,
            'chrome'=>PHPLIST_CHROME_EXTENSION_LIST
        ]
    ];

    /**
     * Class constructor.
     * @param string $dbhost Database host name.
     * @param string $dbname Database name.
     * @param string $duser Database user login.
     * @param string $dbpass Database user password.
     * @return PDO
     */
    public function __construct($dbhost, $dbname, $dbuser, $dbpass){
        $this->_dbhost = $dbhost;
        $this->_dbname = $dbname;
        $this->_dbuser = $dbuser;
        $this->_dbpass = $dbpass;
        
        $connection = $this->_getConnection();
        if($connection === false){
            throw new Exception("Error connecting to PHPList database.", 1);
        }else{
            $this->_db = $connection;
        }
    }

    /**
     * Stablish connection with the database.
     * @return PDO
     */
    private function _getConnection(){
        $dbh = $this->_db;
        if($dbh == false){
            $pdo_string = "mysql:host=" . $this->_dbhost . ";dbname=" . $this->_dbname;
            
            try{
                $dbh = new PDO($pdo_string, $this->_dbuser, $this->_dbpass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $execption){
                return false;
            }
        }
        
        return $dbh;   
    }

    /**
     * Puts an item inside an array if it was not an array already.
     * @param  mixed $item Item to process.
     * @return array       Resulting array.
     */
    private function _makeArray($item){
        if(!is_array($item)){
            return [$item];
        }
        return $item;
    }

    /**
     * Check if a list with a given id exists. 
     * @param  int $id List id.
     * @return boolean         
     */
    private function _checkList($id){

        $sql = "SELECT * FROM phplist_list WHERE id = :id";
        
        $db = $this->_db;
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }catch(PDOException $e){
            return false;
        }
    }

    /**
     * Get the user id 
     * @param  string $email User email address
     * @return mixed         User id or false if not found.
     */
    private function _getUserId($email){

        $sql = "SELECT * FROM phplist_user_user WHERE LOWER(email) = :email";
        
        $db = $this->_db;
        $email = strtolower($email);

        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $email);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $row = $stmt->fetch();
               
                return $row['id'];
            }else{
                return false;
            }
        }catch(PDOException $e){
            return false;
        }
    }

    /**
     * Gets a user id with a given email and if it doesn't exist, creates a user with that id.
     * @param  string $email The user's email address.
     * @return int           The user's id.   
     */
    private function _getUserIdOrCreate($email){
        // check if the user exists
        $userId = $this->_getUserId($email);

        if($userId === false){
            $userId = $this->_createUser(array('email' =>$email, 'confirmed'=>1, 'htmlemail'=>1));
        }

        return $userId;
    }
    
    /**
     * Finds the Id of the lists a user is in.
     * @param int $userId The user id.
     * @return array The list ids 
     *               false in case of an error processing the request.
     */
    private function _getUserLists($userId){

        $sql = "SELECT * FROM phplist_listuser WHERE userid = :id";

        $db = $this->_db;
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $userId);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            
            $list = array();
            while($row = $stmt->fetch()){
                $list[] = $row['listid'];
            }
            
            return count($list)? $list : false;
        
        }catch(PDOException $e){
            return false;
        }
    }

    /**
     * Creates a PHPList user with a set of provided properties. If a user with the given 
     * email address already exists, it returns her id.
     * @param array  $data Properties with which the user will be created.
     * @return int The user id 
     *             false otherwise.
     */
    private function _createUser($data){
        
        // User doesn't exist. Create it.
        $sql = "INSERT INTO phplist_user_user (email, confirmed, htmlemail, passwordchanged, entered) VALUES (:email, :confirmed, :htmlemail, now(), now());";
        
        $db = $this->_db;
        try {
            $uniqid = md5(uniqid(mt_rand()));
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $data['email']);
            $stmt->bindParam("confirmed", $data['confirmed']);
            $stmt->bindParam("htmlemail", $data['htmlemail']);
            $stmt->execute();

            // Assign id of recently created user.
            if($stmt->rowCount() > 0){
                return $db->lastInsertId();
            }else{
                return false;
            }
        } catch(PDOException $e) {
            if ($e->getCode() == '23000'){
                return true;
            }
            return false;
        }
    
        return $userId;
    }
    
    /**
     * Empties the status-related tables.
     * @return boolean 
     */
    private function _resetStatusLists(){
        
        $sql = "DELETE FROM phplist_listuser WHERE listid IN (".PHPLIST_PRE_ACCEPTED_LEGAL_COMMS_LIST.",".PHPLIST_ACCEPTED_LEGAL_COMMS_LIST.",".PHPLIST_ACCEPTED_LIST.",".PHPLIST_PRE_ACCEPTED_LIST.");";

        $db = $this->_db;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            
            return $stmt->rowCount() >= 0;
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes user from a list.
     * @param  int      $userId  User Id or null for all users.
     * @param  array    $listId  List to remove the user from.
     * @return boolean           True if no error was found, false if there was.
     */
    private function _removeUserFromList($listId, $userId=null){
        print("removing user {$userId} from list {$listId}\n");
        // if there is a given userId, add a condition cause
        $userCondition = ($userId == null)?'':"userid=:user_id AND";
        $sql = "DELETE FROM phplist_listuser WHERE ".$userCondition." listid=:list_id;";

        $db = $this->_db;
        try {
            $stmt = $db->prepare($sql);
            ($userId!=null) && $stmt->bindParam("user_id", $userId ); // bind userId if necessary
            $stmt->bindParam("list_id", $listId );
            $stmt->execute();

            return $stmt->rowCount() >= 0;
        } catch(PDOException $e) {
            return false;
        }    
    }

    /**
     * Adds a user to a list.
     * @param   string  $userId   User id.
     * @param   string  $listId   List id.
     * @return  boolean           false if fail,
     *                            true if the user was added successfully 
     */
    private function _addUserToList( $listId, $userId ){

        $db = $this->_db;
        $sql = "INSERT INTO phplist_listuser (userid, listid, entered, modified) VALUES (:user_id, :list_id, now(), now());";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $userId );
            $stmt->bindParam("list_id", $listId );
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch(PDOException $e) {
            if ($e->getCode() == '23000'){
                return true;
            }
            return false;
        }
    }

    /**
     * Adds a user to a list depending on its status.
     * @param   string  $email       User email.
     * @param   string  $status         Identfier (number or name).
     * @param   array   $preferences Notification preferences array.
     * @return  boolean              false if fail,
     *                               true if the user was added successfully 
     */
    public function addUserToListByStatus( $email, $status, $preferences ){
        // get user id or create it and make sure status key exists
        if(($userId = $this->_getUserIdOrCreate($email)) === false || !array_key_exists($status, $this->_lists['status'])){
            return false;
        }

        $lists = $this->_lists['status'][$status];
        $lists = $this->_makeArray($lists);

        if(count($lists)>1){
            if(!in_array('regular', $preferences)){
                unset($lists[0]);
            }
            if(!in_array('legal', $preferences)){
                unset($lists[1]);
            }   
        }
     

        $result = true; // default
        foreach ($lists as $listId) {
            $result = $result && $this->_addUserToList($listId, $userId);
        }

        return $result;
    }
    
    /**
     * Remove a user from a list depending on its status.
     * @param   string  $email       User email.
     * @param   string  $status      Identfier (number or name).
     * @param   array   $preferences Notification preferences array.
     * @return  boolean              false if fail,
     *                               true if the user was added successfully 
     */
    public function removeUserFromListByStatus( $email, $status, $preferences ){
        // get user id or create it and make sure status key exists
        if(($userId = $this->_getUserIdOrCreate($email)) === false || !array_key_exists($status, $this->_lists['status'])){
            return false;
        }

        $lists = $this->_lists['status'][$status];
        $lists = $this->_makeArray($lists);

        if(count($lists)>1){
            if(!in_array('regular', $preferences)){
                unset($lists[0]);
            }
            if(!in_array('legal', $preferences)){
                unset($lists[1]);
            }   
        }


        $result = true; // default
        foreach ($lists as $listId) {
            $result = $result && $this->_removeUserFromList($listId, $userId);
        }
       
        return $result;
    }

    
    /**
     * Removes all users from every list or a set of lists.
     * @param   string $email   User email.
     * @param   array  $lists   List ids.
     * @return  mixed           true if it worked
     *                          false if there was an exception thrown, 
     */
    public function resetLists($lists=null){

        if($lists!=null){
            $lists = $this->_makeArray($lists);
            $result = true;
            foreach ($lists as $listId) {
                // remove all users from list
                $result = $result && $this->_removeUserFromList($listId, null);       
            }
            return $result;
        }

        return $this->_resetStatusLists();
    }


    /**
     * Adds a user to a list given its name.
     * @param   string  $email  User email.
     * @param   string  $list   List id.
     * @return  boolean         false if fail,
     *                          true if the user was added successfully 
     */
    public function addUserToListByBrowser($email, $browser){
        // get user id or create it
        if(($userId = $this->_getUserIdOrCreate($email)) === false){
            return false;
        }

        if(array_key_exists($browser, $this->_lists['browser'])){
            $listId = $this->_lists['browser'][$browser];
        }else if(in_array($browser, $this->_lists['browser'])){
            $listId = $browser;
        }else{
            return false;
        }

        return $this->_addUserToList($listId, $userId);
    }

    /**
     * Process a user depending on the new parameters.
     * @param string    $email           User email.
     * @param array     $status          Status changes.
     * @param array     $preferences     Preferences array.
     * @return mixed                     true if it worked.
     *                                   false otherwise. 
     */
    public function processUserByStatus( $email, $statusChanges, $preferencesChanges ){
        
        $added = false;
        $oldPreferences = array_merge(['legal'], $preferencesChanges['old']? ['regular']: []);
        $newPreferences = array_merge(['legal'], $preferencesChanges['new']? ['regular']: []);

        // check for a change in status (and deal with notifiction preferences too)
        if($statusChanges['old'] != $statusChanges['new']){        
            if(array_key_exists($statusChanges['new'], $this->_lists['status'])){
                $added = $this->addUserToListByStatus($email, $statusChanges['new'], $newPreferences);
            }
            // delete from old lists
            
            if( $statusChanges['old'] != null) { 
                if(array_key_exists($statusChanges['old'], $this->_lists['status'])){
                    return $this->removeUserFromListByStatus($email, $statusChanges['old'], $oldPreferences);
                }
                return $added && $this->removeUserFromListByStatus($email, $statusChanges['old'], $oldPreferences);     
            }else{
                return $added;
            }
        }

        // check for a change only in notification preferences
        if($preferencesChanges['old'] != $preferencesChanges['new'] && array_key_exists($statusChanges['new'], $this->_lists['status'])){
            if($preferencesChanges['new']){
                // the user has opted-in so add to "regular list".
                return $this->addUserToListBySatus($email, $statusChanges['new'], ['regular']);
            }else{
                // the user has opted-out so remove from "regular list".
                return $this->removeUserFromListByStatus($email, $statusChanges['new'], ['regular']);
            }
        }
    }    


    /**
     * Deletes a PHPList user.
     * @param   int  $id    User id.
     * @return  int         The amount of deleted users
     *                      false if there was an error processing the request.
     */
    // private function _deleteUser($userId){

    //     $sql = "DELETE FROM phplist_user_user WHERE id=:id;";

    //     $db = $this->_db;
    //     try {
    //         $stmt = $db->prepare($sql);
    //         $stmt->bindParam("id", $userId);
    //         $stmt->execute();
    //         return $stmt->rowCount() >= 0; // if there's no user with that id. Fair enough. Return OK.
                
    //     } catch(PDOException $e) {
    //         return false;
    //     }
    // }

    /**
     * Delete user.
     * @param  string $email User email.
     * @return boolean
     */
    // public function deleteUser($email){
    //     // fetch user id
    //     $userId = $this->_getUserId($email);
    //     if(!$userId){
    //         return true;
    //     }

    //     // fetch lists for this user
    //     $lists = $this->_getUserLists($userId);
        
    //     // delete user from lists
    //     $listsDeleted = true;
    //     foreach($lists as $listId){
    //         $listsDeleted = $listsDeleted && $this->_removeUserFromList($userId, $listId);
    //     }

    //     // delete user
    //     return  $listsDeleted && $this->_deleteUser($userId);
    // }
}