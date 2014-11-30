<?php
/*
 * driver class 
 */
class Driver extends CI_Model {
	private static $driverid=0;
	private static $uid=0;
	private static $skill="";
	private static $rating=0.0;
	private static $experience="";
	private static $workibg_start="";
	private static $working_end="";
	private static $freq="";
	private static $aid=0;
	private static $licence_num="";
	private static $date_of_licence="";
	private static $working_start="";
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_driverid(){
		return self::$driverid;
	}
	
	function get_uid(){
		return self::$uid;
	}
	
	function get_skill(){
		return self::$skill;
	}
	
	function get_rating(){
		return self::$rating;
	}
	
	function get_experience(){
		return self::$experience;
	}
	
	function get_working_start(){
		return self::$working_start;
	}
	
	function get_working_end(){
		return self::$working_end;
	}
	
	function get_freq(){
		return self::$freq;
	}
	
	function get_aid(){
		return self::$aid;
	}
	
	function get_licence_num(){
		return self::$licence_num;
	}
	
	function get_date_of_licence(){
		return self::$date_of_licence;
	}
	
	function create($arr){
		try{
			if(isset($arr["uid"]))self::$uid=intval($arr["uid"]);
			else throw new Exception("No uid provided");
			
			if(isset($arr["licence_num"]))self::$licence_num=$arr["licence_num"];
			else throw new Exception("No licence number provided");
			
			if(isset($arr["date_of_licence"]))self::$date_of_licence=$arr["date_of_licence"];
			else throw new Exception("No date of licence provided");
		}catch (Exception $e){
			return $e->getMessage();
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->insert("driver",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Could not create driver");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
		return "Driver created successfully";
	}
	
	function set($arr){
		try{
			$this->db->db_debug = FALSE;
			$q=$this->db->get_where("driver",$arr)->result();
			if(sizeof($q)==0)throw new Exception("No Driver Matching given parameters");
			if(sizeof($q)>1)throw new Exception("More than one drivers matched");
		}catch (Exception $e){
			return $e->getMessage();
		}
		$this->db->db_debug = TRUE;
		self::$uid=intval($q[0]->uid);
		self::$driverid=intval($q[0]->driverid);
		self::$skill=$q[0]->skill;
		self::$rating=intval($q[0]->rating);
		self::$experience=$q[0]->experience;
		self::$working_start=$q[0]->working_end;
		self::$freq=$q[0]->freq;
		self::$aid=$q[0]->aid;
		self::$licence_num=$q[0]->licence_num;
		self::$date_of_licence=$q[0]->date_of_licence;
	}
	
	function edit($driverid,$arr){
		try{
			$this->db->db_debug = FALSE;
			$this->db->where("driverid",$driverid);
			$this->db->update("driver",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Invalid Update");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
	}
	
	function get_all($arr){
		return $this->db->get_where("driver",$arr)->result();
	}
}
?>
