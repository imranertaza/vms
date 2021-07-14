
<style>
   .msg{
       font-size: 20px;
      padding: 10px;
      text-align: center;
   }
   .err{
      color: red;
   }
   .success{
      color: green;
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
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card">
        <div class="msg"></div>
        <div class="row">
            <div class="col-lg-12 m-4" >
               <h5 class="card-title"><?=$packagesDetails[0]['p_name']?></h5>
               <p class="card-text"><?=$packagesDetails[0]['p_description']?></p>
            </div>
            
            <div class="col-lg-12 m-4" >
             <button type="button" class="btn btn-primary save_payment" data-payment_method="1" data-ps_id="<?=$packagesDetails[0]['p_id']?>" >
               PayHere pay
               </button>
            </div>
            <div class="col-lg-12 m-4" >
               
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               Offline
               </button>
            </div> 
         </div> 
      </div>
   </div>
</section>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Payment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">

            <div class="col-sm-12">
               <label>Account Name</label>:
               <?=$website_setting[0]['s_account_name']?>
            </div>
             <div class="col-sm-12">
               <label>Account Number</label>:
               <?=$website_setting[0]['s_account_no']?>
            </div>
           
            <div class="col-sm-12">
               <label>Bank Name</label>:
               <?=$website_setting[0]['s_bank_name']?>
            </div>
           <div class="col-sm-12">
               <label>Branch Name</label>:
               <?=$website_setting[0]['s_branch_name']?>
            </div>
           <div class="col-sm-12">
               <label>Swift Code</label>:
               <?=$website_setting[0]['s_swift_code']?>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <!-- href="<?=base_url('settings/save_subscription_paymeny/2/'.$packagesDetails[0]['p_id'])?> -->
       <a class="btn btn-primary save_payment" data-payment_method="2" data-ps_id="<?=$packagesDetails[0]['p_id']?>" >pay</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
$( document ).on("click",".save_payment",function(){
   var iPaymentMethod = $(this).data('payment_method');
   var iPs_id = $(this).data('ps_id');
   
   $.ajax({
      url:'<?=base_url()?>index.php/settings/save_subscription_paymeny',
      method: 'post',
      data: {method:iPaymentMethod,ps_id:iPs_id},
      dataType: 'json',
      success: function(response){
         if(response == 1){
            $(".msg").addClass('success')
            $(".msg").html('Data saved successfully');

            if(iPaymentMethod == 2){
                $('#myModal').modal('hide');
            }
            setTimeout(function(){  
               window.location = window.location.origin+'/vms/settings/packagesubscription' 
            }, 3000);
            
         }else{
            $(".msg").addClass('err')
            $(".msg").html('unable to add data successly.plz contact administrator')
         }
      }
   });
});
</script>