<style type="text/css">

    .aboutcl{ color:#fff; font-family: Roboto-light; font-weight: normal; font-size: 15px;}
    .aboutpad{ margin:0.5% 0 0.5% 0;}
    .inabout{ width: 40%;}

    .adds_in {
        background-color: #fff;
        border: medium none;
        border-radius: 5px;
        color: #000;
        display: inline-block;
        height: 41px;
        padding: 0 0 0 2%;
        width: 58%;
    }
    .adds_sel {
        background-color: #fff;
        border: medium none;
        border-radius: 5px;
        color: #000;
        display: inline-block;
        height: 37px;
        padding: 0 0 0 2%;
        width: 100%;
    }
    .add_sub{ margin: 0 0 0 3%;}

</style>
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function getPerPlaces(obj, child_type) {
        var parent_id = $(obj).val();
        $('#per_' + child_type)
        if (parent_id != "") {
            $.ajax({
                type: 'POST',
                url: base_url + "common_ctrl/get_places",
                data: {child_type: child_type, parent_id: parent_id},
                success: function(data) {
                    $('#per_' + child_type).html(data);
                    $('#per_' + child_type).change();
                }
            });
        } else {
            $('#per_' + child_type).html('<option value="">Select</option>');
            $('#per_' + child_type).change();
        }
    }
</script>
<?php
echo validation_errors();
//echo $this->session->flashdata('flash_message');
if ($this->session->flashdata('flash_message')) {
    /* if($this->session->flashdata('flash_message') == 'add')
      { */
    echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
    echo '<a class="close" data-dismiss="alert">&#215;</a>';
    echo $this->session->flashdata("flash_message");
    echo '</div>';
}
?>
<section>
    <div class="main_part">
        <article class="log_left">
            <div class="alc_tital">
                <h1 class="create_tit" style="margin-top: 0;">Stacks Guide</h1>
                <span class="alcar"><img src="<?php echo base_url(); ?>assets/images/alc_arrow.png" alt="" /></span>
                <h2 class="pay2tit" style="color: #fff;font-weight: bold;"> OR &nbsp;&nbsp;    <a href="<?php echo base_url() ?>find_profile/mapping" style="color: #fff;font-weight: bold;text-decoration: underline;}">Use the Map</a></h2>

            </div>
            <hr class="sg_border" />
            <fieldset>
                <form style="margin: 10px;" id="fileupload" action="<?php echo base_url() ?>find_profile/get_profiles" method="POST" enctype="multipart/form-data">


                    <div class="alc_left_line">
                        <div style="display: inline-block; width: 20%;">
                            <label>
                                Country<span class="star">*</span>
                            </label>
                        </div>
                        <div style="display: inline-block; width: 50%;">
                            <select name="country" id="per_country" onchange=" getPerPlaces(this, 'state')" class="adds_sel">
                                <option value="" selected="selected">Select</option>
                                <?php
                                unset($country_opt['']);
                                foreach ($country_opt as $key => $country) {
                                    ?>

                                    <option value="<?php echo $key; ?>"><?php echo $country; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="alc_left_line">
                        <div style="display: inline-block; width: 20%;">
                            <label>
                                State<span class="star">*</span>
                            </label>
                        </div>
                        <div style="display: inline-block; width: 50%;">
                            <select name="state" id="per_state" onchange="getPerPlaces(this, 'city')" class="adds_sel">
                                <option value="" selected="selected">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="alc_left_line">
                        <div style="display: inline-block; width: 20%;">
                            <label>
                                City<span class="star">*</span>
                            </label>
                        </div>
                        <div style="display: inline-block; width: 50%;">
                            <select name="city" id="per_city" class="my adds_sel">
                                <option value="" selected="selected">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="alc_left_line">
                        <label class="create_usname"></label>
                        <div class="alc_left_rg2">
                            <input type="submit" name="submit" value="Search" class="bt_rg ">
                        </div>
                    </div>
<!--                    <input type="submit" name="submit" value="Search" style="margin:0 0 0 11%" class="bt_rg">-->



                </form>
            </fieldset>
        </article>
        <article class="alc_right">
            <h1 class="classhone" style="margin-top: 0"><img src="<?php echo base_url(); ?>assets/images/stacksclassified_logo.png" alt=""></h1>
            <figure class="classhome_main">
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class1.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class2.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class3.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class4.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class5.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class1.jpg" alt=""></a>

                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class2.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class3.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class4.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class5.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class1.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class2.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class3.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class4.jpg" alt=""></a>
                </div>
                <div class="stacksclass_pic">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/class5.jpg" alt=""></a>
                </div>
            </figure>
        </article>
    </div>
</div>

</section>