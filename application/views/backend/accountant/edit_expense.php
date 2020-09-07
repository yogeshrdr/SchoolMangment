<?php 
$edit_expense		=	$this->db->get_where('payment' , array('payment_id' => $param2) )->result_array();
foreach ($edit_expense as $key => $row):
?>
	 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_alumni');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                    <?php echo form_open(base_url() . 'expense/expense/update/'.$row['payment_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                               
                            
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Title');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>" autofocus>
						</div>
				</div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('category');?></label>
                    <div class="col-sm-12">
                            <select name="expense_category_id" class="form-control" required>
                                <option value=""><?php echo get_phrase('select_expense_category');?></option>
                                <?php 
                                	$categories = $this->db->get('expense_category')->result_array();
                                	foreach ($categories as $row2):
                                ?>
                                <option value="<?php echo $row2['expense_category_id'];?>"
                                	<?php if ($row['expense_category_id'] == $row2['expense_category_id'])
                                		echo 'selected';?>>
                                			<?php echo $row2['name'];?>
                                				</option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    
                    	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
					
                    <textarea class="form-control" name="description" rows="5"><?php echo $row['description'];?></textarea>

						</div> 
					</div>


                    
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Amount');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>">
						</div>
					</div>

					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Method');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="method">

                    <option value="1"<?php if ($row['method'] == 1) echo 'selected;' ?>><?php echo get_phrase('cash');?></option>
                    <option value="2"<?php if ($row['method'] == 2) echo 'selected;' ?>><?php echo get_phrase('cheque');?></option>
                    <option value="3"<?php if ($row['method'] == 3) echo 'selected;' ?>><?php echo get_phrase('card');?></option>
                    </select>

                        </div>
                    </div>

					
					
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('graduation_date');?></label>
                    <div class="col-sm-12">
         			<input type="text" class="datepicker form-control" name="timestamp" value="<?php echo date('d M,Y', $row ['timestamp']); ?>"/>
                 </div>
                </div>
    
                        <div class="form-group">
                                <button type="submit" class="btn btn-info btn-rounded btn-block btn-sm"><i class="fa fa-pencil"></i>&nbsp;<?php echo get_phrase('update_expense');?></button>
                        </div>
                <?php echo form_close();?>
    </div>
	</div>
 </div>
</div>
</div>

<?php
endforeach;
?>