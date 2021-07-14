<?php //echo "<pre>";print_r($main_accounts);die;?>
<div  class="modal-body">
    <div class="col-12">
        <div class="dropdown">
        <label for="account_type" class="dropdown-label">Account Type<span class="text-danger">*</span></label>
        <select class="dropdown-select" id="account_type" name="child_account_type_id">
        <?php if(isset($accountTypes)){
            echo "<option value='' >Please Select </option>";
            foreach($accountTypes as $key=>$type){
                echo "<optgroup label='$type[name]'>";
                if(is_array($type['children'])){
                    foreach($type['children'] as $child){
                        $selected = ($child['id'] == $current_account['child_account_type_id']) ? "selected" : "" ;
                        echo "<option $selected value='$child[id]' >$child[child_name] </option>";
                    }
                }
                echo "</optgroup>";
            }
        }else{ echo "<option value='' >No Data Found </option>"; } ?>
        </select>
        <input type="hidden" name="id" value="<?= $current_account['id']?>">
        </div>
    </div>
    <!--============================-->
    <div id="main_conditional_data">
        <!--================================-->
     <div class="col-12">
        <div class="dropdown">
        <label for="account_group" class="dropdown-label">Account Group<span class="text-danger">*</span></label>
        <select class="dropdown-select" id="account_group" name="account_group_id">
        <?php if(isset($groups) && !empty($groups)){
            echo "<option value='' >Please Select </option>";
            foreach($groups as $key=>$group){
                $selected = ($group['id'] == $current_account['account_group_id']) ? "selected" : "" ;
                echo "<option $selected value='$group[id]' >$group[name] </option>";
            }
        }else{ echo "<option value='' >No Data Found </option>"; } ?>
        </select>
        </div>
    </div>
    <!--=================================-->
    <div class="col-12 mt-1">
        <div class="form-check">
        <?php
         $sub = ($current_account['account_level'] == "sub_account") ? "checked" : "" ;
         $main = ($current_account['account_level'] == "main_account") ? "checked" : "" ;
        ?>
            <input <?= $main; ?> name="type" class="form-check-input" type="checkbox" value="main_account" id="main_account">
            <label  class="form-check-label" for="main_account">
                Main Account (cannot add amount to this level accounts)
            </label>
            </div>
            <div class="form-check">
            <input <?= $sub; ?> name="type" class="form-check-input" type="checkbox" value="sub_account" id="sub_account">
            <label class="form-check-label" for="sub_account">
                Sub Account
            </label>
        </div>
    </div>
   
    <!--=================================-->
    <div id="main_account_div">
    <?php
    if(!empty($sub)){
        ?>
        <div class="col-12">
            <div class="dropdown">
            <label for="main_account" class="dropdown-label">Main Account<span class="text-danger">*</span></label>
            <select class="dropdown-select" id="main_account" name="main_account_id">
            <?php if(isset($main_accounts) && !empty($main_accounts)){
                echo "<option value='' >Please Select </option>";
                foreach($main_accounts as $key=>$acc){
                    $selected = ($acc['id'] == $current_account['main_account_id']) ? "selected" : "" ;
                    echo "<option $selected value='$acc[id]' >$acc[account_name] </option>";
                }
            }else{ echo "<option value='' >No Data Found </option>"; } ?>
            </select>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <!--=================================-->
    <div class="col-12">
        <label for="account_name">Account Name<span class="text-danger">*</span></label>
        <input type="text" placeholder="Account Name" class="form-control" id="account_name" name="account_name" value="<?= $current_account['account_name']; ?>">
    </div>
     <!--=================================-->
     <div class="col-12">
        <label for="account_number">Account Number<span class="text-danger">*</span></label>
        <input type="text" placeholder="Account Number" class="form-control" id="account_number" name="account_number" value="<?= $current_account['account_number']; ?>">
    </div>
    <!--=================================-->
  
    <div class="col-12">
        <label for="note">Note</label>
        <textarea class="form-control" placeholder="Note" name="note" id="note"><?= $current_account['note']; ?></textarea>
    </div>
    <!--=================================-->
    
    
    </div> 
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script>

$(document).on("change","#account_type",function(){
    if($(this).val() !=""){
        let request = "get_data_by_account_type";
        let child_id = $(this).val();
        $.get("<?= base_url()?>Account/ajax_edit_account_details",{
            req: request,
            child_acc_type_id: child_id
        },function(data, status){
            if(status == "success"){
                $("#main_conditional_data").html(data);
            }
        });
    }else{
        $("#main_conditional_data").html('');
    }

})

$(document).on("change","#account_group",function(){
    if($('.form-check-input:checked').val() == "sub_account"){
        let request = "get_main_accounts";
        let acctype = $("#account_type").val();
        let accgroup = $("#account_group").val();
        $.get("<?= base_url()?>Account/ajax_edit_account_details",{
            req: request,
            acc_type: acctype,
            acc_group: accgroup
        },function(data, status){
            if(status == "success"){
                $("#main_account_div").html(data);
            }
        });
        
    }
})
$(document).on("click",".form-check-input",function(){
    $(".form-check-input").prop('checked', false);
    $(this).prop('checked', true);
    if($(this).attr("id") == "sub_account"){
        let request = "get_main_accounts";
        let acctype = $("#account_type").val();
        let accgroup = $("#account_group").val();
        $.get("<?= base_url()?>Account/ajax_edit_account_details",{
            req: request,
            acc_type: acctype,
            acc_group: accgroup
        },function(data, status){
            if(status == "success"){
                $("#main_account_div").html(data);
            }
        });
       

    }else{
        $("#main_account_div").html('');
    }
})
</script>