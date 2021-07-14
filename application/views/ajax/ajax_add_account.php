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
                        echo "<option value='$child[id]' >$child[child_name] </option>";
                    }
                }
                echo "</optgroup>";
            }
        }else{ echo "<option value='' >No Data Found </option>"; } ?>
        </select>
        </div>
    </div>
    <!--============================-->
    <div id="main_conditional_data">
    
    
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
        $.get("<?= base_url()?>Account/ajax_add_account_details",{
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
        $.get("<?= base_url()?>Account/ajax_add_account_details",{
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
        $.get("<?= base_url()?>Account/ajax_add_account_details",{
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