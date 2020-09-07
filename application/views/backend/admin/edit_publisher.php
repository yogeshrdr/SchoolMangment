<?php $select_publisher = $this->db->get_where('publisher', array('publisher_id' => $param2))->result_array();

foreach ($select_publisher as $key => $publisher):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_publisher'); ?></div>

<?php echo form_open(base_url() . 'admin/publisher/update/' . $publisher['publisher_id'] , array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('publisher_name');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="name" type="text" class="form-control" value="<?php echo $publisher['name'];?>">
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
				
                        <textarea rows="3" class="form-control" name="description"><?php echo $publisher ['description'];?></textarea>
                                </div>
                            </div>
							
                           <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-update"></i>&nbsp;<?php echo get_phrase('update');?></button>
							</div>
                <?php echo form_close();?>
                </div>                
			</div>
		</div>
</div>


<?php endforeach; ?>