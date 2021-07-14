<?php
// echo "<pre>";print_r($request);die;
if($request['request'] == "get_child_account_types_by_parent_id"){
    $child_type = $this->Accounttypes_model->get_child_account_types_by_parent_id($request['parent_id']);
    if(isset($child_type) && !empty($child_type)){
        echo "<option value=''>Plase Select</option>";
        foreach($child_type as $type){
          echo "<option value='$type[id]'>$type[child_name]</option>";

        }
    }else{
    echo "<option value=''>Plase Select</option>";
    }
    
}elseif($request['request'] == "get_account_groups_by_child_account_type_id"){
    $groups = $this->Accountgroups_model->get_account_groups_by_child_account_type_id($request['child_id']);
    if(isset($groups) && !empty($groups)){
        echo "<option value=''>Plase Select</option>";
        foreach($groups as $group){
          echo "<option value='$group[id]'>$group[name]</option>";
        }
    }else{
    echo "<option value=''>Plase Select</option>";
    }

}elseif($request['request'] == "get_accounts_by_acc_type_and_acc_group"){
  $accounts = $this->Accounts_model->get_main_accounts_by_acc_type_and_acc_group($request['acc_type'],$request['acc_group']);
  if(isset($accounts) && !empty($accounts)){
    echo "<option value=''>Plase Select</option>";
    foreach($accounts as $main){
      echo "<option value='$main[id]'>$main[account_name]</option>";
      if(is_array($main['sub_accounts']) && !empty($main['sub_accounts'])){
        foreach($main['sub_accounts'] as $sub){
          echo "<option value='$sub[id]'>&nbsp;&nbsp;&nbsp;- $sub[account_name]</option>";
        }
      }
    }
  }else{
    echo "<option value=''>No Data Found</option>";
  }
}elseif($request['request'] == "get_main_accounts_containing_sub_accounts"){
  $accounts = $this->Accounts_model->get_main_accounts_containing_sub_accounts();
  if(isset($accounts) && !empty($accounts)){
    echo "<option value=''>Plase Select</option>";
    foreach($accounts as $main){
      echo "<option value='$main[id]'>$main[account_name]</option>";
      if(is_array($main['sub_accounts']) && !empty($main['sub_accounts'])){
        foreach($main['sub_accounts'] as $sub){
          echo "<option value='$sub[id]'>&nbsp;&nbsp;&nbsp;- $sub[account_name]</option>";
        }
      }
    }
  }else{
    echo "<option value=''>No Data Found</option>";
  }

}elseif($request['request'] == "get_accounts_by_acc_group"){
  $accounts = $this->Accounts_model->get_accounts_by_acc_group($request['acc_group']);
  if(isset($accounts) && !empty($accounts)){
    echo "<option value=''>Plase Select</option>";
    foreach($accounts as $main){
      echo "<option value='$main[id]'>$main[account_name]</option>";
      if(is_array($main['sub_accounts']) && !empty($main['sub_accounts'])){
        foreach($main['sub_accounts'] as $sub){
          echo "<option value='$sub[id]'>&nbsp;&nbsp;&nbsp;- $sub[account_name]</option>";
        }
      }
    }
  }else{
    echo "<option value=''>Please Select</option>";
    echo "<option value=''>No Data Found</option>";
  }

}

?>