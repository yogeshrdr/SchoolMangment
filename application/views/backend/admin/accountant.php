<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
				<?php echo get_phrase('New Accountant');?>
	<div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add <?php echo get_phrase('New Accountant');?> here<i class="btn btn-primary btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div></div>
    <div class="panel-wrapper collapse out" aria-expanded="true">
                        <div class="panel-body">

                        <?php echo form_open(base_url() . 'admin/accountant/insert/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

 					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Name');?></label>

                    <div class="col-sm-12">
                            <input type="text" name="name" class="form-control">
                            <input type="hidden" name="accountant_number" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 10);?>"class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('DOB');?></label>
                    <div class="col-sm-12">
                    <input class="form-control m-r-10" name="birthday" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input" required>
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Sex');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>

                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Religion');?></label>
                    <div class="col-sm-12">
                    <input type="text" name="religion" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Blood Group');?></label>
                    <div class="col-sm-12">
                    <input type="text" name="blood_group" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Email');?></label>
                    <div class="col-sm-12">

                            <input type="email" name="email" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Phone');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="phone" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Qualification');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="qualification" class="form-control" >
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Marital Status');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="marital_status">
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Other">Other</option>
                    </select>

                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Address');?></label>
                    <div class="col-sm-12">

                            <textarea class="form-control" name="address"></textarea>
                           
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Facebook');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="facebook" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Twitter');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="twitter" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Googleple');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="googleplus" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Linkedin');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="linkedin" class="form-control" >
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Password');?></label>
                    <div class="col-sm-12">

                            <input type="password" name="password" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Document');?>(accountant CV or any document)</label>
                    <div class="col-sm-12">

                            <input type="file" name="file_name" class="dropify" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Image');?></label>
                    <div class="col-sm-12">

                            <input type="file" name="userfile" >
                        </div>
                    </div>


                    <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
					</div>
			<?php echo form_close();?>
                </div>
            </div>
		</div>
    </div>
</div>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_accountants');?></div>
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
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($select_accountant as $key => $accountant):	?>	
                               
                        <tr>
                            <td><img src="<?php echo  $this->crud_model->get_image_url('accountant', $accountant['accountant_id']) ;?>" class="img-circle" width="30" height="30"></td>
                            <td><?php echo $accountant['name'];?></td>
                            <td><?php echo $accountant['email'];?></td>
                            <td><?php echo $accountant['sex'];?></td>
                            <td><?php echo $accountant['address'];?></td>
                            <td>
                            
                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_accountant/<?php echo $accountant['accountant_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/accountant/delete/<?php echo $accountant['accountant_id'];?>')" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                            <a href="<?php echo base_url() . 'uploads/accountant_image/' . $accountant['file_name'];?>"><button class="btn btn-success btn-circle btn-xs"><i class="fa fa-download"></i></button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
				
			
				
				
</div>


</div>
</div>
</div>
</div
></div>
