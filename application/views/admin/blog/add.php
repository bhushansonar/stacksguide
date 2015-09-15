<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('tinymce')
</script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/jquery.datetimepicker.css"/>-->
<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>">
                blog<?php //echo ucfirst($this->uri->segment(2));     ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Adding blog<?php //echo ucfirst($this->uri->segment(2));     ?>
        </h2>
    </div>
    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/blog/add', $attributes);
    ?>
    <fieldset>
        <input type="hidden" value="<?php echo date('Y-m-d H:i:00') ?>" name="date" />
        <div class="control-group">
            <label for="inputError" class="control-label">Title</label>
            <div class="controls">
                <input type="text" name="title" value="<?php echo set_value('title'); ?>" >
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
                <textarea class="tinymce ckeditor" id="editor" name="description"><?php echo set_value('description'); ?></textarea>
            </div>
        </div>





        <div class="control-group">
            <label for="inputError" class="control-label">Featured Image</label>
            <div class="controls">
                <input name="featured_image" type="file" />
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Meta Title</label>
            <div class="controls">
                <input type="text" name="meta_title" value="<?php echo set_value('meta_title'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Meta Keyword</label>
            <div class="controls">
                <textarea name="meta_keyword"><?php echo set_value('meta_keyword'); ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Meta Description</label>
            <div class="controls">
                <textarea name="meta_description"><?php echo set_value('meta_description'); ?></textarea>
            </div>
        </div>
        <!--        <div class="control-group">
                    <label for="inputError" class="control-label">Set schedule</label>
                    <div class="controls">
                        <div class="radio_div"><input onclick="show_published_date();"  name="set_schedule" type="radio" <?php echo custom_set_radio('set_schedule', 'YES'); ?> value="YES" />&nbsp;<span>Yes</span></div>
                        <div class="radio_div"><input onclick="show_published_date();" name="set_schedule" type="radio" <?php echo custom_set_radio('set_schedule', 'NO', true); ?> value="NO" />&nbsp;<span>NO
          </span> </div>             <span class="help-inline">Woohoo!</span>
                    </div>
                </div>-->
        <!--        <div style="display:none;" id="published_date_div" class="control-group">
                    <label for="inputError" class="control-label">Published date</label>
                    <div class="controls">
                        <input  id="published_date" type="text" name="published_date" />
                    </div>
                </div>-->
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo custom_set_select('status', 'Active'); ?>  value="Active">Active</option>
                    <option <?php echo custom_set_select('status', 'Inactive'); ?> value="Inactive">Inactive</option>
                </select>
                 <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/blog">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>
</div>
<script type="text/javascript">
    function show_published_date() {
        var set_schedule = $("input[name=set_schedule]:checked").val();
        //alert(set_schedule);
        if ($("#published_date_div").is(":hidden")) {
            if (set_schedule == 'YES') {
                $("#published_date_div").css("display", "block");
                //$("#published_date").attr("disabled",false);
            } else {
                $("#published_date_div").css("display", "none");
                //$("#published_date").attr("disabled",true);
            }
        } else {
            $("#published_date_div").css("display", "none");
            //$("#published_date").attr("disabled",true);
        }
    }
    $('#published_date').datetimepicker()
            .datetimepicker({
        value: '<?php echo date('Y-m-d H:i:00') ?>',
        format: 'Y-m-d H:i:00',
        step: 10,
        minDate: '-1970/01/01', //yesterday is minimum date(for today use 0 or -1970/01/01)
        maxDate: '+3000/01/02'//tommorow is maximum date calendar,
    });
    show_published_date();
</script>