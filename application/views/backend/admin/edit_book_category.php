<?php $select_book_category = $this->db->get_where('book_category', array('book_category_id' => $param2))->result_array();

foreach ($select_book_category as $key => $book_category):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_book_category'); ?></div>

<?php echo form_open(base_url() . 'admin/book_category/update/' . $book_category['book_category_id'] , array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('book_category_name');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="name" type="text" class="form-control" value="<?php echo $book_category['name'];?>">
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
				
                        <textarea rows="3" class="form-control" name="description"><?php echo $book_category ['description'];?></textarea>
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