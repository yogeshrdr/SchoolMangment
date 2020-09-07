<?php
	$running_year  =   $this->db->get_where('settings' , array('type'=>'session'))->row()->description;
	$query = $this->db->get_where('section' , array('class_id' => $class_id));
	    if($query->num_rows() > 0):
		    $sections = $query->result_array();
	            foreach($sections as $key => $section):
?>
   <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;
							<?php echo get_phrase('class');?> - <?php echo $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;?> : 
                    <?php echo get_phrase('section');?> - <?php echo $this->db->get_where('section' , array('section_id' => $section['section_id']))->row()->name;?>
                    <a href="<?php echo base_url();?>admin/class_routine_print_view/<?php echo $class_id;?>/<?php echo $section['section_id'];?>" 
                        class="btn btn-info btn-xs pull-right" target="_blank">
                            <i class="fa fa-print"></i> <?php echo get_phrase('print');?>
                    </a>
							
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
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
                                $this->db->where('section_id' , $section['section_id']);
                                $this->db->where('year' , $running_year);
                                $routines   =   $this->db->get('class_routine')->result_array();
                                foreach($routines as $key => $routine):
                                ?>
                                <div class="btn-group">
                                    <button class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <?php echo $this->crud_model->get_subject_name_by_id($routine['subject_id']);?>
                                        <?php
                                            if ($routine['time_start_min'] == 0 && $routine['time_end_min'] == 0) 
                                                echo '('.$routine['time_start'].'-'.$routine['time_end'].')';
                                            if ($routine['time_start_min'] != 0 || $routine['time_end_min'] != 0)
                                                echo '('.$routine['time_start'].':'.$routine['time_start_min'].'-'.$routine['time_end'].':'.$routine['time_end_min'].')';
                                        ?>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_class_routine/<?php echo $routine['class_routine_id'];?>');">
                                            <i class="fa fa-edit"></i>
                                                <?php echo get_phrase('edit');?>
                                                        </a>
                                 </li>
                                 
                                 <li>
                                    <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/class_routine/delete/<?php echo $routine['class_routine_id'];?>');">
                                        <i class="fa fa-times"></i>
                                            <?php echo get_phrase('delete');?>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
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

</div>
<?php endforeach;?>
<?php endif;?>