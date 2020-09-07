<?php
	$query = $this->db->get_where('section' , array('class_id' => $class_id));
	if($query->num_rows() > 0):
	$sections = $query->result_array();
	foreach($sections as $row):
?>
   <div class="row">
        <div class="col-sm-12">
			<div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;
					<?php echo get_phrase('class');?> - <?php echo $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;?> : 
                    <?php echo get_phrase('section');?> - <?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?>	
				</div>
                    <div class="panel-body table-responsive">			
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
                                <tr class="gradeA">
                                    <td width="100"><?php echo strtoupper($day);?></td>
                                    <td>
                                        <?php
                                        $this->db->order_by("time_start", "asc");
                                        $this->db->where('day' , $day);
                                        $this->db->where('class_id' , $class_id);
                                        $this->db->where('section_id' , $row['section_id']);
                                        $this->db->where('year' , $running_year);
                                        $routines   =   $this->db->get('class_routine')->result_array();
                                        foreach($routines as $row2):
                                        ?>
                                    
                                            <button class="btn btn-info btn-rounded btn-sm">
                                                <?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?>
                                                <?php
                                                    if ($row2['time_start_min'] == 0 && $row2['time_end_min'] == 0) 
                                                        echo '('.$row2['time_start'].'-'.$row2['time_end'].')';
                                                    if ($row2['time_start_min'] != 0 || $row2['time_end_min'] != 0)
                                                        echo '('.$row2['time_start'].':'.$row2['time_start_min'].'-'.$row2['time_end'].':'.$row2['time_end_min'].')';
                                                ?>
                                            
                                            </button>
                                        <?php endforeach;?>

                                    </td>
                                </tr>
                                <?php endfor;?>
                                
                            </tbody>
                        </table>
                
        </div>
	</div>
  </div>

</div>
<?php endforeach;?>
<?php endif;?>
