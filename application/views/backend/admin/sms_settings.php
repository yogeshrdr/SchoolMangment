<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-body table-responsive">
            <?php echo form_open(base_url() . 'smssetting/sms_settings/sms_active' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('Select SMS Gateway');?></label>
                <div class="col-sm-12">
                <?php $active = $this->db->get_where('sms_settings', array('type' => 'active_sms_gateway'))->row()->info;?>
                    <select name="active_sms_gateway" class="form-control select2" required>
                        <option value="clickatell"<?php if($active == 'clickatell') echo 'selected';?>><?php echo get_phrase('cliclatell');?></option>
                        <option value="msg91"<?php if($active == 'msg91') echo 'selected';?>><?php echo get_phrase('msg91');?></option>
                        <option value="disabled"<?php if($active == 'disabled') echo 'selected';?>><?php echo get_phrase('disable');?></option>
                    </select>

                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>
    </form>  


    <div class="row">
                    <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('clickatell');?> 
                            

    <?php if($active == 'clickatell'):?>
    <span class="label label-success" style="color:white"><?php echo get_phrase('active');?></span>
    <?php endif;?>
                            
                            </div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

<?php echo form_open(base_url() . 'smssetting/sms_settings/clickatell' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('clickatell_username');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'clickatell_username'))->row()->info;?>" name="clickatell_username" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('clickatell_password');?></label>
                    <div class="col-sm-12">
                        <input type="text" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'clickatell_password'))->row()->info;?>" class="form-control" name="clickatell_password" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('clickatell_apikey');?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'clickatell_apikey'))->row()->info;?>" name="clickatell_apikey" / required>
                    </div>
                </div>

					<br><br><br><br>			
				
                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
		</div>

        <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('msg91');?>
                            
                            <?php if($active == 'msg91'):?>
                            <span class="label label-success" style="color:white"><?php echo get_phrase('active');?></span>
                            <?php endif;?>
                            </div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

<?php echo form_open(base_url() . 'smssetting/sms_settings/msg91' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
    
    
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('msg91_authentication_key');?></label>
                    <div class="col-sm-12">
                    <input type="text" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'msg91_authentication_key'))->row()->info;?>" class="form-control" name="msg91_authentication_key" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('msg91_sender_id');?></label>
                    <div class="col-sm-12">
                    <input type="text" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'msg91_sender_id'))->row()->info;?>" class="form-control" name="msg91_sender_id" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('msg91_route');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'msg91_route'))->row()->info;?>" name="msg91_route" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('msg91_country_code');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" value="<?php echo $this->db->get_where('sms_settings', array('type' => 'msg91_country_code'))->row()->info;?>" name="msg91_country_code" / required>
                    </div>
                </div>
							
                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
		</div>
	</div>
			<!----CREATION FORM ENDS-->           </div>                
			</div>
		</div>
	</div>

            