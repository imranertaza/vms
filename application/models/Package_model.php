<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Package_model extends CI_Model{

	

	public function add_customer($data) {

		$customerins = $data;

		if(isset($data['c_pwd'])) {

			$customerins['c_pwd'] = md5($data['c_pwd']); 

		}

		return	$this->db->insert('customers',$customerins);

	} 
	public function getActive_packages(){
		$dNow = date('Y-m-d');
    	$where = array("ps_status =" =>"approved","ps_start_date <= " =>$dNow,"ps_end_date >= " =>$dNow);
    	return $this->db->select('*')->from('package_subscription')->join('packages','packages.p_id = package_subscription.ps_package_id','INNER')->where($where)->order_by('ps_id','desc')->get()->result_array();
        
	}
    public function getall_packages() { 

		return $this->db->select('*')->from('packages')->order_by('p_id','desc')->get()->result_array();

	}
	public function getall_packageSubscription($sCondition = ''){

		// if($sCondition){
		// 	$this->db->where('ps_createdby',$sCondition);
		// }
		return $this->db->select('*')->from('package_subscription')->order_by('ps_id','desc')->get()->result_array();
		
	} 
	public function get_packagedetails($p_id) { 

		return $this->db->select('*')->from('packages')->where('p_id',$p_id)->get()->result_array();

	} 
	public function get_packagesubscriptiondetails($ps_id){
		return $this->db->select('*')->from('package_subscription')->where('ps_id',$ps_id)->get()->result_array();
	}
	public function update_package() { 

		$this->db->where('p_id',$this->input->post('p_id'));
		return $this->db->update('packages',$this->input->post());

	}
	public function update_packagesubscription() { 

		$this->db->where('ps_id',$this->input->post('ps_id'));
		return $this->db->update('package_subscription',$this->input->post());


	}

} 