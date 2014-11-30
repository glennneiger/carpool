<?php
/*
 * agency class 
 */
class Agency extends CI_Model {
	private static $aid=0;
	private static $name="";
	private static $rating=0;
	private static $addr="";
	private static $driver_count=0;
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_addr(){
		return self::$addr;
	}

	function get_aid(){
		return self::$aid;
	}
	
	function get_name(){
		return self::$name;
	}
	
	function get_rating(){
		return self::$rating;
	}
	
	function get_driver_count(){
		return self::$driver_count;
	}

	function add_driver($aid){
		$arr=Array("aid"=>$aid);
		$c=$this->db->get_where("agency",$arr)->result();
		//print_r($c);
		$c=$c[0]->driver_count;

		$this->db->where("aid",$aid);
		$this->db->update("agency",Array("driver_count"=>$c+1));
	}
	
	function create($arr){
		try{
			if(isset($arr["name"]))self::$name=intval($arr["name"]);
			else throw new Exception("No name provided");
		}catch (Exception $e){
			return $e->getMessage();
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->insert("agency",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Could not create driver");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
		return "Agency created successfully";
	}
	
	function set($arr){
		try{
			$this->db->db_debug = FALSE;
			$q=$this->db->get_where("agency",$arr)->result();
			if(sizeof($q)==0)throw new Exception("No Agency Matching given parameters");
			if(sizeof($q)>1)throw new Exception("More than one agencies matched");
		}catch (Exception $e){
			return $e->getMessage();
		}
		$this->db->db_debug = TRUE;
		self::$aid=intval($q[0]->aid);
		self::$name=$q[0]->name;
		self::$addr=$q[0]->addr;
		self::$rating=$q[0]->rating;
		self::$driver_count=$q[0]->driver_count;
	}
	
	function get_list(){
		return $this->db->get("agency")->result();
	}

	function get_all($arr){
		return $this->db->get_where("agency",$arr)->result();
	}
}
?>