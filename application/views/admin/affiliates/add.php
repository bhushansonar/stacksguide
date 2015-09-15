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
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');

      //form validation
      echo validation_errors();
      
      echo form_open_multipart('admin/affiliates/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Title</label>
            <div class="controls">
              <input type="text" id="" name="title" value="<?php echo set_value('title'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Affiliates Image</label>
            <div class="controls">
              <input name="image" type="file" />
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Url</label>
            <div class="controls">
              <input type="text" id="" name="url" value="<?php echo set_value('url'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          
          <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
             <select name="status">
             	<option <?php  echo set_value('status') == 'Active' ? 'selected="selected"' : ''?>  value="Active">Active</option>
                <option <?php echo set_value('status') == 'Inactive' ? 'selected="selected"' : ''?> value="Inactive">Inactive</option>
             </select>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
           <a class="btn" href="<?php echo site_url('admin')?>/affiliates">Cancel</a>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     