<?php 
$edit_data		=	$this->db->get_where('subject' , array('subject_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_subject');?>
            	</div>
            </div>
			<div class="panel-body">
                <?php echo form_open(site_url('admin/subject/do_update/'.$row['subject_id']) , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Entry Code</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="entry_code" value="<?php echo substr(md5(date('hisY').uniqid(rand(), true)), 0, 10); ?>" readonly="yes" data-validate="required" 
                                        data-message-required="<?php echo get_phrase('value_required');?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Subject Code</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="code" value="<?php echo $row['code'];?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Subject Description</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Department</label>
                    <div class="col-sm-5 controls">
                        <select name="class_id" class="form-control">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>"
                                    <?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
                                        <?php echo $row2['name'];?>
                                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Semester</label>
                    <?php
                      switch ($row['sem'])
                      {
                        case '1':
                          $sem = 'First Semester';
                          break;
                        case '2':
                          $sem = 'Second Semester';
                          break;                            
                        default:
                          $sem = 'Summer';
                          break;
                      }
                    ?>
                    <div class="col-sm-5">
                        <select name="sem" class="form-control">
                          <option value="<?php echo $row['sem']?>">Selected: <?php echo $sem?></option>
                          <option value=""><?php echo get_phrase('select');?></option>
                          <option value="1">1st Semester</option>
                          <option value="2">2nd Semester</option>
                          <option value="3">Summer</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Instructor</label>
                    <div class="col-sm-5 controls">
                        <select name="teacher_id" class="form-control">
                            <?php 
                            $teachers = $this->db->get('teacher')->result_array();
                            foreach($teachers as $row2):
                            ?>
                                <option value="<?php echo $row2['teacher_id'];?>"
                                    <?php if($row['teacher_id'] == $row2['teacher_id'])echo 'selected';?>>
                                        <?php echo $row2['name'];?>
                                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_subject');?></button>
                    </div>
                 </div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>



