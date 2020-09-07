<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
							
							NEW ALUMNI
						   
						   
                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW ALUMNI HERE<i class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div>
                            </div>
                            <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body">
                <?php echo form_open(base_url() . 'admin/alumni/insert/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">

				<input type="text" class="form-control" name="name"   autofocus required>
				   
                    </div>
                </div>
				
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('gender');?></label>
                    <div class="col-sm-12">
                       
				<select name="sex" class="form-control select2">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="male"><?php echo get_phrase('male');?></option>
                              <option value="female"><?php echo get_phrase('female');?></option>
                          </select>
                    </div> 
                </div>
				
				 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
                       
				<input type="text" class="form-control" name="phone"    required>

                    </div> 
                </div>

               <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
                       
				<input type="email" class="form-control" name="email"    required>

                    </div> 
                </div>
				
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('adress');?></label>
                    <div class="col-sm-12">
                       
                                <textarea rows="5" name="address" class="form-control"></textarea>

                    </div> 
                </div>
				
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('profession');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="profession" value="" >
                            </div>
                        </div>
				
							
							
                        <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('marital_status');?></label>
                    <div class="col-sm-12">
                       
				<select name="marital_status" class="form-control select2">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="married"><?php echo get_phrase('married');?></option>
                              <option value="single"><?php echo get_phrase('single');?></option>
                              <option value="divorced"><?php echo get_phrase('divorced');?></option>
                          </select>
                    </div> 
                </div>
				
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('graduation_date');?></label>
                    <div class="col-sm-12">
							<input class="form-control m-r-10" name="g_year" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input" required>

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
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('interest');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="interest" value="" >
				</div>
				</div>
				
				<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="dropify" name="userfile" /required>
					</div>
					</div>	
					
                    <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_alumni');?></button>
					</div>
					<br>
                <?php echo form_close();?>	
									
									
                                </div>
                            </div>
                        </div>
                    </div>
				</div>  
 
 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_alumni');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
           
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('sex');?></div></th>
                            <th><div><?php echo get_phrase('address');?></div></th>
   							<th><div><?php echo get_phrase('phone');?></div></th>
                            <th><div><?php echo get_phrase('profession');?></div></th>
						   	<th><div><?php echo get_phrase('graduation_year');?></div></th>
                            <th><div><?php echo get_phrase('school_club');?></div></th>
                            <th><div><?php echo get_phrase('Interest');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($select_alumni as $key => $alumni):?>
                        <tr>
                        <td><img src="<?php echo $this->crud_model->get_image_url('alumni',$alumni['alumni_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $alumni['name'];?></td>
                            <td><?php echo $alumni['email'];?></td>
                            <td><?php echo $alumni['sex'];?></td>
                            <td><?php echo $alumni['address'];?></td>
							<td><?php echo $alumni['phone'];?></td>
                            <td><?php echo $alumni['profession'];?></td>
                            <td><?php echo $alumni['g_year'];?></td>
                            <td><?php echo $this->db->get_where('club' , array('club_id' => $alumni['club_id']))->row()->club_name;?></td>
                            <td><?php echo $alumni['interest'];?></td>

                            <td>

                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_alumni/<?php echo $alumni['alumni_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <a onclick="confirm_modal('<?php echo base_url();?>admin/alumni/delete/<?php echo $alumni['alumni_id'];?>')" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
					
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