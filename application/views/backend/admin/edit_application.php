<?php $edit_application = $this->db->get_where('application', array('application_id' => $param2))->result_array();
        foreach($edit_application as $key => $row){ ?>
    <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_application'); ?></div>
										<div class="panel-body table-responsive">
                    <?php echo form_open(site_url('admin/application/update/' . $param2), array('class' => 'form-horizontal form-groups-bordered validate',
                        'enctype' => 'multipart/form-data')); ?>

                       <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('applicant_name'); ?></label>

                        <div class="col-sm-12">
                                <input type="text" class="form-control" name="applicant_name" required value="<?php echo $row['applicant_name']; ?>" autofocus />
                            </div>
                        </div>
                        
            <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('position'); ?></label>

                        <div class="col-sm-12">
                                <select name="vacancy_id" class="form-control" required>
                                    <option value=""><?php echo get_phrase('select_a_position'); ?></option>
                                    <?php
                                    $vacancies = $this->db->get('vacancy')->result_array();
                                    foreach ($vacancies as $key => $row2)
                                        if($row2['number_of_vacancies'] > 0) { ?>
                                            <option value="<?php echo $row2['vacancy_id']; ?>" <?php if($row2['vacancy_id'] == $row['vacancy_id']) echo 'selected'; ?>>
                                                <?php echo $row2['name']; ?>
                                            </option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                      <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('application_date'); ?></label>
                        
                        <div class="col-sm-12">
                                <input type="date" class="form-control" name="apply_date" value="<?php echo date('Y-m-d', $row['apply_date']); ?>" />
                            </div>
                        </div>
                        
                         <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('status'); ?></label>

                        <div class="col-sm-12">
                            <select name="status" class="form-control select2">
                                    <option value="applied" <?php if($row['status'] == 'applied') echo 'selected'; ?>>
                                        <?php echo get_phrase('applied'); ?></option>
                                    <option value="on_review" <?php if($row['status'] == 'on_review') echo 'selected'; ?>>
                                        <?php echo get_phrase('on_review'); ?></option>
                                    <option value="interviewed" <?php if($row['status'] == 'interviewed') echo 'selected'; ?>>
                                        <?php echo get_phrase('interviewed'); ?></option>
                                    <option value="offered" <?php if($row['status'] == 'offered') echo 'selected'; ?>>
                                        <?php echo get_phrase('offered'); ?></option>
                                    <option value="hired" <?php if($row['status'] == 'hired') echo 'selected'; ?>>
                                        <?php echo get_phrase('hired'); ?></option>
                                    <option value="declined" <?php if($row['status'] == 'declined') echo 'selected'; ?>>
                                        <?php echo get_phrase('declined'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo get_phrase('update_applicaton'); ?></button>
                </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


<script type="text/javascript">

    $( document ).ready(function() {

        // SelectBoxIt Dropdown replacement
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
            {
                var $this = $(el),
                    opts = {
                        showFirstOption: attrDefault($this, 'first-option', true),
                        'native': attrDefault($this, 'native', false),
                        defaultText: attrDefault($this, 'text', ''),
                    };
                    
                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }

    });

</script>