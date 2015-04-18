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
    private $_statusToList = array(
        STATUS_APPLIED => PHPLIST_APPLIED_LIST,
        STATUS_PRE_ACCEPTED => array(PHPLIST_PRE_ACCEPTED_LIST, PHPLIST_PRE_ACCEPTED_LEGAL_COMMS_LIST),
        STATUS_ACCEPTED => array(PHPLIST_ACCEPTED_LIST, PHPLIST_ACCEPTED_LEGAL_COMMS_LIST),
        STATUS_DENIED => PHPLIST_DENIED_LIST,
        STATUS_LEFT => PHPLIST_LEFT_LIST,
        STATUS_EXPELLED => PHPLIST_EXPELLED_LIST,
    );

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
     * Get the list id 
     * @param  string $name  List name.
     * @return mixed         List id or false if not found.
     */
    private function _getListId($name){

        $sql = "SELECT * FROM phplist_list WHERE LOWER(name) = :name";

        $db = $this->_db;
        $name = strtolower($name);        
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam("name", $name);
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
    
        $userId = $this->_getUserId($data['email']);
        if($userId === false){
            // User doesn't exist. Create it.
            $sql = "INSERT INTO phplist_user_user (email, confirmed, htmlemail, rssfrequency, password, passwordchanged, disabled, entered, uniqid) VALUES (:email, :confirmed, :htmlemail, :rssfrequency, :password, now(), :disabled, now(), :uniqid);";
            
            $db = $this->_db;
            try {
                $uniqid = md5(uniqid(mt_rand()));
                $stmt = $db->prepare($sql);
                $stmt->bindParam("email", $data['email']);
                $stmt->bindParam("confirmed", $data['confirmed']);
                $stmt->bindParam("htmlemail", $data['htmlemail']);
                $stmt->bindParam("rssfrequency", $data['rssfrequency']);
                $stmt->bindParam("password", $data['password']);
                $stmt->bindParam("disabled", $data['disabled']);
                $stmt->bindParam("uniqid", $uniqid);
                $stmt->execute();

                // Assign id of recently created user.
                if($stmt->rowCount() > 0){
                    return $db->lastInsertId();
                }else{
                    return false;
                }
            } catch(PDOException $e) {
                return false;
            }
        }
        return $userId;
    }
    
    /**
     * Deletes a PHPList user.
     * @param   int  $id    User id.
     * @return  int         The amount of deleted users
     *                      false if there was an error processing the request.
     */
    private function _deleteUser($userId){

        $sql = "DELETE FROM phplist_user_user WHERE id=:id;";

        $db = $this->_db;
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $userId);
            $stmt->execute();
            return $stmt->rowCount() >= 0; // if there's no user with that id. Fair enough. Return OK.
                
        } catch(PDOException $e) {
            return false;
        }
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
     * Adds a user to a list.
     * @param   string  $listId   List id.
     * @param   string  $userId  User email.
     * @return  boolean         false if fail,
     *                          true if the user was added successfully 
     */
    private function _addUserToList( $listId, $userId ){

        if(!$this->_checkList($listId)){
            return false;
        }

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
     * @param   string  $email  User email.
     * @param   string  $key     Identfier (number or name).
     * @param   int     $notify Notification preferences.
     * @return  boolean         false if fail,
     *                          true if the user was added successfully 
     */
    private function _addUserToListByStatus( $email, $key, $onlyLegalComms=false ){

        $userId = $this->_createUser(array('email' =>$email, 'confirmed'=>1));
        if( $userId === false ) {
            return false;
        }

        $result = true; // default
        $lists = $this->_statusToList[$key];
        $lists = $this->_makeArray($lists);
        $lists = ($onlyLegalComms !== null && $onlyLegalComms!==true)? $lists : [$lists[1]]; 

        foreach ($lists as $listId) {
            $result = $result && $this->_addUserToList($listId, $userId);
        }

        return $result;
    }

        /**
     * Adds a user to a list.
     * @param   string  $email  User email.
     * @param   string  $list   List id.
     * @return  boolean         false if fail,
     *                          true if the user was added successfully 
     */
    public function addUserToList( $email, $listId){
        $userId = $this->_createUser(array('email' =>$email, 'confirmed'=>1));
        if( $userId === false ) {
            return false;
        }

        if(is_string($listId) && !is_numeric($listId)){
            $listId = $this->_getListId($listId);
        }

        return $this->_addUserToList($listId, $userId);
    }
    
    /**
     * Removes a user to a list depending on its status.
     * @param   string  $email  User email.
     * @param   string  $status Status.
     * @param   boolean $notify Remove only regular.
     * @return  boolean         false if fail,
     *                          true if the user was added successfully 
     */
    public function removeUserFromList($email, $status, $onlyRegular=false){

        $userId = $this->_getUserId($email);
        if(!$userId) {
            return true;
        }

        $result = true; // default
        $lists = $this->_statusToList[$status];
        $lists = $this->_makeArray($lists);
        $lists = ($onlyRegular === true)? [$lists[0]] : $lists;
        
        foreach ($lists as $listId) {
            $result = $result && $this->_removeUserFromList($listId, $userId);       
        }
        return $result;
    }

    /**
     * Delete user.
     * @param  string $email User email.
     * @return boolean
     */
    public function deleteUser($email){
        // fetch user id
        $userId = $this->_getUserId($email);
        if(!$userId){
            return true;
        }

        // fetch lists for this user
        $lists = $this->_getUserLists($userId);
        
        // delete user from lists
        $listsDeleted = true;
        foreach($lists as $listId){
            $listsDeleted = $listsDeleted && $this->_removeUserFromList($listId, $userId);
        }

        // delete user
        return  $listsDeleted && $this->_deleteUser($userId);
    }

    /**
     * Removes all users from every list or a set of lists.
     * @param   string $email   User email.
     * @param   array  $lists   List ids.
     * @return  mixed           true if it worked
     *                          false if there was an exception thrown, 
     */
    public function reset($lists=null){

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
     * Updates a user depending on the new parameters.
     * @param string    $email  User email.
     * @param array     $status   Status changes.
     * @param array     $preference     Preference changes.
     * @return mixed            true if it worked.
     *                          false otherwise. 
     */
    public function updateStatusLists( $email, $status, $preference ){
        $added = false;
        $removed = false;

        // Check for a change in status
        if($status['old'] != $status['new']){
            
            // add only to "legal comms" if 3rd parameter is true.
            // add to both lists otherwise.
            $added = $this->_addUserToListByStatus($email, $status['new'], $preference['new']==0);
        
            // Remove from old list if necessary.
            // When the User is saved after creation (__construct), there's no old status (null). 
            // There's no need to continue.
            if( $status['old'] == null) { 
                return $added;
            }

            // In any other circumstances the User model is created through find(), so there's an old status.
            return $added && $this->removeUserFromList($email, $status['old']); 
        }

        // check change in notification status
        if(!$added && $preference['old'] != $preference['new']){

            // if the user has opted-in
            if($preference['new']){
                // add to both lists 
                return $this->_addUserToListBySatus($email, $status['new']);
            }
            // if the user has opted-out
            else{
                // remove only from "regular list" if 3rd parameter is true.
                // remove from both lists otherwise.
                return $this->removeUserFromList($email, $status['new'], $preference['new']==0);
            }
        }
    }    
}