<?php
/*
 * request class 
 */
class Request extends CI_Model {
	private static $rId=0;
	private static $vtype="";
	private static $requesterId=0;
	private static $driverId=0;
	private static $src="";
	private static $dest="";
	private static $pickuptime="";
	private static $droptime="";
	private static $pref="";
	private static $comments="";
	private static $maxcost=0;
	private static $freq="";
	private static $owner="";
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_rId(){
		return self::$rId;
	}

	function get_vtype(){
		return self::$vtype;
	}
	
	function get_requesterId(){
		return self::$requesterId;
	}
	
	function get_driverId(){
		return self::$driverId;
	}
	
	function get_src(){
		return self::$src;
	}
	
	function get_dest(){
		return self::$dest;
	}
	
	function get_pickuptime(){
		return self::$pickuptime;
	}
	
	function get_droptime(){
		return self::$droptime;
	}
	
	function get_pref(){
		return self::$pref;
	}
	
	function get_comments(){
		return self::$comments;
	}
	
	function get_maxcost(){
		return self::$maxcost;
	}
	
	function get_freq(){
		return self::$freq;
	}
	
	function get_owner(){
		return self::$owner;
	}
	
	function create($arr){
		try{
			if(isset($arr["requesterId"]))self::$requesterId=intval($arr["requesterId"]);
			else throw new Exception("No requesterid provided");
			
			if(isset($arr["src"]))self::$src=$arr["src"];
			else throw new Exception("No source provided");
			
			if(isset($arr["dest"]))self::$dest=$arr["dest"];
			else throw new Exception("No destination provided");
			
			if(isset($arr["driverid"]))self::$driverid=$arr["driverid"];
			else $arr["driverid"]="1";
		}catch (Exception $e){
			return $e->getMessage();
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->insert("request",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Could not create request");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
		return "Request created successfully";
	}
	
	function set($arr){
		try{
			$this->db->db_debug = FALSE;
			$q=$this->db->get_where("request",$arr)->result();
			if(sizeof($q)==0)throw new Exception("No Request Matching given parameters");
			if(sizeof($q)>1)throw new Exception("More than one Requests matched");
		}catch (Exception $e){
			return $e->getMessage();
		}
		$this->db->db_debug = TRUE;
		self::$rId=intval($q[0]->rId);
		self::$vtype=$q[0]->vtype;
		self::$requesterId=intval($q[0]->requesterId);
		self::$driverId=intval($q[0]->driverId);
		self::$src=$q[0]->src;
		self::$dest=$q[0]->dest;
		self::$pickuptime=$q[0]->pickuptime;
		self::$droptime=$q[0]->droptime;
		self::$pref=$q[0]->pref;
		self::$comments=$q[0]->comments;
		self::$maxcost=intval($q[0]->maxcost);
		self::$freq=$q[0]->freq;
		self::$owner=$q[0]->owner;
	}
	
	function edit($rId,$arr){
		try{
			$this->db->db_debug = FALSE;
			$this->db->where("rId",$rId);
			$this->db->update("request",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Invalid Update");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
	}
	
	function get_all($arr){
		return $this->db->get_where("request",$arr)->result();
	}
}
?>