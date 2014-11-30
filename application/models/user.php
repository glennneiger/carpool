<?php
/*
 * user class 
 */
class User extends CI_Model {
	private static $uid=0;
	private static $name="";
	private static $age=0;
	private static $sex="";
	private static $mob="";
	private static $addr="";
	private static $email="";
	private static $username="";
	private static $password="";
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function get_name(){
		return self::$name;
	}
	function get_uid(){
		return self::$uid;
	}
	function get_age(){
		return self::$age;
	}
	function get_sex(){
		return self::$sex;
	}
	function get_mob(){
		return self::$mob;
	}
	function get_addr(){
		return self::$addr;
	}
	function get_email(){
		return self::$email;
	}
	function get_username(){
		return self::$username;
	}
	function get_driver_count(){
		$query = $this->db->get_where('driver', array('uid'=>$this->get_uid()));
		return $query->num_rows(); 
	}
    function create($arr){

    	//print_r($arr);
    	unset($arr['confirm_password']);
		try{
			if(isset($arr["name"]))self::$name=$arr["name"];
			else throw new Exception("No name provided");
			
			if(isset($arr["age"]))self::$age=intval($arr["age"]);
			else throw new Exception("No age provided");
			
			if(isset($arr["sex"]) &&( $arr["sex"]=="male" || $arr["sex"]=="feamle"))self::$sex=$arr["sex"];
			else throw new Exception("No sex provided");
			
			if(isset($arr["mob"]))self::$mob=$arr["mob"];
			else throw new Exception("No Mobile number provided");
			
			if(isset($arr["addr"]))self::$addr=$arr["addr"];
			else throw new Exception("No Address provided");
			
			if(isset($arr["email"]))self::$email=$arr["email"];
			else throw new Exception("No email provided");
			
			if(isset($arr["username"]))self::$username=$arr["username"];
			else throw new Exception("No username provided");
			
			if(isset($arr["password"])){
				$this->load->library('encrypt');
				$arr["password"]=$this->encrypt->sha1($arr["password"]);
				self::$password=$arr["password"];
			}else throw new Exception("No password provided");
			
		}catch (Exception $e){
			return $e->getMessage();
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->insert("users",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Could not create user");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
		$q=$this->db->get_where("users",Array("username"=>self::$username))->result();
		self::$uid=intval($q[0]->uid);
		return "User created successfully";
	}
	function set($arr){
		if(isset($arr["password"])){
			$this->load->library('encrypt');
			$arr["password"]=$this->encrypt->sha1($arr["password"]);
			self::$password=$arr["password"];
		}
		try{
			$this->db->db_debug = FALSE;
			$q=$this->db->get_where("users",$arr)->result();
			if(sizeof($q)==0)throw new Exception("No User Matching given parameters");
			if(sizeof($q)>1)throw new Exception("More than one users matched");
		}catch (Exception $e){
			return $e->getMessage();
		}
		$this->db->db_debug = TRUE;
		self::$uid=intval($q[0]->uid);
		self::$name=$q[0]->name;
		self::$age=intval($q[0]->age);
		self::$sex=$q[0]->sex;
		self::$mob=$q[0]->mob;
		self::$addr=$q[0]->addr;
		self::$email=$q[0]->email;
		self::$username=$q[0]->username;
		return "Login Successful";
	}
	function edit($uid,$arr){
		unset($arr['confirm_password']);
		if(isset($arr["password"])){
			$this->load->library('encrypt');
			$arr["password"]=$this->encrypt->sha1($arr["password"]);
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->where("uid",$uid);
			$this->db->update("users",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Invalid Update");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
	}
	function get_all($arr){
		return $this->db->get_where("users",$arr)->result();
	}
}
?>