<?php 
   if($this->config->item('company_name')!=='')
   {
     $company_name =  $this->config->item('company_name');
   } else {
     $company_name = 'Vechicle Management';
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Log in</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <style>
         .sign-in-outer{
         background-image: none;
         background-color: #3b5998;
         border-radius: 5px;
         }
         .sign-in-wrap{
         padding: 10px 40px 40px 40px;
         }
         .form-content{padding-top: 20px}
         .btn-primary {
         background-color: #3c8dbc;
         border-color: #367fa9;
         }
         .btn-danger {
         color: #fff;
         background-color: #dc3545;
         border-color: #dc3545;
         box-shadow: none;
         border-radius: 0px;
         /* padding: 0px 0px 0px; */
         font-weight: 600;
         }
         .inner {
             padding: 80px 15px 30px;
             position: relative;
         }
         @media  only screen and (max-width: 600px) {
            .intro-cont {
                display: none;
            }

            .nav-tabs li {
                width: 100%;
                margin-left: 0% !important;
            }

            .cover-container {
                padding-top: 0px;
            }

            .inner {
                padding-top: 0px;
            }

            .inner .row {
                padding-top: 0px;
                /* margin: 0px; */
            }

            .register-true .row {
                margin-left: 0% !important;
            }

            .register-true .col-xs-offset-2 {
                margin-bottom: 10px !important;
            }

            .sign-in-outer {
                margin-top: 10px;
            }
        }
        #alertmessage{
             font-size: 14px;
         }
      </style>
   </head>
   <body class="">
      <div class="site-wrapper">
      <div class="site-wrapper-inner">
         <div class="cover-container container">
            <div class="inner cover clearfix">
               <div class="row">
                  <div class="col-md-8 intro-cont center">
                     <div class="col-md-12 center">
                        <?php $data = sitedata();  ?>
                        <!-- style="width: 468px; height: 60px; margin: auto; " -->
                           <img src="<?= base_url().'assets/uploads/'.$data['s_bg_img'] ?>" style='height: 100%; width: 100%; object-fit: contain'>
                     </div>
                     <!-- /.login-logo -->
                  </div>
                  <div class="col-md-4 col-lg-3   mt-5">
                        <div class="">
                        <?php 
                           $successMessage =$this->session->flashdata('successmessage');  
                           $warningmessage = $this->session->flashdata('warningmessage');                    
                           if (isset($successMessage)) { echo '<div id="alertmessage" class="col-md-12">
                           <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                   '. output($successMessage).'
                                  </div>
                           </div>'; } 
                           if (isset($warningmessage)) { echo '<div id="alertmessage" class="col-md-12">
                           <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                   '. output($warningmessage).'
                                  </div>
                           </div>'; }    
                           ?>
                     </div>
                        <div class="sign-in-outer">
                           <div class="sign-in-wrap p-4">
                              <!-- <p style="color: white; text-align:center;"><?php 
                                 $siteinfo =array();
                                 $CI =& get_instance();
                                 $CI->db->from('settings');
                                 $query = $CI->db->get();
                                 if($query !== FALSE && $query->num_rows() > 0){
                                   $siteinfo = $query->result_array();
                                 }
                                 if(count($siteinfo)>=1) {
                                   echo output($siteinfo[0]['s_companyname']);
                                 } else {
                                   echo 'Vehicle Management System';
                                 }
                                 ?></p> -->
                              <div class="form-body">
                                 <button class="btn btn-danger">Login</button>
                                 <div class="form-content">
                                    <form action="<?= base_url().'login/login_action'; ?>" method="post">
                                       <div class="form-group">
                                          <label style="color: white">Username</label>
                                          <input type="text" name="username" required class="form-control" >
                                          <!-- <div class="input-group-append">
                                             <div class="input-group-text">
                                               <span class="fas fa-envelope"></span>
                                             </div>
                                             </div> -->
                                       </div>
                                       <div class="form-group">
                                          <label style="color: white">Password</label>
                                          <input type="password" name="password" class="form-control" >
                                          <!-- <div class="input-group-append">
                                             <div class="input-group-text">
                                               <span class="fas fa-lock"></span>
                                             </div>
                                             </div> -->
                                       </div>
                                       <!-- <div class="form-group  ">
                                          <div class="col-8">
                                            <div class="icheck-primary">
                                          </div>
                                          </div> -->
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-flat btn-login">Sign In</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.login-card-body -->
                     </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.login-box -->
      <!-- jQuery -->
      <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>