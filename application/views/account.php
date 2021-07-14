<style media="screen">
/* .my-btn-group a { padding:2px; } */
hr.new {
  border: 1px solid lightblue;
  border-radius: 1px;
}
  ul li { 
    list-style-type: none;
  }

  .tab-icons{
    margin-right: 10px;
  }
  .dropdown{
    margin-top: 20px;
  }
  .dropdown-button{
    width: 100%;
    text-align: left;
    background: white;
    color: black;
  }
  .dropdown-toggle::after{
    float: right;
margin-top: 13px;
  }
  .dropdown-label{
    display: block;
  }
  .dropdown-select{
    width: 100%;
height: 38px;
border: 1px solid lightgray;
  }
  .table-responsive,
    .dataTables_scrollBody {
        overflow: visible !important;
    }
    
  
</style>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Account module
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Accounting</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="accounts nav-link active" id="home-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-book tab-icons"></i>Accounts</a>
  </li>
  <li class="nav-item">
    <a class="accounttypes nav-link" id="profile-tab" data-toggle="tab" href="#accounttypes" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-bars tab-icons"></i>Account Types</a>
  </li>
  <li class="nav-item">
    <a class="accountgroups nav-link" id="contact-tab" data-toggle="tab" href="#accountgroups" role="tab" aria-controls="contact" aria-selected="false"><i class="far fa-object-group tab-icons"></i>Account Groups</a>
  </li>
  <li class="nav-item">
    <a class="accountsettings nav-link" id="contact-tab" data-toggle="tab" href="#accountsettings" role="tab" aria-controls="contact" aria-selected="false"><i class="far fa-object-group tab-icons"></i>Account Settings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="far fa-object-group tab-icons"></i>List Deposits & Transfers</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="accounts" role="tabpanel" aria-labelledby="home-tab">
    <section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          <div class="row mt-4">
              <div class="col-12">
                <button type="button" class="add-account btn btn-info float-right mr-2" data-toggle="modal" data-target="#accounts-add" name="button"><i class="fas fa-plus mr-2"></i>Add</button>
                <button type="button" class="btn btn-warning float-right mr-4" name="button"><i class="fas fa-money-bill-alt mr-2" style="color:white;"></i>Card Deposit</button>
                <button type="button" class="btn btn-info float-right mr-4" name="button"><i class="fas fa-id-card mr-2"></i>Cheque Deposit</button>
                <button type="button" class="btn btn-success float-right mr-4" name="button"><i class="fas fa-money-bill-alt mr-2"></i>Cash Deposit</button>
              </div>
          </div>
          <hr class="new">
          <div class="card-body p-0 ml-2 mr-2">
            <div class="row mt-4">
              <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="filter_account_type">Account Type:</label>
                    <select id="filter_account_type" name="filter_account_type" class="form-control">
                      <?php
                      if(isset($accountTypes) && !empty($accountTypes)){
                        echo "<option value=''>Plase Select</option>";
                        foreach($accountTypes as $at){
                          echo "<option value='$at[id]'>$at[name]</option>";

                        }
                      }else{
                        echo "<option value=''>No Data Found</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="filter_account_sub_type">Account Sub Type:</label>
                    <select disabled id="filter_account_sub_type" name="filter_account_sub_type" class="form-control">
                      <option selected>Please Select</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="filter_account_group">Account Group:</label>
                    <select disabled id="filter_account_group" name="filter_account_group" class="form-control">
                      <option value="">Please Select</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="filter_account_name">Account Name:</label>
                    <select id="filter_account_name" name="filter_account_name" class="form-control">
                    <?php
                    if(isset($main_acc_contain_sub_acc) && !empty($main_acc_contain_sub_acc)){
                      echo "<option value=''>Plase Select</option>";
                      foreach($main_acc_contain_sub_acc as $main){
                        
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
                    ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

         <!---->
         <div class="table-responsive">
            <table id="accountstbl"  class="table card-table table-vcenter">
                <thead>
                  <tr>
                      <th>Account Name</th>
                      <th>Main Account</th>
                      <th>Account Sub Type</th>
                      <th>Account Group</th>
                      <th>Account Number</th>
                      <th>Balance</th>
                      <th>Added By</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($accounts)){
                  foreach($accounts as $account){
                    ?>
                    <tr>
                      <td><?= $account['account_name']; ?></td>
                      <td><?= (is_array($account['main_account'])) ? $account['main_account']['account_name'] : " - "; ?></td>
                      <td><?= (is_array($account['child_account_type'])) ? $account['child_account_type']['child_name'] : ""; ?></td>
                      <td><?= (is_array($account['account_group'])) ? $account['account_group']['name'] : ""; ?></td>
                      <td><?= $account['account_number']; ?></td>
                      <td>No BALANCE</td>
                      <td><?= (is_array($account['account_added_by'])) ? $account['account_added_by']['u_name'] : ""; ?></td>
                      
                      <!--<td>-->
                      <!--  <table class="table">-->
                      <!--    <tr>-->
                      <!--      <td><a class="edit-acc icon btn-sm btn-primary"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-edit"> Edit</i></a></td>-->
                      <!--      <td><a class="icon btn-sm btn-warning"  href="<?= base_url();?>Account/account_book/<?= $account['id'];?>"><i class="fa fa-book"> Account Book</i></a></td>-->
                      <!--      <td><a class="icon btn-sm btn-info"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-exchange"> Transfer</i></a></td>-->
                      <!--      <td><a class="icon btn-sm btn-success"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-get-pocket"> Deposit</i></a></td>-->
                      <!--    </tr>-->
                      <!--    <tr>             -->
                      <!--      <td><a class="icon btn-sm btn-danger" href="<?= base_url();?>Account/delete_account/<?= $account['id'];?>"><i class="fa fa-close"></i> Close</a></td>-->
                      <!--      <td><a class="icon btn-sm btn-light" href="javascript:void(0)"><i class="fa fa-sticky-note-o"></i> Notes</a></td>-->
                      <!--      <td><a class="icon btn-sm btn-success" href="javascript:void(0)"><i class="fa fa-check"></i> Enabled</a></td>-->
                      <!--      <td></td>-->
                      <!--    </tr>-->
                      <!--  </table>  -->
                      <!--</td>-->
                      <td>
                          <div>
                            <span>
                                <a class="edit-acc icon btn-sm btn-primary"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-edit"> Edit</i></a>
                            </span>
                            <span>
                                <a class="icon btn-sm btn-warning"  href="<?= base_url();?>Account/account_book/<?= $account['id'];?>"><i class="fa fa-book"> Account Book</i></a>
                            </span>
                            <span>
                                <a class="icon btn-sm btn-info"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-exchange"> Transfer</i></a>
                            </span>
                            <span>
                                <a class="icon btn-sm btn-success"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-get-pocket"> Deposit</i></a>
                            </span>
                          </div>
                          <div class="mt-2">             
                            <span>
                                <a class="icon btn-sm btn-danger" href="<?= base_url();?>Account/delete_account/<?= $account['id'];?>"><i class="fa fa-close"></i> Close</a>
                            </span>
                            <span>
                                <a class="icon btn-sm btn-light" href="javascript:void(0)"><i class="fa fa-sticky-note-o"></i> Notes</a>
                            </span>
                            <span>
                                <a class="icon btn-sm btn-success" href="javascript:void(0)"><i class="fa fa-check"></i> Enabled</a>
                            </span>
                            <span>
                            </span>
                            </td>
                          </div>  
                      </td>
                      
                  </tr>
                    <?php
                  }                  
                }
                
                ?>
                </tbody>
            </table>

          </div>
          <!---->
        </div>
        <!-- /.card-body -->
      </div>

             </div>
    </section>
  </div>
  <div class="tab-pane fade" id="accounttypes" role="tabpanel" aria-labelledby="profile-tab">
    <section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          <div class="row mt-4">
              <div class="col-12">
                <button type="button" class="add-acc-type btn btn-info float-right mr-2"  name="button"><i class="fas fa-plus mr-2"></i>Add</button>
              </div>
          </div>

         <div class="table-responsive">
                    <table class="table card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        <?php if (isset($accountTypes) && !empty($accountTypes)): ?>
                        <?php foreach($accountTypes as $accType){
                          ?>
                          <tr>
                           <td>
                            <ul>
                              <li><b><?= $accType['name'];?></b></li>
                              <?php
                              if(is_array($accType['children'])){
                                ?>
                                <li>
                                  <ul>
                                    <?php
                                    foreach($accType['children'] as $child){
                                      ?>
                                      <li class="mt-2">- <?= $child['child_name']; ?>
                                        <span class="float-right">
                                        <a class="edit-acc-type icon btn-sm btn-info" type="child" self="<?= $child['id'];?>" href="javascript:void(0)"><i class="fa fa-edit"> Edit</i></a>
                                        &nbsp;  &nbsp;
                                        <a class="icon btn-sm btn-danger" href="<?= base_url();?>Account/delete_account_type/<?= $child['id'];?>/child"><i class="fa fa-trash"></i> Delete</a>
                                        </span>
                                      </li>
                                      <?php
                                    }
                                    
                                    ?>
                                  </ul>
                                </li>
                                <?php
                              }
                              ?>
                              

                            </ul>
                           
                           </td>
                             <td>
                                <a class="edit-acc-type icon" type="parent" self="<?= $accType['id'];?>" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                &nbsp;  &nbsp;
                                <a class="icon" href="<?= base_url();?>Account/delete_account_type/<?= $accType['id'];?>/parent"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>
                          <?php
                        }?>
                        <?php endif; ?>
                        
                      </tbody>
                    </table>

        </div>
        </div>
        <!-- /.card-body -->
      </div>
  </div>
    </section>
  </div>
  
  <div class="accountgroups tab-pane fade" id="accountgroups" role="tabpanel" aria-labelledby="contact-tab">
  <section class="content">
      <div class="container-fluid">
         <div class="card">

          <div class="card-body p-0">
            <div class="row mt-4">
              <div class="col-12">
                <button type="button" class="add-acc-group btn btn-info float-right mr-2"  name="button"><i class="fas fa-plus mr-2"></i>Add</button>
              </div>
            </div>

            <div class="card-body p-0">
              <div class="row mt-4">
                <div class="col-12">
                  <!---->
                  <div class="table-responsive">
                    <table id="accountgroupstbl"  class="table card-table table-vcenter text-nowrap">
                        <thead>
                          <tr>
                              <th>Name</th>
                              <th>Account Type Name</th>
                              <th>Sub Account Type</th>
                              <th>Note</th>
                              <th>Action</th>
                              
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(isset($accountgroups) && !empty($accountgroups)){
                            foreach($accountgroups as $accgroup){
                              ?>
                              <tr>
                                <td><?= $accgroup['name']; ?></td>
                                <td>
                                  <?= $accgroup['child_account_type']['parent_name']; ?>
                                </td>
                                <td>
                                  
                                        <?= $accgroup['child_account_type']['child_name']; ?>
                                </td>
                                <td><?= $accgroup['note']; ?></td>
                                <td>
                                  <a class="edit-acc-group icon btn-sm btn-info"  self="<?= $accgroup['id'];?>" href="javascript:void(0)"><i class="fa fa-edit"> Edit</i></a>
                                  &nbsp;  &nbsp;
                                  <a class="icon btn-sm btn-danger" href="<?= base_url();?>Account/delete_account_group/<?= $accgroup['id'];?>"><i class="fa fa-trash"></i> Delete</a>
                                </td>

                            </tr>
                              <?php
                            }
                          }
                          ?>
                         
                        </tbody>
                    </table>

                  </div>
                  <!---->


                </div>
              </div>
            </div>

            
            <!--Table responsive will be here-->
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </section>
  </div>
  <div class="tab-pane fade" id="accountsettings" role="tabpanel" aria-labelledby="contact-tab">
  <section class="content">
      <div class="container-fluid">
       <div class="card">
        <div class="card-body p-0">
        
          <div class="card-body p-0 ml-2 mr-2">
            <div class="row mt-4">
              <div class="col-12">
              <form action="<?= base_url()?>Account/add_account_setting" method="POST">
                <div class="form-row">
                
                  <div class="form-group col-md-3">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="settings-acc-group">Account Group:</label>
                    <select id="settings-acc-group" name="acc_group_id" class="form-control">
                      <option value="">Please Select</option>
                      <?php
                      if(isset($accountgroups) && !empty($accountgroups)){
                        foreach($accountgroups as $accgroup){
                          echo "<option value='$accgroup[id]'>$accgroup[name]</option>";
                        }
                      }else{
                        echo "<option>No Data Found</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="settings-acc">Account:</label>
                    <select disabled id="settings-acc" name="account_id" class="form-control">
                      <option>Please Select</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="amount">Amount:</label>
                    <input type="number" name="amount" id="amount" placeholder="Amount" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="float-right btn btn-info">Save</button>
                  </div>
                  
                </div>
                </form>
              </div>
            </div>
          </div>
          

         <!---->
         <div class="table-responsive">
            <table id="accsettingstbl"  class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                      <th>Date</th>
                      <th>Account Group</th>
                      <th>Account</th>
                      <th>Amount</th>
                      <th>Added By</th>
                   
                      
                      <th>Action</th>
                      
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>Date</td>
                      <td>Account Group</td>
                      <td>Account</td>
                      <td>Amount</td>
                      <td>Added By</td>
                   
                      
                      <td>
                        <a class="icon" href="<?php echo base_url(); ?>drivers/editdriver/">
                        <i class="fa fa-edit"></i>
                        </a>
                      </td>
                      
                  </tr>
                 
                </tbody>
            </table>

          </div>
          <!---->
        </div>
        <!-- /.card-body -->
      </div>

             </div>
    </section>
  
  </div>
</div>

<!-- MODAL  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalTitle">Add account type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="myModalForm" method="post" action="">
          <!--Code will be here via ajax-->
      </form>
    </div>
  </div>
</div>
<!-- END MODAL  -->

<!-- /.content -->


<script type="text/javascript">
$(document).on("click",".add-acc-type",function(e){
  $.get("<?= base_url()?>Account/ajax_add_account_type",function(data, status){
    if(status == "success"){
      $("#myModalTitle").html("Add Account Type");
      $("#myModalForm").attr("action","<?php echo base_url()?>Account/add_account_type")
      $("#myModalForm").html(data);
      $('#myModal').modal('show'); 
    }
  });
})

$(document).on("click",".add-acc-group",function(e){
  $.get("<?= base_url()?>Account/ajax_add_account_group",function(data, status){
    if(status == "success"){
      $("#myModalTitle").html("Add Account Group");
      $("#myModalForm").attr("action","<?php echo base_url()?>Account/add_account_group")
      $("#myModalForm").html(data);
      $('#myModal').modal('show'); 
    }
  });
})

$(document).on("click","a.edit-acc-group",function(e){
  let id = $(this).attr("self");
  $.get("<?= base_url()?>Account/ajax_edit_account_group",{
    id: id
  },function(data, status){
    if(status == "success"){
      $("#myModalTitle").html("Edit Account Group");
      $("#myModalForm").attr("action","<?= base_url()?>Account/update_account_group")
      $("#myModalForm").html(data);
      $('#myModal').modal('show'); 
    }
  });
})

$(document).on("click","a.edit-acc-type",function(e){
  let type = $(this).attr("type");
  let id = $(this).attr("self");
  $.get("<?= base_url()?>Account/ajax_edit_account_type",{
    acc_type: type,
    acc_type_id: id
  },function(data, status){
    if(status == "success"){
      $("#myModalTitle").html("Edit Account Type");
      $("#myModalForm").attr("action","<?= base_url()?>Account/update_account_type")
      $("#myModalForm").html(data);
      $('#myModal').modal('show'); 
    }
  });
})

$(document).on("click",".add-account",function(e){
  $.get("<?= base_url()?>Account/ajax_add_account",function(data, status){
    if(status == "success"){
      $("#myModalTitle").html("Add Account");
      $("#myModalForm").attr("action","<?php echo base_url()?>Account/add_account")
      $("#myModalForm").html(data);
      $('#myModal').modal('show'); 
    }
  });
})

$(document).on("click","a.edit-acc",function(e){
  let id = $(this).attr("self");
  $.get("<?= base_url()?>Account/ajax_edit_account",{
    id: id
  },function(data, status){
    if(status == "success"){
      $("#myModalTitle").html("Edit Account");
      $("#myModalForm").attr("action","<?= base_url()?>Account/update_account")
      $("#myModalForm").html(data);
      $('#myModal').modal('show'); 
    }
  });
})

function loadDT(selector){
  $(selector).DataTable({
      "bLengthChange": false,
      "pageLength" : 5,
      "bInfo": false,
      "ordering": false
  });
}

function exportDT(selector){
  $(selector).DataTable({
      "bInfo": false,
      "ordering": false,
      dom: 'Blfrtip', //Blfrtip //bInfo //dom: 'Bfrtip',
      buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]
  });
}

$(document).on("click","a.accountgroups",function(){
  if($(this).attr('dt-status') !="loaded"){
    $(this).attr('dt-status',"loaded");
    exportDT("#accountgroupstbl");
  }
})


$(document).on("click","",function(){
  if($(this).attr('dt-status') !="loaded"){
 
  }
})

function set_default_filter_account_name(){
  $.get("<?= base_url()?>Account/ajax_account_filters",{
        request: 'get_main_accounts_containing_sub_accounts',
    },function(data, status){
      if(status == "success"){
        $("#filter_account_name").html(data);
      }
    });

}

$(document).on("change","#filter_account_type",function(){
    $("#filter_account_group").prop( "disabled", true );
    $("#filter_account_group").prop('selectedIndex', 0); 
    set_default_filter_account_name();

  if($(this).val() != ""){
    $("#filter_account_sub_type").prop( "disabled", false );
    let id =  $(this).val();
    $.get("<?= base_url()?>Account/ajax_account_filters",{
        request: 'get_child_account_types_by_parent_id',
        parent_id: id
    },function(data, status){
      if(status == "success"){
        $("#filter_account_sub_type").html(data);
      }
    });
  }else{
    $("#filter_account_sub_type").prop( "disabled", true );
    $("#filter_account_sub_type").prop('selectedIndex', 0);

    $("#filter_account_group").prop( "disabled", true );
    $("#filter_account_group").prop('selectedIndex', 0);
    
    set_default_filter_account_name();
  }
  
})


$(document).on("change","#filter_account_sub_type",function(){
  set_default_filter_account_name();
  if($(this).val() != ""){
    $("#filter_account_group").prop( "disabled", false );
    let id =  $(this).val();
    $.get("<?= base_url()?>Account/ajax_account_filters",{
        request: 'get_account_groups_by_child_account_type_id',
        child_id: id
    },function(data, status){
      if(status == "success"){
        $("#filter_account_group").html(data);
      }
    });
  }else{
    
    $("#filter_account_group").prop( "disabled", true );
    $("#filter_account_group").prop('selectedIndex', 0);

    set_default_filter_account_name();
  }
  
})

$(document).on("change","#filter_account_group",function(){
  if($(this).val() != ""){
    let id =  $(this).val();
    let type = $("#filter_account_sub_type").val();
    $.get("<?= base_url()?>Account/ajax_account_filters",{
        request: 'get_accounts_by_acc_type_and_acc_group',
        acc_type: type,
        acc_group: id 
    },function(data, status){
      if(status == "success"){
        // alert(data);
        $("#filter_account_name").html(data);
      }
    });
  }else{
    set_default_filter_account_name();
  }
  
})

$(document).on("change","#settings-acc-group",function(){
  if($(this).val() != ""){
    $("#settings-acc").prop( "disabled", false );
    let id =  $(this).val();
    $.get("<?= base_url()?>Account/ajax_account_filters",{
        request: 'get_accounts_by_acc_group',
        acc_group: id 
    },function(data, status){
      if(status == "success"){
        // alert(data);
        $("#settings-acc").html(data);
      }
    });
  }else{
    $("#settings-acc").prop( "disabled", true );
    $("#settings-acc").prop('selectedIndex', 0);
  }
  
})





$(document).ready(function(){
     $('.sidebar-mini').addClass('sidebar-collapse');    
  $("a.accounts").trigger('click');
  $("a.accounts").attr('dt-status',"loaded");
  exportDT("#accountstbl");
  exportDT("#accsettingstbl");
  accsettingstbl

})

</script>
