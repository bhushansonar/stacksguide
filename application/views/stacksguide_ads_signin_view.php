<style>

    a {
        color: #000;
        font-weight: normal;
    }
    .bt_rg{
        cursor: pointer;
    }
</style>
<?php
if ($this->session->flashdata('validation_error_messages')) {
    echo $this->session->flashdata('validation_error_messages');
}
echo validation_errors();
if ($this->session->flashdata('flash_message')) {

    echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
    echo '<a class="close" data-dismiss="alert">&#215;</a>';
    echo $this->session->flashdata("flash_message");
    echo '</div>';
}
?>
<?php
if ($this->session->userdata('is_logged_in')) {
    $login_error = '<strong>ohh snap!</strong>
Already Login please logout!';
}
if (!empty($login_error)) {
    ?>
    <div style="margin:12px;" class="alert alert-error">
        <a class="close" data-dismiss="alert">&#215;</a>
        <?php echo $login_error; ?>
    </div>
<?php } ?>
<div class="main_part">

    <article class="log_left">
        <?php if (!$this->session->userdata('is_logged_in_ads')) { ?>
            <div class="alc_tital">
                <h1 class="create_tit" style="margin-top: 0;">Login</h1>
                <span class="alcar"><img src="<?php echo base_url(); ?>assets/images/alc_arrow.png" alt="" /></span>
                <h2 class="pay2tit">Advertiser Login</h2>

            </div>
            <hr class="sg_border" />
            <fieldset>
                <form method="post" class="form_home" action="<?php echo site_url('stacksguide_ads_signin/validate_credentials_front') ?>">
                    <div class="alc_left_line">
                        <label class="create_usname">User Name:</label>
                        <input type="text"  name="username" class="crete_in"/>
                    </div>
                    <div class="alc_left_line">
                        <label class="create_usname">Password:</label>
                        <input type="password" name="password"  class="crete_in"/>
                    </div>
                    <div class="alc_left_line">
                        <label class="create_usname"></label>
                        <div class="alc_left_rg2">
                            <input type="submit"  class="bt_rg " value="Login" name="submit"/>
    <!--                            <span class="forgotmargin">Forgot Password?</span>-->
                        </div>
                    </div>
                    <div class="alc_left_line">
                        <label class="create_usname"></label>
                        <div class="alc_left_rg2">
                            <div class="login login_bt">
                                <a href="<?php echo site_url() ?>stacksguide_ads_signup">Create Account</a>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        <?php } ?>
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
    <hr class="black_border" />
</div>
<!--<div class="welstat">
    <h1 class="font-nor">Secure Policy</h1>
    <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>
    <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>

</div>
<hr class="black_border" />-->


<div class="statclass">
    <a href=""><img src="<?php echo base_url(); ?>assets/images/classifids_add.jpg" alt="" /></a>
</div>
<div class="affilate_main">
    <h1 class="stacsguide_tit font-nor">Featured Stacks Affiliates & Sponsors</h1>
    <hr class="sg_border" />
    <div class="affilate_pic_main">
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate1.jpg" alt="" /></a>
        </div>
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate2.jpg" alt="" /></a>
        </div>
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate3.jpg" alt="" /></a>
        </div>
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate1.jpg" alt="" /></a>
        </div>
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate2.jpg" alt="" /></a>
        </div>
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate1.jpg" alt="" /></a>
        </div>
        <div class="affilate_pic">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/affilate2.jpg" alt="" /></a>
        </div>
    </div>
</div>
</section>
</div>
</div>
</div>
