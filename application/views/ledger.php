<style media="screen">
  .tab-icons{margin-right: 10px;}
  .dropdown{margin-top: 20px;}
  .dropdown-button{width: 100%;text-align: left;background: white;color: black;}
  .dropdown-toggle::after{float: right;margin-top: 13px;}
  .dropdown-label{display: block;}
  .dropdown-select{width: 56%;%;height: 38px;border: 1px solid lightgray;}
  #home-tab{background-color: coral;color:#FFFF}
  #profile-tab{background-color: purple;color:#FFFF}
  #contact-tab{background-color: green;color:#FFFF}
  #newcontact-tab{background-color: #368BC1;color:#FFFF}

  .nav-tabs .nav-link.active{
    color: black !important;
    background-color: #FFFF !important;
  }
</style>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">View Contact1
        </h1>
        <form method="post" action="">
          <div class="col-12">
            <div class="dropdown">
              <select class="dropdown-select" name="username" id="dropMenu">
                <option value="">Please Select</option>
                <?php if($customerlist){
                  foreach($customerlist as $ind => $val){?>
                    <option value="<?=$val['c_id']?>"><?=$val['c_name']?></option>
                    <?php
                    }
                  } ?>
              </select>
            </div>
          </div>
        </form>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">View Contact</li>
        </ol>
        <div class="mt-5"><label>Customer Name: </label><span id="usernameMain"></span></div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->

<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:23px ";>
  <!-- <li class="nav-item">
    <a class="nav-link "  id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-book tab-icons"></i>Contact info</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link active" id="profile-tab"  data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="fas fa-bars tab-icons"></i>Ledger</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">
      <i class="far fa-object-group tab-icons"></i>Security Deposit</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="document-tab"  data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false"><i class="far fa-object-group tab-icons"></i>Documents and Note</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent" style="margin-left: 18px;">
  <div  class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <form method="post" id="fuel" class="card" action="">
              <div class="row m-2">
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label class="form-label">Date Range</label>
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label class="form-label">Transaction Type:<span class="form-required">*</span></label>
                  <div class="form-group">
                    <select id="v_id"  class="form-control selectized"  name="v_id" required="true">
                      <option value="">Select Type</option>
                      <option value="debit">Debit</option>
                      <option value="credit">Credit</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label class="form-label">Transaction Amount:
                    <span class="form-required">*</span>
                  </label>
                  <div class="form-group">
                    <select id="v_id"  class="form-control selectized"  name="v_id" required="true">
                      <option value="">Select Vechicle</option>
                      <option>dsfsdf</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label class="form-label">Search</label>
                    <input type="text" class="form-control" id="v_fuelcomments" placeholder="Search">
                  </div>
                </div>
              </div>
            </form>
            <div class="row m-4">
              <div class="col-sm-12 col-md-12 text-center">
                  <strong id="company_name"></strong>
                  <h6 id="company_address"></h6>
              </div>
              <!-- <div class="col-sm-12 col-md-12">
                <label class="col-sm-3 pull-left">Customer Address</label>
                <div class="col-sm-9" id=""></div>
              </div> -->
              
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6 ">
                <div class="p-3 mb-2 theme-navbar-primary text-white">To:</div>
                <div class="p-3 mb-2">
                  <strong id="username"></strong>
                  <br>
                  <div id="address"></div>
                  <div id="tele"></div>
                
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 ">
                <div class="p-3 mb-2 theme-navbar-primary text-white">Account Summary</div>
                <table class="table table-condensed text-left align-left no-border ">
                  <tbody>
                    <tr>
                      <td>Beginning balance</td>
                      <td>519,500.00
                      </td>
                    </tr>
                    <tr>
                      <td>Total Sales</td>
                      <td>462,221.31
                      </td>
                    </tr>
                    <tr>
                      <td>Total paid</td>
                      <td>825,046.00
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Balance due</strong></td>
                      <td>156,675.31</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div  class="tab-pane fade show" id="security" role="tabpanel" aria-labelledby="security-tab">
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-customer card-table table-vcenter text-nowrap">
        <thead>
           <tr>
              <th>Date</th>
              <th>Description</th>
              <th>Amount</th>
              <th>User</th>
           </tr>
        </thead>
        <tbody>
        </tbody>
     </table>
      </div>
      
    </div>
  </div>
  <div  class="tab-pane fade show" id="document" role="tabpanel" aria-labelledby="document-tab">
    <div class="row ">
      <div class="col-sm-12 ">
        <button class="btn btn-primary pull-right m-2" data-toggle="modal" data-target="#exampleModal">Add new</button>
      </div>
      <div class="col-sm-12">
        <table class="table table-customer card-table table-vcenter text-nowrap">
        <thead>
           <tr>
              <th>Action</th>
              <th class="w-1">Heading</th>
              <th>Added By</th>
              <th>Created At</th>
              <th>Updated At</th>
              
           </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                        <label for="heading">Heading:*</label>
                        <input class="form-control" required="" name="heading" type="text" id="heading">
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control " id="docs_note_description" name="description" cols="50" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="fileupload">
                            Documents:
                        </label>
                        <div class="dropzone" id="docusUpload">
                          <input type="file">
                        </div>
                    </div>
                    <input type="hidden" id="docus_notes_media" name="file_name[]" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_private" value="1"> Is Private?                                <i class="fa fa-info-circle" data-toggle="tooltip" title="lang_v1.note_will_be_visible_to_u_only"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
  
  $( document ).ready(function() {
    var iCustId = '<?=$customerid?>'
    getData(iCustId)
    $(".sidebar-mini").addClass("sidebar-collapse")
    $("#dropMenu").on('change',function(){
        getData($(this).val())
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
  function getData(id){
    $.ajax({
        url:"<?php echo base_url(); ?>customer/fetch_customer",
        method:"POST",
        dataType: "json",
        data:{cust_id:id},
        success:function(data){
          $("#username,#usernameMain").html(data.customer_info[0].c_name)
          $("#address").html(data.customer_info[0].c_address)
          $("#tele").html(data.customer_info[0].c_mobile)

          $("#company_name").html(data.company_info[0].s_companyname)
          $("#company_address").html(data.company_info[0].s_address)

          
        }
      });
  }
</script>



<!-- /.content -->
