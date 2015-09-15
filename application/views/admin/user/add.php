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
    //form validationc
    echo validation_errors();
    echo form_open_multipart('admin/user/add', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="inputError" class="control-label">First Name<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="firstname" value="<?php echo set_value('firstname'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Last Name</label>
            <div class="controls">
                <input type="text" id="" name="lastname" value="<?php echo custom_set_value('lastname'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">User Name<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="username" value="<?php echo set_value('username'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Password<span class="star">*</span></label>
            <div class="controls">
                <input type="password" id="" name="password" value="<?php echo set_value('password'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Confirm Password<span class="star">*</span></label>
            <div class="controls">
                <input type="password" id="" name="password2" value="<?php echo set_value('password2'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Primary E-mail<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="primary_email" value="<?php echo set_value('primary_email'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Type of membership</label>
            <div class="controls">
                <select name="type_of_membership">
                    <option value="">-Select Membership type-</option>
                    <option <?php echo set_select('type_of_membership', 'Admin'); ?> value="Admin">Admin</option>
                    <?php /* ?><option <?php echo set_select('type_of_membership','normal_admin');?> value="normal_admin">Normal Admin</option>
                      <?php if(user_access($this->session->userdata('user_id'),'add_power_admin') == true){?>
                      <option <?php echo set_select('type_of_membership','power_admin');?> value="power_admin">Power admin</option>
                      <?php }?>
                      <option <?php echo set_select('type_of_membership','FREE');?> value="FREE">FREE</option>
                      <option <?php echo set_select('type_of_membership','PRE1');?> value="PRE1">PRE1</option>
                      <option <?php echo set_select('type_of_membership','PRE2');?> value="PRE2">PRE2</option>
                      <option <?php echo set_select('type_of_membership','PUB1');?> value="PUB1">PUB1</option>
                      <option <?php echo set_select('type_of_membership','PUB2');?> value="PUB2">PUB2</option>
                      <option <?php echo set_select('type_of_membership','CAAD');?> value="CAAD">CAAD</option>
                      <option <?php echo set_select('type_of_membership','CAUS');?> value="CAUS">CAUS</option><?php */ ?>
                </select>
                 <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>



        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo custom_set_value('status') == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo custom_set_value('status') == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>
                 <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/user">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
