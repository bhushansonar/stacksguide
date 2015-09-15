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
                Footer<?php //echo ucfirst($this->uri->segment(2));                 ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>
    <div class="page-header">
        <h2>
            Adding Footer<?php //echo ucfirst($this->uri->segment(2));                 ?>
        </h2>
    </div>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open('admin/footer/add', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="inputError" class="control-label">Footer Content<span class="star">*</span></label>
            <div class="controls">

                <textarea name="title" ></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo set_value('status') == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo set_value('status') == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/footer">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>
</div>
<script>

    function startFilter() {
        //alert(ele);
        var cs1 = $('#type').find(":selected").attr("class");
        //var cs1 = $("option:selected", ele).attr("class");
        if (cs1 == 'hide_display_name') {
            $('.display_name').css("display", "block");
            $('.display_name').attr("disabled", false);
            //do something
        } else {
            $('.display_name').css("display", "none");
            $('.display_name').attr("disabled", true);
        }
    }
</script>
