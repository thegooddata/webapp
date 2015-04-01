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
    private $_db = null;

    /**
     * Class constructor.
     * @param string $dbhost Database host name.
     * @param string $dbname Database name.
     * @param string $duser Database user login.
     * @param string $dbpass Database user password.
     * @return PDO
     */
    public function __construct($dbhost, $dbname, $dbuser, $dbpass)
    {
        $this->_dbhost = $dbhost;
        $this->_dbname = $dbname;
        $this->_dbuser = $dbuser;
        $this->_dbpass = $dbpass;

        //echo($dbhost."/".$dbuser."/".$dbpass."/".$dbname."\n");
        $this->_db = $this->_getConnection();
    }

    /**
     * Stablish connection with the database.
     * @return PDO
     */
    private function _getConnection(){
        $dbh = $this->_db;
        if($dbh == null){
            $pdo_string = "mysql:host=" . $this->_dbhost . ";dbname=" . $this->_dbname;
            
            $dbh = new PDO($pdo_string, $this->_dbuser, $this->_dbpass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return $dbh;   
    }

    /**
     * Get the user id 
     * @param  string $email User email address
     * @return mixed         User id or false if not found.
     */
    private function _getUserId($email){

        $db = $this->_db;
        $sql = "SELECT * FROM phplist_user_user WHERE email = :email";
        
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

        $db = $this->_db;
        $list = array();
        $sql = "SELECT * FROM phplist_listuser WHERE userid = :id";

        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $userId);
            $stmt->execute();
            $rowCount = $stmt->rowCount();

            while($row = $stmt->fetch()){
                $list[] = $row['listid'];
            }
            
            return sizeof($list)? $list : false;
        
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
    
        $db = $this->_db;
        $userId = $this->_getUserId($data['email']);


        if($userId === false){
            // User doesn't exist. Create it.
            $sql = "INSERT INTO phplist_user_user (email, confirmed, htmlemail, rssfrequency, password, passwordchanged, disabled, entered, uniqid) VALUES (:email, :confirmed, :htmlemail, :rssfrequency, :password, now(), :disabled, now(), :uniqid);";

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

        $db = $this->_db;
        $sql = "DELETE FROM phplist_user_user WHERE id=:id;";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $userId);
            $stmt->execute();
            return $stmt->rowCount() > 0;
                
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes user from some lists
     * @param  int      $user_id User Id.
     * @param  array    $lists   Lists to remove the user from.
     * @return boolean           True if no error was found, false if there was.
     */
    private function _deleteUserFromList($userId, $listId){
        
        $db = $this->_db;

        $sql = "DELETE FROM phplist_listuser WHERE userid=:user_id AND listid=:list_id;";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $userId );
            $stmt->bindParam("list_id", $listId );
            $stmt->execute();

            return $stmt->rowCount() >= 0;
        } catch(PDOException $e) {
            return false;
        }    
    }

    /**
     * Delete user.
     * @param  string $email User email.
     * @return boolean
     */
    public function deleteUser($email){
        $userId = $this->_getUserId($email);
        if(!$userId){
            return true;
        }
        $lists = $this->_getUserLists($userId);
        
        $listsDeleted = true;
        foreach($lists as $listId){
            $listsDeleted = $listsDeleted && $this->_deleteUserFromList($userId, $listId);
        }

        return  $this->_deleteUser($userId);
    }

    /**
     * Adds a user to a list.
     * @param   string  $email  User email.
     * @param   string  $list   List id.
     * @return  boolean         false if fail,
     *                          true if the user was added successfully 
     */
    public function addUserToList( $email, $listId ){

        $db = $this->_db;
        $userId = $this->_createUser(array('email' =>$email, 'confirmed'=>1));
        if( $userId === false ) {
            return false;
        }

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
     * Removes a user from a list.
     * @param   string $email   User email.
     * @param   string $list    List name.
     * @return  mixed           true if it worked
     *                          false if there was an exception thrown, 
     */
    public function deleteUserFromList( $email, $listId ){

        $userId = $this->_getUserId($email);
        if(!$userId){
            // there's no user with that email. Fair enough. Return OK.
            return true;
        }

        return $this->_deleteUserFromList($userId, $listId);
    }

    /**
     * Moves a user from a list to another.
     * @param string    $email  User email.
     * @param int       $from   List origin.
     * @param int       $to     List destination.
     * @return mixed            true if it worked.
     *                          false if there's not such user, 
     *                              no user-list combination was found
     *                              or there was an exception thrown, 
     */
    public function moveUser( $email, $from, $to ){
        
        $db = $this->_db;
        $user_id = $this->_getUserId($email);

        if(!$user_id) {
            return false;
        }

        $sql = "UPDATE phplist_listuser SET listid=:to_list_id WHERE userid=:user_id AND listid=:from_list_id;";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id );
            $stmt->bindParam("from_list_id", $from );
            $stmt->bindParam("to_list_id", $to );
            $stmt->execute();

            return $stmt->rowCount() > 0;

        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }    
}