<div class="row">

	<div class="col-sm-7">
		<div class="panel panel-info">

			<div class="panel-heading"><i class="fa fa-gear"></i>  <?php echo get_phrase('Edit Details');?></div>
			<div class="panel-body table-responsive">

				<?php 

				foreach ($edit_profile as $key => $row):
				

				?>

				<?php echo form_open(base_url(). 'teacher/manage_profile/update', array('class' => 'form-horizontal form-groups-bordered', 'enctype'=> 'multipart/form-data'));?>

				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Name');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Email');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
					</div>
				</div>


				<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('teacher Image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile" onChange="readURL(this);">
					 <img id="blah" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']); ?>" alt="" height="200" width="200"/>
					</div>
					</div>	

	

				<div class="form-group">
					<button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i>  <?php echo get_phrase('save');?></button>
				</div>



				<?php echo form_close();?>


				<?php endforeach;?>




			</div>

		</div>

	</div>


<div class="col-sm-5">
<div class="panel panel-info">
<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Change Password'); ?></div>
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body table-responsive">

<?php echo form_open(base_url() . 'teacher/manage_profile/change_password', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'));
        ?>			
					<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Password');?></label>
					<div class="col-sm-12">
						<input type="password" class="form-control" name="new_password" value="">
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Confirm Password');?></label>
					<div class="col-sm-12">
						<input type="password" class="form-control" name="confirm_new_password" value="">
					</div>
				</div>
					
				<div class="form-group">
                     <button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Change Password');?></button>
                
                </div>
		
				<?php echo form_close(); ?>

</div>
</div>

</div>
</div>

</div>