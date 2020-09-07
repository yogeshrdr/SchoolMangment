<?php $query = $this->db->get_where('section', array('class_id' => $class_id));
if($query->num_rows() > 0):
    $section_id = $this->db->get_where('class_routine', array('class_routine_id' => $class_routine_id))->row()->section_id;
        $sections = $query->result_array();?>

    <div class="form-group">
        <label class="col-md-12" for="example-text"><?php echo get_phrase('secion');?></label>
        <div class="col-sm-12">

            <select name="section_id" class="form-control select2" required>
            <?php foreach($sections as $key => $section):?>
                <option value="<?php echo $section['section_id'];?>"<?php if($section['section_id']== $section_id) echo 'selected';?>><?php echo $section['name'];?></option>
            <?php endforeach;?>

            </select>
        </div>
    </div>
<?php endif;?>

<?php $subject_id = $this->db->get_where('class_routine', array('class_routine_id' => $class_routine_id))->row()->subject_id;?>
<div class="form-group">
        <label class="col-md-12" for="example-text"><?php echo get_phrase('subject');?></label>
        <div class="col-sm-12">

            <select name="subject_id" class="form-control select2" required>
            <?php $subjects = $this->db->get_where('subject', array('class_id' => $class_id))->result_array();
            foreach($subjects as $key => $subject):?>
                <option value="<?php echo $subject['subject_id'];?>"<?php if($subject['subject_id']== $subject_id) echo 'selected';?>><?php echo $subject['name'];?></option>
            <?php endforeach;?>

            </select>
        </div>
    </div>