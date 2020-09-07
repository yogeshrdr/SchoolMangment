<?php $select_exam = $this->db->get_where('exam', array('exam_id' => $param2))->result_array();
foreach ($select_exam as $key => $exam):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_exam'); ?></div>

<?php echo form_open(base_url() . 'admin/createExamination/update/' . $param2 , array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('exam_name');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="name" type="text" class="form-control" value="<?php echo $exam['name'];?>">
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
				
                        <textarea rows="3" class="form-control" name="comment"><?php echo $exam ['comment'];?></textarea>
                                </div>
                            </div>
							
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
					<input class="form-control m-r-10" name="timestamp" type="date" value="<?php echo $exam['timestamp'];?>" id="example-date-input" required>
                                </div>
                            </div>
                            
                           <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update_exam');?></button>
							</div>
                <?php echo form_close();?>
                </div>                
			</div>
		</div>
</div>


<?php endforeach; ?>