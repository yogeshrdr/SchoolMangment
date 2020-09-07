<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_application'); ?></div>
										<div class="panel-body table-responsive">
                <?php echo form_open(site_url('admin/application/insert'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('applicant_name'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="applicant_name" required value="" autofocus />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('position'); ?></label>

                <div class="col-sm-12">
                            <select name="vacancy_id" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('select_a_position'); ?></option>
                                <?php
                                $vacancies = $this->db->get('vacancy')->result_array();
                                foreach ($vacancies as $row)
                                    if($row['number_of_vacancies'] > 0) { ?>
                                        <option value="<?php echo $row['vacancy_id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('application_date'); ?></label>
                        
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="apply_date" value="<?php echo date('Y-d-m');?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('status'); ?></label>

                        <div class="col-sm-12">
                            <select name="status" class="form-control select2">
                                <option value="applied"><?php echo get_phrase('applied'); ?></option>
                                <option value="on review"><?php echo get_phrase('on_review'); ?></option>
                                <option value="interviewed"><?php echo get_phrase('interviewed'); ?></option>
                                <option value="offered"><?php echo get_phrase('offered'); ?></option>
                                <option value="hired"><?php echo get_phrase('hired'); ?></option>
                                <option value="declined"><?php echo get_phrase('declined'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp; <?php echo get_phrase('add_applicaton'); ?></button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

