<?php $category = $this->db->get_where('student_category', array('student_category_id' => $param2))->result_array();
        foreach($category as $key => $category):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('student_category');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->
                	<?php echo form_open(base_url() . 'studentcategory/studentCategory/update/'. $param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" value="<?php echo $category['name'];?>" name="name" / required>
                                </div>
                            </div>

								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="description"><?php echo $category['description'];?></textarea>
                                </div>
                            </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp;<?php echo get_phrase('edit');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
		</div>
	</div>
			<!----CREATION FORM ENDS-->
<?php endforeach;?>