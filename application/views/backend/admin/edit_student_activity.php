<?php $activity = $this->db->get_where('activity', array('activity_id' => $param2))->result_array();
            foreach($activity as $key => $activity):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('edit');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'activity/clubActivity/update/'. $param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" value="<?php echo $activity['name'];?>" name="name" / required>
                    </div>
                </div>

								
			<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('colour');?></label>
                    <div class="col-sm-12">
                    <select name="colour" class="form-control select2" required>
                    
                    <option value=""><?php echo get_phrase('select_colour');?></option>
                    <option value="success"<?php if($activity['colour']== 'success') echo 'selected';?>><?php echo get_phrase('success');?></option>
                    <option value="info"<?php if($activity['colour']== 'info') echo 'selected';?>><?php echo get_phrase('info');?></option>
                    <option value="primary"<?php if($activity['colour']== 'primary') echo 'selected';?>><?php echo get_phrase('primary');?></option>
                    <option value="danger"<?php if($activity['colour']== 'danger') echo 'selected';?>><?php echo get_phrase('danger');?></option>
                    <option value="warning"<?php if($activity['colour']== 'warning') echo 'selected';?>><?php echo get_phrase('warning');?></option>

                   
                   </select>

                  </div>
            </div>


             
            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('icon_picker');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control icon-picker" value="<?php echo $activity['icon'];?>" name="icon" / required>
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
                            		<option value="<?php echo $row['club_id'];?>"<?php if($activity['club_id']== $row['club_id']) echo 'selected';?>>
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
                                    <textarea  class="form-control" name="description"><?php echo $activity['description'];?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" id="example-date-input" value="<?php echo $activity['date'];?>" name="date" / required>
                    </div>
                </div>



                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp;<?php echo get_phrase('edit');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->
 <?php endforeach;?>