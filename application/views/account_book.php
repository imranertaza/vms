<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Account Book</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>/Account">Account</a></li>
                    <li class="breadcrumb-item active">Account Book</li>
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
      <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-5">
                <div class="info-box">
                    <div class="info-box-content">
                        <div class="row mt-2">
                            <div class="col-6"><h5><b>Account Name:</b></h5></div>
                            <div class="col-6"><?=$account['account_name']?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6"><h5><b>Account Type:</b></h5></div>
                            <div class="col-6"><?=$account['account_name']?>-<?=$account['child_name']?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6"><h5><b>Account Number:</b></h5></div>
                            <div class="col-6"><?=$account['account_number']?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6"><h5><b>Balance:</b></h5></div>
                            <div class="col-6"><?=$account['account_name']?></div>
                        </div>
                    </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-7">
                <div class="card">
                    <div class="card-header  border-transparent">
                        <h2 class="card-title"><i class="fa fa-filter" aria-hidden="true"></i> Filters:</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="date-range"><b>Date Range:</b></label>
                                <div class="input-group mb-3">
                                    <!--<div class="input-group-prepend">-->
                                    <!--    <span class="input-group-text" id="calander"><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                    <!--</div>-->
                                    <!--<input type="date" class="form-control" id="date-range" aria-describedby="calander">-->
                    
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="customer"><b>Customer:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="customer"><i class="fa fa-exchange" aria-hidden="true"></i></label>
                                    </div>
                                    <select class="custom-select" id="customer">
                                        <option>All</option>
                                        <?php
                                            if($customers){
                                                foreach($customers as $ind => $val){?>
                                                <option value="<?=$val['c_id']?>"><?=$val['c_name']?></option>
                                                <?php
                                                    
                                                }
                                            }                                        
                                        ?>
                                    </select>
                                
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="transaction-type"><b>Transaction Type:</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="transaction-type"><i class="fa fa-exchange" aria-hidden="true"></i></label>
                                    </div>
                                    <select class="custom-select" id="transaction-type">
                                        <option >All</option>
                                        <option value="1debit">Debit</option>
                                        <option value="credit">Credit</option>
                                        
                                    </select>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="info-box">
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12">
                                <!--============================-->
                                <div class="table-responsive">
                                    <table id="myaccounttbl"  class="table card-table table-vcenter">
                                        <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Note</th>
                                            <th>Image</th>
                                            <th>Added By</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Balance</th>
                                            <th>Reconcile Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(!empty($accounts)){
                                            foreach($accounts as $account){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a class="edit-acc icon btn-sm btn-primary"  self="<?= $account['id'];?>" href="javascript:void(0)"><i class="fa fa-edit"> Edit</i></a>
                                                        <a class="icon btn-sm btn-danger"  href="<?= base_url();?>Account/account_book/(id)"><i class="fa fa-book"> Delete</i></a>
                                                    </td>
                                                    <td><?= $account['account_name']; ?></td>
                                                    <td><?= (is_array($account['main_account'])) ? $account['main_account']['account_name'] : " - "; ?></td>
                                                    <td><?= (is_array($account['child_account_type'])) ? $account['child_account_type']['child_name'] : ""; ?></td>
                                                    <td><?= (is_array($account['account_group'])) ? $account['account_group']['name'] : ""; ?></td>
                                                    <td><?= $account['account_number']; ?></td>
                                                    <td>No BALANCE</td>
                                                    <td><?= (is_array($account['account_added_by'])) ? $account['account_added_by']['u_name'] : ""; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                
                                                
                                                </tr>
                                                <?php
                                            }                  
                                        }
                                        
                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                            <!--=============================-->
                            </div>
                        </div>
                    </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<script>
$(document).ready(function(){
    $("#myaccounttbl").DataTable({
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
  var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
           'This Month Last Year': [moment().startOf('month'), moment().endOf('month')],
           'This Year': [moment().startOf('year'), moment().endOf('year')],
           'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
           'Current financial Year': [moment().startOf('year'), moment().endOf('year')],
           'Last financial Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
        }
    }, cb);

    cb(start, end);
});
;
</script>
