		
<?php $active_sms_gateway = $this->db->get_where('sms_settings' , array('type' => 'active_sms_gateway'))->row()->info; ?>

 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
					        <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('manage_attendance');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                               <div class="panel-body table-responsive">
        <div align="center">
        KEYS: 
        Present&nbsp;-&nbsp; <i class="fa fa-circle" style="color: #00a651;"></i>&nbsp;&nbsp;
        Absent&nbsp;-&nbsp;<i class="fa fa-circle" style="color: #EE4749;"></i>&nbsp;&nbsp;
        Half Day&nbsp;-&nbsp; <i class="fa fa-circle" style="color: #0000FF;"></i>&nbsp;&nbsp;
        Late&nbsp;-&nbsp; <i class="fa fa-circle" style="color: #FF6600;"></i>&nbsp;&nbsp;
        Undefine&nbsp;-&nbsp;<i class="fa fa-circle" style="color:black;"></i>
        </div>
                               
                  
			   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_class');?></label>
                    <div class="col-sm-12">
					
                      <select  class="form-control" id="class_id" onchange="return get_class_sections(this.value)" >
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
                            $classes    =   $this->db->get('class')->result_array();
                            foreach($classes as $key => $class):?>
                            <option value="<?php echo $class['class_id'];?>"
                                <?php if(isset($class_id) && $class_id==$class['class_id'])echo 'selected="selected"';?>>
                                    <?php echo $class['name'];?>
                                        </option>
                            <?php endforeach;?>
                          </select>
						
						</div>
						</div>
						
						
 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_section');?></label>
                    <div class="col-sm-12">
					 <select  class="form-control" id="section_id" >
		                    <option value=""><?php echo get_phrase('select_class_first');?></option>   
			          </select>
                      
						</div>
						</div>
						
						 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('month');?></label>
                    <div class="col-sm-12">

                        <select  class="form-control" id="month" >
                <?php $month = date('m'); ?>
                <?php
            	for ($i = 1; $i <= 12; $i++):
                if ($i == 1) 	  $m = get_phrase('January');
                else if ($i == 2) $m = get_phrase('February');
                else if ($i == 3) $m = get_phrase('March');
                else if ($i == 4) $m = get_phrase('April');
                else if ($i == 5) $m = get_phrase('May');
                else if ($i == 6) $m = get_phrase('June');
                else if ($i == 7) $m = get_phrase('July');
                else if ($i == 8) $m = get_phrase('August');
                else if ($i == 9) $m = get_phrase('September');
                else if ($i == 10)$m = get_phrase('October');
                else if ($i == 11)$m = get_phrase('November');
                else if ($i == 12)$m = get_phrase('December');
                ?>
                <option value="<?php echo $i; ?>"<?php if($month == $i) echo 'selected'; ?>  ><?php echo $m; ?></option>
                <?php
            endfor;
            ?>
                        </select>
						</div>
						</div>
						
			<div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('year');?></label>
                <div class="col-sm-12">
                    <select id="year" class="form-control">
                    <?php $list_year = array("2019", "2020", "2021","2022", "2023","2024", "2025", "2026");
                    foreach($list_year as $key => $row){
                    ?>
                    <option value="<?php echo $row;?>"<?php if($row == $year) echo 'selected';?>><?php echo $row;?></option>
                    <?php } ?>
                </select>
				</div>
			</div>
						
			<div class="form-group">
			<button type="button" class="btn btn-info btn-rounded btn-block btn-sm" id="find"><i class="fa fa-search"></i>&nbsp;get attendance</button>
		 </div>


</div>
</div>
</div>
</div>
</div>
<br>
<div id="data"><?php include 'loadAttendanceReport.php'; ?></div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#find').on('click', function() 
		{
			var class_id    = $('#class_id').val();
			var section_id  = $('#section_id').val();
			var month       = $('#month').val();
			var year        = $('#year').val();
			
			 if (class_id == "" || section_id == "" || month == "" || year == "") {
		   //$.toast("<?php //echo get_phrase('select_class_for_promotion_to_and_from');?>")
           $.toast({
            text: 'Please select class and section',
            position: 'top-right',
            loaderBg: '#f56954',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
            return false;
        }
			$.ajax({
				url: '<?php echo site_url('admin/loadAttendanceReport/');?>' + class_id + '/' + section_id + '/' + month + '/' + year
			}).done(function(response) {
				$('#data').html(response);
			});
		});

	});
</script>

<script type="text/javascript">
function get_class_sections(class_id){
    $.ajax({
        url:        '<?php echo base_url();?>admin/get_class_section/' + class_id,
        success:    function(response){
            jQuery('#section_id').html(response);
        } 
    });
}
</script>