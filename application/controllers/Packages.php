<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('package_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['packagelist'] = $this->package_model->getall_packages();
		$this->template->template_render('package',$data);
	}

	public function viewpackage(){
		
		$iPId = $_POST['pid'];
		$res = $this->package_model->get_packagedetails($iPId);
		echo json_encode($res);
		
	}
	public function insertpackage()
	{
		$insertarray = $this->input->post();
		$insertarray['p_created_date']=date('Y-m-d h:i:s');
		
     	$this->db->insert('packages',$insertarray);
     	redirect('packages/index');
		
	}
	
	public function updatepackage()
	{	
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->package_model->update_package($this->input->post());
			if($response)
				echo 1;	
		} 
		else {
			echo 0;
		}
	}
	public function updatepackagesubscription(){
		$testxss = xssclean($_POST);

		if($testxss){
			$response = $this->package_model->update_packagesubscription($this->input->post());
			if($response)
				echo 1;	
		} 
		else {
			echo 0;
		}
	}

	public function subscription()
	{
		$data['packageSubscription'] = $this->package_model->getActive_packages();
		$data['company_name'] = $this->db->select('*')->from('settings')->get()->result_array()[0]['s_companyname'];

		
		$data['packages'] = $this->package_model->getall_packages();

		$this->template->template_render('package_subscription',$data);
	}
	public function savepackagesubscription(){

		$insertarray = $this->input->post();
		$insertarray['ps_created_date']=date('Y-m-d h:i:s');
		
		$iRes = $this->db->insert('package_subscription',$insertarray);
     	
     	if($iRes){
     		echo 1;
     	}else{
     		echo 0;
     	}
	}
	public function  viewpackageSubscription(){
		$iPId = $_POST['ps_id'];
		$res = $this->package_model->get_packagesubscriptiondetails($iPId);
		echo json_encode($res);
	}
	
}

