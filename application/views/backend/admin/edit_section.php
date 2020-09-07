<?php $section = $this->db->get_where('section', array('section_id' => $param2))->result_array();
foreach ($section as $key => $section):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_section');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'admin/section/update/' . $param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" value="<?php echo $section['name'];?>">
                                </div>
                            </div>

								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('nick_name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nick_name" value="<?php echo $section['nick_name'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
                                    <select name="class_id" class="form-control select2" required>
                                     <option value=""><?php echo get_phrase('select_class');?></option>

                    <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>

                    <option value="<?php echo $class['class_id'];?>"
                    <?php if($section['class_id'] == $class['class_id']) echo 'selected';?>>
                    <?php echo $class['name'];?>
                    </option>

                    <?php endforeach;?>
                    </select>
                            </div>
                        </div>

								
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('teacher');?></label>
                    <div class="col-sm-12">
                                    <select name="teacher_id" class="form-control select2" required>
                                     <option value=""><?php echo get_phrase('select_teacher');?></option>

                    <?php $teacher =  $this->db->get('teacher')->result_array();
                    foreach($teacher as $key => $teacher):?>

                    <option value="<?php echo $teacher['teacher_id'];?>"
                    <?php if($class['teacher_id'] == $teacher['teacher_id']) echo 'selected';?>>
                    <?php echo $teacher['name'];?>
                    </option>

                    <?php endforeach;?>
                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp;<?php echo get_phrase('edit_section');?></button>
							</div>
							
                    </form>                
                </div>                
		</div>
	</div>
</div>
<?php endforeach;?>