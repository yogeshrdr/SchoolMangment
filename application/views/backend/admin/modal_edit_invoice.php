<?php 
$invoices	=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
foreach($invoices as $key => $row):?>

 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_invoice');?></div>
                                <div class="panel-body table-responsive">
       
        <?php echo form_open(base_url() . 'admin/student_payment/update_invoice/'. $row['invoice_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
               
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('student');?></label>
                    <div class="col-sm-12">
                        <select name="student_id" class="form-control select2" style="width:100%;" >
                            <?php 
                            $this->db->order_by('class_id','asc');
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $key => $row2):
                            ?>
                                <option value="<?php echo $row2['student_id'];?>"
                                    <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                    class <?php echo $this->crud_model->get_class_name($row2['class_id']);?> -
                                    roll <?php echo $row2['roll'];?> -
                                    <?php echo $row2['name'];?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('title');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"/>
                    </div>
                </div>
                
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
					<textarea type="text" rows="5" class="form-control" name="description" ><?php echo $row['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('total_amount');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>"/>
                    </div>
                </div>
				
				<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('amount_you_have_paid');?>*</label>        
					 <div class="col-sm-12">
		                    <input type="text" class="form-control" name="amount_paid" value="<?php echo $row['amount_paid'];?>" readonly/>
		                </div>
		            </div>
					
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-12">
                        <select name="status" class="form-control select2" style="width:100%">
                            <option value="1" <?php if($row['status']== '1')echo 'selected';?>><?php echo get_phrase('paid');?></option>
                            <option value="2" <?php if($row['status']== '2')echo 'selected';?>><?php echo get_phrase('unpaid');?></option>
                        </select>
                    </div>
                </div>
               <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
							<input class="form-control m-r-10" name="date" type="date" value="<?php echo $row['creation_timestamp']; ?>" id="example-date-input" required>
                    </div>

                </div>
                <div class="form-group">
                 
                      <button type="submit" class="btn btn-block  btn-info btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save_now');?></button>
                 
                </div>
        </form>
        
				</div>
				</div>
				</div>
				</div>
                <?php endforeach;?>