
  	<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('create_payroll'); ?></div>
                               <div class="panel-body table-responsive">
<?php echo form_open(base_url() . 'hrm/payroll_selector'); ?>
    
  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-12">
                <select name="department_id" class="form-control select2" onchange="get_employees(this.value);" required>
                    <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                   <?php $department = $this->db->get('department')->result_array();
                   foreach($department as $key => $department):?>
                <option value="<?php echo $department['department_id'];?>"><?php echo $department['name'] .' '. get_phrase('department');?></option>
                    <?php endforeach;?>
                    
                   
                </select>
            </div>
        </div>
        
         <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('employee');?></label>
                    <div class="col-sm-12">
                <select name="employee_id" class="form-control" id="employee_holder" required>
                    <option value=""><?php echo get_phrase('select_a_department_first'); ?></option>
                </select>
            </div>
        </div>

         <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('month');?></label>
                    <div class="col-sm-12">
                <select name="month" class="form-control select2" required>
                    <option value=""><?php echo get_phrase('select_a_month'); ?></option>
            <?php 
            
            for($i = 1; $i <= 12; $i++):
            if($i == 1)
            $m = get_phrase('january');
            else if($i == 2)
            $m = get_phrase('february');
            else if($i == 3)
            $m = get_phrase('march');
            else if ($i == 4)
            $m = get_phrase('april');
            else if ($i == 5)
            $m = get_phrase('may');
            else if ($i == 6)
            $m = get_phrase('june');
            else if ($i == 7)
            $m = get_phrase('july');
            else if ($i == 8)
            $m = get_phrase('august');
            else if ($i == 9)
            $m = get_phrase('september');
            else if ($i == 10)
            $m = get_phrase('october');
            else if ($i == 11)
            $m = get_phrase('november');
            else if ($i == 12)
            $m = get_phrase('december');
            
            ?>
            <option value="<?php echo $i;?>"><?php echo $m;?></option>
            <?php endfor;?>
                 
                </select>
            </div>
        </div>
        
       <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('year');?></label>
                    <div class="col-sm-12">
                <select name="year" class="form-control select2" required>
                    <option value=""><?php echo get_phrase('select_a_year'); ?></option>
                <?php 
                
                for($i = 2019; $i <= 2030; $i++):
    
                ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?> </option>
                <?php endfor;?>
                   
                </select>
            </div>
        </div>

       <div class="form-group">
						
        <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('browse'); ?></button>
		</div>

	
	</div>
</div>
</div>
</div>

<?php echo form_close(); ?>
<script type="text/javascript">

function get_employees(department_id)
    {
        if(department_id != '')
            $.ajax({
                url     : '<?php echo base_url(); ?>hrm/get_employees/' + department_id,
                success : function(response)
                {
                    jQuery('#employee_holder').html(response);
                }
            });
        else
            jQuery('#employee_holder').html('<option value=""><?php echo get_phrase("Select Department"); ?></option>');
    }

</script>