<?php
    $online_exam = $this->db->get_where('online_exam', array('online_exam_id' => $online_exam_id))->row_array();
    $sections    = $this->db->get_where('section', array('class_id' => $online_exam['class_id']))->result_array();
    $subjects    = $this->db->get_where('subject', array('class_id' => $online_exam['class_id']))->result_array();
?>
<div class="row">
    <?php echo form_open(site_url('admin/manage_online_exam/edit') , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
    <input type="hidden" name="online_exam_id" value="<?php echo $online_exam['online_exam_id']; ?>">
        <div class="col-md-6">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Exam / Quizzes
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('exam_title');?></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="exam_title" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $online_exam['title']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9">
                            <select name="class_id" class="form-control selectboxit" data-validate="required" id="class_id"
                            data-message-required="<?php echo get_phrase('value_required');?>"
                            onchange="return get_class_sections(this.value)" required>
                                <option value="">Select Department</option>
                                    <?php
                                    $classes = $this->db->get('class')->result_array();
                                    foreach($classes as $row):?>
                                        <option value="<?php echo $row['class_id'];?>" <?php if($row['class_id'] == $online_exam['class_id']) echo 'selected'; ?>>
                                    <?php echo $row['name'];?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Block</label>
                        <div class="col-sm-9" id="section_selector_holder">
                            <select name="section_id" class="form-control selectboxit" id = "section_id">
                                <?php foreach ($sections as $section): ?>
                                    <option value="<?php echo $section['section_id']; ?>" <?php if($section['section_id'] == $online_exam['section_id']) echo 'selected'; ?>><?php echo $section['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                        <div class="col-sm-9" id="subject_selector_holder">
                            <select name="subject_id" class="form-control selectboxit" id = "subject_id">
                                <?php foreach ($subjects as $subject): ?>
                                    <option value="<?php echo $subject['subject_id']; ?>" <?php if($subject['subject_id'] == $online_exam['subject_id']) echo 'selected'; ?>><?php echo $subject['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Exam / Quizzes
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('exam_date');?></label>
                        <div class="col-sm-9">
                            <input type="text" class="datepicker form-control" name="exam_date" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo date('M d, Y', $online_exam['exam_date']); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('exam_time');?></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="time_start" id="time_start" data-template="dropdown" data-show-seconds="true" data-default-time="<?php echo $online_exam['time_start'];?>" data-show-meridian="false" data-minute-step="5" data-second-step="5" value="" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" />
                                
                                <div class="input-group-addon">
                                    <a href="#"><i class="entypo-clock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"><h5><strong><?php echo get_phrase('to');?></strong></h5></div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="time_end" id="time_end" data-template="dropdown" data-show-seconds="true" data-default-time="<?php echo $online_exam['time_end'];?>" data-show-meridian="false" data-minute-step="5" data-second-step="5" value="" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" />
                                
                                <div class="input-group-addon">
                                    <a href="#"><i class="entypo-clock"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('minimum_percentage');?></label>
                        <div class="col-sm-9">
                            <label class="sr-only" for="exampleInputAmount"><?php echo get_phrase('minimum_percentage_for_passing'); ?></label>
                            <div class="input-group">
                              <input type="text" class="form-control" name = "minimum_percentage" id="exampleInputAmount" placeholder="<?php echo get_phrase('minimum_percentage_for_passing'); ?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $online_exam['minimum_percentage']; ?>" required>
                              <div class="input-group-addon">%</div>
                            </div>
                        </div>
                   </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('instruction');?></label>
                        <div class="col-sm-9">
                            <textarea name="instruction" class = "form-control" rows="8" cols="80" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" required><?php echo $online_exam['instruction']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12" style="text-align: center;">
                <button type="submit" class="btn btn-info"><?php echo get_phrase('update_exam');?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo site_url('admin/get_class_section_selector/');?>' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

        get_class_subject(class_id);
    }

    function get_class_subject(class_id) {

    	$.ajax({
            url: '<?php echo site_url('admin/get_class_subject_selector/');?>' + class_id ,
            success: function(response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });
    }

</script>
