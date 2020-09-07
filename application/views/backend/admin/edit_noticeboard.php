<?php $select_noticebaord = $this->db->get_where('noticeboard', array('noticeboard_id' => $param2))->result_array();

foreach ($select_noticebaord as $key => $noticebaord):
?>


<div class="row">
    <div class="col-sm-12">
	 	<div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_noticeboard'); ?></div>
	        	<div class="panel-body table-responsive">
                                    <?php echo form_open(base_url(). 'admin/noticeboard/update/' . $param2 , array('class' => 'form-horizontal form-groups-bordered validate'));?>

                            <!----CREATION FORM STARTS---->

                                <div class="form-group">
                                        <label class="col-md-12" for="example-text"><?php echo get_phrase('noticeboard_title');?></label>
                                    <div class="col-sm-12">
                                            <input name="title" value="<?php echo $noticebaord['title'];?>" type="text" class="form-control"/ required>
                                    </div>
                                </div>
                                                        
                                                        
                                <div class="form-group">
                                        <label class="col-md-12" for="example-text"><?php echo get_phrase('Location');?></label>
                                    <div class="col-sm-12">
                                            <input type="text" class="form-control" value="<?php echo $noticebaord['location'];?>" name="location"/ required>
                                    </div>
                                </div>
                                                        
                                                        
                                <div class="form-group">
                                        <label class="col-md-12" for="example-text"><?php echo get_phrase('content');?></label>
                                    <div class="col-sm-12">
                                            <textarea type="text" class="form-control" name="description" ><?php echo $noticebaord['description'];?></textarea>
                                    </div>
                                </div>
                                                        
                                                        
                                <div class="form-group">
                                        <label class="col-md-12" for="example-text"><?php echo get_phrase('noticeboard_date');?></label>
                                    <div class="col-sm-12">
                                        <input class="form-control m-r-10" name="timestamp" type="date" value="<?php echo $noticebaord['timestamp'];?>" id="example-date-input" required>   							
                                    </div>
                                </div>
                                    
                                                        
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-sm btn-block btn-rounded"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('update');?></button>
                                </div>
                                <?php echo form_close();?>            
                
                </div>                
			</div>
		</div>
    </div>





<?php endforeach; ?>