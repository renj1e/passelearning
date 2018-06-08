<hr />
<div class="row">
	<div class="col-md-12">

    	<!---CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('subject_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_subject');?>
                    	</a></li>
		</ul>
    	<!---CONTROL TABS END------>
		<div class="tab-content">
        <br>
            <!---TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>Code:Description</div></th>
                    		<th><div>Instructor</div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;
											foreach($subjects as $row):?>
                        <tr>
							<td><b><?php echo $row['code'];?></b>: <?php echo $row['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_edit_subject/'.$row['subject_id']);?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo site_url('admin/subject/delete/'.$row['subject_id'].'/'.$class_id);?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->


			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(site_url('admin/subject/create') , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Entry Code</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="entry_code" value="<?php echo substr(md5(date('hisY').uniqid(rand(), true)), 0, 10); ?>" readonly="yes" data-validate="required" 
                                        data-message-required="<?php echo get_phrase('value_required');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Subject Code</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="code" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Subject Description</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Department</label>
                                <div class="col-sm-5">
                                    <?php
                                        $dept = $this->db->query('SELECT * FROM `class` WHERE `class_id`='.$row["class_id"])->result_array()[0];
                                    ?>
                                    <input type="text" name="" class="form-control" value="<?php echo $dept['name'];?>" readonly="yes">
                                    <input type="hidden" name="class_id" class="form-control" value="<?php echo $class_id;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Semester</label>

                                <div class="col-sm-5">
                                    <select name="sem" class="form-control selectboxit">
                                      <option value=""><?php echo get_phrase('select');?></option>
                                      <option value="1">1st Semester</option>
                                      <option value="2">2nd Semester</option>
                                      <option value="3">Summer</option>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Instructor</label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control selectboxit" style="width:100%;">
                                        <option value="">Select Instructor</option>
                                    	<?php
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row):
										?>
                                    		<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_subject');?></button>
                              </div>
						   </div>
                    </form>
                </div>
			</div>
			<!----CREATION FORM ENDS-->

		</div>
	</div>
</div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var datatable = $("#table_export").dataTable();
	});

</script>
