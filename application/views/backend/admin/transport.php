<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'transportation/transport/insert' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            
                            
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" / required>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('transport_route');?></label>
                    <div class="col-sm-12">
                     
                    <select name="transport_route_id" class="form-control">
                    <?php $routes = $this->db->get('transport_route')->result_array();
                    foreach($routes as $key => $route):?>
                        <option value="<?php echo $route['transport_route_id'];?>"><?php echo $route['name'];?></option>
                    <?php endforeach;?>
                    </select>

                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('vehicle');?></label>
                    <div class="col-sm-12">
                     
                    <select name="vehicle_id" class="form-control">

                    <?php $vehicles = $this->db->get('vehicle')->result_array();
                    foreach($vehicles as $key => $vehicle):?>
                        <option value="<?php echo $vehicle['vehicle_id'];?>"><?php echo $vehicle['name'];?></option>
                    <?php endforeach;?>
                    </select>

                    </div>
                </div>



                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('route_fare');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="route_fare" / required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"></textarea>
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
                    		<th><div><?php echo get_phrase('routes');?></div></th>
                    		<th><div><?php echo get_phrase('vehicle');?></div></th>
                    		<th><div><?php echo get_phrase('route_fare');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('actions');?></div></th>
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $transports =  $this->db->get('transport')->result_array();
                    foreach($transports as $key => $transport):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
							<td><?php echo $transport['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('transport_route', $transport['transport_route_id']);?></td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('vehicle', $transport['vehicle_id']);?></td>
							<td><?php echo $transport['route_fare'];?></td>
							<td><?php echo $transport['description'];?></td>
                            
							<td>
							
				    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_transport/<?php echo $transport['transport_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>transportation/transport/delete/<?php echo $transport['transport_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 
			
                           
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
            