<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
							
						<i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW TIMETABLE HERE
                               
                            </div>
                            <div class="panel-wrapper" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'admin/class_routine/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">

				 <select name="class_id" id = "class_id" class="form-control selectboxit"
                        onchange="return get_class_section_subject(this.value)">
                        <option value=""><?php echo get_phrase('select_class');?></option>
                <?php $classes = $this->db->get('class')->result_array();
                foreach($classes as $key => $class):?>
                <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                <?php endforeach;?>
                      
                    </select>
				   
                    </div>
                </div>
				
				 <div id="section_subject_selection_holder"></div>

               <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('day');?></label>
                    <div class="col-sm-12">
                <select name="day" class="form-control selectboxit" style="width:100%;">
                        <option value="sunday">sunday</option>
                        <option value="monday">monday</option>
                        <option value="tuesday">tuesday</option>
                        <option value="wednesday">wednesday</option>
                        <option value="thursday">thursday</option>
                        <option value="friday">friday</option>
                        <option value="saturday">saturday</option>
                    </select>

                    </div> 
                </div>
				
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('starting_time');?></label>
                    <div class="col-sm-12">
                       
				 <div class="col-md-4">
                        <select name="time_start" id= "starting_hour" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('hour');?></option>
                <?php for($i = 0; $i <= 11; $i++):?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor;?>
                
                           
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="time_start_min" id= "starting_minute" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('minutes');?></option>
                
                <?php for($i = 0; $i <= 11; $i++):?>
                <option value="<?php echo $i * 5;?>"><?php echo $i * 5;?></option>
                <?php endfor;?>
                          
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="starting_ampm" class="form-control selectboxit">
                            <option value="1">am</option>
                            <option value="2">pm</option>
                        </select>
                    </div>

                    </div> 
                </div>
				
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('ending_time');?></label>
                    <div class="col-sm-12">
                               <div class="col-md-4">
                        <select name="time_end" id= "ending_hour" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('hour');?></option>
                           
                            <?php for($i = 0; $i <= 12; $i++):?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor;?>
                          
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="time_end_min" id= "ending_minute" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('minutes');?></option>  
                            
                            <?php for($i = 0; $i <= 11; $i++):?>
                <option value="<?php echo $i * 5;?>"><?php echo $i * 5;?></option>
                <?php endfor;?>
                        
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="ending_ampm" class="form-control selectboxit">
                            <option value="1">am</option>
                            <option value="2">pm</option>
                        </select>
                    </div>
                            </div>
                        </div>
				
	

                    
                    <div class="form-group">
                  <button type="submit" id= "add_class_routine"  class="btn btn-success btn-block btn-sm btn-rounded"><?php echo get_phrase('add_class_routine');?></button>
					</div>
					<br>
                <?php echo form_close();?>	
									
									
                                </div>
                            </div>
                        </div>
                    </div>
				</div>  


<script type="text/javascript">
var class_id        = '';
var starting_hour   = '';
var starting_minute = '';
var ending_hour     = '';
var ending_minute   = '';

jQuery(document).ready(function(){
    $('#add_class_routine').attr('disabled', 'disabled')
});

function get_class_section_subject(class_id){
    $.ajax({
        url:        '<?php echo base_url();?>admin/get_class_section_subject/' + class_id,
        success:    function(response){
            jQuery('#section_subject_selection_holder').html(response);
        } 

    });
}


function check_validation(){
    console.log('class_id: '+class_id+' starting_hour:'+starting_hour+' starting_minute: '+starting_minute+' ending_hour: '+ending_hour+' ending_minute: '+ending_minute);
    if(class_id !== '' && starting_hour !== '' && starting_minute  !== '' && ending_hour  !== '' && ending_minute !== ''){
        $('#add_class_routine').removeAttr('disabled');
    }    
}

$('#class_id').change(function(){
    class_id = $('#class_id').val();
    check_validation();
});

$('#starting_hour').change(function(){
    starting_hour = $('#starting_hour').val();
    check_validation();
});

$('#starting_minute').change(function(){
    starting_minute = $('#starting_minute').val();
    check_validation();
});

$('#ending_hour').change(function(){
    ending_hour = $('#ending_hour').val();
    check_validation();
});

$('#ending_minute').change(function(){
    ending_minute = $('#ending_minute').val();
    check_validation();
});
</script>

