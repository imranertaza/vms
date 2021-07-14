<?php
function activate_menu($controller)
{
    $CI = get_instance();
    $last = $CI->uri->total_segments();
    $seg = $CI->uri->segment($last);
    if (is_numeric($seg)) {
        $seg = $CI->uri->segment($last - 1);
    }
    if (in_array($controller, array($seg))) {
        return 'active';
    } else {
        return '';
    }
}

if (!isset($this->session->userdata['session_data'])) {
    $url = base_url() . 'login';
    header("location: $url");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php
        $data = sitedata();
        $total_segments = $this->uri->total_segments();
        echo ucwords(str_replace('_', ' ', $this->uri->segment(1))) . ' | ' . output($data['s_companyname']) ?></title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/toast/toast.min.css"/>
    <script src="<?= base_url(); ?>assets/plugins/toast/toast.min.js"></script>
    
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark theme-navbar-primary">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <input type="hidden" id="base" value="<?php echo base_url(); ?>">
        <!-- Right navbar links -->
        <?php
        $dNow = date('Y-m-d');
        $where = array("ps_status =" =>"approved","ps_start_date <= " =>$dNow,"ps_end_date >= " =>$dNow);
        $aSubscriptionData = $this->db->select('*')->from('package_subscription')->join('packages','packages.p_id = package_subscription.ps_package_id','INNER')->where($where)->order_by('ps_id','desc')->get()->result_array();
        ?>

        <div class="dropdown mr-4" style="color:#ffff">
            <i class="fas fa-info-circle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
            <div class="dropdown-menu notify-drop" style="    min-width: 300px;height: 250px;overflow-x: auto;">
                <a class="dropdown-item" href="#">Active Packages</a>
                <hr>
                <?php
                if($aSubscriptionData){
                    foreach($aSubscriptionData as $ind=>$values){
                        ?>
                        <a class="dropdown-item" href="#"><strong><?=$values['ps_package']?></strong></a
                        >
                        <div class="ml-3" style="font-size: 13px;font-weight: 500;">
                            <label>Package Description</label>:
                            <?=$values['p_description']?>
                            <label>Package End Date</label>:
                            <?=$values['ps_end_date']?>
                            <label>Package Trial End Date</label>:
                            <?=$values['ps_trial_end_date']?>
                            <label>No of Customers</label>:
                            <?=$values['p_no_of_customers']?>
                            <label>Package Price</label>:
                            <?=$values['p_price']?>
                            <label>Package Currency</label>:
                            <?=$values['p_currency']?>
                        </div>
                        <hr>
                        <?php
                    }
                }
                ?>
            
          </div>
        </div>
        <div>
            <?php
                $helpDesk = $this->db->select('s_help_desk_url')->from('settings')->get()->result_array()[0]['s_help_desk_url'];
            ?>
            <a class="btn btn-success btn-xs" style="float:right;margin-right: -30px;" href="<?=$helpDesk?>" target="_blank">help desk</a>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <div class="dropdown" style="color:#ffff;margin: 8px;">
                    <a class="btn btn-success btn-xs"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Package Remainig Days</a>
                    <div class="dropdown-menu notify-drop" style="overflow-x: auto;left: -120px;min-width: 250px;">
                        <?php
                            if($aSubscriptionData){
                                foreach($aSubscriptionData as $ind=>$values){
                                    ?>
                                    <div class="col-sm-12" style="padding: 10px;display: block;">
                                        <p class="">
                                            <?=$values['ps_package']?>
                                        </p>
                                        <p style="border-bottom: solid 1px;font-size: 12px;">
                                            <?php
                                                if($values['ps_end_date']){
                                                    $date1  = strtotime(date('Y-m-d'));
                                                    $date2  = strtotime($values['ps_end_date']); 
                                                    echo $res    =  (int)(($date2-$date1)/86400)." days left";   
                                                }else{
                                                    echo "Invalid date";
                                                }
                                            ?>
                                        </p>    
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>login/logout">
                    <i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
        
    </nav>
    <!-- /.navbar -->