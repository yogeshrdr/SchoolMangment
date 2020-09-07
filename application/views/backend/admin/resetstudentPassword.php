<?php $student = $this->db->get_where('student', array('student_id' => $param2))->result_array();
foreach ($student as $key => $student):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('change password');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'admin/resetStudentPassword/' . $param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                
                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('New Password');?></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="new_password" value="">
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Confirm Password');?></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="confirm_new_password" value="">
                    </div>
                </div>

      
								
	
                        <div class="form-group">
                                  <button type="submit" class="btn btn-success btn-block btn-rounded btn-sm"><i class="fa fa-key"></i>&nbsp;<?php echo get_phrase('change password');?></button>
							</div>
							
                    </form>                
                </div>                
		</div>
	</div>
</div>
<?php endforeach;?>