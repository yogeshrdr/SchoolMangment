<?php 
$class_routine = $this->db->get_where('class_routine', array('class_routine_id' => $param2))->result_array();
?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
      
	  <?php foreach ($class_routine as $key => $routine) {
         
     ?>
        <?php echo form_open(base_url() . 'admin/class_routine/update/' . $param2 , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
                        <select id="class_id" name="class_id" class="form-control selectboxit" onchange="section_subject_select(this.value, <?php echo $param2;?>)">
                         <?php $class = $this->db->get('class')->result_array();
                         foreach ($class as $key => $class): ?> 
                                <option value="<?php echo $class['class_id'];?>"
                                <?php if($routine['class_id']== $class['class_id']) echo 'selected';?>><?php echo $class['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div id="section_subject_edit_holder"></div>
                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('day');?></label>
                    <div class="col-sm-12">
                        <select name="day" class="form-control selectboxit">
                            <option value="saturday"    <?php if($routine['day']== 'saturday') echo 'selected' ;?>>saturday</option>
                            <option value="sunday"      <?php if($routine['day']== 'sunday') echo 'selected' ;?>>sunday</option>
                            <option value="monday"      <?php if($routine['day']== 'monday') echo 'selected' ;?>>monday</option>
                            <option value="tuesday"     <?php if($routine['day']== 'tuesday') echo 'selected' ;?>>tuesday</option>
                            <option value="wednesday"   <?php if($routine['day']== 'wednessday') echo 'selected' ;?>>wednesday</option>
                            <option value="thursday"    <?php if($routine['day']== 'thursday') echo 'selected' ;?>>thursday</option>
                            <option value="friday"      <?php if($routine['day']== 'friday') echo 'selected' ;?>>friday</option>
                        </select>
                    </div>
                </div>

               <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('starting_time');?></label>
                    <div class="col-sm-12">

            <?php 
            if($routine['time_start'] < 13){
                $time_start = $routine['time_start'];
                $time_start_min = $routine['time_start_min'];
                $starting_ampm = 1;
            }
            else if($routine['time_start'] > 12){
                $time_start = $routine['time_start'] - 12;
                $time_start_min = $routine['time_start_min'];
                $starting_ampm = 2;

            }
            ?>
                       
                        <div class="col-md-3">
                            <select name="time_start" class="form-control" required>
                            <option value=""><?php echo get_phrase('hour');?></option>
                            <?php for($i = 0; $i <= 12; $i++):?>  
                            <option value="<?php echo $i;?>"<?php if($i ==$time_start) echo 'selected="selected"';?>><?php echo $i;?> </option>
                            <?php endfor;?>
                          
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="time_start_min" class="form-control" required>
                            <option value=""><?php echo get_phrase('minutes');?></option>
                            <?php for($i = 0; $i <= 11; $i++):?>  
                            <option value="<?php echo $i * 5;?>"<?php if(($i * 5) == $time_start_min) echo 'selected="selected"';?>><?php echo $i * 5;?> </option>
                            <?php endfor;?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="starting_ampm" class="form-control selectboxit">
                                <option value="1" <?php if($starting_ampm == '1') echo 'selected="selected"';?>>am</option>
                                <option value="2" <?php if($starting_ampm == '2') echo 'selected="selected"';?>>pm</option>
                            </select>
                        </div>
                    </div>
                </div>
               <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('ending_time');?></label>
                    <div class="col-sm-12">
                    <?php 
            if($routine['time_end'] < 13){
                $time_end = $routine['time_end'];
                $time_end_min = $routine['time_end_min'];
                $ending_ampm = 1;
            }
            else if($routine['time_end'] > 12){
                $time_end = $routine['time_end'] - 12;
                $time_end_min = $routine['time_end_min'];
                $ending_ampm = 2;

            }
            ?>
                   
                        <div class="col-md-3">
                            <select name="time_end" class="form-control" required>
                            <option value=""><?php echo get_phrase('hour');?></option>
                            <?php for($i = 0; $i <= 12; $i++):?>  
                            <option value="<?php echo $i;?>"<?php if($i == $time_end) echo 'selected="selected"';?>><?php echo $i;?> </option>
                            <?php endfor;?>
                                      </option>
                              
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="time_end_min" class="form-control" required>
                            <option value=""><?php echo get_phrase('minutes');?></option>
                              
                            <?php for($i = 0; $i <= 11; $i++):?>  
                            <option value="<?php echo $i * 5;?>"<?php if(($i * 5) == $time_end_min) echo 'selected="selected"';?>><?php echo $i * 5;?> </option>
                            <?php endfor;?>
                             
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="ending_ampm" class="form-control selectboxit">
                            <option value="1" <?php if($ending_ampm == '1') echo 'selected="selected"';?>>am</option>
                                <option value="2" <?php if($ending_ampm == '2') echo 'selected="selected"';?>>pm</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                      <button type="submit" class="btn btn-info btn-rounded btn-block btn-sm"><?php echo get_phrase('edit_class_routine');?></button>
                </div>
        </form>
		
		<?php } ?>
		
    </div>
</div>


<script type="text/javascript">

function section_subject_select(class_id, class_routine_id){
    $.ajax({
        url:        '<?php echo base_url();?>admin/section_subject_edit/' + class_id + '/' + class_routine_id,
        success:    function(response){
            jQuery('#section_subject_edit_holder').html(response);
        } 

    });
}

</script>
<script type="text/javascript">
var class_id        = $('#class_id').val();
var class_routine_id   = '<?php echo $param2;?>';
section_subject_select(class_id, class_routine_id);
</script>