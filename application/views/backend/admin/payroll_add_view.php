
<?php echo form_open(base_url() . 'admin/payroll_selector'); ?>
    
    <div class="row">
                 <div class="col-sm-12">
                   <div class="panel panel-info">
                         <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('create_payroll'); ?></div>
                            <div class="panel-body table-responsive">
                            
        <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('department');?></label>
                    <div class="col-sm-12">
                <select name="department_id" class="form-control select2" onchange="get_employees(this.value);" required>
                    <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                    <?php
                    $department = $this->db->get('department')->result_array();
                    foreach($department as $key => $department): ?>
                        <option value="<?php echo $department['department_id']; ?>"
                            <?php if($department['department_id'] == $department_id) echo 'selected'; ?>>
                                <?php echo $department['name'] . ' ' . get_phrase('department'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
     
        <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('employee');?></label>
                    <div class="col-sm-12">
                <select name="employee_id" class="form-control" id="employee_holder" required>
                    <?php
                    $employee = $this->db->get_where('teacher',
                        array('department_id' => $department_id))->result_array();
                    foreach($employee as $key => $employee): ?>
                        <option value="<?php echo $employee['teacher_id']; ?>"
                            <?php if($employee['teacher_id'] == $employee_id) echo 'selected'; ?>>
                                <?php echo $employee['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
     
        <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('month');?></label>
                    <div class="col-sm-12">
                <select name="month" class="form-control select2" required>
                    <option value=""><?php echo get_phrase('select_a_month'); ?></option>
                    <?php
                    for ($i = 1; $i <= 12; $i++):
                        if ($i == 1)
                            $m = get_phrase('january');
                        else if ($i == 2)
                            $m = get_phrase('february');
                        else if ($i == 3)
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
                            $m = get_phrase('december'); ?>
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $month) echo 'selected'; ?>>
                                <?php echo $m; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        
       <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('year');?></label>
                    <div class="col-sm-12">
                <select name="year" class="form-control select2" required>
                    <option value=""><?php echo get_phrase('select_a_year'); ?></option>
                    <?php
                    for($i = 2019; $i <= 2030; $i++): ?>
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $year) echo 'selected'; ?>>
                                <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
						
        <button type="submit" class="btn btn-info btn-rounded btn-block btn-sm "><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('browse'); ?></button>
		</div>


<?php echo form_close(); ?>
<hr>

