<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('All Categories');?>
            
            <button onclick="showAjaxModal('<?php echo base_url();?>modal/popup/add_enquiry_category');" 
    class="btn btn-info btn-xs pull-right">
        <i class="fa fa-plus"></i><?php echo get_phrase('add_category'); ?>
</button>
            
            </div>
                <div class="panel-body table-responsive">


         <table id="example23" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo get_phrase ('category');?></th>
                    <th><?php echo get_phrase ('purpose');?></th>
                    <th><?php echo get_phrase ('whom');?></th>
                    <th><?php echo get_phrase ('option');?></th>
                </tr>
             </thead>

             <tbody>
    <?php foreach ($enquiry_category as $key => $row):?>
             <tr>
                    <td><?php echo $row['enquiry_category_id'];?></td>
                    <td><?php echo $row['category'];?></td>
                    <td><?php echo $row['purpose'];?></td>
                    <td><?php echo $row['whom'];?></td>
                    <td>
                    
                    <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_enquiry_category/<?php echo $row['enquiry_category_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url();?>admin/enquiry_category/delete/<?php echo $row['enquiry_category_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                    
                    
                    </td>
            </tr>
    <?php endforeach;?>

            </tbody>
        </table>



                </div>
        </div>
    </div>
</div>