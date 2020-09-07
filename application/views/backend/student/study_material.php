 
  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo get_phrase('file_type');?></th>
            <th><?php echo get_phrase('title');?></th>
            <th><?php echo get_phrase('class');?></th>
            <th><?php echo get_phrase('subject');?></th>
            <th><?php echo get_phrase('teacher');?></th>
            <th><?php echo get_phrase('description');?></th>
            <th><?php echo get_phrase('options');?></th>
        </tr>
    </thead>

    <tbody>

    <?php $counter = 1; 
     $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
     $select_student_class_id = $student_profile->class_id;
    
    $material = $this->db->get_where('material', array('class_id' => $select_student_class_id))->result_array();
                foreach($material as $key => $material):?>
            <tr>
                <td><?php echo $counter++;?></td>
                <td>
                <?php if($material['file_type']=='img' || $material['file_type']== 'jpg' || $material['file_type']== 'png'){?>
                <img src="<?php echo base_url();?>optimum/images/image.png" style="max-height:40px;">
                <?php }?>
                <?php if($material['file_type']=='docx'){?>
                <img src="<?php echo base_url();?>optimum/images/doc.jpg" style="max-height:40px;">
                <?php }?>
                <?php if($material['file_type']=='pdf'){?>
                <img src="<?php echo base_url();?>optimum/images/pdf.jpg" style="max-height:40px;">
                <?php }?>
                <?php if($material['file_type']=='xlsx'){?>
                <img src="<?php echo base_url();?>optimum/images/text.png" style="max-height:40px;">
                <?php }?>
                <?php if($material['file_type']=='txt'){?>
                <img src="<?php echo base_url();?>optimum/images/text.png" style="max-height:40px;">
                <?php }?>

              
                </td>
                <td><?php echo $material['name'];?></td>
                <td><?php echo $this->db->get_where('class', array('class_id' => $material['class_id']))->row()->name;?></td>
                <td><?php echo $this->db->get_where('subject', array('subject_id' => $material['subject_id']))->row()->name;?></td>
                <td><?php echo $this->db->get_where('teacher', array('teacher_id' => $material['teacher_id']))->row()->name;?></td>
                <td><?php echo $material['description'];?></td>
                <td>
                <a href="<?php echo base_url().'uploads/study_material/'. $material['file_name'];?>"><button type="button" class="btn btn-info btn-circle btn-xs" ><i class="fa fa-download"></i></button></a>
					
                   
                </td>
            </tr>
    <?php endforeach;?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