<?php echo form_open(base_url() . 'admin/create_payroll',
    array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

        <div class="col-md-6">
            <div class="panel panel-info" data-collapsed="0">
                <div class="panel-heading">
                        <i class="fa fa-plus"></i>
                        &nbsp;<?php echo get_phrase('allowances'); ?>
                </div>
                <div class="panel-body ">
                    <span id="allowance">
                        <div class="form-group">
                           <div class="col-md-5">
                                <input type="text" class="form-control" name="allowance_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                            <div class="col-md-5">
                                <input type="number" class="form-control" name="allowance_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="allowance_amount_1" />
                            </div>
                        </div>
                    </span>

                    <span id="allowance_input">
                        <div class="form-group">
                           <div class="col-md-5">
                                <input type="text" class="form-control" name="allowance_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                           <div class="col-md-5">
                                <input type="number" class="form-control" name="allowance_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="allowance_amount" />
                            </div>

                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-circle btn-xs"
                                    id="allowance_amount_delete" onclick="deleteAllowanceParentElement(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                         <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-info btn-rounded btn-sm" onClick="add_allowance()">
                                <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_allowance'); ?>
                                
                            </button>
                        </div>
                        <hr>
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-success btn-rounded btn-sm" onClick="calculate_total_allowance()">
                                <?php echo get_phrase('calculate_total_allowance'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- copy and paste the 2. html template here -->
        <div class="col-md-6">
            <div class="panel panel-info" data-collapsed="0">
                <div class="panel-heading">
                   
                        <i class="fa fa-plus"></i>
                       &nbsp; <?php echo get_phrase('deductions'); ?>
                  
                </div>
                <div class="panel-body ">
                    <span id="deduction">
                        <div class="form-group">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="deduction_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                           <div class="col-md-5">
                                <input type="number" class="form-control" name="deduction_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="deduction_amount_1" />
                            </div>
                        </div>
                    </span>

                    <span id="deduction_input">
                        <div class="form-group">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="deduction_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                            <div class="col-md-5">
                                <input type="number" class="form-control" name="deduction_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="deduction_amount" />
                            </div>

                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-circle btn-xs"
                                    id="deduction_amount_delete" onclick="deleteDeductionParentElement(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                       <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-info btn-rounded btn-sm" onClick="add_deduction()">
                                <i class="fa fa-plus"></i>&nbsp; <?php echo get_phrase('add_deduction'); ?>
                               
                            </button>
                        </div>
                        <hr>
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-success btn-rounded btn-sm" onClick="calculate_total_deduction()">
                                <?php echo get_phrase('calculate_total_deduction'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- copy and paste the 3 html template here -->

        <div class="col-md-offset-1 col-md-12">
            <div class="panel panel-info" data-collapsed="0">
                <div class="panel-heading">
                  
                        <i class="fa fa-plus"></i>
                       &nbsp;<?php echo get_phrase('summary'); ?>
                </div>
                
                <div class="panel-body ">

                    <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('basic'); ?></label>

                        <div class="col-sm-12">
            <?php $joining_salary = $this->db->get_where('teacher', array('teacher_id' => $employee_id))->row()->joining_salary;?>
                            <input type="text" class="form-control" name="basic" id="basic"
                                value="<?php echo $joining_salary;?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('total_allowance'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="total_allowance"
                                id="total_allowance" value="0" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('total_deduction'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="total_deduction"
                                id="total_deduction" value="0" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('net_salary'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="net_salary"
                                id="net_salary" value="<?php echo $joining_salary;?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('status'); ?></label>

                        <div class="col-sm-12">
                            <select name="status" class="form-control select2">
                                <option value="1"><?php echo get_phrase('paid'); ?></option>
                                <option value="0"><?php echo get_phrase('unpaid'); ?></option>
                            </select>
                        </div> 
                    </div>

                     <div class="form-group">
						
        <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('create_payslip'); ?></button>
		</div>
                </div>
            </div>
        </div>

   </div>
   </div>
   </div>
   </div>


   <input type="hidden" name="teacher_id" value="<?php echo $employee_id;?>">
   <input type="hidden" name="month" value="<?php echo $month;?>">
   <input type="hidden" name="year" value="<?php echo $year;?>">

<?php echo form_close(); ?>

<script type="text/javascript">

    var allowance_count     = 1;
    var deduction_count     = 1;
    var total_allowance     = 0;
    var total_deduction     = 0;
    var deleted_allowances  = [];
    var deleted_deductions  = [];



// Get all the employees from the teacher table using the below ajax codes.
function get_employees(department_id)
    {
        if(department_id != null)
            $.ajax({
                url     : '<?php echo base_url(); ?>admin/get_employees/' + department_id,
                success : function(response)
                {
                    jQuery('#employee_holder').html(response);
                }
            });
        else
            jQuery('#employee_holder').html('<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
    }
    //Get all the employees from the teacher table using the below ajax codes ends here.    

   
   $('#allowance_input').hide();
   $('#deduction_input').hide();

// Creating the blank allowance input
var blank_allowance     =   '';
$(document).ready(function(){
    blank_allowance     =   $('#allowance_input').html();
});



// Creating the blank allowance input
var blank_deduction     =   '';
$(document).ready(function(){
    blank_deduction    =   $('#deduction_input').html();
});


function add_allowance(){

    allowance_count++;
    $("#allowance").append(blank_allowance);
    $('#allowance_amount').attr('id', 'allowance_amount_' + allowance_count);
    $('#allowance_amount_delete').attr('id', 'allowance_amount_delete_' + allowance_count);
    $('#allowance_amount_delete_' + allowance_count).attr('onclick', 'deleteAllowanceParentElement(this, ' + allowance_count + ')');
}

function add_deduction(){

deduction_count++;
$("#deduction").append(blank_deduction);
$('#deduction_amount').attr('id', 'deduction_amount_' + deduction_count);
$('#deduction_amount_delete').attr('id', 'deduction_amount_delete_' + deduction_count);
$('#deduction_amount_delete_' + deduction_count).attr('onclick', 'deleteDeductionParentElement(this, ' + deduction_count + ')');
}

// Removing aloowance input
function deleteAllowanceParentElement (n, allowance_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_allowances.push(allowance_count);
}

// Removing deduction input
function deleteDeductionParentElement (n, deduction_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_deductions.push(deduction_count);
}

function calculate_total_allowance()
    {
        var amount;
        for(i = 1; i <= allowance_count; i++) {
            if(jQuery.inArray(i, deleted_allowances) == -1)
            {
                amount = $('#allowance_amount_' + i).val();

                if(amount != '') {
                    amount = parseInt(amount);
                    total_allowance = amount + total_allowance;
                    $('#total_allowance').attr('value', total_allowance);
                }
            }
        }
        net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
        $('#net_salary').attr('value', net_salary);
        total_allowance = 0;
    }


    function calculate_total_deduction()
    {
        var amount;
        for(i = 1; i <= deduction_count; i++) {
            if(jQuery.inArray(i, deleted_deductions) == -1)
            {
                amount = $('#deduction_amount_' + i).val();

                if(amount != '') {
                    amount = parseInt(amount);
                    total_deduction = amount + total_deduction;
                    $('#total_deduction').attr('value', total_deduction);
                }
            }
        }
        net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
        $('#net_salary').attr('value', net_salary);
        total_deduction = 0;
    }







</script>