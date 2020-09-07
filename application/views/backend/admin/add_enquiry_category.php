<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_category'); ?></div>
<div class="panel-body">

<?php echo form_open(base_url().'admin/enquiry_category/insert', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data'));?>


 					<div class="form-group">
                 	<label class="col-md-12" for="example-text">category</label>
                    <div class="col-sm-12">
                            <input type="text" name="category" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text">purpose</label>
                    <div class="col-sm-12">

                            <input type="text" name="purpose" class="form-control" >
                        </div>
                    </div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text">Whom</label>
                    <div class="col-sm-12">
                   
                            <input type="text" name="whom" class="form-control" id="field-1" >
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