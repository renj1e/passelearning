<div class="sidebar-menu">
    <header class="logo-env">

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>uploads/logo.png" style="max-height:60px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo site_url($account_type.'/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <!-- STUDENT -->
        <li class="<?php
        if ($page_name == 'student_add' ||
            $page_name == 'student_information' ||
            $page_name == 'student_marksheet')
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="fa fa-group"></i>
                <span><?php echo get_phrase('student'); ?></span>
            </a>
            <ul>

                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information' || $page_name == 'student_marksheet' || $page_name == 'student_profile') echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> Students by <small>Department</small></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo site_url($account_type.'/student_information/'.$row['class_id']); ?>">
                                    <span><?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

            </ul>
        </li>

        <!-- TEACHER -->
        <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
            <a href="<?php echo site_url($account_type.'/teacher_list'); ?>">
                <i class="entypo-users"></i>
                <span>Instructors</span>
            </a>
        </li>

        <!-- SUBJECT -->
        <li class="<?php if ($page_name == 'subject') echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-docs"></i>
                <span><?php echo get_phrase('subject'); ?> <small>by Department</small></span>
            </a>
            <ul>
                <?php $classes = $this->db->get('class')->result_array();
                foreach ($classes as $row):
                    ?>
                    <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active'; ?>">
                        <a href="<?php echo site_url($account_type.'/subject/'.$row['class_id']); ?>">
                            <span><?php echo $row['name']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <!-- STUDY MATERIAL -->
        <li class="<?php if ($page_name == 'study_material') echo 'active'; ?> ">
            <a href="<?php echo site_url($account_type.'/study_material'); ?>">
                <i class="entypo-book-open"></i>
                <span><?php echo get_phrase('study_material'); ?></span>
            </a>
        </li>

        <!-- EXAMS -->
        <li class="<?php if ($page_name == 'manage_online_exam' || $page_name == 'add_online_exam' || $page_name == 'edit_online_exam' || $page_name == 'manage_online_exam_question' || $page_name == 'update_online_exam_question' || $page_name == 'view_online_exam_results') echo 'opened active'; ?> ">
            <a href="#">
                <i class="fa fa-feed"></i>
                <span>Exam</span>
            </a>
            <ul>
            <li class="<?php if ($page_name == 'add_online_exam') echo 'active'; ?> ">
              <a href="<?php echo site_url($account_type.'/create_online_exam'); ?>">
                  <span><i class="entypo-dot"></i>Create Exam</span>
              </a>
            </li>

            <li class="<?php if ($page_name == 'manage_online_exam' || $page_name == 'edit_online_exam' || $page_name == 'manage_online_exam_question' || $page_name == 'view_online_exam_results') echo 'active'; ?> ">
                <a href="<?php echo site_url($account_type.'/manage_online_exam'); ?>">
                    <span><i class="entypo-dot"></i>List of Exams</span>
                </a>
            </li>
            </ul>
        </li>

        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo site_url($account_type.'/noticeboard'); ?>">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo site_url($account_type.'/manage_profile'); ?>">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li>

    </ul>

</div>
