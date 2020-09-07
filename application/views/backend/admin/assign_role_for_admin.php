<?php

$selecting_id_from_admin_table = array('admin_id' => $param2);
$query_admin_role_table = $this->db->get_where('admin_role', $selecting_id_from_admin_table);

if($query_admin_role_table->num_rows() < 1)

    $this->db->insert('admin_role', $selecting_id_from_admin_table);
?>



<?php $select_admin_informtion_from_admin_table = $this->db->get_where('admin', array('admin_id' => $param2))->result_array();
        foreach ($select_admin_informtion_from_admin_table as $key => $selected_admin):?>
<div class="col-sm-12">
	<div class="panel panel-info">
    <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Assign Role For:');?>  <?php echo $selected_admin['name'];?></div>
        <div class="panel-body table-responsive">
        <?php echo form_open(base_url() . 'admin/updateAdminRole/'. $param2, array('class' => 'form-horizontal form-goups-bordered validate'));?>

            <table class="display nowrap" cellspacing="0" width="100%">
                <tr>
                    <td>dashboard</td>
                    <td>Manage Academics </td>
                    <td>Manage Employee </td>
                    <td>Manage Student </td>
                </tr>
                <tr>
                    <td><input class="check" name="dashboard" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->dashboard) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_academics" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_academics) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_employee" value="1"  <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_employee) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_student" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_student) echo 'checked';?> type="checkbox"></td>
                </tr>
                <tr>
                    <td>Manage Attendance</td>
                    <td>Download Page</td>
                    <td>Manage Parent</td>
                    <td>Manage Alumni </td>
                </tr>
                <tr>
                    <td><input class="check" name="manage_attendance" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_attendance) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="download_page" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->download_page) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_parent" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_parent) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_alumni" value="1" <?php if($this->db->get_where('admin_role', array('admin_id' => $param2))->row()->manage_alumni) echo 'checked';?> type="checkbox"></td> 
                </tr>
                
            </table>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update');?></button>
			</div>
            <?php echo form_close();?>
        </div>
	</div>
</div>
        <?php endforeach;?>