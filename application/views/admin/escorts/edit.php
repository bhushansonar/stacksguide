<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
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
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>



    <?php
    //form data

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
    //form validation

    $attributes = array('class' => 'form-horizontal', 'id' => '');
    echo form_open_multipart('admin/escorts/update/' . $this->uri->segment(4) . '', $attributes);
    echo form_hidden('user_id', $user_id);
    ?>
    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />

        <?php
        foreach ($escorts as $escorts_content) {
            ?>
            <input type="hidden" value="<?php echo $escorts_content['build_advertisement_id'] ?>" name="build_advertisement_id" />

            <div class="control-group">
                <div style="display: inline-block;margin-left: 100px;">
                    <label for="inputError" class="control-label">Images:<span class="star">*</span></label>
                </div>
                <div style="display: inline-block">
                    <input type="file" name="images[]" multiple="multiple"  />
                </div>
                <div style="display: inline-block">
                    <?php
                    $view_images = explode(',', $escorts_content['images']);
                    foreach ($view_images as $multi_images) {
                        ?>
                        <img width="75" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $multi_images; ?>" />
                    <?php }
                    ?>
                </div>
                <input type="hidden" name="old_images" value="<?php echo $escorts_content['images'] ?>" />
            </div>





            <div class="control-group">
                <label for="inputError" class="control-label">Model Name<span class="star">*</span></label>
                <div class="controls">
                    <input type="text" id="" name="model_name" value="<?php echo $escorts_content['advertisement'] ?>" >
                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">Tagline <span class="star">*</span></label>
                <div class="controls">
                    <textarea class="adds_in" cols="80" maxlength="175" name="tagline" style="height: 120px; width: 40%;"> <?php echo $escorts_content['tagline'] ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">Age<span class="star">*</span></label>
                <div class="controls">
                    <input type="text" id="" name="age" value="<?php echo $escorts_content['age'] ?>" >
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Gender:-<span class="star">*</span></label>
                <div class="controls">
                    <?php
                    $attribute = 'id="gender"';
                    echo form_dropdown('gender', $gender_opt, $escorts_content['gender'], $attribute);
                    ?>
                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">Cover Image:- <span class="star">*</span></label>
                <div class="controls">
                    <input type="file" name="cover_image"/>
                    <div style="float: right;width: 72%;">
                        <?php if ($escorts_content['cover_image']) { ?>
                            <img width="100" src="<?php echo base_url(); ?>uploads/advertisement/cover/<?php echo $escorts_content['cover_image'] ?>" />
                        <?php } ?>
                    </div>
                    <input type="hidden" name="old_cover_image" value="<?php echo $escorts_content['cover_image'] ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Phone Number<span class="star">*</span></label>
                <div class="controls">
                    <input type="text" id="phone_number" name="phone_number" value="<?php echo $escorts_content['phone_number'] ?>" >
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Email:<span class="star">*</span></label>
                <div class="controls">
                    <input type="text" id="" name="email" value="<?php echo $escorts_content['email'] ?>" >


                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Website:<span class="star">*</span></label>
                <div class="controls">
                    <input type="text" id="" name="website" value="<?php echo $escorts_content['website'] ?>" >
                </div>
            </div>


            <div class="control-group">
                <label for="inputError" class="control-label">Country:-</label>
                <div class="controls">
                    <?php
                    $js = " getPerPlaces(this,'state') ";
                    $attribute = 'id="per_country"  onchange="' . $js . '" ';
                    echo form_dropdown('country', $country_opt, $escorts_content['country_id'], $attribute);
                    ?>

                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">States:-</label>
                <div class="controls">
                    <?php
                    $js = "getPerPlaces(this,'city')";
                    $attribute = 'id="per_state"  onchange="' . $js . '" ';

                    echo form_dropdown('state', $state_opt, $escorts_content['state_id'], $attribute);
                    ?>
                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">City</label>
                <div class="controls">
                    <?php
                    $attribute = 'id="per_city" ';
                    echo form_dropdown('city', $city_opt, $escorts_content['city_id'], $attribute);
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

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Subcategory:-</label>
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
                    <textarea class="tinymce ckeditor" id="editor" name="description"><?php echo $escorts_content['description'] ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Disclaimer</label>
                <div class="controls">
                    <textarea style="width: 40%; height: 120px;" name="disclaimer" maxlength="175" cols="80" class="adds_in"><?php echo $escorts_content['disclaimer'] ?></textarea>
                </div>
            </div>


            <div class="control-group">
                <label for="inputError" class="control-label">Hair</label>
                <div class="controls">
                    <input type="text" id="" name="hair" value="<?php echo $escorts_content['hair'] ?>" >

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Eyes</label>
                <div class="controls">
                    <input type="text" id="" name="eyes" value="<?php echo $escorts_content['eye'] ?>" >

                </div>
            </div>


            <div class="control-group">
                <label for="inputError" class="control-label">Height: </label>
                <div class="controls">
                    <input type="text" id="" name="height_ft" value="<?php echo $escorts_content['height_ft'] ?>" >

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Bust: </label>
                <div class="controls">
                    <input type="text" id="" name="bust" value="<?php echo $escorts_content['bust'] ?>" >

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Weight:</label>
                <div class="controls">
                    <input type="text" id="" name="weight" value="<?php echo $escorts_content['weight'] ?>" >

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Cup:</label>
                <div class="controls">
                    <input type="text" id="" name="cup" value="<?php echo $escorts_content['cup'] ?>" >

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Waist:</label>
                <div class="controls">
                    <input type="text" id="" name="waist" value="<?php echo $escorts_content['waist'] ?>" >

                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">Hips: </label>
                <div class="controls">
                    <input type="text" id="" name="hips" value="<?php echo $escorts_content['hips'] ?>" >

                </div>
            </div>

            <div class="control-group">
                <label for="inputError" class="control-label">Ethnicity:</label>
                <div class="controls">
                    <input type="text" id="" name="ethnicity" value="<?php echo $escorts_content['ethnicity_to'] ?>" >

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Available to:</label>
                <div class="controls">
                    <input type="text" id="" name="available" value="<?php echo $escorts_content['available_to'] ?>">

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Status</label>
                <div class="controls">
                    <select name="status">
                        <option <?php echo trim($escorts_content['status']) == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                        <option <?php echo trim($escorts_content['status']) == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
        <?php } ?>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo $this->session->userdata('redirect_url'); ?>">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
