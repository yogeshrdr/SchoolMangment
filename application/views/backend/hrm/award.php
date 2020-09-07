<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_award'); ?></div>
										<div class="panel-body table-responsive">
										
<?php echo form_open(site_url('hrm/award/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('award_name'); ?></label>

                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" required value="" autofocus />
                        <input type="hidden" class="form-control" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" name="award_code" readonly="true">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('gift'); ?></label>

                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="gift" required value="" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('amount'); ?></label>

                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="amount" required value="" />
                    </div>
                </div>
                
                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('employee'); ?></label>

                    <div class="col-sm-12">
                        <select name="user_id" class="form-control select2" required>
                            <option value=""><?php echo get_phrase('select_an_employee'); ?></option>
                            <optgroup label="<?php echo get_phrase('hrm');?>">
                            <?php $hrm = $this->db->get('hrm')->result_array();
                            foreach ($hrm as $key => $hrm):?>
                            <option value="hrm-<?php echo $hrm['hrm_id'];?>"><?php echo $hrm['name'];?></option>
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
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="date" />
                    </div>
                </div>

                 <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-sm btn-rounded"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_award');?></button>
							</div>
 <?php echo form_close(); ?>                
 				</div>                
			</div>
		</div>
			<!----CREATION FORM ENDS-->


<div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_awards'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">    <thead>
        <tr>
            <th><div>ID</div></th>
            <th><div><?php echo get_phrase('award_name'); ?></div></th>
            <th><div><?php echo get_phrase('gift'); ?></div></th>
            <th><div><?php echo get_phrase('amount'); ?></div></th>
            <th><div><?php echo get_phrase('awarded_employee'); ?></div></th>
            <th><div><?php echo get_phrase('date'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
    <tbody>
    

    <?php $counter = 1; $award = $this->db->get('award')->result_array();
    foreach ($award as $key => $award):
    $user = explode('-', $award['user_id']);
    $user_type = $user[0];
    $user_id = $user[1];
    
    ?>
      
            <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo $award['name'];?></td>
                <td><?php echo $award['gift'];?></td>
                <td><?php echo $award['amount'];?></td>
                <td><?php echo $this->db->get($user_type, array($user_type, $user_id))->row()->name;?></td>
                <td><?php echo $award['date'];?></td>
                
                <td>
				
				<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_award/<?php echo $award['award_code'];?>');" 
                        class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit" style="color:white"></i></a>
						
                    <a href="#"  onclick="confirm_modal('<?php echo base_url(); ?>hrm/award/delete/<?php echo $award['award_code'];?>');" 
                         class="btn btn-danger btn-circle btn-xs" onclick="return confirm('Are you sure to delete?');" style="color:white">
                            <i class="fa fa-times"></i> </a> 
							
							

                   

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
			
