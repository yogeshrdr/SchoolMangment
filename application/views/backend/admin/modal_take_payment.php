<?php $invoices = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
        foreach ($invoices as $key => $row):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_invoices');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                
                <table class="table table-bordered">
                	<thead>
                		<tr>
                			<td>#</td>
                			<td><?php echo get_phrase('amount');?></td>
                			<td><?php echo get_phrase('method');?></td>
                			<td><?php echo get_phrase('date');?></td>
                		</tr>
                	</thead>
                	<tbody>
        <?php $counter = 1; $payments = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array(); 
                foreach ($payments as $key => $payment):?>
                		<tr>
                            <td><?php echo $counter++;?></td>
                			<td><?php echo $payment['amount'];?></td>
                			<td>
                            <?php if($payment['method'] == '1'):?>
                            <?php echo 'card';?>
                             <?php endif;?>
                             <?php if($payment['method'] == '2'):?>
                            <?php echo 'cash';?>
                             <?php endif;?>
                             <?php if($payment['method'] == '3'):?>
                            <?php echo 'cheque';?>
                             <?php endif;?>
                             <?php if($payment['method'] == 'paypal'):?>
                            <?php echo 'paypal';?>
                             <?php endif;?>
                            </td>
                			<td><?php echo date('d M, Y', $payment['timestamp']);?></td>
                			
                		</tr>
                <?php endforeach;?>
                	
                	</tbody>
                </table>
                	</div>
            </div>
        </div>
    </div>
</div>

  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('accept_payment');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
<?php echo form_open(base_url() . 'admin/student_payment/take_payment/'.$row['invoice_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

				<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('total_amount');?>*</label>        
					 <div class="col-sm-12">
		                    <input type="text" class="form-control" value="<?php echo $row['amount'];?>" readonly/>
		                </div>
		            </div>

		           <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('amount_you_have_paid');?>*</label>        
					 <div class="col-sm-12">
		                    <input type="text" class="form-control" name="amount_paid" value="<?php echo $row['amount_paid'];?>" readonly/>
		                </div>
		            </div>

		            <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('remaining_balance');?>*</label>        
					 <div class="col-sm-12">
		                    <input type="text" class="form-control" value="<?php echo $row['due'];?>" readonly/>
		                </div>
		            </div>

		           <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('amount_you_want_to_pay_now');?>*</label>        
					 <div class="col-sm-12">
		                    <input type="text" class="form-control" name="amount" value="" placeholder="<?php echo get_phrase('enter_payment_amount');?>"/>
		                </div>
		            </div>

		           <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('method');?>*</label>        
					 <div class="col-sm-12">
                            <select name="method" class="form-control select2" style="width:100%">
                                <option value="1"><?php echo get_phrase('card');?></option>
                                <option value="2"><?php echo get_phrase('cash');?></option>
                                <option value="3"><?php echo get_phrase('cheque');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('date');?>*</label>        
					 <div class="col-sm-12">
		<input class="form-control m-r-10" name="timestamp" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input" required>
	                    </div>
					</div>

                    <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>">
                    <input type="hidden" name="student_id" value="<?php echo $row['student_id'];?>">
                    <input type="hidden" name="title" value="<?php echo $row['title'];?>">
                    <input type="hidden" name="description" value="<?php echo $row['description'];?>">

		            <div class="form-group">
                           
		                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('accept_payment');?></button>
		               
		            </div>

				<?php echo form_close();?>
			</div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>