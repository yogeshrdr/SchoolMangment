<div class="row">
<div class="col-sm-12">
<div class="panel panel-info">
                          
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
								
				  	<div class="row panel-body">
                    <div class="col-sm-6">
						
					<div class="alert alert-success"><?php echo get_phrase('admission_form'); ?>&nbsp;-&nbsp;PART A</div>

				
                <?php echo form_open(base_url() . 'admin/new_student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
				<div class="form-group"> 
					 <div class="col-sm-12">
  		  			  <input type='file' name="userfile" onChange="readURL(this);" style="color:red">
       				 <img id="blah"  src="<?php echo base_url();?>uploads/default_avatar.jpg" alt="your image" height="150" width="150"/ style="border:1px dotted red">
					 
					</div>
					</div>	
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('running_session');?></label>
                    <div class="col-sm-12">
                  <input type="text" class="form-control" name="session"  value="<?php echo $this->db->get_where('settings', array('type' => 'session'))->row()->description; ?>" readonly="true">
                    </div>
                </div>
				
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('full_name');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="name" required autofocus>
						</div>
					</div>

					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('parent');?></label>
                    <div class="col-sm-12">
							<select name="parent_id" class="form-control select2" style="width:100%" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $row):
									?>
                            		<option value="<?php echo $row['parent_id'];?>">
										<?php echo $row['name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						 	<a href="<?php echo base_url();?>admin/parent/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>

						</div> 
						</div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
							<select name="class_id" class="form-control select2" style="width:100%"id="class_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_class_sections(this.value)">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
                          </select>
		<a href="<?php echo base_url();?>admin/classes/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>


						</div> 
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('section');?></label>
                    <div class="col-sm-12">
		                        <select name="section_id" class="form-control select2" style="width:100%" id="section_selector_holder">
		                            <option value=""><?php echo get_phrase('select_class_first');?></option>
			                        
			                    </select>
	<a href="<?php echo base_url();?>admin/section/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>
			                </div>
					</div>
					
						
					<input type="hidden" class="form-control" name="roll" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" required>
						
					

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('birthday');?></label>
                    <div class="col-sm-12">
							<input type="text"  class="form-control" name="birthday" required>
						</div> 
					</div>
					
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('age');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="age" id="age" value="" readonly="true">
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('place_birth');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="place_birth" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('gender');?></label>
                    <div class="col-sm-12">
							<select name="sex" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="male"><?php echo get_phrase('male');?></option>
                              <option value="female"><?php echo get_phrase('female');?></option>
                          </select>
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('mother_tongue');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="m_tongue" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('religion');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="religion" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('blood_group');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="blood_group" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('address');?></label>
                    <div class="col-sm-12">
					<textarea name="address" cols="" class="form-control" rows=""></textarea>
						</div> 
					</div>
					
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('city');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="city" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Student House');?></label>
                    <div class="col-sm-12">
							<select name="house_id" class="form-control select2" style="width:100%" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$house = $this->db->get('house')->result_array();
								foreach($house as $row):
									?>
                            		<option value="<?php echo $row['house_id'];?>">
										<?php echo $row['name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						 	<a href="<?php echo base_url();?>studenthouse/studentHouse/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>

						</div> 
						</div>
						
			<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Student Club');?></label>
                    <div class="col-sm-12">
							<select name="club_id" class="form-control select2" style="width:100%" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$club = $this->db->get('club')->result_array();
								foreach($club as $row):
									?>
                            		<option value="<?php echo $row['club_id'];?>">
										<?php echo $row['club_name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						 	<a href="<?php echo base_url();?>admin/club/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>

						</div> 
						</div>
					
					
					</div>
					
					
					<div class="col-sm-6">
					
					<div class="alert alert-success"><?php echo get_phrase('admission_form'); ?>&nbsp;-&nbsp;PART B</div>
					
				<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('state');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="state" value="" >
						</div> 
					</div>
					
						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('nationality');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="nationality" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="phone" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="email" value="" required>
						</div>
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('password');?></label>
                    <div class="col-sm-12">
					<input type="password" class="form-control" name="password" value="" onkeyup="CheckPasswordStrength(this.value)" required>
					<strong id="password_strength"></strong>
						</div> 
					</div>

						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('previous_school_name');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="ps_attended" data-validate="required" value="" autofocus>
						</div>
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('the_address');?></label>
                    <div class="col-sm-12">
						<textarea name="ps_address" cols="" class="form-control" rows=""></textarea>
						</div>
					</div>
					
						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('purpose_of_leaving');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="ps_purpose" data-validate="required" value="" autofocus>
						</div>
					</div>

						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('class_in_which_was_studying');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="class_study" data-validate="required" value="" autofocus>
						</div>
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('date_of_leaving');?></label>
                    <div class="col-sm-12">
							<input type="date" value="2011-08-19" id="example-date-input" class="form-control datepicker" name="date_of_leaving">

						</div> 
					</div>
					
						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('admission_date');?></label>
                    <div class="col-sm-12">
							<input type="date" value="2011-08-19" id="example-date-input" class="form-control datepicker" name="am_date">

						</div> 
					</div>

						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('transfer_certificate');?></label>
                    <div class="col-sm-12">
							<select name="tran_cert" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
                              
                            <option value="Yes">Yes</option>
                            <option value="No">No</option> 
                          </select>
						</div> 
					</div>
					
				<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('birth_certificate');?></label>
                    <div class="col-sm-12">
							<select name="dob_cert" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
                              
                            <option value="Yes">Yes</option>
                            <option value="No">No</option> 
                          </select>
						</div> 
					</div>

				<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('any_given_marksheet');?></label>
                    <div class="col-sm-12">
							<select name="mark_join" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
                              
                            <option value="Yes">Yes</option>
                            <option value="No">No</option> 
                          </select>
							
						</div> 
					</div>

						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('physical_handicap');?></label>
                    <div class="col-sm-12">
							<select name="physical_h" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
                              
                            <option value="Yes">Yes</option>
                            <option value="No">No</option> 
                          </select>
						</div> 
					</div>

						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('dormitory');?></label>
                    <div class="col-sm-12">
							<select name="dormitory_id" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
	                              <?php 
	                              	$dormitories = $this->db->get('dormitory')->result_array();
	                              	foreach($dormitories as $row):
	                              ?>
                              		<option value="<?php echo $row['dormitory_id'];?>"><?php echo $row['name'];?></option>
                          		<?php endforeach;?>
                          </select>
						  <a href="<?php echo base_url();?>admin/dormitory/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>
						</div> 
					</div>


	<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('transport_route');?></label>
                    <div class="col-sm-12">
							<select name="transport_id" class="form-control select2" style="width:100%">
                              <option value=""><?php echo get_phrase('select');?></option>
	                              <?php 
	                              	$transports = $this->db->get('transport')->result_array();
	                              	foreach($transports as $row):
	                              ?>
                              		<option value="<?php echo $row['transport_id'];?>"><?php echo $row['name'];?></option>
                          		<?php endforeach;?>
                          </select>
	<a href="<?php echo base_url();?>admin/transport/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>

						</div> 
					</div>
					
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Student Category');?></label>
                    <div class="col-sm-12">
							<select name="student_category_id" class="form-control select2" style="width:100%" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$student_category = $this->db->get('student_category')->result_array();
								foreach($student_category as $row):
									?>
                            		<option value="<?php echo $row['student_category_id'];?>">
										<?php echo $row['name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						 	<a href="<?php echo base_url();?>studentcategory/studentCategory/"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>

						</div> 
						</div>
						
					<!--<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('documents');?>&nbsp;(Student's Documents)</label>
                    <div class="col-sm-12">
             	<input type="file" name="file_name" class="form-control" required>
			 
			  <p style="color:red">Accept zip, pdf, word, excel, rar and others</p>
			  
					</div>
					</div> -->
					
					</div>
					</div>
					
					


 <div class="form-group">
						
			<button type="submit" class="btn btn-success btn-sm btn-rounded btn-block"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save_student');?></button>
			<img id="install_progress" src="<?php echo base_url() ?>assets/images/loader-2.gif" style="margin-left: 20px; display: none"/>
						
					</div>
					
					
                <?php echo form_close();?>
	
				</div>
			</div>		
		</div>	
    </div> 
</div>





<script type="text/javascript">

	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

</script>


<script type="text/javascript">

	function CheckPasswordStrength(password) {
	var password_strength = document.getElementById("password_strength");

        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }

        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.

        var passed = 0;

        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }

        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
            case 2:
                strength = "Weak";
                color = "red";
                break;
            case 3:
                 strength = "Medium";
                color = "orange";
                break;
            case 4:
                 strength = "Strong";
                color = "green";
                break;
               
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;

if(passed <= 2){
         document.getElementById('show').disabled = true;
        }else{
            document.getElementById('show').disabled = false;
        }

    }

</script>

<script type="text/javascript">
        $(function() {
            $('input[name="birthday"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, 
            function(start, end, label) {
                var years = moment().diff(start, 'years');
               // alert("You are " + years + " years old.");
                $("#age").val(years);
            });
        });
</script>