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
    if ($this->session->flashdata('flash_message')) {
        if ($this->session->flashdata('flash_message') == 'error') {
            echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Ohh!</strong> The image you are attempting to upload exceedes the minimum height or width.. or Cover image required';
            echo '</div>';
        } else if ($this->session->flashdata('flash_message') == 'required') {
            echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Ohh!</strong> Images required';
            echo '</div>';
        }
    }
    echo form_open_multipart('admin/escorts/add', $attributes);
    echo form_hidden('user_id', $user_id);
    ?>
    <fieldset>

        <div class="control-group">
            <label for="inputError" class="control-label">Images: <span class="star">*</span></label>
            <div class="controls">

                <input type="file" name="images[]" multiple="multiple" />

            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Model Name<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="model_name" value="" >
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Tagline <span class="star">*</span></label>
            <div class="controls">
                <textarea class="adds_in" cols="80" maxlength="175" name="tagline" style="height: 120px; width: 40%;"> </textarea>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Age<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="age" value="" >
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Gender:-<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="gender"';
                echo form_dropdown('gender', $gender_opt, '', $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Cover Image:- <span class="star">*</span></label>
            <div class="controls">
                <input type="file" name="cover_image"/>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Phone Number<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="phone_number" name="phone_number" value="" >
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Email:<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="email" value="" >


            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Website:<span class="star">*</span></label>
            <div class="controls">
                <input type="text" id="" name="website" value="" >
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Country:-<span class="star">*</span></label>
            <div class="controls">
                <?php
                $js = " getPerPlaces(this,'state') ";
                $attribute = 'id="per_country"  onchange="' . $js . '" ';
                echo form_dropdown('country', $country_opt, $country, $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">States:-<span class="star">*</span></label>
            <div class="controls">
                <?php
                $js = "getPerPlaces(this,'city')";
                $attribute = 'id="per_state"  onchange="' . $js . '" ';

                echo form_dropdown('state', $state_opt, $state, $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">City<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="per_city" ';
                echo form_dropdown('city', $city_opt, $city, $attribute);
                ?>
            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Main Category:-<span class="star">*</span></label>
            <div class="controls">
                <?php
                $js = "getPerPlaces(this,'subcategory')";
                $attribute = 'id="per_main_category"  onchange="' . $js . '" ';
                echo form_dropdown('category', $main_category_opt, $category, $attribute);
                ?>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Subcategory:-<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="per_subcategory" ';
                echo form_dropdown('subcategory', $subcategory_opt, $subcategory, $attribute);
                ?>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Description <span class="star">*</span></label>
            <div class="controls">
                <textarea class="tinymce ckeditor" id="editor" name="description"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Disclaimer</label>
            <div class="controls">
                <textarea style="width: 40%; height: 120px;" name="disclaimer" maxlength="175" cols="80" class="adds_in"></textarea>
            </div>
        </div>


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
            <label for="inputError" class="control-label">Height: </label>
            <div class="controls">
                <input type="text" id="" name="height_ft" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Bust: </label>
            <div class="controls">
                <input type="text" id="" name="bust" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Weight:</label>
            <div class="controls">
                <input type="text" id="" name="weight" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Cup:</label>
            <div class="controls">
                <input type="text" id="" name="cup" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Waist:</label>
            <div class="controls">
                <input type="text" id="" name="waist" value="" >

            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Hips: </label>
            <div class="controls">
                <input type="text" id="" name="hips" value="" >

            </div>
        </div>
        <!--        <div class="control-group">
                    <label for="inputError" class="control-label">Affil:</label>
                    <div class="controls">
                        <input type="text" id="" name="affil" value="" >

                    </div>
                </div>-->
        <div class="control-group">
            <label for="inputError" class="control-label">Ethnicity:</label>
            <div class="controls">
                <input type="text" id="" name="ethnicity" value="" >

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Available to:</label>
            <div class="controls">
                <input type="text" id="" name="available" value="">

            </div>
        </div>
        <!--        <div class="control-group">
                    <label for="inputError" class="control-label">Availability: </label>
                    <div class="controls">
                        <input type="text" id="" name="availability" value="" >

                    </div>
                </div>-->
        <!--        <div class="control-group">
                    <label for="inputError" class="control-label">Location: </label>
                    <div class="controls">
                        <input type="text" id="" name="location" value="" >

                    </div>
                </div>-->
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo set_value('status') == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo set_value('status') == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo site_url('admin') ?>/escorts">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
