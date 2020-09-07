<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_club'); ?></div>

<?php echo form_open(base_url() . 'admin/club/insert', array('class' => 'form-horizontal form-goups-bordered validate'));?>
					<div class="panel-body table-responsive">
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('club_name');?></label>
                    <div class="col-sm-12">
					
                            
                                    <input name="club_name" type="text" class="form-control"/ required>
                                </div>
                            </div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
					
                           
                                    <textarea rows="3" class="form-control" name="desc" required></textarea>
                                </div>
                            </div>
							
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-12">
					<input class="form-control m-r-10" name="date" type="date" value="" id="example-date-input" required>
                                </div>
                            </div>
                            
                           <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_club');?></button>
							</div>
                <?php echo form_close();?>
                </div>                
			</div>
			</div>
			<!----CREATION FORM ENDS-->
	
 <div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_club'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
				<thead>

                
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('club_name');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
						</tr>
                  
					</thead>
                    <tbody>

                    <?php $count = 1; foreach ($select_club as $key => $club): ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $club ['club_name'];?></td>
							<td><?php echo $club ['desc'];?></td>
							<td><?php echo $club ['date'];?></td>
							<td>

                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_club/<?php echo $club['club_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>admin/club/delete/<?php echo $club['club_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                            
                            
                            
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
			