<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_vacancy'); ?></div>
										<div class="panel-body table-responsive">
										
										
										
<?php echo form_open(site_url('admin/vacancy/insert'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

               
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('position_name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" required value="" autofocus />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('number_of_vacancies'); ?></label>

                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="number_of_vacancies" min="0" required value="" />
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('last_date_of_application'); ?></label>
                    
                    <div class="col-sm-12">
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" name="last_date" />
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp; <?php echo get_phrase('add_vacancy'); ?></button>
                </div>
                <?php echo form_close(); ?>
		 		</div>                
			</div>
		</div>



			<!----CREATION FORM ENDS-->
			<div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_vacancies'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('position_name'); ?></div></th>
            <th><div><?php echo get_phrase('number_of_vacancies'); ?></div></th>
            <th><div><?php echo get_phrase('last_date_of_application'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
    <tbody>

    <?php
    $counter = 1; foreach($select_vacancy as $key => $vacancy):?>
       
            <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo $vacancy['name'];?></td>
                <td><?php echo $vacancy['number_of_vacancies'];?></td>
                <td><?php echo $vacancy['last_date'];?></td>
                <td>
				
				<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_vacancy/<?php echo $vacancy['vacancy_id'];?>');" 
                        class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit" style="color:white"></i></a>
						
                     <a href="#" class="btn btn-xs btn-circle btn-danger" onclick="confirm_modal('<?php echo base_url(); ?>admin/vacancy/delete/<?php echo $vacancy['vacancy_id'];?>');">
                            <i class="fa fa-times" style="color:white"></i> </a>
							
							
                   
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