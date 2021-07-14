<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounttypes_model extends CI_Model{
    public function account_types(){
		$account_types = $this->db->select('*')->from('account_types')->order_by('id','asc')->get()->result_array();
		if(!empty($account_types)) {
			foreach ($account_types as $key => $account_type) {
				$accountTypes[$key] = $account_type;
				$accountTypes[$key]['children'] =  $this->db->select('*')->from('child_account_types')->where('parent_id',$account_type['id'])->get()->result_array();
			}
			// echo "<pre>";print_r($accountTypes); die;
			return $accountTypes;
		} else 
		{
			return array();
		}
	}

	public function add_account_type($data){
		$name=$data['name'];
		$newaccount_type=$data['accountype'];
		if(!empty($newaccount_type)){
			$array = ['child_name' => $name , 'parent_id' => $newaccount_type];
			return	$this->db->insert('child_account_types',$array);
		}else{
			$array = ['name' => $name ];
			return	$this->db->insert('account_types',$array);
		}
	}

	public function delete_account_type($id,$type){
		if($type == "parent"){
			$this->db->where('parent_id', $id);
			if($this->db->delete('child_account_types')){

				$this->db->where('id', $id);
				return $this->db->delete('account_types');
			}

		}else{
			$this->db->where('id', $id);
			return $this->db->delete('child_account_types');

		}
	}

	public function get_account_types_by_id_and_type($data){
		
		if($data['acc_type'] == "parent"){
			$account_types = $this->db->select('*')->from('account_types')->where('id',$data['acc_type_id'])->order_by('id','asc')->get()->result_array()[0];
			if(!empty($account_types)) {
				$account_types['type'] = "parent";
				return $account_types;
			} else 
			{
				return array();
			}

		}else{
			$account_types = $this->db->select('*')->from('child_account_types')->where('id',$data['acc_type_id'])->order_by('id','asc')->get()->result_array()[0];
			if(!empty($account_types)) {
				$account_types['type'] = "child";
				return $account_types;
			} else 
			{
				return array();
			}

		}

	}

	public function update_account_type($data){
		if($data["type"] == "parent"){
			$this->db->where('id',$data["id"]);
			$arr = ["name"=>$data['name']];
			return $this->db->update('account_types',$arr);

		}else{
			$this->db->where('id',$data["id"]);
			$arr = ["child_name"=>$data['name'],"parent_id"=>$data['accountype']];
			return $this->db->update('child_account_types',$arr);

		}
	}

	public function get_child_account_types_by_parent_id($id){
		$response = $this->db->select('*')->from('child_account_types')->where('parent_id',$id)->get()->result_array();
		if($response){
			return $response;
		}else{
			return array();
		}
	}
}