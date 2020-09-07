<?php $select_circular = $this->db->get_where('circular', array('circular_id' => $param2))->result_array();

foreach ($select_circular as $key => $circular):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('update_circular'); ?></div>
										<div class="panel-body table-responsive">


        <?php echo form_open(base_url() . 'admin/circular/update/' . $circular['circular_id'] , array('class' => 'form-horizontal form-groups-bordered validate'));?>

<!----CREATION FORM STARTS---->

	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('circular_title');?></label>
                    <div class="col-sm-12">
					
                           
                                    <input name="title" type="text" class="form-control" value="<?php echo $circular ['title'];?>">
                                </div>
                            </div>
							
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('reference_no');?></label>
                    <div class="col-sm-12">
						
                                    <input type="text" class="form-control" name="reference" value="<?php echo $circular ['reference'];?>">
                                </div>
                            </div>
							
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('content');?></label>
                    <div class="col-sm-12">
						
                                    <textarea type="text" class="form-control" name="content" ><?php echo $circular ['content'];?></textarea>
                                </div>
                            </div>
							
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('circular_date');?></label>
                    <div class="col-sm-12">
		<input class="form-control m-r-10" name="date" type="date" value="<?php echo $circular ['date'];?>" id="example-date-input" required>
	
							
                       </div>
                        </div>
          
                            
                           <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-sm btn-block btn-rounded"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('update_circular');?></button>
                            </div>
                    <?php echo form_close();?>            
                
                </div>                
			</div>
		</div>
</div>
	<!----CREATION FORM ENDS--

<?php endforeach;?>