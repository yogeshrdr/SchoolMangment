
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_applicant'); ?>
							
	<a  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_applicant_modal');" 
   	class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> <?php echo get_phrase('new_applicant'); ?>
	</a> 


							
	</div>
	
	<div class="panel-body table-responsive">
    <div class="col-md-2">

        <a style="text-align: left;" href="<?php echo base_url();?>admin/application/applied" 
            class="<?php if ($status == 'applied') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('applied');?>
        </a>

        <a style="text-align: left;" href="<?php echo base_url();?>admin/application/on_review" 
            class="<?php if ($status == 'on_review') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('on_review');?>
        </a>

        <a style="text-align: left;" href="<?php echo base_url();?>admin/application/interviewed" 
            class="<?php if ($status == 'interviewed') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('interviewed');?>
        </a>

        <a style="text-align: left;" href="<?php echo base_url();?>admin/application/offered" 
            class="<?php if ($status == 'offered') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('offered');?>
        </a>

        <a style="text-align: left;" href="<?php echo base_url();?>admin/application/hired" 
            class="<?php if ($status == 'hired') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('hired');?>
        </a>

        <a style="text-align: left;" href="<?php echo base_url();?>admin/application/declined" 
            class="<?php if ($status == 'declined') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('declined');?>
        </a>

    </div>

    <div class="col-md-10">

 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><div>#</div></th>
                    <th><div><?php echo get_phrase('applicant_name'); ?></div></th>
                    <th><div><?php echo get_phrase('position'); ?></div></th>
                    <th><div><?php echo get_phrase('application_date'); ?></div></th>
                    <th><div><?php echo get_phrase('status'); ?></div></th>
                    <th><div><?php echo get_phrase('options'); ?></div></th>
                </tr>
            </thead>
            <tbody>
            
            <?php $counter = 1; 
            $select_application = $this->db->get_where('application', array ('status' => $status))->result_array();
            foreach ($select_application as $key => $applicant):?>

                    <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $applicant['applicant_name'];?></td>
                        <td>
                        
                        <?php echo $this->db->get_where('vacancy', array('vacancy_id' => $applicant['vacancy_id']))->row()->name; ?>
                        
                        </td>
                        <td><?php echo date('Y-m-d', $applicant['apply_date']);?></td> 
                        <td><?php echo $applicant['status'];?></td>
                        <td>
						
						
						
						<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_application/<?php echo $applicant['application_id'];?>');" 
                        class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit" style="color:white"></i></a>
						
                    <a href="#" class="btn btn-danger btn-circle btn-xs" onclick="confirm_modal('<?php echo base_url(); ?>admin/application/delete/<?php echo $applicant['application_id'];?>');">
                            <i class="fa fa-times" style="color:white"></i> </a>
							
							
                          
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