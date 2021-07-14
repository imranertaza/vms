<?php
if($current_account_type['type']  == "parent"){
    ?>
    <div  class="modal-body">
        <div class="col-12">
            <label for="">Name</label>
            <input type="text"  placeholder="Name" class="form-control" name="name" value="<?= $current_account_type['name']; ?>">
            <input type="hidden" name="type" value="parent">
            <input type="hidden" name="id" value="<?= $current_account_type['id']; ?>">
        </div>
    </div">
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    <?php
}else{
    ?>
    <div  class="modal-body">
        <div class="col-12">
            <label for="">Name</label>
            <input type="text" placeholder="Name" class="form-control" name="name" value="<?= $current_account_type['child_name']; ?>">
            <input type="hidden" name="type" value="child">
            <input type="hidden" name="id" value="<?= $current_account_type['id']; ?>">

        </div>
        <div class="col-12">
            <div class="dropdown">
            <label for="" class="dropdown-label">Please Select</label>
            <select class="dropdown-select" name="accountype">
            <?php if(isset($account_types)){
                foreach($account_types as $key=>$type){
                    $selected =  ($type['id'] == $current_account_type['parent_id']) ? "selected" : "";
                    echo "<option $selected  value='$type[id]' >$type[name] </option>";
                }
            } ?>
            </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    <?php
}

?>