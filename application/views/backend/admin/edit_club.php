<?php $select_club = $this->db->get_where('club', array('club_id' => $param2))->result_array();

foreach ($select_club as $key => $club):
?>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_club'); ?></div>

<?php echo form_open(base_url() . 'admin/club/update/' . $club['club_id'] , array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('club_name');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="club_name" type="text" class="form-control" value="<?php echo $club['club_name'];?>">
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
				
                        <textarea rows="3" class="form-control" name="desc"><?php echo $club ['desc'];?></textarea>
                                </div>
                            </div>
							
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
					<input class="form-control m-r-10" name="date" type="date" value="<?php echo $club['date'];?>" id="example-date-input" required>
                                </div>
                            </div>
                            
                           <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update_club');?></button>
							</div>
                <?php echo form_close();?>
                </div>                
			</div>
		</div>
</div>


<?php endforeach; ?>