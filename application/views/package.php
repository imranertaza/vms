
<style type="text/css">
   .disable{
      border: solid 0px;
      font-weight: 600;
      pointer-events: none;
   }
   .edit_save_btn{
      display: none;
   }
   .websitesettings-tab{background-color: coral;color:#FFFF}
   .packages-tab{background-color: purple;color:#FFFF}
   .packages-subscription-tab{background-color: green;color:#FFFF}
   
    ul.menu-list li {
    display: inline-block;
    margin: 0px;;    text-decoration: none;
    color: #ffff;
    padding: 0px;
    margin-top: 20px;
   }
   ul.menu-list li a {
      padding: 10px;
   }
   .active-tab{
      background-color: #FFF;
      color: black;
   }
   ul.menu-list li a:hover{
      color: #ffff;
      text-decoration: none;
   }
   
</style>
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Package
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
               <li class="breadcrumb-item active">Settings</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         
         <ul class="menu-list m-0 p-0" >
           <li class="">
             <a class="websitesettings-tab" href="<?=base_url('settings/websitesetting')?>">Website settings</a>
           </li>
           <li class="">
             <a class="<?=$this->router->fetch_class() == "packages" ? "active-tab":"packages-tab"?>" href="<?=base_url('packages/')?>">Packages</a>
           </li>
           <li class="">
             <a class="packages-subscription-tab" href="<?=base_url('packages/subscription')?>">Subscription</a>
           </li>
         </ul>
         <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="packages" role="tabpanel" aria-labelledby="packages-tab">
               <form id="addnewpackage" class="basicvalidation" role="form" action="<?=base_url('packages/insertpackage')?>" method="post" class="col-md-6">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Package Name</label>
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['p_name'])?$website_setting[0]['p_name']:''); ?>" id="p_name" name="p_name" placeholder="Enter Package Name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Package Description</label>
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['p_description'])?$website_setting[0]['p_description']:''); ?>" id="p_description" name="p_description" placeholder="Package description">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>No of Customers</label>
                              <input type="number" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['p_no_of_customers'])?$website_setting[0]['p_no_of_customers']:''); ?>" id="p_no_of_customers" name="p_no_of_customers" placeholder="No of customers">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Price Interval</label>
                              <select class="form-control" name="p_price_interval" >
                                 <option value="days">Days</option>
                                 <option value="month">Month</option>
                                 <option value="year">Year</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Interval</label>
                              <input type="text" class="form-control"  

                              required="true" value="<?php echo output(isset($website_setting[0]['p_interval'])?$website_setting[0]['p_interval']:''); ?>" id="p_interval" name="p_interval" placeholder="Package description">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Trial Days</label>
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['p_trial_days'])?$website_setting[0]['p_trial_days']:''); ?>" id="p_trial_days" name="p_trial_days" placeholder="Trial Days">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Price</label>
                              <input type="number" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['p_price'])?$website_setting[0]['p_price']:''); ?>" id="p_price" name="p_price" placeholder="Package Price">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                              <label>Currency</label>
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['p_currency'])?$website_setting[0]['p_currency']:''); ?>" id="p_currency" name="p_currency" placeholder="Package Currency">
                           </div>
                        </div>
                        
                        <div id="addnewcategory_submit" class="col-sm-6 col-md-4">
                           <button type="submit" class="btn btn-primary m-4 pull-right">Submit</button>
                        </div>
                     </div>
                  </div>
               </form>
               <section class="content">
                  <div class="container-fluid">
                     <div class="card">
                        <div class="card-body p-0">
                           <div class="table-responsive">
                              
                              <table class="table table-packages card-table table-vcenter text-nowrap">
                                 <thead>
                                    <tr>

                                       <?php
                                       // userpermission('lr_cust_edit') 
                                       if (true) { ?>
                                       <th>Action</th>
                                       <?php } ?>
                                       <th class="w-1">Package Name</th>
                                       <th>Package Description</th>
                                       <th>No of Customers</th>
                                       <th>Price Interval</th>
                                       <th>Package Interval</th>
                                       <th>Price</th>
                                       <th>Currency</th>
                                       <th>Currency</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if (!empty($packagelist)) {
                                       $count = 1;
                                       foreach ($packagelist as $packagelists) {
                                           ?>
                                    <tr>
                                       <td>
                                          <div class="btn-group">
                                             <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             Actions <span class="caret"></span>
                                             </button>
                                             <div class="dropdown-menu">
                                                <a  class="dropdown-item font-12-px packages-list" data-action="view" data-id="<?=$packagelists['p_id']?>"><i class="fa fa-eye"
                                                   aria-hidden="true"></i>
                                                View
                                                </a>
                                                <?php
                                                // userpermission('lr_cust_edit')
                                                 if (true) { ?>
                                                <a 
                                                   data-action="edit" data-id="<?=$packagelists['p_id']?>"
                                                   class="dropdown-item font-12-px packages-list"><i class="fa fa-pencil"
                                                   aria-hidden="true"></i>
                                                Edit
                                                </a>
                                                <?php } ?>
                                             </div>
                                          </div>
                                       </td>
                                       <td> 
                                          <?php echo output($packagelists['p_name']); ?>
                                       </td>
                                       <td> 
                                          <?php echo output($packagelists['p_description']); ?>
                                       </td>
                                       <td> <?php echo output($packagelists['p_no_of_customers']); ?></td>
                                       <td><?php echo output($packagelists['p_price_interval']); ?>
                                       </td>
                                       <td>
                                          <?php echo output($packagelists['p_interval']); ?>
                                       </td>
                                       <td>
                                          <?php echo output($packagelists['p_price']); ?>
                                       </td>
                                       <td>
                                          <?php echo output($packagelists['p_currency']); ?>
                                       </td>
                                       <td>
                                          <span class="badge <?php echo ($packagelists['p_isactive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($packagelists['p_isactive'] == '1') ? 'Active' : 'Inactive'; ?>
                                          </span>
                                       </td>
                                    </tr>
                                    <?php }
                                       } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>   
         <!-- <div class="card-header">
            
            <h3 class="card-title">Website Setting</h3>
         </div> -->

      
      </div>
   </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Package Details</h4>
      </div>
      <div class="modal-body">
        <table class="table package_info">
           <thead>
              <tr>
                  <th>Package Name</th>
                  <th>
                     <input type="text" id="p_namee" class="form-control disable">
                     <input type="hidden" id="p_idd" >
                  </th>
               </tr>
               <tr>
                  <th>Package Description</th>
                  <th >
                     <input type="text" id="p_desc" class="form-control disable">
                  </th>
               </tr>
               <tr>
                  <th>Number of Customers</th>
                  <th>
                     <input type="number" id="p_no_of_cust" class="form-control disable">
                  </th>
               </tr>
               <tr>
                  <th>Package Price Interval</th>
                  <th >
                     <select id="p_price_int" class="form-control disable">
                        <option value="days">Days</option>
                        <option value="month">Month</option>
                        <option value="year">Year</option>
                     </select>
                     
                  </th>
               </tr>
               <tr>
                  <th>Package  Interval</th>
                  <th >
                        <input type="text" id="p_int" class="form-control disable">
                  </th>
               </tr>
               <tr>
                  <th>Package Trial Days</th>
                  <th >
                     <input type="text" id="p_trial_day" class="form-control disable">
                  </th>
               </tr>
               <tr>
                  <th>Package Currency</th>
                  <th >
                     <input type="text" id="p_curr" class="form-control disable">
                  </th>
               </tr>
               <tr>
                  <th>Package Price</th>
                  <th >
                     <input type="text" id="p_pricee" class="form-control disable">
                  </th>
               </tr>
               <tr>
                  <th>Package Status</th>
                  <th >
                     <select id="p_status" class="form-control disable">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                     </select>
                  </th>
               </tr>
               <tr class="edit_save_btn">
                  <th colspan="2">
                     <button class="btn btn-primary pull-right save_edit">Save</button>
                  </th>
               </tr>
               
           </thead> 
           
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
   
   $( document ).ready(function() {
      
      //var url = window.location.href 
      //var activeTab = url.substr(url.indexOf("#") + 1);
      //$('a[href="#'+activeTab+'"]').click()

      $(".table-packages").dataTable({
        aaSorting: [[0, 'asc']],
      });

      //$('#myModal').modal('show');
      // Handler for .ready() called.
      $( document ).on("click",".packages-list",function(){
         var act = $(this).data('action')
         var id = $(this).data('id')
         
         if( act == "edit"){
            $(".package_info").find(".form-control").removeClass('disable');
            $(".edit_save_btn").show()
         }else{
            $(".package_info").find(".form-control").addClass('disable');
            $(".edit_save_btn").hide()
         }
         
         $.ajax({
           url:'<?=base_url()?>index.php/Packages/viewpackage',
           method: 'post',
           data: {pid: id},
           dataType: 'json',
           success: function(response){
               console.log(response[0])
               if(response){

                  $("#p_idd").val(response[0].p_id)
                  $("#p_namee").val(response[0].p_name)
                  $("#p_desc").val(response[0].p_description)
                  $("#p_no_of_cust").val(response[0].p_no_of_customers)
                  $("#p_price_int").val(response[0].p_price_interval)
                  $("#p_int").val(response[0].p_interval)
                  $("#p_trial_day").val(response[0].p_trial_days)
                  $("#p_curr").val(response[0].p_currency)
                  $("#p_pricee").val(response[0].p_price)
                  $("#p_status").val(response[0].p_isactive)

                  $('#myModal').modal('show');
               }
           }
         });
         //$('#myModal').modal('show');
      });
      $( document ).on("click",".save_edit",function(){

         var data = {};
         data.p_id    = $("#p_idd").val()
         data.p_name = $("#p_namee").val()
         data.p_description = $("#p_desc").val()
         data.p_interval    = $("#p_int").val()
         data.p_trial_days  = $("#p_trial_day").val()
         data.p_currency    = $("#p_curr").val()
         data.p_price       = $("#p_pricee").val()
         data.p_isactive    = $("#p_status").val()
         data.p_no_of_customers = $("#p_no_of_cust").val()
         data.p_price_interval  = $("#p_price_int").val()

         $.ajax({
           url:'<?=base_url()?>index.php/Packages/updatepackage',
           method: 'post',
           data: data,
           dataType: 'json',
           success: function(response){

               if(response){
                  location.reload();
               }
           }
         });
         
         

      });
      
   });
</script>   