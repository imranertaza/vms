<?php
if($request['req'] == "get_data_by_account_type")
{
    $groups = $this->Accountgroups_model->get_account_groups_by_child_account_type_id($request['child_acc_type_id']);
    ?>
     <!--================================-->
     <div class="col-12">
        <div class="dropdown">
        <label for="account_group" class="dropdown-label">Account Group<span class="text-danger">*</span></label>
        <select class="dropdown-select" id="account_group" name="account_group_id">
        <?php if(isset($groups) && !empty($groups)){
            echo "<option value='' >Please Select </option>";
            foreach($groups as $key=>$group){
            echo "<option value='$group[id]' >$group[name] </option>";
            }
        }else{ echo "<option value='' >No Data Found </option>"; } ?>
        </select>
        </div>
    </div>
    <!--=================================-->
    <div class="col-12 mt-1">
        <div class="form-check">
            <input name="type" class="form-check-input" type="checkbox" value="main_account" id="main_account" checked>
            <label class="form-check-label" for="main_account">
                Main Account (cannot add amount to this level accounts)
            </label>
            </div>
            <div class="form-check">
            <input name="type" class="form-check-input" type="checkbox" value="sub_account" id="sub_account">
            <label class="form-check-label" for="sub_account">
                Sub Account
            </label>
        </div>
    </div>
   
    <!--=================================-->
    <div id="main_account_div">
    </div>
    <!--=================================-->
    <div class="col-12">
        <label for="account_name">Account Name<span class="text-danger">*</span></label>
        <input type="text" placeholder="Account Name" class="form-control" id="account_name" name="account_name" value="">
    </div>
     <!--=================================-->
     <div class="col-12">
        <label for="account_number">Account Number<span class="text-danger">*</span></label>
        <input type="text" placeholder="Account Number" class="form-control" id="account_number" name="account_number" value="">
    </div>
    <!--=================================-->
  
    <div class="col-12">
        <label for="note">Note</label>
        <textarea class="form-control" placeholder="Note" name="note" id="note"></textarea>
    </div>
    <!--=================================-->
    <?php
}
elseif($request['req'] == "get_main_accounts")
{
    $acc_type = $request['acc_type'];
    $acc_group = $request['acc_group'];
    $main_accounts =  $this->Accounts_model->get_main_accounts_by_acc_type_and_acc_group($acc_type,$acc_group);
    // echo "<pre>";print_r($main_acc);die;
    ?>
    <div class="col-12">
        <div class="dropdown">
        <label for="main_account" class="dropdown-label">Main Account<span class="text-danger">*</span></label>
        <select class="dropdown-select" id="main_account" name="main_account_id">
        <?php if(isset($main_accounts) && !empty($main_accounts)){
            echo "<option value='' >Please Select </option>";
            foreach($main_accounts as $key=>$acc){
            echo "<option value='$acc[id]' >$acc[account_name] </option>";
            }
        }else{ echo "<option value='' >No Data Found </option>"; } ?>
        </select>
        </div>
    </div>
    <?php

}

?>