<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accountgroups_model extends CI_Model{
    public function add_account_group($request){
        $data = [
            'name' => $request['name'],
            'note' => $request['note'],
            'child_account_type_id' => $request['accountype']
        ];
        return	$this->db->insert('account_groups',$data);
    }

    public function account_groups(){
		$account_groups = $this->db->select('*')->from('account_groups')->order_by('id','desc')->get()->result_array();
        if(!empty($account_groups)) {
			foreach ($account_groups as $key => $account_group) {
                $child = $this->db->select('*')->from('child_account_types')->where('id',$account_group['child_account_type_id'])->get()->result_array();
                if(!empty($child)){
                    $account_group['child_account_type'] = $child[0];
                    $parent = $this->db->select('*')->from('account_types')->where('id',$child[0]['parent_id'])->get()->result_array();
                    if(!empty($parent)){
                        $account_group['child_account_type']['parent_name'] = $parent[0]['name'];
                    }
                }
                $accountGroups[$key] = $account_group;
            }
			return $accountGroups;
		} else 
		{
			return array();
		}
	}

    public function get_account_groups_by_child_account_type_id($id){
        
        $account_groups = $this->db->select('*')->from('account_groups')->where("child_account_type_id",$id)->get()->result_array();
        if(!empty($account_groups)) {
			foreach ($account_groups as $key => $account_group) {
                $child = $this->db->select('*')->from('child_account_types')->where('id',$account_group['child_account_type_id'])->get()->result_array();
                if(!empty($child)){
                    $account_group['child_account_type'] = $child[0];
                    $parent = $this->db->select('*')->from('account_types')->where('id',$child[0]['parent_id'])->get()->result_array();
                    if(!empty($parent)){
                        $account_group['child_account_type']['parent_name'] = $parent[0]['name'];
                    }
                }
                $accountGroups[$key] = $account_group;
            }
			return $accountGroups;
		} else 
		{
			return array();
		}

    }

    public function delete_account_group($id){
        $this->db->where('id', $id);
        return $this->db->delete('account_groups');		
	}

    public function get_account_group_by_id($id){
        
        $account_groups = $this->db->select('*')->from('account_groups')->where("id",$id)->get()->result_array();
        if(!empty($account_groups)) {
			foreach ($account_groups as $key => $account_group) {
                $child = $this->db->select('*')->from('child_account_types')->where('id',$account_group['child_account_type_id'])->get()->result_array();
                if(!empty($child)){
                    $account_group['child_account_type'] = $child[0];
                    $parent = $this->db->select('*')->from('account_types')->where('id',$child[0]['parent_id'])->get()->result_array();
                    if(!empty($parent)){
                        $account_group['child_account_type']['parent_name'] = $parent[0]['name'];
                    }
                }
                $accountGroups[$key] = $account_group;
            }
			return $accountGroups[0];
		} else 
		{
			return array();
		}

    }

    public function update_account_group($data){
        $this->db->where('id',$data["id"]);
        $arr = ["name"=>$data['name'],"note"=>$data['note'],"child_account_type_id"=>$data['accountype']];
        return $this->db->update('account_groups',$arr);
	}


}