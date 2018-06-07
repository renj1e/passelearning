<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Request Access
                </div>
            </div>
            <div class="panel-body">
                <p>*You must enter your <b>Entry Code</b> for: <b><?php echo $_GET['name'];?></b></p>
                <?php echo form_open(site_url('student/subject/request_access') , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Subject Code</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="entry_code" required/>
                        <input type="text" class="form-control" name="subject_id" value="<?php echo $_GET['subject_id'];?>" required/>
                        <input type="text" class="form-control" name="acceptor_id" value="<?php echo $_GET['acceptor_id'];?>" required/>
                        <input type="text" class="form-control" name="student_id" value="<?php echo $_GET['student_id'];?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info">Send Request</button>
                    </div>
                 </div>
                </form>
            </div>
        </div>
    </div>
</div>