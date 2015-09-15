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
                External Link<?php //echo ucfirst($this->uri->segment(2));  ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating  External Link<?php //echo ucfirst($this->uri->segment(2));  ?>
        </h2>
    </div>


    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/external_link/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">Link<span class="star">*</span></label>
            <div class="controls">
                <input type="text" name="link" value="<?php echo $external_link[0]['link']?>"/>
            </div>
        </div>
      <div class="control-group adverstisement_image">
            <label for="inputError" class="control-label">External Link Image</label>
            <div class="controls">
                <input style="float:left;" class="external_image_input" type="file" name="image" />
                <?php if ($external_link[0]['image']) { ?>
                    <div style="float:left;"><img width="50" src="<?php echo base_url(); ?>uploads/external_link/<?php echo $external_link[0]['image'] ?>" /></div>
                <?php } ?>
                <input type="hidden" name="old_external_link_image" value="<?php echo $external_link[0]['image'] ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo $external_link[0]['status'] == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo $external_link[0]['status'] == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
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