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
                WebCam<?php //echo ucfirst($this->uri->segment(2));                 ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Adding WebCam
        </h2>
    </div>
    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/webcam/add', $attributes);
    //echo '<pre>'; print_r($category);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="inputError" class="control-label">WebCam Ads Position<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="webcam_ads_position" ';
                echo form_dropdown('webcam_ads_position', $ads_position_opt, "", $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Webcam Script<span class="star">*</span></label>
            <div class="controls">
                <textarea  name="webcam_script"><?php echo set_value('webcam_script') ?></textarea>
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
            <a class="btn" href="<?php echo site_url('admin') ?>/webcam">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
