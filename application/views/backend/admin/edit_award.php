<?php $award = $this->db->get_where('award', array('award_code' => $param2))->result_array();
foreach($award as $key => $award):
?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_award'); ?></div>
										<div class="panel-body table-responsive">

                    <?php echo form_open(site_url('admin/award/update/' . $param2), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('award_name'); ?></label>

                    <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" value="<?php echo $award['name'];?>" />
                        </div>
                    </div>

                   <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('gift'); ?></label>

                    <div class="col-sm-12">
                            <input type="text" class="form-control" name="gift" value="<?php echo $award['gift'];?>"/>
                        </div>
                    </div>

                   
                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('amount'); ?></label>

                    <div class="col-sm-12">
                            <input type="text" class="form-control" name="amount" value="<?php echo $award['amount'];?>" />
                        </div>
                    </div>


                    <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('employee'); ?></label>

                    <div class="col-sm-12">
                        <select name="user_id" class="form-control select2" required>
                            <option value=""><?php echo get_phrase('select_an_employee'); ?></option>
                            <optgroup label="<?php echo get_phrase('admin');?>">
                            <?php $admin = $this->db->get('admin')->result_array();
                            foreach ($admin as $key => $admin):?>
                            <option value="admin-<?php echo $admin['admin_id'];?>"><?php echo $admin['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('teacher');?>">
                            <?php $teacher = $this->db->get('teacher')->result_array();
                            foreach ($teacher as $key => $teacher):?>
                            <option value="teacher-<?php echo $teacher['teacher_id'];?>"><?php echo $teacher['name'];?></option>
                            <?php endforeach;?>
                       

                            <optgroup label="<?php echo get_phrase('hrm');?>">
                            <?php $hrm = $this->db->get('hrm')->result_array();
                            foreach ($hrm as $key => $hrm):?>
                            <option value="hrm-<?php echo $hrm['hrm_id'];?>"><?php echo $hrm['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('accountant');?>">
                            <?php $accountant = $this->db->get('accountant')->result_array();
                            foreach ($accountant as $key => $accountant):?>
                            <option value="accountant-<?php echo $accountant['accountant_id'];?>"><?php echo $accountant['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('parent');?>">
                            <?php $parent = $this->db->get('parent')->result_array();
                            foreach ($parent as $key => $parent):?>
                            <option value="parent-<?php echo $parent['parent_id'];?>"><?php echo $parent['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('hostel');?>">
                            <?php $hostel = $this->db->get('hostel')->result_array();
                            foreach ($hostel as $key => $hostel):?>
                            <option value="hostel-<?php echo $hostel['hostel_id'];?>"><?php echo $hostel['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('librarian');?>">
                            <?php $librarian = $this->db->get('librarian')->result_array();
                            foreach ($librarian as $key => $librarian):?>
                            <option value="librarian-<?php echo $librarian['librarian_id'];?>"><?php echo $librarian['name'];?></option>
                            <?php endforeach;?>


                        </select>
                    </div>
                </div>

               

                    <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('date'); ?></label>
                    
                    <div class="col-sm-12">
                            <input type="date" class="form-control" name="date" value="<?php echo $award['date'];?>" />
                        </div>
                    </div>
  <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-block btn-sm btn-rounded"> <i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_award');?></button>
							</div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
	

<?php endforeach; ?>