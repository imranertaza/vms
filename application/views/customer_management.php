a<style type="text/css">
   .dropdown-menu > a {
   color: #777;
   }
   .dropdown-menu{
   top: 60px !important;
   }
   .btn-info {
   background-color: #00c0ef;
   border-color: #00acd6;
   }
   .table-responsive,
   .dataTables_scrollBody {
   overflow: visible !important;
   }
</style>
<!--`c_opening_balance` varchar(255) NOT NULL,-->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Customers
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">List Customers</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <!--                    custtbl-->
               <table class="table table-customer card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <?php if (userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                        <th class="w-1">S.No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Opening Balance</th>
                        <th>Total Due</th>
                        <th>Email</th>
                        <!--                            <th>Address</th>-->
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (!empty($customerlist)) {
                        $count = 1;
                        foreach ($customerlist as $customerlists) {
                            ?>
                     <tr>
                        <td>
                           <div class="btn-group">
                              <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu">
                                 <a href="#" class="dropdown-item font-12-px" data-toggle="modal" data-target="#myModal"><i class="fa fa-money"
                                    aria-hidden="true" ></i>
                                  Payment
                                 </a>
                                 <a href="#" class="dropdown-item font-12-px"><i class="fa fa-shield"
                                    aria-hidden="true"></i>
                                 Security
                                 Deposit
                                 </a>
                                 <a href="#" class="dropdown-item font-12-px"><i class="fa fa-recycle"
                                    aria-hidden="true"></i>
                                 Refund/Cheque
                                 Return
                                 </a>
                                 <!-- <a href="#" class="dropdown-item font-12-px"><i class="fa fa-user"
                                    aria-hidden="true"></i>
                                 Contact info
                                 </a> -->
                                 <a href="#" class="dropdown-item font-12-px"><i class="fa fa-eye"
                                    aria-hidden="true"></i>
                                 View
                                 </a>
                                 <?php if (userpermission('lr_cust_edit')) { ?>
                                 <a href="<?php echo base_url(); ?>customer/editcustomer/<?php echo output($customerlists['c_id']); ?>"
                                    class="dropdown-item font-12-px"><i class="fa fa-pencil"
                                    aria-hidden="true"></i>
                                 Edit
                                 </a>
                                 <?php } ?>
                                 <a href="<?php echo base_url('customer/ledger/'.$customerlists['c_id']); ?>"class="dropdown-item font-12-px"><i class="fa fa-anchor"
                                    aria-hidden="true"></i>
                                 Ledger
                                 </a>
                                 <a href="#" class="dropdown-item font-12-px"><i
                                    class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                 Sales
                                 </a>
                                 <!-- <a href="#" class="dropdown-item font-12-px"><i class="fa fa-link"
                                    aria-hidden="true"></i>
                                 References
                                 </a> -->
                                 <a href="#" class="dropdown-item font-12-px"><i class="fa fa-paperclip"
                                    aria-hidden="true"></i>
                                 Documents &amp; Note
                                 </a>
                                 <a href="#" class="dropdown-item font-12-px"><i class="fa fa-times"
                                    aria-hidden="true"></i>
                                 Deactivate
                                 </a>
                              </div>
                           </div>
                        </td>
                        <td> <?php echo output($count);
                           $count++; ?></td>
                        <td> <?php echo output($customerlists['c_name']); ?></td>
                        <td> <?php echo output($customerlists['c_mobile']); ?></td>
                        <td> <?php echo output($customerlists['c_opening_balance']); ?></td>
                        <td> </td>
                        <td><?php echo output($customerlists['c_email']); ?></td>
                        <!--                                    <td>--><?php //echo output($customerlists['c_address']); ?><!--</td>-->
                        <td>
                           <span class="badge <?php echo ($customerlists['c_isactive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($customerlists['c_isactive'] == '1') ? 'Active' : 'Inactive'; ?></span>
                        </td>
                        <!--                                    --><?php //if (userpermission('lr_cust_edit')) { ?>
                        <!--                                        <td>-->
                        <!--                                            <a class="icon"-->
                        <!--                                               href="--><?php //echo base_url(); ?><!--customer/editcustomer/--><?php //echo output($customerlists['c_id']); ?><!--">-->
                        <!--                                                <i class="fa fa-edit"></i>-->
                        <!--                                            </a>-->
                        <!--                                        </td>-->
                        <!--                                    --><?php //} ?>
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
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

    <form method="POST" action="https://vimi4.xyz/pet/payments/pay-contact-due" accept-charset="UTF-8" id="pay_contact_due_form" enctype="multipart/form-data" novalidate="novalidate" _lpchecked="1"><input name="_token" type="hidden" value="9l2sNKo5ab22bqfu1zacMmipjSnsUD8vhiJOUfey">

    <input name="contact_id" type="hidden" value="1112">
    <input name="due_payment_type" type="hidden" value="sell">
    <div class="modal-header d-block">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Add Payment</h4>
    </div>

    <div class="modal-body">
      <div class="row">
                <div class="col-md-6">
          <div class="well">
            <strong>Customer name: </strong>Walk-In Customer<br>
            <br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong>Total Sale: </strong><span class="display_currency" data-currency_symbol="true">₨ 0.00</span><br>
            <strong>Total Paid: </strong><span class="display_currency" data-currency_symbol="true">₨ 0.00</span><br>
            <strong>Total Sale Due: </strong><span class="display_currency" data-currency_symbol="true">₨ 0.00</span><br>
                        <strong>Opening Balance: </strong>
            <span class="display_currency" data-currency_symbol="true">₨ 500.00</span><br>
            <strong>Opening Balance Due: </strong>
            <span class="display_currency" data-currency_symbol="true">₨ 500.00</span>
                      </div>
        </div>
              </div>
      <div class="row payment_row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="location_id">Business Location:*</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-location-arrow"></i>
              </span>
              <select class="form-control               select2 location_id valid" required="" style="width:100%;" id="location_id" name="location_id" aria-required="true" aria-invalid="false"><option value="">Please Select</option><option value="24" selected="selected">H.D.C.Holdings (Pvt) Ltd</option></select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="payment_ref_no">Ref No:*</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-link"></i>
              </span>
              <input class="form-control                payment_ref_no valid" readonly="" style="width: 100%; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;);" placeholder="Ref No" name="payment_ref_no" type="text" value="SP2021/0217" id="payment_ref_no" aria-invalid="false">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="amount">Amount:*</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <input class="form-control input_number valid" data-rule-min-value="0" data-msg-min-value="Negative value not allowed" required="" placeholder="Amount" name="amount" type="text" value="500.00" id="amount" aria-required="true" aria-invalid="false">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="paid_on">Paid on:*</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <input class="form-control valid" readonly="" required="" name="paid_on" type="text" value="07/14/2021 14:32" id="paid_on" aria-required="true" aria-invalid="false">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="method">Payment Method:*</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <select class="form-control select2
              payment_types_dropdown" required="" style="width:100%;" id="method" name="method" aria-required="true"><option value="cash" selected="selected">Cash</option><option value="card">Card</option><option value="cheque">Cheque</option><option value="direct_bank_deposit">Direct Bank Deposit</option><option value="bank_transfer">Bank</option></select>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="document">Attach Document:</label>
            <input name="document" type="file" id="document">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account_id">Accounting Module:</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <select class="form-control account_id select2 valid" id="account_id" style="width:100%;" name="account_id" aria-invalid="false"><option value="">Please Select</option><option value="2458">Cash</option><option value="2459">Petty Cash</option></select>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="payment_details_div  hide " data-type="card">

	<div class="col-md-4">

		<div class="form-group">

			<label for="card_number">Card Number</label>

			<input class="form-control" placeholder="Card Number" disabled="" name="card_number" type="text" id="card_number">

		</div>

	</div>

	<div class="col-md-4">

		<div class="form-group">

			<label for="card_holder_name">Card holder name</label>

			<input class="form-control" placeholder="Card holder name" disabled="" name="card_holder_name" type="text" id="card_holder_name">

		</div>

	</div>

	<div class="col-md-4">

		<div class="form-group">

			<label for="card_transaction_number">Card Transaction No.</label>

			<input class="form-control" placeholder="Card Transaction No." disabled="" name="card_transaction_number" type="text" id="card_transaction_number">

		</div>

	</div>

	<div class="clearfix"></div>

	<div class="col-md-3">

		<div class="form-group">

			<label for="card_type">Card Type</label>

			<select class="form-control select2" disabled="" id="card_type" name="card_type"><option value="credit">Credit Card</option><option value="debit">Debit Card</option><option value="visa">Visa</option><option value="master">MasterCard</option></select>

		</div>

	</div>

	<div class="col-md-3">

		<div class="form-group">

			<label for="card_month">Month</label>

			<input class="form-control" placeholder="Month" disabled="" name="card_month" type="text" id="card_month">

		</div>

	</div>

	<div class="col-md-3">

		<div class="form-group">

			<label for="card_year">Year</label>

			<input class="form-control" placeholder="Year" disabled="" name="card_year" type="text" id="card_year">

		</div>

	</div>

	<div class="col-md-3">

		<div class="form-group">

			<label for="card_security">Security Code</label>

			<input class="form-control" placeholder="Security Code" disabled="" name="card_security" type="text" id="card_security">

		</div>

	</div>

	<div class="clearfix"></div>

</div>

<div class="payment_details_div  hide " data-type="cheque">

	<div class="col-md-12">

		<div class="form-group">

			<label for="cheque_number">Cheque No.</label>

			<input class="form-control" placeholder="Cheque No." disabled="" name="cheque_number" type="text" id="cheque_number">

		</div>

	</div>

	<div class="col-md-12">

		<div class="form-group">

			<label for="cheque_date">Cheque Date</label>

			<input class="form-control cheque_date" placeholder="Cheque Date" disabled="" name="cheque_date" type="text" id="cheque_date">

		</div>

	</div>

</div>



<div class="payment_details_div  hide " data-type="custom_pay_1">

	<div class="col-md-12">

		<div class="form-group">

			<label for="transaction_no_1">Transaction No.</label>

			<input class="form-control" placeholder="Transaction No." disabled="" name="transaction_no_1" type="text" id="transaction_no_1">

		</div>

	</div>

</div>

<div class="payment_details_div  hide " data-type="custom_pay_2">

	<div class="col-md-12">

		<div class="form-group">

			<label for="transaction_no_2">Transaction No.</label>

			<input class="form-control" placeholder="Transaction No." disabled="" name="transaction_no_2" type="text" id="transaction_no_2">

		</div>

	</div>

</div>

<div class="payment_details_div  hide " data-type="custom_pay_3">

	<div class="col-md-12">

		<div class="form-group">

			<label for="transaction_no_3">Transaction No.</label>

			<input class="form-control" placeholder="Transaction No." disabled="" name="transaction_no_3" type="text" id="transaction_no_3">

		</div>

	</div>

</div>        <div class="col-md-12">
          <div class="form-group">
            <label for="note">Payment Note:</label>
            <textarea class="form-control" rows="3" name="note" cols="50" id="note"></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary submit_btn">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </form>

  </div><!-- /.modal-content -->
</div>
</div>
