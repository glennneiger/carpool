<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carpool extends CI_Controller {

	public function index(){
		$this->load->view('home_page');
	}

	private function search_all_req($start , $end){
		$this->load->database();
		$this->db->order_by("dest", "desc"); 
		$q=$this->db->get("request")->result();
		$res=Array();
		foreach ($q as $key) {
			if($key->src >= $start && $key->dest <= $end){
				array_push($res,$key);
			}
		}
		//print_r($res);
		return $res;
	}
	public function profile($uid){
		$this->load->model("user");
		$data["user"]=$this->user->get_all(Array("uid"=>$uid));

		$this->load->model("driver");
		$data["driver"]=$this->driver->get_all(Array("uid"=>$uid));
		if(count($data["driver"])==0)unset($data["driver"]);
		else if($data["driver"][0]->aid!=0){
			$this->load->model("agency");
			$data["agency"]=$this->agency->get_all(Array("aid"=>$data["driver"][0]->aid));
		}
		$data["show"]="profile";
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/register_hire_vehicle_validation';
		$this->load->view('index', $data);
	}
	private function search_all_off($start,$end){
		$res=Array();
		$this->load->database();
		$this->db->order_by("dest", "desc"); 
		$q=$this->db->get("offer")->result();
		foreach ($q as $key) {
			if($key->src >= $start && $key->dest <= $end){
				array_push($res,$key);
			}
		}
		//print_r($res);
		return $res;
	}

	private function give_places()
	{

		$this->load->model('places');
		return $this->places->get_list();
	}

	/*Form loading controllers*/

	public function request()
	{
		$data['show'] = 'request';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/request_validation';
		$this->load->view('index', $data);
	}

	public function offer()
	{
		$data['show'] = 'offer';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/offer_validation';	
		$this->load->view('index', $data);
	}

	public function search_vehicle()
	{
		$data['show'] = 'search_vehicle';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/search_vehicle_validation';	
		$this->load->view('index', $data);
	}

	public function search_requester()
	{
		$data['show'] = 'search_requester';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/search_requester_validation';
		$this->load->view('index', $data);
	}
	
	public function register_own_vehicle()
	{
		$data['show'] = 'register_own_vehicle';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/register_own_vehicle_validation';	
		$this->load->view('index', $data);
	}

	public function register_hire_vehicle()
	{
		$data['show'] = 'register_hire_vehicle';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/register_hire_vehicle_validation';	
		$this->load->view('index', $data);
	}

	public function inbox()
	{
		$data['show'] = 'request';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/request_validation';	
		$this->load->view('index', $data);
	}	

	public function logout()
	{
		$this->load->helper('cookie');
		delete_cookie('cookie_data');
		$this->load->view('home_page');
	}
		
	/*Form loading controllers end here*/

	/*Login, Register and Update*/
	public function load_login($state=""){
		$data["script"]=$state;
		$this->load->view('login', $data);
	}

	public function login(){
		$this->load->model("user");
		$state =  $this->user->set($this->input->post());
		if($state == "Login Successful")
		{
			$this->load->helper('cookie');

			$name = $this->user->get_name();
			$uid = $this->user->get_uid();
			$cookie_data = $uid." ".$name;
			$cookie = array(
			    'name'   => 'cookie_data',
			    'value'  => $cookie_data,
			    'expire' => '86500'
			);
			$this->input->set_cookie($cookie);
			//Adding delay so that cookie is set
			//sleep(1);
			$this->load->helper("url");
			redirect('/carpool/land', 'refresh');
			/*
			set_cookie(array('name' => 'cname[one]', 'value' => 'cvalue1', 'expires' => '86500'));
			set_cookie(array('name' => 'cname[two]', 'value' => 'cvalue2', 'expires' => '86500'));
			print_r(get_cookie('cname'));
			*/
			
			//$data["uid"] = $this->user->get_uid();
			
		}
		else
		{
			$state="alert(\"Incorrect username or password : ".$state."\");";
			$this->load_login($state);
		}
	}

	public function land(){
		$data["show"] = "request";//Default is request
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/request_validation';
		$this->load->view('index',$data);
	}
	public function load_user_register($state=""){
		$data["script"]=$state;
		$data['place_list'] = $this->give_places();
		$this->load->view('user_register',$data);
	}

	public function user_register(){
		$this->load->model("user");
		$state=$this->user->create($this->input->post());
		if($state=="User created successfully"){
			$data["script"]="alert('user created succesfully. You may now login.');";
			$this->load->view('home_page',$data);
		}else{
			$state="alert(\"Could not register : ".$state."\");";
			$this->load_user_register($state);
		}
		
	}

	public function load_update()
	{
		$data['show'] = 'update';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/update_validation';	
		$cookie_data = $this->input->cookie('cookie_data');
        $array = explode(' ', $cookie_data, 2);
        $uid = $array[0];
        $this->load->model("user");
        $data["user"]=$this->user->get_all(Array("uid"=>$uid));
		$this->load->view('index', $data);
	}

	public function update(){
		$this->load->model("user");
		
		$this->load->helper('cookie');
		$cookie_data = $this->input->cookie('cookie_data');
        $array = explode(' ', $cookie_data, 2);
        $uid = $array[0];

		$this->user->edit($uid, $this->input->post());
		
		//Show request
		$data['show'] = 'request';
		$data['place_list'] = $this->give_places();
		$data['validate'] = 'validation/request_validation';
		$data["script"]="alert('Profile Updated Successfully');";	
		$this->load->view('index', $data);
	}
	/*Login, Register and Update end here*/


	/*Middle Controllers*/
	public function create_request(){
		$this->load->model('request');		
		$input = $this->input->post();
		//print_r($input);
		
		$src = $input['src'];
		$dest = $input['dest'];
		$pickuptime = $input['pickuptime'];
		$droptime = $input['droptime'];
		$freq = $input['freq'];
		$freqval = $input['freqval'];
		$pref = $input['pref'];
		$vtype = $input['vtype'];
		$maxcost = $input['maxcost'];
		
		if($freq == 'particular day')
			$freq = $freqval;

		$this->load->helper('cookie');
		$cookie_data = $this->input->cookie('cookie_data');
        $array = explode(' ', $cookie_data, 2);
        $uid = $array[0];
			
		$arr = Array('src' => $src, 'dest' => $dest, 'pickuptime' => $pickuptime, 'droptime' => $droptime , 'freq' => $freq, 'pref' => $pref, 'vtype' => $vtype, 'maxcost' => $maxcost , 'requesterId'=>$uid);
		$state=$this->request->create($arr);
		if($state=="Request created successfully")
		{
			$data["script"]="alert('Your request has been registered');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'request';
			$data['validate'] = 'validation/request_validation';	
			$this->load->view('index', $data);
		}
		else
		{	
			$data["script"]="alert('".$state."');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'request';
			$data['validate'] = 'validation/request_validation';	
			$this->load->view('index', $data);
		}
		
	}

	public function create_offer(){
		$this->load->model('offer');		
		$input = $this->input->post();
		
		$this->load->helper('cookie');
		$cookie_data = $this->input->cookie('cookie_data');
        $array = explode(' ', $cookie_data, 2);
        $uId = $array[0];
        $input['uId'] = $uId;

		$state=$this->offer->create($input);
		if($state=="Offer created successfully")
		{
			$data["script"]="alert('Your offer has been registered');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'offer';
			$data['validate'] = 'validation/offer_validation';	
			$this->load->view('index', $data);
		}
		else
		{	
			$data["script"]="alert('".$state."');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'offer';
			$data['validate'] = 'validation/offer_validation';	
			$this->load->view('index', $data);
		}		
	}

	//Make proper output and then render results
	//Use freq also
	public function search_vehicle_query()
	{
		$this->load->model("offer");
		$data["off"]=$this->search_all_off($this->input->post("src"),$this->input->post("dest"));
		$data['place_list'] = $this->give_places();
		$data['show'] = 'search_result';
		$data['validate'] = 'validation/register_hire_vehicle_validation';	
		$this->load->view('index', $data);
	}

	public function search_requester_query()
	{
		$this->load->model("request");
		$data["req"]=$this->search_all_req($this->input->post("src"),$this->input->post("dest"));
		$data['place_list'] = $this->give_places();
		$data['show'] = 'search_result';
		$data['validate'] = 'validation/register_hire_vehicle_validation';	
		$this->load->view('index', $data);
	}

	public function create_vehicle(){
		$this->load->model("vehicle");
		//print_r($this->input->post());
		$input = $this->input->post();
		$state=$this->vehicle->create($input);
		if($state=="Vehicle created successfully")
		{
			$data["script"]="alert('Your vehicle has been registered');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'register_own_vehicle';
			$data['validate'] = 'validation/register_own_vehicle_validation';	
			$this->load->view('index', $data);
		}
		else
		{	
			$data["script"]="alert('".$state."');";
		}
	}	

	public function search(){
		//print_r($this->input->post());
		$this->load->model("request");
		$this->load->model("offer");
		$data["req"]=$this->search_all_req($this->input->post("topsrc"),$this->input->post("topdest"));
		$data["off"]=$this->search_all_off($this->input->post("topsrc"),$this->input->post("topdest"));
		$data['place_list'] = $this->give_places();
		$data['show'] = 'search_result';
		$data['validate'] = 'validation/register_hire_vehicle_validation';	
		$this->load->view('index', $data);
	}











	
	public function create_driver_form(){
		$this->load->model("user");
		$cookie_data = $this->input->cookie('cookie_data');
      	$array = explode(' ', $cookie_data, 2);
      	$a["uid"] = $array[0];
      	$this->user->set($a);
		if($this->user->get_driver_count()==0){
			$this->load->model("agency");
			$data["agency_list"]=$this->agency->get_list();
			$data['place_list'] = $this->give_places();
			$data['validate'] = 'validation/register_hire_vehicle_validation';
			$cookie_data = $this->input->cookie('cookie_data');
          	$array = explode(' ', $cookie_data, 2);
          	$data['uid'] = $array[0];
			$data["show"]="create_driver_form";
			$this->load->view("index",$data);
		}else{
			$data['show'] = 'request';
			$data['validate'] = 'validation/request_validation';
			$data['place_list'] = $this->give_places();
			$data["script"]="alert('You are already a registered driver');";	
			$this->load->view('index', $data);
		}
	}
	public function create_driver(){
		$this->load->model("driver");
		$arr=$this->input->post();
		if($arr["freq"]=="particular day"){
			$arr["freq"]=$arr["freqval"];
		}
		unset($arr["freqval"]);
		$state=$this->driver->create($arr);
		if($state=="Driver created successfully")
		{
			$this->load->model("agency");
			$this->agency->add_driver($arr["aid"]);
			$data["script"]="alert('Congratulations! You are now a registered driver');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'request';
			$data['validate'] = 'validation/request_validation';	
			$this->load->view('index', $data);
		}
		else
		{	
			$this->load->model("agency");
			$data["agency_list"]=$this->agency->get_list();
			$data["script"]="alert(\"".$state."\");";
			$data['place_list'] = $this->give_places();
			$cookie_data = $this->input->cookie('cookie_data');
          	$array = explode(' ', $cookie_data, 2);
          	$data['uid'] = $array[0];
			$data['show'] = 'create_driver_form';
			$data['validate'] = 'validation/register_hire_vehicle_validation';	
			$this->load->view('index', $data);
		}
	}
	public function create_agency(){
		$this->load->model("agency");
		$state=$this->agency->create($this->input->post());
		if($state=="Agency created successfully")
		{
			$data["script"]="alert('Your agency has been registered');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'register_hire_vehicle';
			$data['validate'] = 'validation/register_hire_vehicle_validation';	
			$this->load->view('index', $data);
		}
		else
		{	
			$data["script"]="alert('".$state."');";
			$data['place_list'] = $this->give_places();
			$data['show'] = 'register_hire_vehicle';
			$data['validate'] = 'validation/register_hire_vehicle_validation';	
			$this->load->view('index', $data);
		}

	}
	
	
	public function get_agency(){
		$this->load->model("agency");
		print $this->agency->set($this->input->get());
		print "<br>aid : ".$this->agency->get_aid();
		print "<br>name : ".$this->agency->get_name();
		print "<br>rating : ".$this->agency->get_rating();
		print "<br>driver_count : ".$this->agency->get_driver_count();
	}
	public function get_vehicle(){
		$this->load->model("vehicle");
		print $this->vehicle->set($this->input->get());
		print "<br>vid : ".$this->vehicle->get_vId();
		print "<br>model : ".$this->vehicle->get_model();
		print "<br>maxPassenger : ".$this->vehicle->get_maxPassenger();
		print "<br>cost : ".$this->vehicle->get_cost();
		print "<br>driverId : ".$this->vehicle->get_driverId();
		print "<br>ownership : ".$this->vehicle->get_ownership();
		print "<br>year_of_purchase : ".$this->vehicle->get_year_of_purchase();
	}
	public function get_driver(){
		$this->load->model("driver");
		print $this->driver->set($this->input->get());
		print "<br>driverid : ".$this->driver->get_driverid();
		print "<br>uid : ".$this->driver->get_uid();
		print "<br>skill : ".$this->driver->get_skill();
		print "<br>rating : ".$this->driver->get_rating();
		print "<br>experience : ".$this->driver->get_experience();
		print "<br>working_start : ".$this->driver->get_working_start();
		print "<br>working_end : ".$this->driver->get_working_end();
		print "<br>freq : ".$this->driver->get_freq();
		print "<br>aid : ".$this->driver->get_aid();
		print "<br>licence_num : ".$this->driver->get_licence_num();
		print "<br>date_of_licence : ".$this->driver->get_date_of_licence();
	}
	public function edit_vehicle($id){
		$this->load->model("vehicle");
		print $this->vehicle->edit($id,$this->input->get());
		print $this->vehicle->set(array("vId"=>$id));
		print "<br>vid : ".$this->vehicle->get_vId();
		print "<br>model : ".$this->vehicle->get_model();
		print "<br>maxPassenger : ".$this->vehicle->get_maxPassenger();
		print "<br>cost : ".$this->vehicle->get_cost();
		print "<br>driverId : ".$this->vehicle->get_driverId();
		print "<br>ownership : ".$this->vehicle->get_ownership();
		print "<br>year_of_purchase : ".$this->vehicle->get_year_of_purchase();
	}
	public function edit_request($id){
		$this->load->model("request");
		print $this->request->edit($id,$this->input->get());
		print $this->request->set(array("rId"=>$id));
		print "<br>rId : ".$this->request->get_rId();
		print "<br>requesterId : ".$this->request->get_requesterId();
		print "<br>driverId : ".$this->request->get_driverId();
		print "<br>stage : ".$this->request->get_stage();
		print "<br>src : ".$this->request->get_src();
		print "<br>dest : ".$this->request->get_dest();
		print "<br>pickuptime : ".$this->request->get_pickuptime();
		print "<br>droptime : ".$this->request->get_droptime();
		print "<br>pref : ".$this->request->get_pref();
		print "<br>comments : ".$this->request->get_comments();
		print "<br>maxcost : ".$this->request->get_maxcost();
		print "<br>freq : ".$this->request->get_freq();
		print "<br>owner : ".$this->request->get_owner();
	}
	public function edit_driver($driverid){
		$this->load->model("driver");
		print $this->driver->edit($driverid,$this->input->get());
		print $this->driver->set(array("driverid"=>$driverid));
		print "<br>driverid : ".$this->driver->get_driverid();
		print "<br>uid : ".$this->driver->get_uid();
		print "<br>skill : ".$this->driver->get_skill();
		print "<br>rating : ".$this->driver->get_rating();
		print "<br>experience : ".$this->driver->get_experience();
		print "<br>working_start : ".$this->driver->get_working_start();
		print "<br>working_end : ".$this->driver->get_working_end();
		print "<br>freq : ".$this->driver->get_freq();
		print "<br>aid : ".$this->driver->get_aid();
		print "<br>licence_num : ".$this->driver->get_licence_num();
		print "<br>date_of_licence : ".$this->driver->get_date_of_licence();
	}

	
	
	public function get_all_vehicle(){
		$this->load->model("vehicle");
		print_r($this->vehicle->get_all($this->input->get()));
	}
}

/* End of file carpool.php */
/* Location: ./application/controllers/carpool.php */
