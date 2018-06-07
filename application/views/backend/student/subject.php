<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('subject_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">            
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>Department</div></th>
                    		<th><div><?php echo get_phrase('subject_name');?></div></th>
                    		<th><div>Instructor</div></th>
                    		<th><div>Action</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($subjects as $row):?>
                        <tr>
							<td><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
							<td>
								
                                <div class="btn-group">

                                	<?php


                                		$requestSubj = $this->db->get_where('student_subject_request' , array(
                                			'subject_id'=>$row['subject_id'],
                                			'acceptor_id'=>$row['teacher_id'],
                                			'student_id'=>$this->session->userdata('student_id')
                                		))->row()->status; 

                                		if ($requestSubj == 0)
                                		{
                                	?>
	                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
	                                        Action for request <span class="caret"></span>
	                                    </button>
	                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
	                                        <li>
	                                            <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_request_access?name='.$row['name'].'&subject_id='.$row['subject_id'].'&acceptor_id='.$row['teacher_id'].'&student_id='.$this->session->userdata('student_id'));?>');">
	                                                <i class="entypo-code"></i>
	                                                    Request for access
	                                                </a>
	                                        </li>
	                                    </ul>
                                	<?php
                                		}
                                		elseif ($requestSubj == 1)
                                		{
                                	?>
	                                    <button type="button" class="btn btn-success btn-sm ">
	                                        Approved
	                                    </button>
                                	<?php
                                		}
                                		elseif ($requestSubj == 2)
                                		{
                                	?>
	                                    <button type="button" class="btn btn-danger btn-sm ">
	                                        Declined
	                                    </button>
                                	<?php }else{ ?>
	                                    <button type="button" class="btn btn-inverse btn-sm ">
	                                        Requesting...
	                                    </button>
                                	<?php } ?>
                                </div>
							</td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS-->
            
            
			
            
		</div>
	</div>
</div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>