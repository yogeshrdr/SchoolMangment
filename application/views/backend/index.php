<?php 
$system_name    = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_address = $this->db->get_where('settings', array('type' => 'address'))->row()->description;
$footer         = $this->db->get_where('settings', array('type' => 'footer'))->row()->description;
$text_align     = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
$loginType      = $this->session->userdata('login_type');
$running_year   = $this->db->get_where('settings', array('type' => 'session'))->row()->description;
?>
<?php include 'css.php'; ?>

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
    

	<?php include 'header.php'; ?>
	<?php include $loginType.'/navigation.php';?>
	<?php include 'page_info.php';?>
	<?php include $loginType.'/'.$page_name.'.php';?>
		
       			
	<?php // include 'dashboard.php'; ?>
				
				
                
				
                <!-- .right-sidebar -->
                <div class="right-sidebar" style="background:url(<?php echo base_url(); ?>assets/images/10.png); opacity: 0.9;">
                    <div class="slimscrollright">
                        <div class="rpanel-title">Current Mesage Thread<span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                          
                            <ul class="m-t-20 chatonline">

                            <?php 
                            $user_array = ['admin', 'student', 'teacher', 'parent', 'hrm', 'hostel', 'accountant', 'librarian'];
                            for($i= 0; $i < sizeof($user_array); $i++):
                            $user_lists = $this->db->get($user_array[$i])->result_array();
                            ?>
                        <?php foreach($user_lists as $key => $user_list):?>
                            <?php $login_status = $user_list['login_status'];?>
                                <li>
                                   <?php echo $user_list['name'];?>
                                   <span class="pull-right">
                                   <?php if($login_status == '1'): ?>
                                   <?php echo '<i class="fa fa-circle" style="color:green"></i>';?>
                                   <?php endif;?>
                                   <?php if($login_status == '2'): ?>
                                   <?php echo '<i class="fa fa-circle" style="color:red"></i>';?>
                                   <?php endif;?>
                                   
                                   
                                   </span>
                                </li>
                        <?php endforeach;?>
                        <?php endfor;?>

                            
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
			
			
			
					
  
  
         <?php include 'footer.php'; ?>
		 

		
        </div>
        <!-- /#page-wrapper -->
    </div>
 <?php include 'modal.php'; ?>
 <?php include 'js.php'; ?>