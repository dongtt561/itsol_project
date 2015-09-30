<?php 
include ROOT_PATH.'/models/database.php';
class userModel extends database  {
	
	public function login($email, $password) {
        $str_query = "SELECT * FROM users WHERE email='$email' AND pass_word='$password'";
		$this->setQuery($str_query);
        $results =$this->loadAllRow();
        $check=false;
        if (count($results) > 0) {
            $check = true;
        }
        return $check;
    }
    public function get_user($email){
        
    	$str_query = "SELECT * FROM users WHERE email='$email'";
		$this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
        	$array=$results[0];
        }
        return $array;
    }
    public function create($user_name, $email, $password){
        $query = "INSERT INTO users(user_name, email, pass_word,id_group) "; 
        $query .= "VALUES ('$user_name','$email','$password',1)";
        $this->setQuery($query);    
        $results=$this->query();
        $this->disconnect();
        return $results;
    }
    public function getAllcategory(){    
        $str_query = "SELECT * FROM category WHERE id>2";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
}	