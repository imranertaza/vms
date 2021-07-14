
<style type="text/css">
   .disable{border: solid 0px;font-weight: 600;pointer-events: none;}
   .edit_save_btn{display: none;}
   .websitesettings-tab{background-color: coral;color:#FFFF}
   .packages-tab{background-color: purple;color:#FFFF}
   .packages-subscription-tab{background-color: green;color:#FFFF}
   
    ul.menu-list li {display: inline-block;margin: 0px;text-decoration: none;color: #ffff;
    padding: 0px;margin-top: 20px;}
   ul.menu-list li a {padding: 10px;}
   .active-tab{background-color: #FFF;color: black;}
   ul.menu-list li a:hover{color: #ffff;text-decoration: none;}
</style>
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Package Subscription
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
             <a class="packages-tab" href="<?=base_url('packages/')?>">Packages</a>
           </li>
           <li class="">
             <a class="<?=$this->router->fetch_method() == "subscription" ? "active-tab":"packages-subscription-tab"?>" href="<?=base_url('packages/subscription')?>">Subscription</a>
           </li>
         </ul>
         <div class="row mt-4">
            <div class="col-lg-12">
               <div class="col-lg-12">
                  <button class="btn btn-primary add_new_subscription" style="float: right;">
                     Add  Subscription
                  </button>
               </div>
            </div>
            <div class="col-lg-12" >
               <table  class="table table-packages card-table table-vcenter text-nowrap">
                     <thead>
                        <tr>
                           <?php
                           // userpermission('lr_cust_edit') 
                           if (true) { ?>
                           <th>Action</th>
                           <?php } ?>
                           
                           <th>Company Name</th>
                           <th>Current Package</th>
                           <th>Package</th>
                           
                           <th>Start Date</th>
                           <th>End Date</th>
                           <th>Transcation Id</th>
                           <th>Subscription Added By</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (!empty($packageSubscription)) {
                           $count = 1;
                           foreach ($packageSubscription as $packagelists) {
                               ?>
                        <tr>
                           <td>
                              <div class="btn-group">
                                 <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Actions <span class="caret"></span>
                                 </button>
                                 <div class="dropdown-menu">
                                    <a  class="dropdown-item font-12-px packages-list" data-action="view" data-id="<?=$packagelists['ps_id']?>"><i class="fa fa-eye"
                                       aria-hidden="true"></i>
                                    View
                                    </a>
                                    <?php
                                    // userpermission('lr_cust_edit')
                                     if (true) { ?>
                                    <a 
                                       data-action="edit" data-id="<?=$packagelists['ps_id']?>"
                                       class="dropdown-item font-12-px packages-list"><i class="fa fa-pencil"
                                       aria-hidden="true"></i>
                                    Edit
                                    </a>
                                    <?php } ?>
                                 </div>
                              </div>
                           </td>
                           <td> 
                              <?php echo output($packagelists['ps_company_name']); ?>
                           </td>
                           <td> 
                              <?php echo output($packagelists['ps_current_package']); ?>
                           </td>
                           <td>
                              <?php echo output($packagelists['ps_package']); ?>
                           </td>
                           <td>
                              <?php echo output($packagelists['ps_start_date']); ?>
                           </td>

                           <td>
                              <?php echo output($packagelists['ps_end_date']); ?>
                           </td>
                          

                           <td>
                              <?php echo output($packagelists['ps_transcation_id']); ?>
                           </td>
                           <td>
                             <?php echo output($packagelists['ps_createdby']); ?> 
                           </td>
                          <td>
                             <?php echo output($packagelists['ps_status']); ?> 
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
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header" style="display: block;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Subscription</h4>
         </div>
         <div class="modal-body">
            <div class="row package_info">
               <div class="col-sm-12">
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Date</label>
                        <input type="datetime-local" class="form-control" required="true" value="" id="ps_date" name="ps_date" >
                        <input type="hidden" class="form-control" value="" id="ps_id" name="ps_id" >
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Company Name</label>
                     <input type="text" class="form-control"   id="ps_companyname" name="ps_companyname" value="<?=$company_name?>" placeholder="Company Name" readonly>
                  </div>
               </div>
               
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Current package</label>
                     <input type="text" class="form-control"  value="<?=($packageSubscription ? $packageSubscription[0]['ps_package']:"" );?>" id="ps_current_package" name="ps_current_package" placeholder="current package" readonly>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Current Package Value</label>
                     <input type="text" class="form-control" value="<?=($packageSubscription ? $packageSubscription[0]['ps_package_amount']:"" );?>" id="ps_current_package_value" name="ps_current_package_value" placeholder="Current Package Value" readonly>
                  </div>
               </div> 
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Current Package Period in days</label>
                     <input type="text" class="form-control" value="<?=($packageSubscription ? $packageSubscription[0]['ps_package_period']:"" );?>" id="ps_current_package_periods_in_days" name="ps_current_package_periods_in_days" placeholder="Current Package Period in days" readonly>
                  </div>
               </div> 
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">

                     <label>Package</label>
                     <select class="form-control" id="ps_package" >
                        <option>Select Package</option>
                        <?php if($packages){
                           foreach($packages as $ind => $val){
                              ?>
                                 <option value="<?=$val['p_id']?>" data-package_info='<?=json_encode($val)?>'><?=$val['p_name']?></option>
                              <?php
                           }
                        }?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Currency</label>
                     <input type="text" class="form-control" required="true" value="" id="ps_package_currency" name="ps_package_currency" placeholder="Package Amount" readonly>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Package Amount</label>
                     <input type="text" class="form-control" required="true" value="" id="ps_package_amount" name="ps_package_amount" placeholder="Package Amount" readonly>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Package Period</label>
                     <input type="text" class="form-control" required="true" value="" id="ps_package_period" name="ps_package_period" placeholder="Package Period" readonly>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Start date</label>
                     <input type="date" class="form-control" required="true" value="" id="ps_start_date" name="ps_start_date"   >
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>End date</label>
                     <input type="date" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['ps_end_date'])?$website_setting[0]['ps_end_date']:''); ?>" id="ps_end_date" name="ps_end_date"  readonly>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>trial End date</label>
                     <input type="date" class="form-control" required="true" value="" id="ps_trial_end_date" name="ps_trial_end_date" readonly >
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Transaction ID</label>
                     <input type="text" class="form-control" required="true" value="" id="ps_trans_id" name="ps_trans_id"  >
                  </div>
               </div>

               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Status</label>
                     <select class="form-control" id="ps_status">
                        <option value="approved">Approved</option>
                        <option value="Declined">Declined</option>
                        <option value="Waiting">Waiting</option>
                     </select>
                  </div>
               </div>
            </div> 
         </div>  
         <div class="modal-footer">
            <button class="btn btn-primary pull-right edit_save_btn">update</button>
            <button type="button" class="btn btn-primary save_subscription">save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var sSelectedPackage  = "";
   $( document ).ready(function() {
      
      $(".table-packages").dataTable({
        aaSorting: [[0, 'asc']],
      });

      $( document ).on("click",".packages-list",function(){
         var act = $(this).data('action')
         var id = $(this).data('id')
         
         if( act == "edit"){
            $(".package_info").find(".form-control").removeClass('disable');
            $(".edit_save_btn").show()
            $(".save_subscription").hide()
         }else{
            $(".package_info").find(".form-control").addClass('disable');
            $(".save_subscription,.edit_save_btn").hide()
         }
         
         $.ajax({
           url:'<?=base_url()?>index.php/Packages/viewpackageSubscription',
           method: 'post',
           data: {ps_id: id},
           dataType: 'json',
           success: function(response){
               if(response){

                  var now=new Date(response[0].ps_date)
                  now = new Date(now.getTime()-now.getTimezoneOffset()*60000).toISOString().substring(0,19)

                  $("#ps_id").val(response[0].ps_id);
                  $("#ps_date").val(now)
                  $("#ps_companyname").val(response[0].ps_company_name)
                  $("#ps_current_package").val(response[0].ps_current_package)
                  $("#ps_package").val(response[0].ps_package_id)
                  $("#ps_package_currency").val(response[0].ps_package_currency)
                  $("#ps_package_amount").val(response[0].ps_package_amount)
                  $("#ps_package_period").val(response[0].ps_package_period)
                  $("#ps_start_date").val(response[0].ps_start_date)
                  $("#ps_end_date").val(response[0].ps_end_date)
                  $("#ps_trial_end_date").val(response[0].ps_trial_end_date)
                  $("#ps_trans_id").val(response[0].ps_transcation_id)
                  $("#ps_status").val(response[0].ps_status)
                  $("#ps_current_package_value").val(response[0].ps_current_package_value)
                  $("#ps_current_package_periods_in_days").val(response[0].ps_current_package_periods_in_days)
                  
                  $('#myModal').modal('show');
                  
               }
           }
         });
         //$('#myModal').modal('show');
      });
      $( document ).on("click",".add_new_subscription",function(){
         $('#myModal').modal('show');   
         $(".edit_save_btn").hide()
         $(".save_subscription").show()
         $('#ps_date').val(moment().format('YYYY-MM-DD'))
      });
      $( document ).on("click",".save_subscription",function(){

         var data = {};
         data.ps_date               =  $("#ps_date").val()
         data.ps_company_name       =  $("#ps_companyname").val()
         data.ps_current_package    =  $("#ps_current_package").val()
         data.ps_package            =  $("#ps_package  :selected").text();
         data.ps_package_id         =  $("#ps_package").val()
         data.ps_package_currency   =  $("#ps_package_currency").val()
         data.ps_package_amount     =  $("#ps_package_amount").val()
         data.ps_package_period     =  $("#ps_package_period").val()
         data.ps_start_date         =  $("#ps_start_date").val()
         data.ps_end_date           =  $("#ps_end_date").val()
         data.ps_trial_end_date     =  $("#ps_trial_end_date").val()
         data.ps_transcation_id     =  $("#ps_trans_id").val()
         data.ps_status             =  $("#ps_status").val()
         data.ps_createdby             =  'admin'
         data.ps_current_package_value     =  $("#ps_current_package_value").val()
         data.ps_current_package_periods_in_days =  $("#ps_current_package_periods_in_days").val()
         
         $.ajax({
           url:'<?=base_url()?>index.php/Packages/savepackagesubscription',
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
      $( document ).on("click",".edit_save_btn",function(){

         var data = {};
         data.ps_id               =  $("#ps_id").val()
         data.ps_date               =  $("#ps_date").val()
         data.ps_company_name       =  $("#ps_companyname").val()
         data.ps_current_package    =  $("#ps_current_package").val()
         data.ps_package_id         =  $("#ps_package").val()
         data.ps_package            =  $("#ps_package  :selected").text();
         data.ps_package_currency   =  $("#ps_package_currency").val()
         data.ps_package_amount     =  $("#ps_package_amount").val()
         data.ps_package_period     =  $("#ps_package_period").val()
         data.ps_start_date         =  $("#ps_start_date").val()
         data.ps_end_date           =  $("#ps_end_date").val()
         data.ps_trial_end_date     =  $("#ps_trial_end_date").val()
         data.ps_transcation_id     =  $("#ps_trans_id").val()
         data.ps_status             =  $("#ps_status").val()
         data.ps_current_package_value     =  $("#ps_current_package_value").val()
         data.ps_current_package_periods_in_days =  $("#ps_current_package_periods_in_days").val()

         $.ajax({
           url:'<?=base_url()?>index.php/Packages/updatepackagesubscription',
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
      $( document ).on("change","#ps_package",function(){
         sSelectedPackage = $(this).find(':selected').data('package_info')
         
         $("#ps_package_currency").val(sSelectedPackage.p_currency)
         $("#ps_package_amount").val(sSelectedPackage.p_price)
         $("#ps_package_period").val(sSelectedPackage.p_interval)


         $("#ps_trial_end_date").val(null)
         $("#ps_end_date").val(null)
         $("#ps_start_date").val(null)
      });
      $( document ).on("change","#ps_start_date",function(){
         var stDate = $(this).val()
         var newdate = new Date(stDate);
         newdate.setDate(newdate.getDate() + parseInt(sSelectedPackage.p_interval));
         var nd = moment(newdate).format('YYYY-MM-DD')
         $("#ps_end_date").val(nd)
         
         var newdate = new Date(stDate);
         newdate.setDate(newdate.getDate() + parseInt(sSelectedPackage.p_trial_days));
         var nd = moment(newdate).format('YYYY-MM-DD')

         $("#ps_trial_end_date").val(nd)
         
      });
      
   });
</script>   