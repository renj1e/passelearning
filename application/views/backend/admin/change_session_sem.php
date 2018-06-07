<?php echo form_open(site_url('admin/change_session_sem') , array('id' => 'session_change'));?>
<li>
	<div class="form-group">
		<select name="running_sem_by_year" class="form-control" onchange="submit()">
          <option value="">Select Semester</option>
          <option value="1">1st Semester</option>
          <option value="2">2nd Semester</option>
          <option value="3">Summer</option>
      </select>
	</div>
	
</li>
<?php echo form_close();?>



<script type="text/javascript">

    function submit()
    {
    	$('#session_change').submit();
    }
	
</script>