<style media="screen">
    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }
    [type="radio"]:checked + label,
    [type="radio"]:not(:checked) + label
    {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }
    [type="radio"]:checked + label:before,
    [type="radio"]:not(:checked) + label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }
    [type="radio"]:checked + label:after,
    [type="radio"]:not(:checked) + label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: #2aa1c0;
        position: absolute;
        top: 3px;
        left: 3px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }
    [type="radio"]:not(:checked) + label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
    [type="radio"]:checked + label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
</style>

<?php echo form_open(site_url('teacher/manage_online_exam_question/'.$online_exam_id.'/add/true_false') , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

<input type="hidden" name="type" value="<?php echo $question_type;?>">
<input type="hidden" value="1" class="form-control" name="mark" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" min="0"/>

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('question_title');?></label>
    <div class="col-sm-8">
        <textarea onkeyup="changeTheBlankColor()" name="question_title" class="form-control" id="question_title" rows="8" cols="80" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"></textarea>
    </div>
</div>

<div class="row"  style="margin-top: 10px; text-align: left;">
    <div class="col-sm-8 col-sm-offset-3">
        <p>
            <input type="radio" id="true" name="true_false_answer" value="true" checked>
            <label for="true"><?php echo get_phrase('true'); ?></label>
        </p>
    </div>
    <div class="col-sm-8 col-sm-offset-3">
        <p>
            <input type="radio" id="false" name="true_false_answer" value="false">
            <label for="false"><?php echo get_phrase('false'); ?></label>
        </p>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('add_question');?></button>
    </div>
</div>
<?php echo form_close();?>