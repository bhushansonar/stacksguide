<style>
    .bt_rg{
        cursor: pointer;
    }
    a {
        color: #000;
        font-weight: normal;
    }
</style>
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
<div class="part_main">
    <section>
        <div class="main_part">
            <article class="alc_left alc_left_one">
                <?php if (!$this->session->userdata('is_logged_in')) { ?>
                    <form method="post" class="form_home" action="<?php echo site_url('stacksguide_ads_signup/create_member') ?>">
                        <div class="alc_tital">
                            <h1 class="create_tit" style="margin-top: 0;">Stack Guide Advertisement Account</h1>
                            <span class="alcar"><img src="<?php echo base_url(); ?>assets/images/alc_arrow.png" alt="" /></span>
                            <h2 class="pay2tit">Advertisement Payment Information</h2>

                        </div>
                        <hr class="sg_border" />
                        <fieldset>
                            <div class="alc_left_line">
                                <label class="create_usname">Username:</label>
                                <input class="crete_in" name="username" type="text" placeholder="">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Email Address:</label>
                                <input type="text"  class="crete_in" value="" id="email" name="email">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Retype Email Address:</label>
                                <input type="text" class="crete_in"  value="" id="c_email" name="confirm_email">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Password:</label>
                                <input type="password" class="crete_in"  value="" id="password" name="password">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Retype Password:</label>
                                <input type="password" class="crete_in"  value="" id="c_password" name="confirm_password">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Phone Number:</label>
                                <input type="text" class="crete_in"  value="" id="phone_number" name="phone_number">
                            </div>
                            <div class="alc_left_line" style="text-align: center;">

                                <input type="checkbox" name="term_condition" value="YES"/>
                                I have read and agreed to the <span style="color:#f39c12;">My Stacks Terms and Conditions.</span>
                            </div>
                            <div class="alc_left_line continue_button">
                                <input style="cursor: pointer" type="submit" name="submit" class="bt_rg " value="Submit" />
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>
            </article>

            <hr class="black_border" />
        </div>
        <div class="welstat">
            <h1 class="font-nor">Secure Policy</h1>
            <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>
            <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>

        </div>
        <hr class="black_border" />



    </section>
</div>
</div>