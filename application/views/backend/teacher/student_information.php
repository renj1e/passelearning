<hr />


<div class="row">
    <div class="col-md-12">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-users"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('all_students');?></span>
                </a>
            </li>
        <?php
            $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
        ?>
            <li>
                <a href="#<?php echo $row['section_id'];?>" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo $row['name'];?> </span>
                </a>
            </li>
        <?php endforeach;?>
        <?php endif;?>
        </ul>

        <div class="tab-content">
        <br>
            <div class="tab-pane active" id="home">

                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('id_no');?></div></th>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th class="span3"><div><?php echo get_phrase('address');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                            <th><div>Action for</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($class_id > 0)
                        {
                                $students   =   $this->db->get_where('enroll' , array(
                                    'class_id' => $class_id , 'year' => $running_year , 'sem' => $this->db->get_where('settings' , array('type' => 'running_sem_by_year'))->row()->description
                                ))->result_array();
                        }
                        else
                        {
                                $students   =   $this->db->get_where('enroll' , array('year' => $running_year, 'sem' => $this->db->get_where('settings' , array('type' => 'running_sem_by_year'))->row()->description))->result_array();
                        }
                                foreach($students as $row):?>
                        <tr>
                            <td><?php echo $this->db->get_where('student' , array(
                                    'student_id' => $row['student_id']
                                ))->row()->student_code;?></td>
                            <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
                            <td>
                                <?php
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->name; 
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->address;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->email;
                                ?>
                            </td>
                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- STUDENT PROFILE LINK -->
                                        <li>
                                            <a href="<?php echo site_url('teacher/student_profile/'.$row['student_id']);?>">
                                                <i class="entypo-user"></i>
                                                    <?php echo get_phrase('profile');?>
                                                </a>
                                        </li>

                                        <!-- STUDENT EDITING LINK -->
                                    </ul>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                <?php
                                $request = $this->db->get_where('student_subject_request' , array(
                                    'student_id'=>$row['student_id'],
                                    'acceptor_id'=>$this->session->userdata('teacher_id'),
                                    'status'=>4
                                ))->num_rows();

                                $requestSubj = $this->db->get_where('student_subject_request' , array(
                                    'student_id'=>$row['student_id'],
                                    'acceptor_id'=>$this->session->userdata('teacher_id'),
                                    'status'=>4
                                ))->result_array();
                                
                                foreach ($requestSubj as $subj){
                                $subjects = $this->db->get_where('subject' , array(
                                    'subject_id'=>$subj['subject_id']
                                ))->row()->name;

                                ?>                                
                                    <div class="col-sm-12">
                                        <p class="btn-group"><?php echo $subjects?></p>
                                        <p class="btn-group pull-right">
                                            <a href="<?php echo site_url('teacher/subject/request_response/'.$subj['id'].'/1')?>" class="btn btn-success btn-sm ">
                                                Accept
                                            </a>
                                            <a href="<?php echo site_url('teacher/subject/request_response/'.$subj['id'].'/2')?>" class="btn btn-danger btn-sm ">
                                                Decline
                                            </a>
                                        </p>
                                        <hr>
                                    </div>

                            <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        <?php
            $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
        ?>
            <div class="tab-pane" id="<?php echo $row['section_id'];?>">

                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('id');?></div></th>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th class="span3"><div><?php echo get_phrase('address');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $students   =   $this->db->get_where('enroll' , array(
                                    'class_id'=>$class_id , 'section_id' => $row['section_id'] , 'year' => $running_year
                                ))->result_array();
                                foreach($students as $row):?>
                        <tr>
                            <td><?php echo $this->db->get_where('student',array('student_id'=>$row['student_id']))->row()->student_code;?></td>
                            <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
                            <td>
                                <?php
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->name;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->address;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->email;
                                ?>
                            </td>
                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- STUDENT PROFILE LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_student_profile/'.$row['student_id']);?>');">
                                                <i class="entypo-user"></i>
                                                    <?php echo get_phrase('profile');?>
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
        <?php endforeach;?>
        <?php endif;?>

        </div>


    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $(".datatable").dataTable();
    });

</script>
