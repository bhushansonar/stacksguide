<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jscolor.js"></script>
<div class="container top">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>">Profile View</a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>Updating Profile View</h2>
    </div>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/build_ads/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <input type="hidden" value="<?php echo $build_advertisement_id ?>" name="build_advertisement_id" />
        <div class="control-group">
            <?php
            $selected_radio = isset($user_data[0]['profile_layout']) ? $user_data[0]['profile_layout'] : "";
            $profile_one_status = "";
            $profile_two_status = "";
            if ($selected_radio == '1') {
                $profile_one_status = 'checked';
            } else if ($selected_radio == '2') {
                $profile_two_status = 'checked';
            }
            ?>
            <label for="inputError" class="control-label">Profile View:-</label>
            <div class="controls">
                <div class="radio_div">
                    <input type="radio" <?php echo $profile_one_status; ?> name="profile_view" value="1" />
                    <img class="on_now" src="<?php echo base_url(); ?>assets/images/profile_layout_1.jpg" alt="">
                </div>
                <div class="radio_div">
                    <input type="radio" <?php echo $profile_two_status; ?> name="profile_view" value="2"/>
                    <img class="on_now" src="<?php echo base_url(); ?>assets/images/profile_layout_2.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">RGB Color:-</label>
            <div class="controls">
                <input type="input" name="color" class="color" value="<?php echo $user_data[0]['color']; ?>"/>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo $this->session->userdata('redirect_url'); ?>">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
