<?php 
$edit_teacher		=	$this->db->get_where('teacher' , array('teacher_id' => $param2) )->result_array();
foreach ( $edit_teacher as $key => $row):
?>
	
            
            
            <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('edit_teacher');?></div>
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                    <?php echo form_open(base_url() . 'admin/teacher/update/'. $row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                                
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('role');?></label>
                    <div class="col-sm-12">
							<select name="role" class="form-control select2" required>
                                    	<option value="1" <?php if($row['role'] == '1')echo 'selected';?>><?php echo get_phrase('class_teacher');?></option>
                                    	<option value="2" <?php if($row['role'] == '2')echo 'selected';?>><?php echo get_phrase('subject_teacher');?></option>
                          </select>
						</div> 
					</div>
					
					  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('birthday');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>
							
							
                           <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('gender');?></label>
                    <div class="col-sm-12">
                                    <select name="sex" class="form-control selectboxit">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
					
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('religion');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="religion" value="<?php echo $row ['religion']; ?>" >
						</div> 
					</div>
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('address');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
							
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('blood_group');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="blood_group" value="<?php echo $row ['blood_group']; ?>" >
						</div> 
					</div>
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('qualification');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="qualification" value="<?php echo $row['qualification'];?>">
						</div>
					</div>
					
					<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('marital_status');?>*</label>
                                    <div class="col-sm-12">
														
                                       <select class=" form-control" name="marital_status" required>
									   	<option value="Married" <?php if($row['marital_status'] == 'Married')echo 'selected';?>><?php echo get_phrase('Married');?></option>
                                    	<option value="Single" <?php if($row['marital_status'] == 'Single')echo 'selected';?>><?php echo get_phrase('Single');?></option>
										<option value="Divorced" <?php if($row['marital_status'] == 'Divorced')echo 'selected';?>><?php echo get_phrase('Divorced');?></option>
                                    	<option value="Engaged" <?php if($row['marital_status'] == 'Engaged')echo 'selected';?>><?php echo get_phrase('Engaged');?></option>
                                    </select>
                                    </div>
                                </div>
					
					
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile"/>
       				 <img id="blah" src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" alt="" height="200" width="200"/>

					</div>
					</div>	
					
					
					<div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo get_phrase('account_information');?></h3>
                          
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-phone"><?php echo get_phrase('phone');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                               <input type="text" id="example-phone" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12" for="inurl"><?php echo get_phrase('linkedin');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="inurl" name="linkedin" class="form-control" value="<?php echo $row['linkedin']; ?>">
                                    </div>
                                </div>
								
								
                        </div>
                    </div>
				
						 
						<div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo get_phrase('social_information');?></h3>
                          
                                <div class="form-group">
                                    <label class="col-md-12" for="furl"><?php echo get_phrase('facebook');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="furl" name="facebook" value="<?php echo $row['facebook']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="turl"><?php echo get_phrase('twitter');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="turl" name="twitter" class="form-control" value="<?php echo $row['twitter']; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('googleplus');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="googleplus" value="<?php echo $row['googleplus'];?>">
						</div>
					</div>
                              
					
  
<div class="form-group">
<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('update_teacher');?></button>
</div>
                <?php echo form_close();?>
</div>
</div>
</div>
</div>
</div>

<?php endforeach;?>
