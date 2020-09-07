<?php $select_author = $this->db->get_where('author', array('author_id' => $param2))->result_array();

foreach ($select_author as $key => $author):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_author'); ?></div>

<?php echo form_open(base_url() . 'librarian/author/update/' . $author['author_id'] , array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('author_name');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="name" type="text" class="form-control" value="<?php echo $author['name'];?>">
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
				
                        <textarea rows="3" class="form-control" name="description"><?php echo $author ['description'];?></textarea>
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