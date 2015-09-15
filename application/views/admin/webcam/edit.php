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
                WebCam <?php //echo ucfirst($this->uri->segment(2));                 ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating  WebCam<?php //echo ucfirst($this->uri->segment(2));                 ?>
        </h2>
    </div>


    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/webcam/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">WebCam Ads Position<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="webcam_ads_position" ';
                echo form_dropdown('webcam_ads_position', $ads_position_opt, $webcam[0]['webcam_ads_position'], $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Webcam Script<span class="star">*</span></label>
            <div class="controls">
                <textarea  name="webcam_script"><?php echo $webcam[0]['webcam_script'] ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo $webcam[0]['status'] == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo $webcam[0]['status'] == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>
                 <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo $this->session->userdata('redirect_url'); ?>">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
