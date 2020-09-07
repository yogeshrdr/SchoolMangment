<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'transportation/vehicle/insert' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" / required>
                                </div>
                            </div>

								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('vehicle_number');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="vehicle_number"/ required>
                                </div>
                            </div>

                    
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('vehicle_model');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="vehicle_model"/ required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('vehicle_quantity');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="vehicle_quantity"/ required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('year_made');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="year_made"/ required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('driver_name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="driver_name"/ required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('driver_license');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="driver_license"/ required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('driver_contact');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="driver_contact"></textarea>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-12">
                     
                    <select name="status" class="form-control">

                        <option value="available">Available</option>
                        <option value="unavailable">Un Available</option>
                    </select>

                    </div>
                </div>



              

								
							
                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->

                    <div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
				
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('name');?></div></th>
                    		<th><div><?php echo get_phrase('vehicle_number');?></div></th>
                    		<th><div><?php echo get_phrase('vehicle_model');?></div></th>
                    		<th><div><?php echo get_phrase('vehicle_quantity');?></div></th>
                    		<th><div><?php echo get_phrase('year_made');?></div></th>
                    		<th><div><?php echo get_phrase('driver_name');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('actions');?></div></th>
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $vehicles =  $this->db->get('vehicle')->result_array();
                    foreach($vehicles as $key => $vehicle):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
							<td><?php echo $vehicle['name'];?></td>
							<td><?php echo $vehicle['vehicle_number'];?></td>
                            <td><?php echo $vehicle['vehicle_model'];?></td>
							<td><?php echo $vehicle['vehicle_quantity'];?></td>
							<td><?php echo $vehicle['year_made'];?></td>
                            <td><?php echo $vehicle['driver_name'];?></td>
							<td>
                            <span class="label label-<?php if($vehicle['status']== 'available') echo 'success'; else echo 'warning';?>">
                            <?php echo $vehicle['status'];?></span></td>
                            
							<td>
							
				    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_vehicle/<?php echo $vehicle['vehicle_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>transportation/vehicle/delete/<?php echo $vehicle['vehicle_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 
			
                           
        					</td>
                        </tr>
    <?php endforeach;?>
                    </tbody>
                </table>
				</div>
			</div>
		</div>
	</div>
</div>
			
            <!----TABLE LISTING ENDS--->
            