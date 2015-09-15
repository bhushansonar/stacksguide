<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('tinymce')
</script>
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
                Warning Disclaimer
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Adding Warning Disclaimer
        </h2>
    </div>
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    echo validation_errors();

    if ($this->session->flashdata('flash_message')) {
        if ($this->session->flashdata('flash_message') == 'error') {
            echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Ohh!</strong> The image you are attempting to upload exceedes the maximum height or width..';
            echo '</div>';
        }
    }
    echo form_open_multipart('admin/warning_disclaimer/add', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="inputError" class="control-label">Description<span class="star">*</span></label>
            <div class="controls">
                <textarea class="tinymce ckeditor" id="editor" value="<?php echo set_value('description'); ?>" name="description"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Image<span class="star">*</span></label>
            <div class="controls">
                <input type="file" name="image" />
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
            <a class="btn" href="<?php echo site_url('admin') ?>/warning_disclaimer">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>
</div>
