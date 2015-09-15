<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
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
                Webmag<?php //echo ucfirst($this->uri->segment(2));   ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Adding <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>
    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/webmag/add', $attributes);
    //echo '<pre>'; print_r($category);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="inputError" class="control-label">Webmag title<span class="star">*</span></label>
            <div class="controls">
                <input type="text" name="webmag_title" value=""/>
            </div>
        </div>
        <div class="control-group adverstisement_image">
            <label for="inputError" class="control-label">Webmag Image</label>
            <div class="controls">
                <input class="webmag_img" type="file" name="image" />
            </div>
        </div>
        
        <div class="control-group adverstisement_script">
            <label for="inputError" class="control-label">Webmag Description</label>
            <div class="controls">
               <textarea class="tinymce ckeditor" id="editor" name="webmag_description"></textarea>
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
            <a class="btn" href="<?php echo site_url('admin') ?>/webmag">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>