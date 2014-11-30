<?php
/*
 * request class 
 */
class Offer extends CI_Model {
	private static $oId=0;
	private static $uId=0;
	private static $freq = 0;
	private static $cost=0;
	private static $maxPassenger = 0;
	private static $src=0;
	private static $dest=0;
	private static $pickup_time="";
	private static $drop_time="";
	private static $gender_pref="";
	private static $age_pref="";
	private static $vtype="";
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_oId(){
		return self::$oId;
	}

	function get_freq(){
		return self::$freq;
	}
	
	function get_uId(){
		return self::$uId;
	}
	
	function get_cost(){
		return self::$cost;
	}
	
	function get_maxPassenger(){
		return self::$maxPassenger;
	}
	
	function get_src(){
		return self::$src;
	}
	
	function get_dest(){
		return self::$dest;
	}
	
	function get_pickuptime(){
		return self::$pickup_time;
	}
	
	function get_droptime(){
		return self::$drop_time;
	}
	
	function get_genderpref(){
		return self::$gender_pref;
	}
	
	function get_agepref(){
		return self::$age_pref;
	}

	function get_vtype(){
		return self::$vtype;
	}
	
	function create($arr){
		try{
			if(isset($arr["uId"]))self::$uId=intval($arr["uId"]);
			else throw new Exception("No user id provided");
			
			/*
			if(isset($arr["freq"]))self::$freq=$arr["freq"];
			else throw new Exception("No frequency provided");
			*/
			
			if(isset($arr["src"]))self::$src=$arr["src"];
			else throw new Exception("No source provided");
			
			if(isset($arr["dest"]))self::$dest=$arr["dest"];
			else throw new Exception("No destination provided");
		
		}catch (Exception $e){
			return $e->getMessage();
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->insert("offer",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Could not create offer");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
		return "Offer created successfully";
	}
	
	function set($arr){
		try{
			$this->db->db_debug = FALSE;
			$q=$this->db->get_where("offer",$arr)->result();
			if(sizeof($q)==0)throw new Exception("No Request Matching given parameters");
			if(sizeof($q)>1)throw new Exception("More than one Requests matched");
		}catch (Exception $e){
			return $e->getMessage();
		}
		$this->db->db_debug = TRUE;
		self::$oId=intval($q[0]->oId);
		self::$uId=intval($q[0]->uId);
		self::$cost=intval($q[0]->cost);
		self::$freq=$q[0]->freq;
		self::$src=intval($q[0]->src);
		self::$dest=intval($q[0]->dest);
		self::$pickup_time=$q[0]->pickup_time;
		self::$drop_time=$q[0]->drop_time;
		self::$gender_pref=$q[0]->gender_pref;
		self::$age_pref=$q[0]->age_pref;
		self::$vtype=$q[0]->vtype;	
	}
	
	function edit($oId,$arr){
		try{
			$this->db->db_debug = FALSE;
			$this->db->where("oId",$oId);
			$this->db->update("offer",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Invalid Update");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
	}
	
	function get_all($arr){
		return $this->db->get_where("offer",$arr)->result();
	}
}
?>