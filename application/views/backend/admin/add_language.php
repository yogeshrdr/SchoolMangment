<div class="row">
     <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add'); ?></div>
                <?php echo form_open(base_url() . 'admin/manage_language/add_language', array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
                        <div class="form-group">
                            <label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-12">
                                    <input name="language" type="text" class="form-control"/ required>
                                </div>
                            </div>
							
						
                           <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add');?></button>
							</div>
                <?php echo form_close();?>
                </div>                
			</div>
			</div>
			<!----CREATION FORM ENDS-->