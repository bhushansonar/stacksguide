    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Update</a>
        </li>
      </ul>
      <div class="page-header users-header">
        <h2>
          Updating <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
     //form validation
      echo validation_errors();

      echo form_open_multipart('admin/user/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url')?>" name="redirect_url" />
        
        
          <div class="control-group">
            <label for="inputError" class="control-label">First Name<span class="star">*</span></label>
            <div class="controls">
              <input type="text" id="" name="firstname" value="<?php echo $user[0]['firstname']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Last Name</label>
            <div class="controls">
              <input type="text" id="" name="lastname" value="<?php echo $user[0]['lastname']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">User Name<span class="star">*</span></label>
            <div class="controls">
              <input type="text" id="" name="username" value="<?php echo $user[0]['username']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Password<span class="star">*</span></label>
            <div class="controls">
              <input disabled="disabled" type="password" class="pass_disabled" name="password" value="<?php  echo $user[0]['password']; ?>" >
              <span class="help-inline"><a onclick="changepassword();" href="javascript:void(0)">Change</a></span>
            </div>
          </div>
          <div id="confirm_div" style="display:none;" class="control-group">
            <label for="inputError" class="control-label">Confirm Password<span class="star">*</span></label>
            <div class="controls">
              <input disabled="disabled" type="password" class="pass_disabled" name="password2" value="<?php echo $user[0]['password']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Primary E-mail<span class="star">*</span></label>
            <div class="controls">
              <input type="text" id="" name="primary_email" value="<?php echo $user[0]['primary_email']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Type of memebership</label>
            <div class="controls">
              <select name="type_of_membership">
              	<option value="">-Select Membership type-</option>
                <option <?php  echo $user[0]['type_of_membership'] == 'Admin' ? 'selected="selected"' : ''?>  value="Admin">Admin</option>
                <?php /*?><option <?php echo $user[0]['type_of_membership'] == 'normal_admin' ? 'selected="selected"' : ''?> value="normal_admin">Normal Admin</option>
                <?php if(user_access($this->session->userdata('user_id'),'add_power_admin') == true){?>
                <option <?php echo $user[0]['type_of_membership'] == 'power_admin' ? 'selected="selected"' : '' ?> value="power_admin">Power admin</option>
                <?php }?>
              	<option <?php  echo $user[0]['type_of_membership'] == 'FREE' ? 'selected="selected"' : ''?>  value="FREE">FREE</option>
             	<option <?php  echo $user[0]['type_of_membership'] == 'PRE1' ? 'selected="selected"' : ''?>  value="PRE1">PRE1</option>
                <option <?php $user[0]['type_of_membership'] == 'PRE2' ? 'selected="selected"' : ''?> value="PRE2">PRE2</option>
                <option <?php  echo $user[0]['type_of_membership'] == 'PUB1' ? 'selected="selected"' : ''?>  value="PUB1">PUB1</option>
                <option <?php  echo $user[0]['type_of_membership'] == 'PUB2' ? 'selected="selected"' : ''?>  value="PUB2">PUB2</option>
                <option <?php  echo $user[0]['type_of_membership'] == 'CAAD' ? 'selected="selected"' : ''?>  value="CAAD">CAAD</option>
                <option <?php  echo $user[0]['type_of_membership'] == 'CAUS' ? 'selected="selected"' : ''?>  value="CAUS">CAUS</option><?php */?>
             </select>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          
          
          
          <?php /*?><div class="control-group">
            <label for="inputError" class="control-label">Country code</label>
            <div class="controls">
              <input type="text" id="" name="country_code" value="<?php echo $user[0]['country_code'] ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div><?php */?>
          
          <!--<div class="control-group">
            <label for="inputError" class="control-label">User interests</label>
            <div class="controls">
              <input type="text" id="" name="user_interests" value="<?php //echo $user[0]['user_interests'] ?>" >
            </div>
          </div>-->
          
          
          
          
          
          
          
          
          
           
          
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
             <select name="status">
             	<option <?php  echo trim($user[0]['status']) == 'Active' ? 'selected="selected"' : ''?>  value="Active">Active</option>
                <option <?php echo trim($user[0]['status']) == 'Inactive' ? 'selected="selected"' : ''?> value="Inactive">Inactive</option>
             </select>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
           <a class="btn" href="<?php echo $this->session->userdata('redirect_url');?>">Cancel</a>
           	<span style="display:none"; id="delete_msg">Are you really sure to delete this User?</span>
           <?php if(user_access($this->session->userdata('user_id'),'delete_users') == true){?>
           <a style="margin-left:30px;" href="<?php echo site_url("admin")?>/user/delete/<?php echo $this->uri->segment(4) ?>" class="btn btn-danger complexConfirm">Delete User</a>
           <?php }?>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     