<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';


    function getPerPlaces(obj, child_type) {
        var parent_id = $(obj).val();

//        toggle_loader($('#per_' + child_type))
        $('#per_' + child_type)
        if (parent_id != "") {
            $.ajax({
                type: 'POST',
                url: base_url + "common_ctrl/get_places",
                data: {child_type: child_type, parent_id: parent_id},
                success: function(data) {
                    $('#per_' + child_type).html(data);
                    $('#per_' + child_type).change();
//                    toggle_loader($('#per_' + child_type), 1);
                }
            });
        } else {
            $('#per_' + child_type).html('<option value="">Select</option>');
            $('#per_' + child_type).change();
//            toggle_loader($('#per_' + child_type), 1);
        }
    }
    CKEDITOR.replaceAll('tinymce');
</script>


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
    //flash messages
    //print_r($flash_message);
    /* if(!empty($flash_message))
      {
      echo '<div class="alert alert-success">';
      echo '<a class="close" data-dismiss="alert">&#215;</a>';
      echo '<strong>Well done!</strong> new category created with success.';
      echo '</div>';
      }else{
      echo '<div class="alert alert-error">';
      echo '<a class="close" data-dismiss="alert">&#215;</a>';
      echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
      echo '</div>';
      } */
    ?>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/build_ads/add', $attributes);
    ?>
    <fieldset>

        <div class="control-group">
            <label for="inputError" class="control-label">Country:-</label>
            <div class="controls">
                <?php
                $js = " getPerPlaces(this,'state') ";
                $attribute = 'id="per_country"  onchange="' . $js . '" ';
                echo form_dropdown('country', $country_opt, $country, $attribute);
                ?>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">States:-</label>
            <div class="controls">
                <?php
                $js = "getPerPlaces(this,'city')";
                $attribute = 'id="per_state"  onchange="' . $js . '" ';

                echo form_dropdown('state', $state_opt, $state, $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">City</label>
            <div class="controls">
                <?php
                $attribute = 'id="per_city" ';
                echo form_dropdown('city', $city_opt, $city, $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Main Category:-</label>
            <div class="controls">
                <?php
                $js = "getPerPlaces(this,'subcategory')";
                $attribute = 'id="per_main_category"  onchange="' . $js . '" ';
                echo form_dropdown('category', $main_category_opt, $category, $attribute);
                ?>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Subcategory:-</label>
            <div class="controls">
                <?php
                $attribute = 'id="per_subcategory" ';
                echo form_dropdown('subcategory', $subcategory_opt, $subcategory, $attribute);
                ?>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Model Name</label>
            <div class="controls">
                <input type="text" id="" name="model_name" value="" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>

        <!--        <div class="control-group">
                    <label for="inputError" class="control-label">Address:-</label>
                    <div class="controls">

                        <textarea name="address" rows="4">

                        </textarea>

                    </div>
                </div>

                <div class="control-group">
                    <label for="inputError" class="control-label">Zip Code</label>
                    <div class="controls">
                        <input type="text" id="" name="zip_code" value="" >
                    </div>
                </div>-->
        <div class="control-group">
            <label for="inputError" class="control-label">Hair</label>
            <div class="controls">
                <input type="text" id="" name="hair" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Eyes</label>
            <div class="controls">
                <input type="text" id="" name="eyes" value="" >

            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Age</label>
            <div class="controls">
                <input type="text" id="" name="age" value="" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Ht: </label>
            <div class="controls">
                <input type="text" id="" name="ht" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Bust: </label>
            <div class="controls">
                <input type="text" id="" name="bust" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Wt: </label>
            <div class="controls">
                <input type="text" id="" name="wt" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Waist:</label>
            <div class="controls">
                <input type="text" id="" name="waist" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Affil:</label>
            <div class="controls">
                <input type="text" id="" name="affil" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Hips: </label>
            <div class="controls">
                <input type="text" id="" name="hips" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Ethnicity:</label>
            <div class="controls">
                <input type="text" id="" name="ethnicity" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Available to:</label>
            <div class="controls">
                <input type="text" id="" name="avilable_to" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Availability: </label>
            <div class="controls">
                <input type="text" id="" name="availability" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Location: </label>
            <div class="controls">
                <input type="text" id="" name="location" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Images: </label>
            <div class="controls">

                <input type="file" name="images[]" multiple="multiple" />

            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Description </label>
            <div class="controls">
                <textarea class="tinymce ckeditor" id="editor" name="description"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Email:</label>
            <div class="controls">
                <input type="text" id="" name="email" value="" >


            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Website:</label>
            <div class="controls">
                <input type="text" id="" name="website" value="" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/build_ads">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
