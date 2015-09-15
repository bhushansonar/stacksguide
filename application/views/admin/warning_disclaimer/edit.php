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
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating Warning Disclaimer<?php //echo ucfirst($this->uri->segment(2));                      ?>
        </h2>
    </div>
    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();
//    echo "<pre>";
//    print_r($this->session->flashdata('flash_message'));
//    exit;
    if ($this->session->flashdata('flash_message')) {
        if ($this->session->flashdata('flash_message') == 'error') {
            echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Ohh!</strong> The image you are attempting to upload exceedes the maximum height or width..';
            echo '</div>';
        }
    }
    echo form_open_multipart('admin/warning_disclaimer/update/' . $this->uri->segment(4) . '', $attributes);
    ?>

    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">Description<span class="star">*</span></label>
            <div class="controls">
                <textarea class="tinymce ckeditor" id="editor" name="description" ><?php echo $warning_disclaimer[0]['description'] ?></textarea>

            </div>
        </div>
        <div class="control-group adverstisement_image">
            <label for="inputError" class="control-label">Image<span class="star">*</span></label>
            <div class="controls">
                <input style="float:left;" type="file" name="image" />
                <?php if ($warning_disclaimer[0]['image']) { ?>
                    <div style="float:left;">
                        <img width="50" src="<?php echo base_url(); ?>uploads/warning_disclaimer/<?php echo $warning_disclaimer[0]['image'] ?>" />
                    </div>
                <?php } ?>
                <input type="hidden" name="old_image" value="<?php echo $warning_disclaimer[0]['image'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo trim($warning_disclaimer[0]['status']) == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo trim($warning_disclaimer[0]['status']) == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>

            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo $this->session->userdata('redirect_url'); ?>">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>