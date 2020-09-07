<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_syllabus');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'admin/academic_syllabus/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('title');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="title" / required>
                                </div>
                            </div>

								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                            </div>

                    
                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
                    <select name="class_id" id="class_id" class="form-control select2" onchange="return get_class_subject(this.value)">
                    <option value=""><?php echo get_phrase('select_class');?></option>

                    <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                    <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                    <?php endforeach;?>
                   </select>

                  </div>
                 </div>

								
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('subject');?></label>
                    <div class="col-sm-12">
                    <select name="subject_id" class="form-control" id="subject_selector_holder">
                    <option value=""><?php echo get_phrase('select_subject');?></option>
                    </select>
                  </div>
                 </div>


                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('browse_file');?></label>
                    <div class="col-sm-12">
                    <input name="file_name" class="form-control" type="file" / required>
                  </div>
                 </div>





                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_syllabus');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->

                    <div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_syllabus');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                    
                    <div class="tabs-vertical-env">
                        <ul class="nav tabs-vertical">

                        <?php $classess =  $this->db->get('class')->result_array();
                        foreach($classess as $key => $classess):?>  

                        <li class="<?php if($classess['class_id']== $class_id) echo 'active';?>">

                            <a class="btn btn-info btn-rounded btn-xs" href="<?php echo base_url();?>admin/get_academic_syllabus/<?php echo $classess['class_id'];?>" style="color:white">

                                <?php echo get_phrase('class');?>: <?php echo $classess['name'];?>
                            </a>

                        </li>  
                        <?php endforeach;?>  
                        </ul>
                        <hr>
				
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('subject');?></div></th>
                    		<th><div><?php echo get_phrase('uploader');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('file_name');?></div></th>
                            <th><div><?php echo get_phrase('actions');?></div></th>

						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $syllabus =  $this->db->get_where('academic_syllabus', array('class_id' => $class_id))->result_array();
                    foreach($syllabus as $key => $syllabus):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
							<td><?php echo $syllabus['title'];?></td>
							<td><?php echo $syllabus['description'];?></td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('subject', $syllabus['subject_id']);?></td>
							<td>
                            <?php echo $this->db->get_where($syllabus['uploader_type'], array($syllabus['uploader_type'].'_id' => $syllabus['uploader_id']))->row()->name;?>
                            </td>
                            <td><?php echo date("d/m/Y", $syllabus['timestamp']);?></td>
                            <td>
                            <?php echo substr($syllabus['file_name'], 0, 20);?><?php if(strlen($syllabus['file_name']) > 20) echo '...';?>
                            </td>

                            <td>
                            
                    <a href="<?php echo base_url();?>admin/download_academic_syllabus/<?php echo $syllabus['academic_syllabus_code'];?>"><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-download"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/academic_syllabus/delete/<?php echo $syllabus['academic_syllabus_code'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 
			
                           
        					</td>
                        </tr>
    <?php endforeach;?>
                    </tbody>
                </table>
				</div></div>
			</div>
		</div>
	</div>
</div>
			
            <!----TABLE LISTING ENDS--->

<script type="text/javascript">

function get_class_subject(class_id){
    $.ajax({
        url:        '<?php echo base_url();?>admin/get_class_subject/' + class_id,
        success:    function(response){
            jQuery('#subject_selector_holder').html(response);
        } 

    });
}

</script>
            