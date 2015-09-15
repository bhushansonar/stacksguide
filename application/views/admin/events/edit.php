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
                Events<?php //echo ucfirst($this->uri->segment(2));    ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Updating  Events<?php //echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>
    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

     echo form_open_multipart('admin/events/update/' . $this->uri->segment(4) . '', $attributes);
    //echo '<pre>'; print_r($category);
    ?>
    <fieldset>
        <div class="control-group">
            <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
            <label for="inputError" class="control-label">Title<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="events_title" value="<?php echo $events[0]['events_title']?>" >
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Events Site</label>
            <div class="controls">
                 <input type="text" id="" name="events_site" value="<?php echo $events[0]['events_site']?>" >
            </div>
        </div>
        <div class="control-group adverstisement_script">
            <label for="inputError" class="control-label">Events Description</label>
            <div class="controls">
               <textarea class="tinymce ckeditor" id="editor" name="description"><?php echo $events[0]['events_description']?></textarea>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/events">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>