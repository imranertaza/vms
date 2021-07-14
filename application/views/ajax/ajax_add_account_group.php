<div  class="modal-body">
    <div class="col-12">
        <label for="name">Name<span class="text-danger">*</span></label>
        <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="">
    </div>
    <div class="col-12">
        <div class="dropdown">
        <label for="accounttype" class="dropdown-label">Account Type<span class="text-danger">*</span></label>
        <select id="accounttype" class="dropdown-select" name="accountype">
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
    <div class="col-12">
        <label for="note">Note</label>
        <textarea id="note" name="note" class="form-control"></textarea>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>