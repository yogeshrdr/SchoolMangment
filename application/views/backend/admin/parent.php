<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
				NEW PARENT
	<div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW PARENT HERE<i class="btn btn-primary btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div></div>
    <div class="panel-wrapper collapse out" aria-expanded="true">
                        <div class="panel-body">

<?php echo form_open(base_url().'admin/parent/insert', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data'));?>


 					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Name');?></label>
                    <div class="col-sm-12">
                            <input type="text" name="name" class="form-control">
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
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Profession');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="profession" class="form-control" >
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Address');?></label>
                    <div class="col-sm-12">

                            <textarea class="form-control" name="address"></textarea>
                           
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Password');?></label>
                    <div class="col-sm-12">

                            <input type="password" name="password" class="form-control" >
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
                            <div class="panel-heading"><i class="fa fa-list"></i>&nbsp; <?php echo get_phrase('list_enquiry');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">

                                 <thead>
                        <tr>
                            <th>#</th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('phone');?></div></th>
                            <th><div><?php echo get_phrase('profession');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>

    <tbody>

    <?php
   $count = 1; foreach ($select_parent as $key => $parent):?>

        			
            <tr>
            <td><?php echo $count++;?></td>
            <td><?php echo $parent ['name'];?></td>
            <td><?php echo $parent ['email'];?></td>
            <td><?php echo $parent ['phone'];?></td>
            <td><?php echo $parent ['profession'];?></td>
                <td>
                
                <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_parent/<?php echo $parent['parent_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/parent/delete/<?php echo $parent['parent_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                
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