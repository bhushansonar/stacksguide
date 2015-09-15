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
                <?php echo ucfirst($this->uri->segment(2)); ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>


    <?php
    //flash messages
    /* if($this->session->flashdata('flash_message')){
      if($this->session->flashdata('flash_message') == 'updated')
      {
      echo '<div class="alert alert-success">';
      echo '<a class="close" data-dismiss="alert">&#215;</a>';
      echo '<strong>Well done!</strong> membership_price updated with success.';
      echo '</div>';
      }else{
      echo '<div class="alert alert-error">';
      echo '<a class="close" data-dismiss="alert">&#215;</a>';
      echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
      echo '</div>';
      }
      } */
    ?>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();
    echo form_open('admin/membership_price/update/' . $this->uri->segment(4) . '', $attributes);
    ?>

    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">Membership Duration:-<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="membership_duration"';
                echo form_dropdown('membership_duration', $membership_duration_opt, $membership_price[0]['membership_duration'], $attribute);
                ?>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Price:-<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="price" value="<?php echo $membership_price[0]['price']; ?>" >

            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php $membership_price[0]['status'] == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php $membership_price[0]['status'] == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>

            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/membership_price">Cancel</a>
        </div>
    </fieldset>
    <?php echo form_close(); ?>

</div>
