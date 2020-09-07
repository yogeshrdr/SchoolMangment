<?php $social = $this->db->get_where('social_category', array('social_category_id' => $param2))->result_array();
            foreach($social as $key => $social):?>

<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('social_category');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'socialcategory/socialCategory/update/'. $param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" value="<?php echo $social['name'];?>" name="name" / required>
                    </div>
                </div>

								
			<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('colour');?></label>
                    <div class="col-sm-12">
                    <select name="colour" class="form-control select2" required>
                    
                    <option value=""><?php echo get_phrase('select_colour');?></option>
                    <option value="success"<?php if($social['colour']== 'success') echo 'selected';?>><?php echo get_phrase('success');?></option>
                    <option value="info"<?php if($social['colour']== 'info') echo 'selected';?>><?php echo get_phrase('info');?></option>
                    <option value="primary"<?php if($social['colour']== 'primary') echo 'selected';?>><?php echo get_phrase('primary');?></option>
                    <option value="danger"<?php if($social['colour']== 'danger') echo 'selected';?>><?php echo get_phrase('danger');?></option>
                    <option value="warning"<?php if($social['colour']== 'warning') echo 'selected';?>><?php echo get_phrase('warning');?></option>

                   
                   </select>

                  </div>
            </div>


             
            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('icon_picker');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control icon-picker" value="<?php echo $social['icon'];?>" name="icon" / required>
                    </div>
                </div>

                 
								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                                    <textarea  class="form-control" name="description"><?php echo $social['description'];?></textarea>
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