<?php 
$edit_expense_category		=	$this->db->get_where('expense_category' , array('expense_category_id' => $param2) )->result_array();
foreach ($edit_expense_category as $key => $row):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('expense_category'); ?></div>

<?php echo form_open(base_url() . 'expense/expense_category/update/' . $row['expense_category_id'], array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Title');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="name" type="text" class="form-control" value="<?php echo $row['name'];?>">
                                </div>
                            </div>
							
		
                           <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update_category');?></button>
							</div>
                <?php echo form_close();?>
                </div>                
			</div>
			</div>
			<!----CREATION FORM ENDS-->
<?php endforeach;?>