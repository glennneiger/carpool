<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
	
		$this->load->model("user");
		$data["msg"]=$this->user->create($this->input->get());
		$this->load->view('welcome_message',$data);
		
	}
	public function create_driver(){
		$this->load->model("driver");
		print $this->driver->create($this->input->get());
	}
	public function create_agency(){
		$this->load->model("agency");
		print $this->agency->create($this->input->get());
	}
	public function create_request(){
		$this->load->model("request");
		print_r($this->input->get());
		print $this->request->create($this->input->get());
	}
	public function create_vehicle(){
		$this->load->model("vehicle");
		print_r($this->input->get());
		print $this->vehicle->create($this->input->get());
	}
	public function get_request(){
		$this->load->model("request");
		print $this->request->set($this->input->get());
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
	public function signup(){
		$this->load->model("user");
		print $this->user->create($this->input->get());
		print "<br>name : ".$this->user->get_name();
		print "<br>uid : ".$this->user->get_uid();
		print "<br>age : ".$this->user->get_age();
		print "<br>sex : ".$this->user->get_sex();
		print "<br>mob : ".$this->user->get_mob();
		print "<br>email : ".$this->user->get_email();
		print "<br>username : ".$this->user->get_username();
	}
	public function login(){
		$this->load->model("user");
		print $this->user->set($this->input->post());
		print "<br>name : ".$this->user->get_name();
		print "<br>uid : ".$this->user->get_uid();
		print "<br>age : ".$this->user->get_age();
		print "<br>sex : ".$this->user->get_sex();
		print "<br>mob : ".$this->user->get_mob();
		print "<br>email : ".$this->user->get_email();
		print "<br>username : ".$this->user->get_username();
	}
	public function edit(){
		$this->load->model("user");
		print $this->user->edit($this->input->get("uid"),$this->input->get());
		print "<br>name : ".$this->user->get_name();
		print "<br>uid : ".$this->user->get_uid();
		print "<br>age : ".$this->user->get_age();
		print "<br>sex : ".$this->user->get_sex();
		print "<br>mob : ".$this->user->get_mob();
		print "<br>email : ".$this->user->get_email();
		print "<br>username : ".$this->user->get_username();
	}
	public function get_all_vehicle(){
		$this->load->model("vehicle");
		print_r($this->vehicle->get_all($this->input->get()));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
