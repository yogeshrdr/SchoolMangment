<?php
    $class_name    =   $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;
    $section_name  =   $this->db->get_where('section' , array('section_id' => $section_id))->row()->name;
    $system_name   =   $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $running_year  =   $this->db->get_where('settings' , array('type'=>'session'))->row()->description;
?>
<!DOCTYPE html>
<html>
<head>
	 <title>Timetable :: <?php echo $system_name;?></title>
	<link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="printableArea">
				<div class="panel-body">
				
				<div align="center">
                <img src="<?php echo base_url();?>uploads/logo.png" class="img-circle" width="80" height="80">
                </div>
			
	            <div align="center">
                    <span style="text-align: center;font-size: 32px;"><?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?></span>
                    <br/>
                    <span style="text-align: center;font-size: 20px;"><?php echo $this->db->get_where('settings' , array('type' =>'address'))->row()->description;?></span>
                    <br/>
                    <span style="text-align: center;font-size: 20px;">TIME TABLE FOR :&nbsp;<?php echo $class_name;?> - <?php echo get_phrase('section');?> <?php echo $section_name;?></span>
				<hr>

            </div>
	
                <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered">
        <tbody>
            <?php 
                for($d=1;$d<=7;$d++):
                
                if($d==1)$day='sunday';
                else if($d==2)$day='monday';
                else if($d==3)$day='tuesday';
                else if($d==4)$day='wednesday';
                else if($d==5)$day='thursday';
                else if($d==6)$day='friday';
                else if($d==7)$day='saturday';
                ?>
                <tr>
                    <td width="100"><?php echo strtoupper($day);?></td>
                    
                            <td align="left">
                        <?php
                        $this->db->order_by("time_start", "asc");
                        $this->db->where('day' , $day);
                        $this->db->where('class_id' , $class_id);
                        $this->db->where('section_id' , $section_id);
                        $this->db->where('year' , $running_year);
                        $routines   =   $this->db->get('class_routine')->result_array();
                        foreach($routines as $row):
                        ?>
                           <button class="btn btn-primary btn-xs">
                                <?php echo $this->crud_model->get_subject_name_by_id($row['subject_id']);?>
                                <?php
                                    if ($row['time_start_min'] == 0 && $row['time_end_min'] == 0) 
                                        echo '('.$row['time_start'].'-'.$row['time_end'].')';
                                    if ($row['time_start_min'] != 0 || $row['time_end_min'] != 0)
                                        echo '('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';
                                ?>
                            </button>
                        <?php endforeach;?>
                            </td>

                    
                </tr>
                <?php endfor;?>
        </tbody>
   </table>
</div>
<button id="print" class="btn btn-default btn-outline btn-sm pull-right" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
<hr>
	
	

</div>

</body>
</html>
