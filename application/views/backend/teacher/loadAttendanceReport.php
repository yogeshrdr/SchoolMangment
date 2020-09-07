<?php if($section_id!=null && $month!=null && $year!=null && $class_id!=null):?>

<div class="row" align="center">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                          
						
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
								
            <h3 style="color: #696969;">Attendance Sheet</h3>
            <?php 
                $classes    =   $this->db->get('class')->result_array();
                foreach ($classes as $key => $class) {
                    if(isset($class_id) && $class_id==$class['class_id']) $class_name = $class['name'];
                }
                $sections    =   $this->db->get('section')->result_array();
                foreach ($sections as $key => $section) {
                    if(isset($section_id) && $section_id==$section['section_id']) $section_name = $section['name'];
                }
            ?>
            <?php
                $full_date = "5"."-".$month."-".$year;
                $full_date = date_create($full_date);
                $full_date = date_format($full_date,"F, Y");?>
            <h4 style="color: #696969;">Class <?php echo $class_name; ?> : Section <?php echo $section_name; ?><br><?php echo $full_date; ?></h4>

	</div>
	</div>
	</div>
	</div>
	</div>
<hr/>


<div class="row" align="center">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">

                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                <div align="center">
        KEYS: 
        Present&nbsp;-&nbsp; <i class="fa fa-circle" style="color: #00a651;"></i>&nbsp;&nbsp;
        Absent&nbsp;-&nbsp;<i class="fa fa-circle" style="color: #EE4749;"></i>&nbsp;&nbsp;
        Half Day&nbsp;-&nbsp; <i class="fa fa-circle" style="color: #0000FF;"></i>&nbsp;&nbsp;
        Late&nbsp;-&nbsp; <i class="fa fa-circle" style="color: #FF6600;"></i>&nbsp;&nbsp;
        Undefine&nbsp;-&nbsp;<i class="fa fa-circle" style="color: black;"></i>
        </div>
                                
    <table cellpadding="0" cellspacing="0" border="0" class="table">
            <thead>
                <tr>
                    <td style="text-align: left;">Students<i class="fa fa-down-thin"></i>| Date:</td>
                    <?php
                    $days = date("t",mktime(0,0,0,$month,1,$year)); 
                        for ($i=0; $i < $days; $i++) { 
                           ?>
                            <td style="text-align: center;"><?php echo ($i+1);?></td>   
                           <?php 
                        }
                    ;?>
                </tr>
            </thead>
            <tbody>
            <?php 
                //STUDENTS ATTENDANCE
                $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                foreach($students as $key => $student)
                {
                    ?>
                <tr class="gradeA">
                    <td align="left"><?php echo $student['name'];?></td>
                    <?php 
                    for ($i=1; $i <= $days; $i++) {
                    $full_date = $year."-".$month."/".$i;
                    $verify_data  =  array('student_id' => $student['student_id'], 'date' => $full_date);
                    $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                    $status     = $attendance->status;
                    ?>
                            <td style="text-align: center;">
                                <?php if ($status == "0"):?>
                                <i class="fa fa-circle" style="color:black;"></i>
                                <?php endif;?>
                                <?php if ($status == "1"):?>
                                    <i class="fa fa-circle" style="color: green;"></i>
                                <?php endif;?>
								
								<?php if ($status == "2"):?>
                                    <i class="fa fa-circle" style="color: red;"></i>
                                <?php endif;?>
								
								<?php if ($status == "3"):?>
                                    <i class="fa fa-circle" style="color:grey;"></i>
                                <?php endif;?>
								
								<?php if ($status == "4"):?>
                                    <i class="fa fa-circle" style="color: yellow;"></i>
                                <?php endif;?>
								
                            </td>    
                           <?php 
                        }
                    ;?>
                </tr>
                <?php
                }
                ;?>
            </tbody>
        </table>

        <a href="<?php echo base_url();?>teacher/printAttendanceReport/<?php echo $class_id ;?>/<?php echo $section_id ;?>/<?php echo $month ;?>/<?php echo $year ;?>" class="btn btn-success btn-sm btn-rounded btn-block" style="color:white"> <i class="fa fa-print"></i> Print</a>
		
	</div>
	</div>
	</div>
	</div>
	</div>

<?php endif;?>