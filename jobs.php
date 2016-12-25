<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); //report all error except notice
require_once "db.inc.php";
class jobs {
	//for emp details
	protected $user_id;    
	protected $user_name;
	protected $user_type;
    protected $login_pass;
    protected $collection;

    public function __construct($arr_user = array()) {
     date_default_timezone_set("Asia/Calcutta");
     $this->collection = $GLOBALS['databasename'];
     $this->user_id = $arr_user['user_id'];
     $this->login_pass = $arr_user['login_pass'];
     $this->user_type = $arr_user['user_type'];
     $this->user_name = $arr_user['user_name'];
	}
	
	public function get_user_details_id($view_id){
            //sql: select * from user where user_id = $view_id
            $user = $this->collection->user->find( [ 'user_id' => $view_id ] );
            $name = '';
            $result = array();
            $flag = false;
            
            foreach ($user as $entry) {
                $flag = true;
                //$entry['name'];
                 array_push($result,$entry);
            }
            if($flag){
                return $result;
            }
            else{
                return false;
            }		
	}

     public function delete_user($delete_id){
            $deleteResult = $this->collection->user->deleteOne(['user_id' => $delete_id]);
            if($deleteResult->getDeletedCount() == 1){
                return true;
            }
            else{
                return false;
            }       
    }

    public function update_user_password($user_id, $new_pass){
            $updateResult = $this->collection->user->updateOne(
                ['user_id' => $user_id],
                ['$set' => ['pass' => $new_pass]]
            );
            if($updateResult->getMatchedCount() == 1){
                return true;
            }
            else{
                return false;
            }       
    }
        
	
	public function validate_login() {
            //query dbms like select * from user where user_id = abc and pas = pass and user_type = 101 
            //find or findOne both methods can be used for query;
            /*
             * although findOne returns nothing on invalid data which leads to yield warning message for foreach loop but find method returns other 
             * things even on invalid data which helps to yields no warning on foreach loop.
             * 
             */
            /*
             * To access name using fineOne method use $result[0] 
             * To access name using find method use $result[0]['name']
             */
            $user = $this->collection->user->find( [ 'user_id' => $this->user_id, 'pass' => $this->login_pass, 'user_type' => $this->user_type ] );
            $name = '';
            $result = array();
            $flag = false;
            
            foreach ($user as $entry) {
                $flag = true;
                //$entry['name'];
                 array_push($result,$entry);
            }
            if($flag){
                return $result;
            }
            else{
                return false;
            }
                
    }
    
    public function get_total_users(){
        //$user = $this->collection->user->count(); //count all documents. 
        $cursor = $this->collection->user->find(); //return all documents.
        $doc = array();
        $flag = FALSE;
        foreach ($cursor as $document) {
            $flag = true;
            array_push($doc,$document);
        }
        if($flag){
                return $doc;
            }
            else{
                return false;
            }
                
    }

	public function create_users(){
		$insertOneResult = $this->collection->user->insertOne([
		    'user_id' => $this->user_id,
		    'name' => $this->user_name,
		    'pass' => $this->login_pass,
		    'insert-date' => date("d/m/Y"),
		    'user_type' => $this->user_type
		]);

		//printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
        	//var_dump($insertOneResult->getInsertedId()); exit;
                if($insertOneResult->getInsertedCount() == 1){
                   return true; 
                }
                else{
                    return false;
                }
	
	}


    public function update_user_details($user_id, $user_name, $user_role){
		//multiple fields update on behalf of user_id
		$updateResult = $this->collection->user->updateOne(
		    ['user_id' => $user_id],
		    ['$set' => ['name' => $user_name, 'user_type' => $user_role]]
		);
        if($updateResult->getModifiedCount() == 1){
           return true; 
        }
        else{
            return false;
        }
	
	}
 
 
    public static function userexit_logout()
	{
		if(isset($_SESSION['user_id']) and $_SESSION['role']!=='')
		{
			// remove all session variables
			session_unset(); 
			// destroy the session 
			session_destroy(); 
		}
	}
 
 
    public function set_sessionId($uid='',$urole,$uname)
	{
		if(!empty($uid)){
			$_SESSION['user_id'] = $uid;
			$_SESSION['role'] = $urole;
			$_SESSION['name'] = $uname;
			return true;
			}
	}
 
 
    public function session_check_admin(){
	   if(! ( isset($_SESSION['user_id']) || isset($_SESSION['role']) ) )	{
		header("location:index.php");exit;
	   }
    }




    /**
     * stripslash gpc
     * Strip the slashes from a string added by the magic quote gpc thingy
     * @access protected
     * @param string $value
    */
    public function stripslash_gpc($value) {
        $value = stripslashes($value);
		$value = htmlspecialchars($value);
		$value = trim($value);
		return $value;
    }
	

    public function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    } //close of  if(isset($_POST['sub']))

}
?>
