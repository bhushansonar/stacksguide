
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
                Footer<?php //echo ucfirst($this->uri->segment(2));               ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating Footer
        </h2>
    </div>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();
    echo form_open('admin/footer/update/' . $this->uri->segment(4) . '', $attributes);

    //echo $footer[0]['description']; die;
    ?>

    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">Footer Content<span class="star">*</span></label>
            <div class="controls">
                <textarea  name="title" ><?php echo $footer[0]['title'] ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo trim($footer[0]['status']) == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo trim($footer[0]['status']) == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
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