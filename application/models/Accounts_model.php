<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts_model extends CI_Model{
    public function add_account($req){
        $main_acc_id = ($req['type'] == "sub_account") ? $req['main_account_id'] : null; 
        $data = [
            'account_name' => $req['account_name'],
            'account_number' => $req['account_number'],
            'account_level' => $req['type'],
            'note' => $req['note'],
            'account_group_id' => $req['account_group_id'],
            'child_account_type_id' => $req['child_account_type_id'],
            'main_account_id' => $main_acc_id,
            'added_by'=>$_SESSION['session_data']['u_id'],
        ];
     
		return	$this->db->insert('accounts',$data);

    }

    public function accounts(){

        $accounts = $this->db->select('*')->from('accounts')->order_by('id','desc')->get()->result_array();
		if(!empty($accounts)) {
			foreach ($accounts as $key => $account) {


                 
                if (!empty($account['account_group_id'])) {
                    $retVal = $this->db->select('*')->from('account_groups')->where("id",$account['account_group_id'])->get()->result_array()[0];} else { $retVal = '';}
                    

				$Accounts[$key] = $account;
                $Accounts[$key]['account_group']  = $retVal;
                $Accounts[$key]['child_account_type']  = $this->db->select('*')->from('child_account_types')->where("id",$account['child_account_type_id'])->get()->result_array()[0];
                $Accounts[$key]['account_added_by']  = $this->db->select('*')->from('login')->where("u_id",$account['added_by'])->get()->result_array()[0];
               if(!empty($account['main_account_id'])){
                $Accounts[$key]['main_account']  = $this->db->select('*')->from('accounts')->where("id",$account['main_account_id'])->get()->result_array()[0];
               }else{
                $Accounts[$key]['main_account']  = null;
               }
			}
			return $Accounts;
		} else 
		{
			return array();
		}
    }

    public function delete_account($id){
        $this->db->where('id', $id);
		return $this->db->delete('accounts');
    }

    public function get_main_accounts_containing_sub_accounts(){
        $accounts = $this->db->select('*')->from('accounts')->where("account_level","main_account")->order_by('id','asc')->get()->result_array();
        if(!empty($accounts)){
            foreach ($accounts as $key => $account) {
				$Accounts[$key] = $account;
                $Accounts[$key]['sub_accounts'] = $this->db->select('*')->from('accounts')->where("account_level","sub_account")->where("main_account_id",$account['id'])->order_by('id','asc')->get()->result_array();
            }
            return $Accounts;
        }else{
            return array();
        }
    }

    public function get_main_accounts_by_acc_type_and_acc_group($acc_type,$acc_group){
        $accounts = $this->db->select('*')->from('accounts')->where("child_account_type_id",$acc_type)->where("account_group_id",$acc_group)->where("account_level","main_account")->order_by('id','asc')->get()->result_array();
        if(!empty($accounts)){
            foreach ($accounts as $key => $account) {
				$Accounts[$key] = $account;
                $Accounts[$key]['sub_accounts'] = $this->db->select('*')->from('accounts')->where("account_level","sub_account")->where("main_account_id",$account['id'])->order_by('id','asc')->get()->result_array();
            }
            return $Accounts;
        }else{
            return array();
        }
    }

    public function get_accounts_by_acc_group($acc_group){
        $accounts = $this->db->select('*')->from('accounts')->where("account_group_id",$acc_group)->where("account_level","main_account")->order_by('id','asc')->get()->result_array();
        if(!empty($accounts)){
            foreach ($accounts as $key => $account) {
				$Accounts[$key] = $account;
                $Accounts[$key]['sub_accounts'] = $this->db->select('*')->from('accounts')->where("account_level","sub_account")->where("main_account_id",$account['id'])->order_by('id','asc')->get()->result_array();
            }
            return $Accounts;
        }else{
            return array();
        }
    }



    public function get_account_by_id($id){
        return $accounts = $this->db->select('*')->from('accounts')->join('account_groups', 'account_groups.id=accounts.account_group_id', 'inner')->join('child_account_types', 'child_account_types.id=accounts.child_account_type_id', 'inner')->where("accounts.id",$id)->get()->result_array()[0];
         
         
        if(!empty($accounts)){
            return $accounts;
        }else{
            return array();
        }
       

    }

    public function update_account($req){
        // echo "<pre>";print_r($req);die;
        $main_acc_id = ($req['type'] == "sub_account") ? $req['main_account_id'] : null; 
        $this->db->where('id',$req["id"]);
        $data = [
            "account_name"=>$req['account_name'],//
            "account_number"=>$req['account_number'], //
            "account_level"=>$req['type'], //
            "note"=>$req['note'], //
            "account_group_id"=>$req['account_group_id'],//
            "child_account_type_id"=>$req['child_account_type_id'], //
            "main_account_id"=> $main_acc_id, //
        ];
        return $this->db->update('accounts',$data);
    }
}