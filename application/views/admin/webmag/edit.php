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
                Webmag<?php //echo ucfirst($this->uri->segment(2));  ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating  Webmag<?php //echo ucfirst($this->uri->segment(2));  ?>
        </h2>
    </div>


    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/webmag/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <?php //echo "<pre>"; print_r($webmag); die; ?>
    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">Webmag title<span class="star">*</span></label>
            <div class="controls">
                <input type="text" name="webmag_title" value="<?php echo $webmag[0]['webmag_title']?>"/>
            </div>
        </div>
      <div class="control-group adverstisement_image">
            <label for="inputError" class="control-label">Webmag Image</label>
            <div class="controls">
                <input style="float:left;" class="webmag_img" type="file" name="webmag_img" />
                <?php if ($webmag[0]['webmag_img']) { ?>
                    <div style="float:left;"><img width="50" src="<?php echo base_url(); ?>uploads/webmag/<?php echo $webmag[0]['webmag_img'] ?>" /></div>
                <?php } ?>
                <input type="hidden" name="old_webmag_img" value="<?php echo $webmag[0]['webmag_img'] ?>" />
            </div>
        </div>
        
        <div class="control-group adverstisement_script">
            <label for="inputError" class="control-label">Webmag Description</label>
            <div class="controls">
               <textarea class="tinymce ckeditor" id="editor" name="webmag_description"><?php echo $webmag[0]['webmag_description']?></textarea>
            </div>
        </div>
        
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo $webmag[0]['status'] == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo $webmag[0]['status'] == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
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