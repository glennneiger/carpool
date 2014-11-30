<?php
/*
 * request class 
 */
class Places extends CI_Model {
	private static $pId=0;
	private static $name="";
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_pId(){
		return self::$pId;
	}

	function get_name(){
		return self::$name;
	}

	function get($id){
		return $this->db->get_where("offer",Array("pId"=>$id))->result();
	}

	function get_list(){
		$this->db->order_by("pId", "asc"); 
		return $this->db->get("places")->result();
	}
	
	function get_all($arr){
		return $this->db->get_where("offer",$arr)->result();
	}
}
?>