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
                Advertisement<?php //echo ucfirst($this->uri->segment(2));  ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Updating  Advertisement<?php //echo ucfirst($this->uri->segment(2));  ?>
        </h2>
    </div>


    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/advertisement/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <fieldset>
        <input type="hidden" value="<?php echo $this->session->userdata('redirect_url') ?>" name="redirect_url" />
        <div class="control-group">
            <label for="inputError" class="control-label">Ads Position<span class="star">*</span></label>
            <div class="controls">
                <?php
                $attribute = 'id="ads_position" ';
                echo form_dropdown('ads_position', $ads_position_opt,$advertisement[0]['ads_position'], $attribute);
                ?>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Advertisement Type</label>
            <div class="controls">
                <div class="radio_div"><input checked="checked" onclick="show_add_type(this.value);" <?php echo ($advertisement[0]['advertisement_flag'] == "advertisement_script") ? 'checked="checked"' : ""; ?>   name="advertisement_flag" type="radio" value="advertisement_script" />&nbsp;<span>Advertisement Script</span></div>
                <div class="radio_div"><input onclick="show_add_type(this.value);"  name="advertisement_flag" type="radio" <?php echo ($advertisement[0]['advertisement_flag'] == "advertisement_image") ? 'checked="checked"' : ""; ?> value="advertisement_image" />&nbsp;<span>Advertisement image
                    </span> </div>             
            </div>
        </div>
        <div class="control-group adverstisement_script">
            <label for="inputError" class="control-label">Advertisement Script</label>
            <div class="controls">
                <textarea class="adverstisement_script_input" name="advertisement_script"><?php echo $advertisement[0]['advertisement_script'] ?></textarea>
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>

        <div class="control-group adverstisement_image">
            <label for="inputError" class="control-label">Advertisement Image</label>
            <div class="controls">
                <input style="float:left;" class="adverstisement_image_input" type="file" name="advertisement_image" />
                <?php if ($advertisement[0]['advertisement_image']) { ?>
                    <div style="float:left;"><img width="50" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $advertisement[0]['advertisement_image'] ?>" /></div>
                <?php } ?>
                <input type="hidden" name="old_advertisement_image" value="<?php echo $advertisement[0]['advertisement_image'] ?>" />
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Status</label>
            <div class="controls">
                <select name="status">
                    <option <?php echo $advertisement[0]['status'] == 'Active' ? 'selected="selected"' : '' ?>  value="Active">Active</option>
                    <option <?php echo $advertisement[0]['status'] == 'Inactive' ? 'selected="selected"' : '' ?> value="Inactive">Inactive</option>
                </select>
                 <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo $this->session->userdata('redirect_url'); ?>">Cancel</a>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
<script type="text/javascript">
    var val_add = "<?php echo $advertisement[0]['advertisement_flag'] ?>";
</script>   