<div  class="modal-body">
    <div class="col-12">
        <label for="">Name</label>
        <input type="text" placeholder="Name" class="form-control" name="name" value="">
    </div>
    <div class="col-12">
        <div class="dropdown">
        <label for="" class="dropdown-label">Parent account type</label>
        <select class="dropdown-select" name="accountype">
        <?php if(isset($accountTypes)){
            echo "<option value='' >Please Select </option>";
            foreach($accountTypes as $key=>$type){
            echo "<option value='$type[id]' >$type[name] </option>";
            }
        }else{ echo "<option value='' >No Data Found </option>"; } ?>
        </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>