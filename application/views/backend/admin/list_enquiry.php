<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"><i class="fa fa-list"></i>&nbsp; <?php echo get_phrase('list_enquiry');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">

    <thead>
        <tr>
            
            <th>category</th>
            <th>mobile</th>
            <th>purpose</th>
            <th>name</th>
            <th>who to see</th>
            <th>content</th>
            <th>email</th>
            <th>date submitted</th>
            <th>option</th>
        </tr>
    </thead>

    <tbody>

    <?php
    foreach ($select_enquiry as $key => $select_enquiry):?>
    ?>
        			
            <tr>
                <td><?php echo $select_enquiry ['category'];?></td>
                <td><?php echo $select_enquiry ['mobile'];?></td>
                <td><?php echo $select_enquiry ['purpose'];?></td>
                <td><?php echo $select_enquiry ['name'];?></td>
                <td><?php echo $select_enquiry ['whom_to_meet'];?></td>
                <td><?php echo $select_enquiry  ['content'];?></td>
                <td><?php echo $select_enquiry ['email'];?></td>
                <td><?php echo $select_enquiry ['date'];?></td>
                <td>
                
                <a href="<?php echo base_url();?>admin/list_enquiry/delete/<?php echo $select_enquiry['enquiry_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                
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