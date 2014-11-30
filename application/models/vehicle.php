<?php
/*
 * request class 
 */
class Vehicle extends CI_Model {
	private static $vId=0;
	private static $vtype="";
	private static $make="";
	private static $model="";
	private static $dtype="";
	private static $maxPassenger=0;
	private static $cost="";
	private static $driverId=0;
	private static $year_of_purchase="";
	private static $name="";
	private static $license_num="";
	private static $date_of_license="";
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_vId(){
		return self::$vId;
	}
	
	function get_vtype(){
		return self::$vtype;
	}

	function get_make(){
		return self::$make;
	}
		
	function get_model(){
		return self::$model;
	}

	function get_dtype(){
		return self::$dtype;
	}
		
	function get_maxPassenger(){
		return self::$maxPassenger;
	}
	
	function get_cost(){
		return self::$cost;
	}
	
	function get_driverId(){
		return self::$driverId;
	}
		
	function get_year_of_purchase(){
		return self::$year_of_purchase;
	}

	function get_name(){
		return self::$name;
	}
	
	function get_license_num(){
		return self::$license_num;
	}
	
	function get_data_of_license(){
		return self::$date_of_license;
	}
		
	function create($arr){
		try{
			if(isset($arr["model"]))self::$model=intval($arr["model"]);
			else throw new Exception("No model provided");
			
			if(isset($arr["maxPassenger"]))self::$maxPassenger=intval($arr["maxPassenger"]);
			else throw new Exception("No maxPassenger provided");
			
			if(isset($arr["cost"]))self::$cost=intval($arr["cost"]);
			else throw new Exception("No cost provided");
			/*
			if(isset($arr["driverId"]))self::$cost=intval($arr["driverId"]);
			else throw new Exception("No driverId provided");
			*/
			
			if(isset($arr["year_of_purchase"]))self::$year_of_purchase=intval($arr["year_of_purchase"]);
			else throw new Exception("No year_of_purchase provided");
		}catch (Exception $e){
			return $e->getMessage();
		}
		try{
			$this->db->db_debug = FALSE;
			$this->db->insert("vehicle",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Could not create vehicle");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
		return "Vehicle created successfully";
	}
	
	function set($arr){
		try{
			$this->db->db_debug = FALSE;
			$q=$this->db->get_where("vehicle",$arr)->result();
			if(sizeof($q)==0)throw new Exception("No Vehicle Matching given parameters");
			if(sizeof($q)>1)throw new Exception("More than one Vehicles matched");
		}catch (Exception $e){
			return $e->getMessage();
		}
		$this->db->db_debug = TRUE;
		self::$vId=intval($q[0]->vId);
		self::$vtype=$q[0]->vtype;
		self::$make=$q[0]->make;		
		self::$model=$q[0]->model;
		self::$dtype=$q[0]->dtype;		
		self::$maxPassenger=intval($q[0]->maxPassenger);
		self::$cost=$q[0]->cost;
		self::$driverId=$q[0]->driverId;
		self::$year_of_purchase=$q[0]->year_of_purchase;
		self::$name=$q[0]->name;
		self::$license_num=$q[0]->license_num;
		self::$date_of_license=$q[0]->date_of_license;		
	}
	function edit($vid,$arr){
		try{
			$this->db->db_debug = FALSE;
			$this->db->where("vId",$vid);
			$this->db->update("vehicle",$arr);
			if($this->db->affected_rows() != 1)throw new Exception("Invalid Update");
		}catch (Exception $e){
			return $this->db->_error_message();
		}
		$this->db->db_debug = TRUE;
	}
	function get_all($arr){
		return $this->db->get_where("vehicle",$arr)->result();
	}
}
?>