<style>
  .exam_chart {
    width       : 100%;
    height      : 265px;
    font-size   : 11px;
  }
</style>

<?php
  $student_info = $this->db->get_where('student', array('student_id' => $student_id))->result_array();
  foreach ($student_info as $row):
    $enroll_info = $this->db->get_where('enroll', array(
      'student_id' => $row['student_id'], 'year' => $running_year
    ));
    $class_id = $enroll_info->row()->class_id;
    $exams = $this->crud_model->get_exams();
?>
<div class="profile-env">
	<header class="row">
		<div class="col-md-3">
			<center>
        <a href="#">
  				<img src="<?php echo $this->crud_model->get_image_url('student', $student_id) ;?>" class="img-circle"
          style="width: 60%;" />
  			</a>
        <br>
        <h3>
          <?php echo $row['name']; ?>
        </h3>
        <br>
        <span>
          <?php
            $class_name = $this->db->get_where('class', array(
              'class_id' => $enroll_info->row()->class_id
            ))->row()->name;
            $section_name = $this->db->get_where('section', array(
              'section_id' => $enroll_info->row()->section_id
            ))->row()->name;
          ?>
          <a href="<?php echo site_url('teacher/student_information/'.$enroll_info->row()->class_id);?>">
            <?php echo 'Department - '.$class_name.' | Block - '.$section_name; ?>
          </a>
        </span>
      </center>
		</div>
    <div class="col-md-9">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab" class="btn btn-default">
					<span class="visible-xs"><i class="entypo-home"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('basic_info'); ?></span>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
        <?php
          $basic_info_titles = ['name', 'class', 'section', 'email', 'phone', 'address', 'gender', 'birthday'];
          $basic_info_values = [$row['name'], $class_name, $section_name, $row['email'], $row['phone'] == NULL ? '' : $row['phone'], $row['address'] == NULL ? '' : $row['address'], $row['sex'] == NULL ? '' : $row['sex'], $row['birthday'] ];
        ?>
        <table class="table table-bordered" style="margin-top: 20px;">
          <tbody>
          <?php for ($i=0; $i < count($basic_info_titles) ; $i++) { ?>
            <tr>
              <td width="30%">
                <strong>
                  <?php 
                  if ($basic_info_titles[$i]==='class')
                  {
                    echo 'Department';
                  }
                  elseif ($basic_info_titles[$i] ==='section')
                  {
                    echo 'Block';
                  }
                  else
                  {
                    echo get_phrase($basic_info_titles[$i]);
                  }

                  ?>
                    
                  </strong>
              </td>
              <td><?php echo $basic_info_values[$i]; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
			</div>
		</div>

		<br>

	</div>
	</header>
</div>
<?php endforeach; ?>
