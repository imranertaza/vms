<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Incomexpense_model');
		  $this->load->model('Accounttypes_model');
		  $this->load->model('Accountgroups_model');
		  $this->load->model('Accounts_model');
		  $this->load->model('Customer_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$data['accountgroups'] = $this->Accountgroups_model->account_groups();
		$data['accounts'] = $this->Accounts_model->accounts();
		$data['main_acc_contain_sub_acc'] = $this->Accounts_model->get_main_accounts_containing_sub_accounts();

		$this->template->template_render('account',$data);
	}
	public function addincomexpense()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('incomexpense_add',$data);
	}
	public function insertincomexpense()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Incomexpense_model->add_incomexpense($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
		}
	}
	public function editincomexpense()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		$data['incomexpensedetails'] = $this->Incomexpense_model->editincomexpense($e_id);
		$this->template->template_render('incomexpense_add',$data);
	}

	public function updateincomexpense()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Incomexpense_model->updateincomexpense($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('ie_type')).' updated successfully..');
				    redirect('incomexpense');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('incomexpense');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
		}
	}


	public function add_account_type()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run()){
			$response = $this->Accounttypes_model->add_account_type($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', ucfirst($this->input->post('name')).' type added successfully..');
				redirect($_SERVER['HTTP_REFERER']);
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('warningmessage', 'Name Field is required');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete_account_type($id,$type){
		if(!empty($id) && !empty($type)){
			$response = $this->Accounttypes_model->delete_account_type($id,$type);
			if($response) {
				$this->session->set_flashdata('successmessage', 'Type Deleted Successfully.');
				redirect($_SERVER['HTTP_REFERER']);
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}	
		}else{
			$this->session->set_flashdata('warningmessage', 'Incorrect Parameters');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ajax_add_account_type(){
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_add_account_type',$data);
		
	}

	public function ajax_edit_account_type(){
		$data['current_account_type'] = $this->Accounttypes_model->get_account_types_by_id_and_type($this->input->get());
		$data['account_types'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_edit_account_type',$data);
	}

	public function update_account_type(){
		$response = $this->Accounttypes_model->update_account_type($this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Type Updated Successfully.');
			redirect($_SERVER['HTTP_REFERER']);
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ajax_add_account_group(){
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_add_account_group',$data);
		
	}

	public function add_account_group(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('accountype', 'Account Type', 'required');
		
		if($this->form_validation->run()){
			$response = $this->Accountgroups_model->add_account_group($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', ucfirst($this->input->post('name')).' group added successfully..');
				redirect($_SERVER['HTTP_REFERER']);
			} else{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}

		}else{
			$this->session->set_flashdata('warningmessage', '* fields are required');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete_account_group($id){
		if(!empty($id)){
			$response = $this->Accountgroups_model->delete_account_group($id);
			if($response) {
				$this->session->set_flashdata('successmessage', 'Group Deleted Successfully.');
				redirect($_SERVER['HTTP_REFERER']);
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}	
		}else{
			$this->session->set_flashdata('warningmessage', 'Incorrect Parameters');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ajax_edit_account_group(){
		$data['account_group'] = $this->Accountgroups_model->get_account_group_by_id($this->input->get("id"));
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_edit_account_group',$data);
	}

	public function update_account_group(){
		$response = $this->Accountgroups_model->update_account_group($this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group Updated Successfully.');
			redirect($_SERVER['HTTP_REFERER']);
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	public function ajax_add_account(){
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_add_account',$data);
	}

	public function ajax_add_account_details(){ //related to ajax_add_account()
		$data['request'] = $this->input->get();
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_add_account_details',$data);
	}

	public function add_account(){
		if($this->input->post("type") == "sub_account"){
			$this->form_validation->set_rules('main_account_id', 'Main Account', 'required');
		}
		
		$this->form_validation->set_rules('child_account_type_id', 'Account Type', 'required');
		$this->form_validation->set_rules('account_group_id', 'Account Group', 'required');
		$this->form_validation->set_rules('account_number', 'Account Number', 'required');
		$this->form_validation->set_rules('account_name', 'Account Name', 'required');
		
	
		if($this->form_validation->run()){
			$response = $this->Accounts_model->add_account($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', ucfirst($this->input->post('account_number')).' account added successfully..');
				redirect($_SERVER['HTTP_REFERER']);
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('warningmessage', '* fields are required');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete_account($id){
		if(!empty($id)){
			$response = $this->Accounts_model->delete_account($id);
			if($response) {
				$this->session->set_flashdata('successmessage', 'Account Deleted Successfully.');
				redirect($_SERVER['HTTP_REFERER']);
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}	
		}else{
			$this->session->set_flashdata('warningmessage', 'Incorrect Parameters');
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	public function ajax_edit_account(){
		$data['current_account'] = $this->Accounts_model->get_account_by_id($this->input->get('id'));
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$data['groups'] = $this->Accountgroups_model->get_account_groups_by_child_account_type_id($data['current_account']['child_account_type_id']);
		$data['main_accounts'] = $this->Accounts_model->get_main_accounts_by_acc_type_and_acc_group($data['current_account']['child_account_type_id'],$data['current_account']['account_group_id']);
		// echo "<pre>";print_r($data['current_account']);die;
		$this->load->view('ajax/ajax_edit_account',$data);

	}

	public function ajax_edit_account_details(){ //related to ajax_edit_account()
		$data['request'] = $this->input->get();
		$data['accountTypes'] = $this->Accounttypes_model->account_types();
		$this->load->view('ajax/ajax_edit_account_details',$data);
	}

	public function update_account(){
		if($this->input->post("type") == "sub_account"){
			$this->form_validation->set_rules('main_account_id', 'Main Account', 'required');
		}
		
		$this->form_validation->set_rules('child_account_type_id', 'Account Type', 'required');
		$this->form_validation->set_rules('account_group_id', 'Account Group', 'required');
		$this->form_validation->set_rules('account_number', 'Account Number', 'required');
		$this->form_validation->set_rules('account_name', 'Account Name', 'required');
		
	
		if($this->form_validation->run()){
		
			$response = $this->Accounts_model->update_account($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Account Updated Successfully.');
				redirect($_SERVER['HTTP_REFERER']);
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('warningmessage', '* fields are required');
			redirect($_SERVER['HTTP_REFERER']);

		}	
		
	}

	public function account_book($id){
	    $data['account'] =  $this->Accounts_model->get_account_by_id($id);
	    $data['customers'] = $this->Customer_model->getall_customer();
	    $this->template->template_render('account_book',$data);
	}

	public function ajax_account_filters(){
		$data['request'] =$this->input->get();
		$this->load->view('ajax/ajax_account_filters',$data);
	}


	

	public function add_account_setting(){
		echo "<pre>";print_r($this->input->post());die;
	}

	
}
