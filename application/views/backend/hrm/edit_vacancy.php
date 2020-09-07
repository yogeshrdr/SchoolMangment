<?php $select_vacancy = $this->db->get_where('vacancy', array('vacancy_id' => $param2))->result_array();
      foreach ($select_vacancy as $key => $vacancy) { ?>
         

<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_vacancy'); ?></div>
										<div class="panel-body table-responsive">
										
										
										
<?php echo form_open(base_url(). 'hrm/vacancy/update/' . $vacancy['vacancy_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

               
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('position_name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" required value="<?php echo $vacancy['name'];?>" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('number_of_vacancies'); ?></label>

                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="number_of_vacancies" min="0" required value="<?php echo $vacancy['number_of_vacancies'];?>" />
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('last_date_of_application'); ?></label>
                    
                    <div class="col-sm-12">
                        <input type="date" class="form-control" value="<?php echo $vacancy['last_date'];?>" name="last_date" />
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp; <?php echo get_phrase('update_vacancy'); ?></button>
                </div>
                <?php echo form_close(); ?>
		 		</div>                
			</div>
		</div>



			</div>
			</div>
			</div>
			</div>
  <?php  } ?>