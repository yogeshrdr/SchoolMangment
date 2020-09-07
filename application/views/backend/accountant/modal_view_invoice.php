<?php
$invoices = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($invoices as $key => $row):
?>

	<button onClick="PrintElem('#invoice_print')" class="btn btn-rounded btn-success btn-sm"><i class="fa fa-print"></i>&nbsp;print</button>
<hr>
    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
			<td align="left" valign="top">
					
                   <strong>PAYMENT TO</strong><br> <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
                </td>
                <td align="right">
                    
					<h5><?php echo get_phrase('creation_date'); ?> : <?php echo date('d M,Y', $row['creation_timestamp']);?></h5>
                    <h5><?php echo get_phrase('payment_title'); ?> : <?php echo $row['title'];?></h5>
                    <h5><?php echo get_phrase('descriptions'); ?> : <?php echo $row['description'];?></h5>
                    <h5><?php echo get_phrase('payment_status'); ?> : <span class="label label-<?php if($row['status']=='1')echo 'success'; elseif ($row['status']=='2') echo 'danger'; else echo 'warning';?>">
                                                                                                    <?php if($row['status'] == 1): ?>
                                                                                                    <?php echo 'paid';?>
                                                                                                    <?php endif;?>
                                                                                                    <?php if($row['status'] == 2): ?>
                                                                                                    <?php echo 'unpaid';?>
                                                                                                    <?php endif;?>                    
                                                                                                    </span></h5>
                </td>
				 
            </tr>
        </table>
        <br>
        <table width="100%" border="0">    
            <tr>
               
                <td align="right" valign="top">
                   <?php echo get_phrase("student's_name"); ?> : <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br><?php 
                        $class_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->class_id;
                        echo get_phrase("student's_class").':' . ' ' . $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
                    ?><br>
                     <?php echo get_phrase("roll_number"); ?> :<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->roll; ?><br>
                </td>
            </tr>
        </table>
        
        <br>

        <!-- payment history -->
        <h4><?php echo get_phrase('payment_history'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('amount'); ?></th>
                    <th><?php echo get_phrase('method'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array();
                foreach ($payment_history as $row2):
                    ?>
                    <tr>
                        <td><?php echo date("d M, Y", $row2['timestamp']); ?></td>
                        <td><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row2['amount'],2,".",",");?></td>
                        <td>
                        <?php 
					            		if ($row2['method'] == 1)
					            			echo get_phrase('cash');
					            		if ($row2['method'] == 2)
					            			echo get_phrase('cheque');
					            		if ($row2['method'] == 3)
					            			echo get_phrase('card');
					                    if ($row2['method'] == 'paypal')
					                    	echo 'paypal';
					            	    ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
		
		<br>

        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('total_amount'); ?> :</td>
                <td align="right"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['amount'],2,".",",");?></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('paid_amount'); ?> :</h4></td>
                <td align="right"><h4><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['amount_paid'],2,".",",");?></h4></td>
            </tr>
            <?php if ($row['due'] != 0):?>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('due'); ?> :</h4></td>
                <td align="right"><h4><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['due'],2,".",",");?></h4></td>
            </tr>
            <?php endif;?>
        </table>

		
    </div>
<?php endforeach; ?>

<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>