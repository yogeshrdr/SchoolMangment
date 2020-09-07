<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="panel panel-info">
           	<div class="panel-heading">
					 <?php echo get_phrase('Manage Language'); ?>
						<?php $language = $this->db->get_where('settings' , array('type' => 'language'))->row()->description;?>
						<?php if ($language == 'english'):?>  
						<span class="badge bg-danger" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'arabic'):?>  
						<span class="badge bg-warning" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'spanish'):?>  
						<span class="badge bg-danger" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'russian'):?>  
						<span class="badge bg-info" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'turkish'):?>  
						<span class="badge bg-danger" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'hindi'):?>  
						<span class="badge bg-info" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'german'):?>  
						<span class="badge bg-success" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'french'):?>  
						<span class="badge bg-info" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'chinese'):?>  
						<span class="badge bg-warning" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'bengali'):?>  
						<span class="badge bg-danger" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'portuguese'):?>  
						<span class="badge bg-success" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						
						<?php if ($language == 'thai'):?>  
						<span class="badge bg-info" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						
						<?php if ($language == 'japanese'):?>  
						<span class="badge bg-danger" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'urdu'):?>  
						<span class="badge bg-success" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>
						
						<?php if ($language == 'korean'):?>  
						<span class="badge bg-info" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
						<?php endif;?>


						 <a href="<?php echo base_url(); ?>admin/manage_language"><button type="button" class="btn btn-info btn-xs">
						 <i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?></button></a>
						
						<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/add_language/');">
						<button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_language');?>
						</button></a>
						
						<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/add_phrase/');">
						<button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_string');?>
						</button></a>
			</div>
	


		<div class="table-responsive">
			<div class="tab-content">
			<!----PHRASE EDITING TAB STARTS-->
            	<?php if (isset($edit_profile)):?>
					<div class="tab-pane active" id="edit" style="padding: 5px">
                    	<?php 
						$current_editing_language	=	$edit_profile;
						echo form_open('admin/manage_language/update_phrase/'.$current_editing_language  , array('id' => 'phrase_form'));
						$count = 1;
						$language_phrases	=	$this->db->query("SELECT `phrase_id` , `phrase` , `$current_editing_language` FROM `language`")->result_array();
						foreach($language_phrases as $key => $row)
						{
							$phrase_id			=	$row['phrase_id'];					//id number of phrase
							$phrase				=	$row['phrase'];						//basic phrase text
							$phrase_language	=	$row[$current_editing_language];	//phrase of current editing language
							?>
							
		<div class="col-sm-12">	                          	
					<!----phrase box starts-->
                   <div class="panel panel-info">
                           <div class="panel-heading"><?php echo $count++;?>.&nbsp;<?php echo $row['phrase'];?></div>
                            	<div class="row panel-body">
									<div class="col-sm-11">
 											<input type="text" name="phrase<?php echo $row['phrase_id'];?>" 
											id = "phrase-<?php echo $row['phrase_id'];?>" value="<?php echo $phrase_language;?>" 
											onkeyup="enableUpdateButton(<?php echo $row['phrase_id']; ?>)" class="form-control"/>
 										</div>
 
 									<div class="col-sm-1">
										 <button type="button" name="button" class = "btn btn-xs btn-primary pull-right" id = "button-<?php echo $row['phrase_id']; ?>" 
										 disabled onclick="updatePhrase(<?php echo $row['phrase_id'];?>)"><i class="fa fa-check"></i>
										 </button>
									</div>
							 
							 
							 	</div>                          
							
                        </div>
					</div>
                   <!----phrase box ends-->
				<?php }?>
					<input type="hidden" name="total_phrase" value="<?php echo $count;?>" />
							 
                <?php echo form_close(); ?>
		</div>
      <?php endif;?>	
            <!----PHRASE EDITING TAB ENDS-->
			
			
			
            <!----TABLE LISTING STARTS-->

            <div class="tab-pane <?php if(!isset($edit_profile))echo 'active';?>" id="list">  
				<div class="panel-body table-responsive">
                	<table class="table" id="table_export">
						<thead>
							<tr>
								<th><?php echo get_phrase('all_languages');?> </th>
								<th><div align="right"><?php echo get_phrase('actions');?></div></th>
							</tr>
						</thead>
                    <tbody>
                    			<?php
								$fields = $this->db->list_fields('language');
								foreach($fields as $key => $field)
								{
								if($field == 'phrase_id' || $field == 'phrase') continue;
								?>
                    	<tr>
                        	<td> <?php echo ucwords($field);?> </td>
								<td>
									<div align="right">
										<a href="<?php echo base_url();?>admin/manage_language/edit_phrase/<?php echo $field;?>">
										<button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i>
										</button></a>
										
										<a href="<?php echo base_url();?>admin/manage_language/delete_language/<?php echo $field;?>">
										<button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times" onclick="return confirm('Delete Language ?');"></i>
										</button></a></div>		
									</div>
								</td>
                       	 	</tr>
							<?php } ?>
						</tbody>
					</table>
						</div>	
					</div>            
				</div>
			</div>
		</div>
	</div>
</div>		

	<script type="text/javascript">
		function enableUpdateButton(id) {
			$('#button-'+id).prop('disabled', false);
		}
		function updatePhrase(phraseId) {
			$('#button-'+phraseId).text('...');
			var updatedValue = $('#phrase-'+phraseId).val();
			var currentEditingLanguage = '<?php echo $current_editing_language; ?>';
			$.ajax({
				type : "POST",
				url  : "<?php echo site_url('admin/updatePhraseWithAjax/'); ?>",
				data : {updatedValue : updatedValue, currentEditingLanguage : currentEditingLanguage, phraseId : phraseId},
				success : function(response) {
					$('#button-'+phraseId).html('<i class = "fa fa-check"></i>');
					toastr.success('<?php echo get_phrase('phrase_updated');?>');
				}
			});
		}
	</script>