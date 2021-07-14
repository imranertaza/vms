
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings
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
         <div class="card-header">
            <h4>Active Subscriptions</h4>
         </div>
         
         <div class="row m-2">

            <?php
               if($activePackages){
                  foreach($activePackages as $ind => $values){
                     ?>
                        <div class="col-md-3">
                           <div class="card">
                              <div class="card-header bg-success open-details" style="    cursor: pointer;">
                                 <h6><?=$values['ps_package']?><i class="fa fa-angle-down  pull-right"></i></h6>

                              </div>
                              <div class="card-body collapse">
                                 <p class="card-text">
                                    <div>
                                <label>Package Description</label>:
                                <?=$values['p_description']?>
                            </div>
                            <div>
                                <label>Package End Date</label>:
                                <?=$values['ps_end_date']?>
                            </div>
                            <div>
                                <label>Package Trial End Date</label>:
                                <?=$values['ps_trial_end_date']?>
                            </div>
                            <div>
                                <label>No of Customers</label>:
                                <?=$values['p_no_of_customers']?>
                            </div>
                            <div>
                                <label>Package Price</label>:
                                <?=$values['p_price']?>
                            </div>
                            <div>
                                <label>Package Currency</label>:
                                <?=$values['p_currency']?>
                            </div>
                                 </p>
                              </div>
                           </div>
                        </div>
                     <?php
                  }
               } 
            ?>
         </div>
         <div class="row mt-4">
            
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
                           <th>Status</th>
                           <th>Start Date</th>
                           <th>End Date</th>
                           <th>Transcation Id</th>
                           <th>Subscription Added By</th>
                           
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (!empty($packages_subscription)) {
                           $count = 1;
                           foreach ($packages_subscription   as $packagelists) {
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
                             <?php echo output($packagelists['ps_status']); ?> 
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
                         
                        </tr>
                        <?php }
                           } ?>
                     </tbody>
               </table>
            </div>
         </div>  
         <div class="row">
               <?php
                  foreach($packages as $index => $values){
                     ?>
                        <div class="col-lg-3 m-4" >
                           <div class="card" style="width: 18rem;">
                              <div class="card-body">
                                 <h5 class="card-title"><?=$values['p_name']?></h5>
                                  <p class="card-text"><?=$values['p_description']?></p>
                                  <a href="<?=base_url('settings/applySubscription/'.$values['p_id'])?>" class="btn btn-primary">Register & subscribe</a>
                              </div>
                           </div>
                        </div> 
                     <?php
                  }
           
               ?>
            
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
                        <input type="datetime-local" class="form-control" required="true" value="" id="ps_date" name="ps_date" readonly >
                        <input type="hidden" class="form-control" value="" id="ps_id" name="ps_id" >
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Company Name</label>
                     <input type="text" class="form-control"   id="ps_companyname" name="ps_companyname" value="" placeholder="Company Name" readonly>
                  </div>
               </div>
               
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Current package</label>
                     <input type="text" class="form-control"  value="" id="ps_current_package" name="ps_current_package" placeholder="current package" readonly>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Current Package Value</label>
                     <input type="text" class="form-control" value="" name="ps_current_package_value" placeholder="Current Package Value" readonly>
                  </div>
               </div> 
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Current Package Period in days</label>
                     <input type="text" class="form-control"  id="ps_current_package_periods_in_days" name="ps_current_package_periods_in_days" placeholder="Current Package Period in days" readonly>
                  </div>
               </div> 
               <div class="col-sm-6 col-md-4">
                  <div class="form-group">

                     <label>Package</label>
                     <select class="form-control" id="ps_package" readonly>
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
                     <input type="date" class="form-control" required="true" value="" id="ps_start_date" name="ps_start_date"  readonly >
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
                     <input type="text" class="form-control" required="true" value="" id="ps_trans_id" name="ps_trans_id" readonly >
                  </div>
               </div>

               <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label>Status</label>
                     <select class="form-control" id="ps_status" readonly>
                        <option value="approved">Approved</option>
                        <option value="Declined">Declined</option>
                        <option value="Waiting">Waiting</option>
                     </select>
                  </div>
               </div>
            </div> 
         </div>  
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $( document ).ready(function() {
      $(document).on("click",".open-details",function(){
         
         $(this).next().toggle()
         
         if( $(this).find('i').hasClass("fa-angle-down")){
            $(this).find('i').addClass("fa-angle-up").removeClass("fa-angle-down");
         }else{
            $(this).find('i').addClass("fa-angle-down").removeClass("fa-angle-up");
         }
      })
      $(".table-packages").dataTable({
        aaSorting: [[0, 'asc']],
      });

      $( document ).on("click",".packages-list",function(){
         var act = $(this).data('action')
         var id = $(this).data('id')
         
         
         $(".package_info").find(".form-control").addClass('disable');
            
         
         
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

   });
     
</script>   