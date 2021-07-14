
<style type="text/css">
   .disable{
      border: solid 0px;
      font-weight: 600;
      pointer-events: none;
   }
   .edit_save_btn{
      display: none;
   }
   .websitesettings-tab{background-color: coral;text-decoration: none;color:# ;}
   .packages-tab{background-color: purple;text-decoration: none;color:#FFFF;}
   .packages-subscription-tab{background-color: green;text-decoration: none;color:#FFFF;}
   
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
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">

   <div class="container-fluid">
      <div class="card">
         <ul class="menu-list m-0 p-0" >
           <li class="">
             <a class="<?=$this->router->fetch_class() == "settings" ? "active-tab":"websitesettings-tab"?>" href="<?=base_url('settings/websitesetting')?>">Website settings</a>
           </li>
           <li class="">
             <a class="packages-tab" href="<?=base_url('packages/')?>">Packages</a>
           </li>
           <li class="">
             <a class="packages-subscription-tab" href="<?=base_url('packages/subscription')?>">Subscription</a>
           </li>
         </ul>
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="websitesettings" role="tabpanel" aria-labelledby="home-tab">
               <form id="addnewcategory" class="basicvalidation" role="form" action="websitesetting_save" method="post" class="col-md-6" enctype='multipart/form-data'>
                  <div class="card-body">

                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="true" style="background-color: antiquewhite;">Super Admin Setting</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="profile" aria-selected="false" style="background-color: yellowgreen;">payment Gateway</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                           <div class="row">
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_companyname'])?$website_setting[0]['s_companyname']:''); ?>" id="s_companyname" name="s_companyname" placeholder="Enter Company Name">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_address'])?$website_setting[0]['s_address']:''); ?>" id="s_address" name="s_address" placeholder="Enter Address">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Googel API Key</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_googel_api_key'])?$website_setting[0]['s_googel_api_key']:''); ?>" id="s_googel_api_key" name="s_googel_api_key" placeholder="Enter Address">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Invoice Prefix</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_inovice_prefix'])?$website_setting[0]['s_inovice_prefix']:''); ?>" id="s_inovice_prefix" name="s_inovice_prefix" placeholder="Enter Invoice Prefix">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Currency Prefix</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_price_prefix'])?$website_setting[0]['s_price_prefix']:''); ?>" id="s_price_prefix" name="s_price_prefix" placeholder="Enter Currency Prefix">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Inovice Terms and condition</label>
                                    <textarea id="s_inovice_termsandcondition" name="s_inovice_termsandcondition" rows="4" cols="50" class="form-control" required="true" placeholder="Enter Currency Prefix"><?php echo output(isset($website_setting[0]['s_inovice_termsandcondition'])?$website_setting[0]['s_inovice_termsandcondition']:''); ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Allowed No of Vehicles</label>
                                    <input type="number" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_no_of_veh_allowed'])?$website_setting[0]['s_no_of_veh_allowed']:''); ?>" id="s_price_prefix" name="s_no_of_veh_allowed" placeholder="no of veh allowed">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Inovice Service Name</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_inovice_servicename'])?$website_setting[0]['s_inovice_servicename']:''); ?>" id="s_inovice_servicename" name="s_inovice_servicename" placeholder="Inovice Service Name">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label for="exampleInputFile">Logo</label>
                                    <div class="input-group"> 
                                       <input type="file" class="form-control" id="file" name="file" <?php echo output(($website_setting[0]['s_logo']!='')?'disabled=true':''); ?>>
                                    </div>
                                    <span  class="bg-gradient-success btn-xs">Image sholud be in 50 X 50px and png format</span>
                                 </div>
                                 <?php if($website_setting[0]['s_logo']!='') { ?>
                                 <img src = "<?= base_url().'assets/uploads/'.$website_setting[0]['s_logo']; ?>" alt = "Logo" height = "50" width = "50" />
                                 <button type="button" class="logodelete btn btn-primary">Delete</button>
                                 <?php } ?>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label>Help Desk Url</label>
                                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_help_desk_url'])?$website_setting[0]['s_help_desk_url']:''); ?>" id="s_price_prefix" name="s_help_desk_url" placeholder="help desk url">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                 <div class="form-group">
                                    <label for="exampleInputFile">Back ground image</label>
                                    <div class="input-group"> 
                                       <input type="file" class="form-control" id="filebg " name="filebg" <?php echo output(($website_setting[0]['s_bg_img']!='')?'disabled=true':''); ?>>
                                    </div>
                                    
                                 </div>
                                 <?php if($website_setting[0]['s_bg_img']!='') { ?>
                                 <img src = "<?= base_url().'assets/uploads/'.$website_setting[0]['s_bg_img']; ?>" alt = "s_bg_img" height = "50" width = "50" />
                                 <button type="button" class="bgImgdelete btn btn-primary">Delete</button>
                                 <?php } ?>
                              </div>
                           </div>
                       </div>
                       <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                          <div class="col-sm-12 col-md-12 mt-5">
                           <div class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                       <div class="form-group">
                                          <label>Bank Name</label>
                                          <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_bank_name'])?$website_setting[0]['s_bank_name']:''); ?>" id="s_bank_name" name="s_bank_name" placeholder="Bank Name">
                                       </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                       <div class="form-group">
                                          <label>Branch Name</label>
                                          <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_branch_name'])?$website_setting[0]['s_branch_name']:''); ?>" id="s_branch_name" name="s_branch_name" placeholder="Branch Name">
                                       </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                       <div class="form-group">
                                          <label>Account no</label>
                                          <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_account_no'])?$website_setting[0]['s_account_no']:''); ?>" id="s_account_no" name="s_account_no" placeholder="Account No">
                                       </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                       <div class="form-group">
                                          <label>Account Name</label>
                                          <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_account_name'])?$website_setting[0]['s_account_name']:''); ?>" id="s_account_name" name="s_account_name" placeholder="Account Name">
                                       </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                       <div class="form-group">
                                          <label>Swift Code</label>
                                          <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_swift_code'])?$website_setting[0]['s_swift_code']:''); ?>" id="s_swift_code" name="s_swift_code" placeholder="Swift Code">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                       </div>
                     </div>
                     <div id="addnewcategory_submit" class="btn-block text-right mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                     
                  </div>
               </form>
            </div>
         </div>   
        

      
      </div>
   </div>
</section>

<script type="text/javascript">
   
   $( document ).ready(function() {
   });
</script>   