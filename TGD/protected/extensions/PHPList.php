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

    private function _getUserId($email){
        $sql = "SELECT * FROM phplist_user_user WHERE email = :email";
        try{
            $db = $this->_db;
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $email);
            $stmt->execute();

            
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch();
                return $row['id'];
            }else{
                return -1;
            }
        }catch(PDOException $e){
            return false;
        }
    }

    /**
     * Finds the Id of on existing list, givent its name.
     * @param string $list The list name.
     * @return mixed The list id if it exists, false if it doesn't and 
     *                                            -1 in case of an error processing the request.
     */
    private function _getListId($list){

        $sql = "SELECT * FROM phplist_list WHERE lower(name) = :list";
        try{
            $db = $this->_db;
            $stmt = $db->prepare($sql);
            $list = strtolower($list);
            $stmt->bindParam("list", $list);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $row = $stmt->fetch();
                return $row['id'];

            }else{
                return -1;
            }
        }catch(PDOException $e){
            return false;
        }
    }
    /**
     * Creates a PHPList user with a set of provided properties. If a user with the given 
     * email address already exists, it returns her id.
     * @param array  $data Properties with which the user will be created.
     * @return int The user id or -1 if there was an error processing the request.
     */
    private function _createUser($data){
        
        $id = $this->_getUserId($data['email']);

        if($id == -1){
            // User doesn't exist. Create it.
            $sql = "INSERT INTO phplist_user_user (email, confirmed, htmlemail, rssfrequency, password, passwordchanged, disabled, entered, uniqid) VALUES (:email, :confirmed, :htmlemail, :rssfrequency, :password, now(), :disabled, now(), :uniqid);";

            try {
                $db = $this->_db;
                $stmt = $db->prepare($sql);
                $stmt->bindParam("email", $data['email']);
                $stmt->bindParam("confirmed", $data['confirmed']);
                $stmt->bindParam("htmlemail", $data['htmlemail']);
                $stmt->bindParam("rssfrequency", $data['rssfrequency']);
                $stmt->bindParam("password", $data['password']);
                $stmt->bindParam("disabled", $data['disabled']);
                $stmt->bindParam("uniqid", md5(uniqid(mt_rand())));
                $stmt->execute();

                // Assign id of recently created user.
                if($stmt->rowCount() > 0){
                    $id = $db->lastInsertId();
                }else{
                    $id = -1;
                }
            } catch(PDOException $e) {
                return false;
            }
        }

        return $id;
    }

    /**
     * Adds a user to a list.
     * @param string $email User email.
     * @param string $list List name.
     * @return mixed false if there was an exception thrown,
     *                1 if the user was added successfully 
     *               -1 if user wasn't found, 
     *               -2 if list wasn't found, 
     *               -3 if user already was in the list.
     */
    public function addUserToList( $email, $list ){

        $user_id = $this->_createUser(array('email' =>$email, 'confirmed'=>1));
        $list_id = is_int($list)? $list : (ctype_digit($list) ? intval($list) : $this->_getListId($list));

        if( $user_id && $list_id === false ) {
            return false;
        }


        if($list_id < 0) return -2;
        if($user_id < 0) return -1;

        $sql = "INSERT INTO phplist_listuser (userid, listid, entered, modified) VALUES (:user_id, :list_id, now(), now());";

        try {
            $db = $this->_db;
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id );
            $stmt->bindParam("list_id", $list_id );
            $stmt->execute();

            return $stmt->rowCount();
        } catch(PDOException $e) {
            if ($e->getCode() == '23000'){
                return -3;
            }

            return false;
        }
    }

    /**
     * Removes a user from a list.
     * @param string $email User email.
     * @param string $list List name.
     * @return mixed false if there was an exception thrown, 
     *               -1 if user wasn't found, 
     *               -2 if list wasn't found.
     */
    public function removeUserFromList( $email, $list ){

        $user_id = $this->_createUser(array('email' =>$email, 'confirmed'=>1));
        $list_id = is_int($list)? $list : (ctype_digit($list) ? intval($list) : $this->_getListId($list));


        if( $user_id && $list_id === false ) {
            return false;
        }


        if($list_id < 0) return -2;
        if($user_id < 0) return -1;

        $sql = "DELETE FROM phplist_listuser WHERE userid=:user_id AND listid=:list_id;";

        try {
            $db = $this->_db;
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id );
            $stmt->bindParam("list_id", $list_id );
            $stmt->execute();

            return $stmt->rowCount();
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Removes a user from a list.
     * @param string $email User email.
     * @param int $from List origin.
     * @param int $to List destination.
     * @return mixed false if there was an exception thrown, 
     *               1 if the user list was updated.
     *               0 if no user list was updated.
     */
    public function moveUser( $email, $from, $to ){

        $user_id = $this->_createUser(array('email' =>$email, 'confirmed'=>1));

        if( $user_id === false ) {
            return false;
        }

        $sql = "UPDATE phplist_listuser SET listid=:to_list_id WHERE userid=:user_id AND listid=:from_list_id;";

        try {
            $db = $this->_db;
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id );
            $stmt->bindParam("from_list_id", $from );
            $stmt->bindParam("to_list_id", $to );
            $stmt->execute();

            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }    
}