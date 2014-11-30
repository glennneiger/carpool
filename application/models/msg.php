<?php
/*
 * user class 
 */
class Msg extends CI_Model {
	private static $txt;
	private static $rId;
	private static $sId;
	private static $mId;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_txt(){
		return self::$txt;
	}

	function get_rId(){
		return self::$rId;
	}

	function get_sId(){
		return self::sId;
	}

	function get_mId(){
		return self::$mId;
	}

	function send($sender , $receiver , $msg){
		$this->db->insert("msg",Array("rId"=>$receiver , "sId"=>$sender , "txt"=>$msg));
	}
	function get($uId){
		return $this->db->get_where("msg",Array("rId"=>$uId))->result();
	}
	function delete($mId){
		$this->db->delete("msg",Array("mId"=>$mId));
	}
?>