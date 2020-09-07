    <!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span> </div>
                        <!-- /input-group -->
            </li>
            
            <li class="user-pro">
                        <?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/default.jpg';                                 
                            }
                            ?>

                    <a href="#" class="waves-effect"><img src="<?php echo base_url() . $face_file;?>" alt="user-img" class="img-circle"> <span class="hide-menu">

                       <?php 
                                $account_type   =   $this->session->userdata('login_type');
                                $account_id     =   $account_type.'_id';
                                $name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id), 'name');
                                echo $name;
                        ?>
                        <span class="fa arrow"></span></span>
                    </a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                </li>



            <li> <a href="<?php echo base_url();?>hrm/dashboard" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Dashboard') ;?></span></a> </li>

            <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-credit-card p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('human_resources');?><span class="fa arrow"></span></span></a>
        
                <ul class=" nav nav-second-level<?php
                    if ($page_name == 'department' ||
                            $page_name == 'vacancy'|| $page_name == 'award'||
                            $page_name == 'application'||
                            $page_name == 'leave'||
                            $page_name == 'create_payslip'||
                            $page_name == 'payroll_list')
                        echo 'opened active';
                    ?>">
   
                    <li class="<?php if ($page_name == 'department') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>department/department">
                            <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('department'); ?></span>
                        </a>
                    </li>
   
                    
                    <li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('recruitment');?><span class="fa arrow"></span></span></a>
                        <ul class=" nav nav-second-level">
                    
                            <li class="<?php if ($page_name == 'vacancy') echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>hrm/vacancy">
                                <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('vacancies'); ?></span>
                                </a>
                            </li>
                            
                            <li class="<?php if ($page_name == 'application') echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>hrm/application">
                                <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('applications'); ?></span>
                                </a>
                            </li>
                        
                        </ul>
                    </li>

                    
                    <li class="<?php if ($page_name == 'leave') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>hrm/leave">
                            <i class="fa fa-angle-double-right p-r-10"></i>
                                <span class="hide-menu"><?php echo get_phrase('leave'); ?></span>
                        </a>
                    </li>
                    

                    <li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('payroll');?><span class="fa arrow"></span></span></a>
                        <ul class=" nav nav-second-level">
                    
                            <li class="<?php if ($page_name == 'create_payslip') echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>hrm/payroll">
                                <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('add_payslip'); ?></span>
                                </a>
                            </li>
                            
                            <li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>hrm/payroll_list">
                                <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('list_payroll'); ?></span>
                                </a>
                            </li>
                        
                        </ul>
                    </li>


                    
                    <li class="<?php if ($page_name == 'award') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>hrm/award">
                            <i class="fa fa-angle-double-right p-r-10"></i>
                                <span class="hide-menu"><?php echo get_phrase('manage_award'); ?></span>
                        </a>
                    </li>

                 </ul>
            </li>
                
                                
            <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>hrm/manage_profile">
                    <i class="fa fa-gears p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('manage_profile'); ?></span>
                    </a>
            </li>

            <li class="">
                <a href="<?php echo base_url(); ?>login/logout">
                    <i class="fa fa-sign-out p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('Logout'); ?></span>
                </a>
            </li>
                  
                  
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->