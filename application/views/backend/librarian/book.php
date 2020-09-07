<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_book'); ?></div>
										<div class="panel-body table-responsive">


        <?php echo form_open(base_url(). 'librarian/book/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

<!----CREATION FORM STARTS---->

	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('book_title');?></label>
            <div class="col-sm-12">
				<input name="name" type="text" class="form-control"/ required>
            </div>
    </div>
							
							
	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('isbn');?></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="isbn">
            </div>
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('edition');?></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="edition">
            </div>
    </div>


    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
            <div class="col-sm-12">
                <select name="class_id" id="class_id" class="form-control select2" onchange="return get_class_subject(this.value)" required>
                    <option value=""><?php echo get_phrase('select_class');?></option>

                    <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                    <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                    <?php endforeach;?>
                   </select>

            </div>
    </div>

	<div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('subject');?></label>
            <div class="col-sm-12">
                    <select name="subject_id" class="form-control" id="subject_selector_holder">
                    <option value=""><?php echo get_phrase('select_subject');?></option>
                    </select>
            </div>
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('publisher');?></label>
            <div class="col-sm-12">
                       
					   <select name="publisher_id" class="form-control select2" style="width:100%;" required>
						<option value=""><?php echo get_phrase('select');?></option>
                           <?php $publisher =  $this->db->get('publisher')->result_array();
                                    foreach($publisher as $key => $publisher):?>         	
                                    		<option value="<?php echo $publisher['publisher_id'];?>"><?php echo $publisher['name'];?></option>
                            <?php endforeach;?>     
                        </select>              
            </div> 
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('author');?></label>
            <div class="col-sm-12">
                       
					   <select name="author_id" class="form-control select2" style="width:100%;" required>
						<option value=""><?php echo get_phrase('select');?></option>
                           <?php $author =  $this->db->get('author')->result_array();
                                    foreach($author as $key => $author):?>         	
                                    		<option value="<?php echo $author['author_id'];?>"><?php echo $author['name'];?></option>
                            <?php endforeach;?>     
                        </select>              
            </div> 
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('book_category');?></label>
            <div class="col-sm-12">
					   <select name="book_category_id" class="form-control select2" style="width:100%;" required>
						<option value=""><?php echo get_phrase('select');?></option>
                           <?php $book_category =  $this->db->get('book_category')->result_array();
                                    foreach($book_category as $key => $book_category):?>         	
                                    		<option value="<?php echo $book_category['book_category_id'];?>"><?php echo $book_category['name'];?></option>
                            <?php endforeach;?>     
                        </select>              
            </div> 
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('price');?></label>
            <div class="col-sm-12">
                <input type="number" class="form-control" name="price">
            </div>
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('quantity');?></label>
            <div class="col-sm-12">
                <input type="number" class="form-control" name="quantity">
            </div>
    </div>
    			
							
	<div class="form-group">
            <label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
            <div class="col-sm-12">
			    <textarea type="text" class="form-control" name="description" ></textarea>
            </div>
    </div>
							
							
	<div class="form-group">
            <label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
        <div class="col-sm-12">
		<input class="form-control m-r-10" name="timestamp" type="date" value="<?php echo date('Y-m-d');?>" id="example-date-input" required>		
        </div>
    </div>

    <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('status');?></label>
            <div class="col-sm-12">  
				<select name="status" class="form-control select2" style="width:100%;" required>
					<option value=""><?php echo get_phrase('select');?></option>
                    <option value="1"><?php echo get_phrase('available');?></option>
                    <option value="2"><?php echo get_phrase('unavailable');?></option>
                </select>              
            </div> 
    </div>

	<div class="form-group">
            <label class="col-md-12" for="example-text"><?php echo get_phrase('Cover Image');?></label>
        <div class="col-sm-12">
        <input type="file" name="userfile" >
        </div>
    </div>


          
                            
    <div class="form-group">
        <button type="submit" class="btn btn-info btn-sm btn-block btn-rounded"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_book');?></button>
    </div>
<?php echo form_close();?>            
                
                </div>                
			</div>
		</div>
			<!----CREATION FORM ENDS-->
		
<div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_book'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('book_category');?></div></th>
                            <th><div><?php echo get_phrase('author');?></div></th>
                    		<th><div><?php echo get_phrase('class');?></div></th>
                            <th><div><?php echo get_phrase('subject');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('actions');?></div></th>
						</tr>
					</thead>
                    <tbody>
                <?php
 
               $select_book = $this->db->get('book')->result_array();
               foreach($select_book as $key => $book):

                ?>
                        <tr>
                            <td><?php echo $book ['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('book_category', $book['book_category_id']);?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('author', $book['author_id']);?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('class', $book['class_id']);?></td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('subject', $book['subject_id']);?></td>
                            <td><span class="label label-<?php if($book['status'] == '1') echo 'success'; else echo 'warning';?>">
                            <?php if($book['status'] == 1):?>
                            <?php echo 'available';?>
                            <?php endif;?>
                            <?php if($book['status'] == 2):?>
                            <?php echo 'unavailable';?>
                            <?php endif;?>
                            </span></td>
							<td>
                            
                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_book/<?php echo $book['book_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url();?>librarian/book/delete/<?php echo $book['book_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                            
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


<script type="text/javascript">
function get_class_subject(class_id){
    $.ajax({
        url:        '<?php echo base_url();?>librarian/get_class_subject/' + class_id,
        success:    function(response){
            jQuery('#subject_selector_holder').html(response);
        } 

    });
}
</script>