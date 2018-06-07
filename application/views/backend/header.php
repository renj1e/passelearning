<div class="row">
	<div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
		<h2 style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
    </div>
	<!-- Raw Links -->
	<div class="col-md-12 col-sm-12 clearfix ">

        <ul class="list-inline links-list pull-left">
        <!-- Language Selector -->
        	<div id="session_static">
	           <li>
	           		<h4>
	           			<a href="#" style="color: #696969;"
	           				<?php if($account_type == 'admin'):?>
	           				onclick="get_session_changer()"
	           			<?php endif;?>>
	           				A.Y. : <b><?php echo $running_year;?></b><i class="entypo-down-dir"></i>
	           			</a>
	           		</h4>
	           </li>
           </div>
        	<div id="session_static_sem">
	           <li>
	           		<h4>

                        <?php
                          $running_sem_by_year = $this->db->get_where('settings' , array('type'=>'running_sem_by_year'))->row()->description;
                          switch ($running_sem_by_year)
                          {
                            case '1':
                              $running_sem = 'First Semester';
                              break;
                            case '2':
                              $running_sem = 'Second Semester';
                              break;                            
                            default:
                              $running_sem = 'Summer';
                              break;
                          }
                        ?>
	           			<a href="#" style="color: #696969;"
	           				<?php if($account_type == 'admin'):?>
	           				onclick="get_session_changer_sem()"
	           			<?php endif;?>>
	           				Semester : <b><?php echo $running_sem;?></b><i class="entypo-down-dir"></i>
	           			</a>
	           		</h4>
	           </li>
           </div>
        </ul>


		<ul class="list-inline links-list pull-right">

		<li class="dropdown language-selector">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        	<i class="entypo-user"></i>
													<?php 
														$userType = '';

														if ($this->session->userdata('admin_login') == 1)
														{
															$userType = 'Admin Account';
														}
														elseif ($this->session->userdata('teacher_login') == 1)
														{
															$userType = 'Teacher Account';
														}
														else
														{
															$userType = 'Student Account';
														}

														echo $this->session->userdata('name').' ( <b>'. $userType.'</b> ) ';
													?>
                    </a>

				<?php if ($account_type != 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
				<?php if ($account_type == 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo site_url('parents/manage_profile');?>">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('parents/manage_profile');?>">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
			</li>

			<li>
				<a href="<?php echo site_url('login/logout');?>">
					<?php echo get_phrase('log_out'); ?><i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
	</div>

</div>

<script type="text/javascript">
	function get_session_changer()
	{
		$.ajax({
            url: '<?php echo site_url('admin/get_session_changer');?>',
            success: function(response)
            {
                jQuery('#session_static').html(response);
            }
        });
	}
	function get_session_changer_sem()
	{
		$.ajax({
            url: '<?php echo site_url('admin/get_session_changer_sem');?>',
            success: function(response)
            {
                jQuery('#session_static_sem').html(response);
            }
        });
	}
</script>
