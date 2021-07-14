<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incomexpense_model extends CI_Model{
	
	public function add_incomexpense($data) { 
		return	$this->db->insert('incomeexpense',$data);
	} 
    public function getall_incomexpense() { 
		$incomexpense = $this->db->select('*')->from('incomeexpense')->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 
	public function editincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}
	public function updateincomexpense() { 
		$this->db->where('ie_id',$this->input->post('ie_id'));
		return $this->db->update('incomeexpense',$this->input->post());
	}
	public function getvechicle_incomexpense($v_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_v_id',$v_id)->order_by('ie_id','DESC')->get()->result_array();
	} 
	public function incomexpense_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_v_id'=>$v_id);
		}

		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}

	public function account_types(){
		$account_types = $this->db->select('*')->from('account_types')->order_by('id','asc')->get()->result_array();
		if(!empty($account_types)) {
			foreach ($account_types as $key => $account_type) {
				$accountTypes[$key] = $account_type;
				$accountTypes[$key]['children'] =  $this->db->select('*')->from('child_account_types')->where('parent_id',$account_type['id'])->get()->result_array();
			}
			return $accountTypes;
		} else 
		{
			return array();
		}


	}
} 