
<?php $active_sms_gateway = $this->db->get_where('sms_settings' , array('type' => 'active_sms_gateway'))->row()->info;?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('Attendance');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'admin/attendance_selector' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    
                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
                    <select name="class_id" id="class_id" class="form-control select2" onchange="return get_class_sections(this.value)">
                    <option value=""><?php echo get_phrase('select_class');?></option>

                    <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                    <option value="<?php echo $class['class_id'];?>"<?php if(isset($class_id) && $class_id==$class['class_id']) echo 'selected="selected"';?>><?php echo $class['name'];?></option>
                    <?php endforeach;?>
                   </select>

                  </div>
                 </div>

								
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('section');?></label>
                    <div class="col-sm-12">
                    <select name="section_id" class="form-control select2" id="section_selector_holder">
                    <option value=""><?php echo get_phrase('select_class_first');?></option>
                    </select>
                  </div>
                 </div>


                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
                    <input type="date" class="form-control datepicker" id="example-date-input" name="timestamp" data-format="dd-mm-yyyy" value="<?php echo $date."-".$month."-".$year ;?>" required>
                  </div>
                 </div>


                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('get_student');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->
<?php if($date!=null && $month !=null && $year !=null):?>


<div class="row">
    <div class="col-sm-12">
	  	<div class="panel panel-info">
            <div class="panel-body table-responsive">

            <?php $classes = $this->db->get('class')->result_array();
                    foreach($classes as $key => $class){ 
                        if(isset($class_id) && $class_id == $class['class_id'])
                            $class_name = $class['name'];
            }?>
                    <h3 style="color:#696969;">Attendance For: <?php echo $class_name;?></h3>
            
            <?php $secions = $this->db->get('section')->result_array();
                    foreach($secions as $key => $secion){ 
                        if(isset($section_id) && $section_id == $secion['section_id'])
                            $section_name = $secion['name'];
            }?>
            <h3 style="color:#696969;">Section: <?php echo $section_name;?></h3>
            
            
            
            <?php 
            $full_date = $date."-".$month."-".$year;
            $full_date = date_create($full_date);
            $full_date = date_format($full_date, "d M Y");?>
            <h3 style="color:#696969;"><?php echo $full_date;?></h3>



            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
	  	<div class="panel panel-info">
            <div class="panel-body table-responsive">

<form action="<?php echo base_url();?>admin/manage_attendance/<?php echo $date.'/'.$month.'/'.$year.'/'.$class_id.'/'.$section_id;?>" method="post" accept-charset="utf-8">
            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Image');?></div></th>
                    		<th><div><?php echo get_phrase('Name');?></div></th>
                    		<th><div><?php echo get_phrase('Sex');?></div></th>
                    		<th><div><?php echo get_phrase('Roll');?></div></th>
                            <th><div><?php echo get_phrase('Status');?></div></th>
						</tr>
					</thead>
                    <tbody>

                    <?php $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
                          $full_date = $year ."-". $month."-". $date;
                          $i = 1;
                          foreach($students as $key => $student){?>
         
                        <tr class="gradeA">
                            <td><?php echo $i?></td>
							<td><img src="<?php echo $this->crud_model->get_image_url('student', $student['student_id']);?>" class="img-circle" style="max-height:30px; margine-right:30px;"></td>
							<td><?php echo $student['name'];?></td>
							<td><?php echo $student['sex'];?></td>
							<td><?php echo $student['roll'];?></td>
                            <td>
                            
                            <?php 
                            //inserting black page for students attendance if not available
                            $verify_data = array('student_id' => $student['student_id'], 'date' => $full_date);
                                $query = $this->db->get_where('attendance', $verify_data);
                                if($query->num_rows() < 1)
                                $this->db->insert('attendance', $verify_data );

                                //showing the attendance status editting option
                                $attendance = $this->db->get_where('attendance', $verify_data)->row();
                                $status = $attendance->status;
                            ?>


                            <select name="status_<?php echo $student['student_id'];?>" class="status form-control">
                            <option value="0"<?php if($status == 0) echo 'selected="selected"';?>>Undefined</option>
                            <option value="1"<?php if($status == 1) echo 'selected="selected"';?>>Present</option>
                            <option value="2"<?php if($status == 2) echo 'selected="selected"';?>>Absent</option>
                            <option value="3"<?php if($status == 3) echo 'selected="selected"';?>>Late</option>
                            <option value="4"<?php if($status == 4) echo 'selected="selected"';?>>Half Day</option>

                            </select>
                            
                            
                            </td>
                        </tr>
                    <?php 
                    $i++;
                    };
                    ?>
                    </tbody>
                </table>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>

        </form>


    <hr>
    <?php  if ($active_sms_gateway == ''): ?>			
    <div class="row">
        <div class="col-md-12">
           <div class="alert alert-warning">
                <?php echo get_phrase('SMS Gateway Not Selected');?>
           </div> 
        </div>
        <div class="col-md-4"></div>
    </div>
<?php endif;?>

<?php  if ($active_sms_gateway == 'clickatell'): ?>			
    <div class="row">
        <div class="col-md-12">
           <div class="alert alert-success">
                <?php echo get_phrase('Clickatell SMS Gateway Selected');?>
           </div> 
        </div>
        <div class="col-md-4"></div>
    </div>
<?php endif;?>

<?php  if ($active_sms_gateway == 'msg91'): ?>			
    <div class="row">
        <div class="col-md-12">
           <div class="alert alert-success">
                <?php echo get_phrase('MSG91 SMS Gateway Selected');?>
           </div> 
        </div>
        <div class="col-md-4"></div>
    </div>
<?php endif;?>


            </div>
        </div>
    </div>
</div>



<?php endif;?>



<style>
    div.datepicker{
        border: 1px solid #c4c4c4 !important;
    }
</style>




<script type="text/javascript">
  $("#update_attendance").hide();

function update_attendance() {

    $("#attendance_list").hide();
    $("#update_attendance_button").hide();
    $("#update_attendance").show();

}

function select_section(class_id) {

    var sections = $(".section");
    for (var i = sections.length - 1; i >= 0; i--) {
        sections[i].style.display = "none";
        if (sections[i].value == class_id){
            sections[i].style.display = "block";
            sections[i].selected = "selected";
        }
    }
}
function get_class_sections(class_id){
    $.ajax({
        url:        '<?php echo base_url();?>admin/get_class_section/' + class_id,
        success:    function(response){
            jQuery('#section_selector_holder').html(response);
        } 
    });
}
</script>

