<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('activity');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'activity/clubActivity/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" / required>
                    </div>
                </div>

								
			<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('colour');?></label>
                    <div class="col-sm-12">
                    <select name="colour" class="form-control select2" required>
                    
                    <option value=""><?php echo get_phrase('select_colour');?></option>
                    <option value="success"><?php echo get_phrase('success');?></option>
                    <option value="info"><?php echo get_phrase('info');?></option>
                    <option value="primary"><?php echo get_phrase('primary');?></option>
                    <option value="danger"><?php echo get_phrase('danger');?></option>
                    <option value="warning"><?php echo get_phrase('warning');?></option>

                   
                   </select>

                  </div>
            </div>


             
            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('icon_picker');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control icon-picker" name="icon" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Student Club');?></label>
                    <div class="col-sm-12">
							<select name="club_id" class="form-control select2" style="width:100%" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$club = $this->db->get('club')->result_array();
								foreach($club as $row):
									?>
                            		<option value="<?php echo $row['club_id'];?>">
										<?php echo $row['club_name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						 	<a href="<?php echo base_url();?>admin/club/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>

				    </div> 
				</div>
					
				
                 
								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                                    <textarea  class="form-control" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" id="example-date-input" value="<?php echo date('Y-m-d');?>" name="date" / required>
                    </div>
                </div>



                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-add"></i>&nbsp;<?php echo get_phrase('add');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->

                    <div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
				
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('colour');?></div></th>
                    		<th><div><?php echo get_phrase('icon');?></div></th>
                    		<th><div><?php echo get_phrase('club');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                            <th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('actions');?></div></th>
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $activity =  $this->db->get('activity')->result_array();
                    foreach($activity as $key => $activity):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
							<td><?php echo $activity['name'];?></td>
							<td><?php echo $activity['colour'];?></td>
                            <td><?php echo $activity['icon'];?></td>
                            <td><?php echo $this->db->get_where('club', array('club_id' => $activity['club_id']))->row()->club_name;?></td>
                            <td><?php echo $activity['description'];?></td>
                            <td><?php echo $activity['date'];?></td>
							<td>
							
				    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_student_activity/<?php echo $activity['activity_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>activity/clubActivity/delete/<?php echo $activity['activity_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 
			
                           
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
            