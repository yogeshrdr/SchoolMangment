<?php echo form_open(base_url() . 'admin/payroll_list/filter'); ?>
    
       	<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('list_payroll'); ?></div>
                               <div class="panel-body table-responsive">
        
        <div class="col-md-offset-2 col-md-5">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;">
                    <?php echo get_phrase('month'); ?>
                </label>
                <select name="month" class="form-control select2">

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

        <div class="col-md-5">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;">
                    <?php echo get_phrase('year'); ?>
                </label>
                <select name="year" class="form-control select2">
            <?php $list_year = array("2019", "2020", "2021","2022", "2023","2024", "2025");
            foreach($list_year as $key => $row){
            
            ?>
        <option value="<?php echo $row;?>"<?php if($row == $year) echo 'selected';?>><?php echo $row;?></option>
            <?php } ?>
                </select>
             </div>
        </div>

        <div class="col-md-2" style="margin-top: 30px;">
            <button type="submit" class="btn btn-info btn-sm btn-rounded" style="width: 100%;"><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('search'); ?></button>
        </div>

    

<?php echo form_close(); ?>

<hr><hr><hr>

<?php $payroll = $this->db->get_where('payroll', array('date' => $month . ','. $year))->result_array();
if(empty($payroll))
{ ?>
    <div class="alert alert-info">Please select correct month and year, then click on search button to display information.</div>
<?php } else {

?>



<hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><div>#</div></th>
                <th><div>ID</div></th>
                <th><div><?php echo get_phrase('employee'); ?></div></th>
                <th><div><?php echo get_phrase('summary'); ?></div></th>
                <th><div><?php echo get_phrase('date'); ?></div></th>
                <th><div><?php echo get_phrase('status'); ?></div></th>
                <th><div><?php echo get_phrase('options'); ?></div></th>
            </tr>
        </thead>
        <tbody>

        <?php $counter = 1;
                $payroll = $this->db->get_where('payroll', array('date' => $month . ','. $year))->result_array();
                foreach($payroll as $key => $row):?>
               
         
                <tr>
                    <td><?php echo $counter++;?></td>
                    <td><?php echo $row['payroll_code'];?></td>
                    <td>
                    <?php $user =  $this->db->get_where('teacher',array('teacher_id' => $row['user_id']))->row();
                  echo $user->name;?>
                    </td>
                    <td>

                        <?php
                        $total_allowance    = 0;
                        $total_deduction    = 0;
                        $allowances = json_decode($row['allowances']);
                        $deductions = json_decode($row['deductions']);

                        foreach($allowances as $key => $allowance)
                                    $total_allowance += $allowance->amount;
                        foreach ($deductions as $key => $deduction)
                        $total_deduction += $deduction->amount;

                        $net_salary = $user->joining_salary + $total_deduction - $deduction;?>


                        <div>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('basic_salary'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $user->joining_salary;?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('total_allowance'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $total_allowance;?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('total_deduction'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $total_deduction;?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><hr style="margin: 5px 0px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('net_salary'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo  $net_salary;?></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <?php $date = explode(',', $row['date']);
                                $month_list = array('january', 'february', 'march', 'april','may', 'june', 'july', 'august', 'september',
                                                    'october', 'november', 'december');
                                for($i=1; $i<= 12; $i++)
                                    if($i == $date[0])
                                        $m = get_phrase($month_list[$i-1]);
                                            echo $m . ', ' .$date[1]; ?>
                    </td>
                    <td>

                    <?php if($row['status'] == 1)
                        echo '<div class="label label-success">'.get_phrase('paid').'</div>';
                        else   
                        echo '<div class="label label-danger">'.get_phrase('unpaid').'</div>';
                    ?>
                       
                    </td>
                    <td>
                        
      <a href="#" class="btn btn-success btn-rounded btn-sm" style="color:#fff" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/payroll_details/<?php echo $row['payroll_id'];?>');"><i class="fa fa-link"></i> <?php echo get_phrase('view details'); ?></a>
     
     <?php if($row['status']== 0){ ?>
      <a href="<?php echo base_url(); ?>admin/payroll_list/mark_paid/<?php echo $row['payroll_id'];?>/<?php echo $month;?>/<?php echo $year;?>" class="btn btn-primary btn-rounded btn-sm" style="color:#fff"><i class="fa fa-check"></i> <?php echo get_phrase('mark_as_paid'); ?></a>
     <?php } ?>    
                    </td>
                </tr>
<?php endforeach;?>
        </tbody>
    </table>

<?php } ?>

</div>
</div>
</div>
</div>


