<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replaceAll('tinymce')
</script>
<!--<script src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    	//selector: "specific_textareas",
		mode : "specific_textareas",
        editor_selector : "tinymce",
	extended_valid_elements : "img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],a[href|onclick],"
,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	relative_urls : false,
	remove_script_host : false,
	convert_urls : true,
});
</script>-->
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
            CMS<?php //echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding CMS<?php //echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

      <?php
      //flash messages
	  //print_r($flash_message);
        /* if(!empty($flash_message))
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Well done!</strong> new keyword created with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }*/
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');

      //form validation
      echo validation_errors();
      
      echo form_open('admin/cms/add', $attributes);
      ?>
        <fieldset>
        	<div class="control-group">
            <label for="inputError" class="control-label">Location<span class="star">*</span></label>
            <div class="controls">
              <input type="text" id="" name="location" value="<?php echo set_value('location'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Type<span class="star">*</span></label>
            <div class="controls">
              <select id="type" onchange="startFilter(this.class);" name="type">
              	
                <option class="class" <?php echo (set_value('type') == "page") ? 'selected="selected"' : ""; ?> value="page">CMS Page</option>
              </select>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
         
          	<div class="control-group">
            <label for="inputError" class="control-label">Block name<span class="star">*</span></label>
            <div class="controls">
              <input type="text" id="" name="block_name" value="<?php echo set_value('block_name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Title<span class="star">*</span></label>
            <div class="controls">
              <input type="text" id="" name="title" value="<?php echo set_value('title'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
       
          
         
          
          <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
            <textarea class="tinymce ckeditor" id="editor" value="<?php echo set_value('description'); ?>" name="description"></textarea>
             <script>
				/*CKEDITOR.replace('editor_<?php //echo $site_language[$i]['language_shortcode']?>', {
    			allowedContent: true
					});*/
			</script>
              <!--<span clasxs="help-inline">Woohoo!</span>-->
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
           <a class="btn" href="<?php echo site_url('admin')?>/cms">Cancel</a>
          </div>
        </fieldset>

      <?php echo form_close(); ?>
</div>
<script>

	function startFilter(){
		//alert(ele);
		var cs1 = $('#type').find(":selected").attr("class");
		    //var cs1 = $("option:selected", ele).attr("class");
    if(cs1 == 'hide_display_name'){
		$('.display_name').css("display","block");
		$('.display_name').attr("disabled", false);
        //do something
    }else{
		$('.display_name').css("display","none");
		$('.display_name').attr("disabled", true);
		}
}
</script>
