<?php $select_book = $this->db->get_where('book', array('book_id' => $param2))->result_array();
        foreach($select_book as $key => $book){ ?>

<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_book'); ?></div>
										<div class="panel-body table-responsive">


        <?php echo form_open(base_url(). 'admin/book/update/' . $param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

<!----CREATION FORM STARTS---->

	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('book_title');?></label>
            <div class="col-sm-12">
				<input name="name" value="<?php echo $book['name'];?>" type="text" class="form-control"/ required>
            </div>
    </div>
							
							
	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('isbn');?></label>
            <div class="col-sm-12">
                <input type="text" value="<?php echo $book['isbn'];?>" class="form-control" name="isbn">
            </div>
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('edition');?></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" value="<?php echo $book['edition'];?>" name="edition">
            </div>
    </div>


    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
            <div class="col-sm-12">
                <select name="class_id" id="class_id" class="form-control select2" onchange="return get_class_subject(this.value)" required>
                    <option value=""><?php echo get_phrase('select_class');?></option>

                    <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                    <option value="<?php echo $class['class_id'];?>"<?php if($book['class_id'] == $class['class_id']) echo 'selected="selected"';?>><?php echo $class['name'];?></option>
                    <?php endforeach;?>
                   </select>

            </div>
    </div>

	<div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('subject');?></label>
            <div class="col-sm-12">
                    <select name="subject_id" class="form-control" id="subject">
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
                                    		<option value="<?php echo $publisher['publisher_id'];?>"<?php if($book['publisher_id'] == $publisher['publisher_id']) echo 'selected="selected"';?>><?php echo $publisher['name'];?></option>
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
                                    		<option value="<?php echo $author['author_id'];?>"<?php if($book['author_id'] == $author['author_id']) echo 'selected="selected"';?>><?php echo $author['name'];?></option>
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
                                    		<option value="<?php echo $book_category['book_category_id'];?>" <?php if($book['book_category_id'] == $book_category['book_category_id']) echo 'selected="selected"' ;?>><?php echo $book_category['name'];?></option>
                            <?php endforeach;?>     
                        </select>              
            </div> 
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('price');?></label>
            <div class="col-sm-12">
                <input type="number" class="form-control" value="<?php echo $book['price'];?>"   name="price">
            </div>
    </div>

    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('quantity');?></label>
            <div class="col-sm-12">
                <input type="number" class="form-control" value="<?php echo $book['quantity'];?>"  name="quantity">
            </div>
    </div>
    			
							
	<div class="form-group">
            <label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
            <div class="col-sm-12">
			    <textarea type="text" class="form-control" name="description" ><?php echo $book['description'];?></textarea>
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
                    <option value="1"<?php if($book['status'] == 1) echo 'selected="selected"' ;?>><?php echo get_phrase('available');?></option>
                    <option value="2"<?php if($book['status'] == 2) echo 'selected="selected"' ;?>><?php echo get_phrase('unavailable');?></option>
                </select>              
            </div> 
    </div>

	<div class="form-group">
            <label class="col-md-12" for="example-text"><?php echo get_phrase('Cover Image');?></label>
        <div class="col-sm-12">
        <input type="file" name="userfile" >
        <img src="<?php echo $this->crud_model->get_image_url('book', $book['book_id']);?>" height="30px" weight="30px" class="img-circle">
        </div>
    </div>


          
                            
    <div class="form-group">
        <button type="submit" class="btn btn-info btn-sm btn-block btn-rounded"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_book');?></button>
    </div>
<?php echo form_close();?>            
                
                </div>                
			</div>
		</div>
    </div>
			<!----CREATION FORM ENDS-->
<?php } ?>

<script type="text/javascript">
function get_class_subject(class_id){
    $.ajax({
        url:        '<?php echo base_url();?>admin/get_class_subject/' + class_id,
        success:    function(response){
            jQuery('#subject').html(response);
        } 

    });
}
</script>