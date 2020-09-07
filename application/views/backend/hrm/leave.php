<div class="row">

			<div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_leave'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('employee'); ?></div></th>
            <th><div><?php echo get_phrase('start_date'); ?></div></th>
            <th><div><?php echo get_phrase('end_date'); ?></div></th>
            <th><div><?php echo get_phrase('reason'); ?></div></th>
            <th><div><?php echo get_phrase('status'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
    <tbody>

    <?php $count = 1;
            $leave = $this->db->get('leave')->result_array();
            foreach($leave as $key =>$leave): ?>
   
            <tr>
                <td><?php echo $count++;?></td>
                <td><?php echo $this->db->get_where('teacher',array('teacher_id' => $leave['teacher_id']))->row()->name;?></td>
                <td><?php echo $leave['start_date'];?></td>
                <td><?php echo $leave['end_date'];?></td>
                <td><?php echo substr($leave['reason'], 0, 50) . '...';?></td>
                <td>
                
                <?php if($leave['status'] == 1) 
                echo '<div class="label label-success">' . get_phrase('approved') . '</div>';
                if($leave['status'] == 0) 
                echo '<div class="label label-warning">' . get_phrase('pending') . '</div>';
                if($leave['status'] == 2) 
                echo '<div class="label label-danger">' . get_phrase('declined') . '</div>';?>
                </td>

                <td>
                
                <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_leave/<?php echo $leave['leave_code'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                <a onclick="confirm_modal('<?php echo base_url();?>hrm/leave/delete/<?php echo $leave['leave_code'];?>')" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                
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
            <!----TABLE LISTING ENDS--->