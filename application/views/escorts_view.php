<script type="text/javascript">
    $(document).ready(function() {
        $("a.fancybox").fancybox({
            'titleFormat': function(itemTitle, itemArray, itemIndex, itemOpts) {
                return itemTitle + '<span> Image ' + (itemIndex + 1) + ' of ' + itemArray.length + '</span>';
            }
        });
        jQuery(".contact_num").hide();
        jQuery(".contact_num1").hide();
    });
    $(document).ready(function() {
        $(".viewnum_main").click(function() {
            $(".viewnum_main").hide();
            $(".contact_num").show();

        });

    });
    jQuery(document).ready(function() {
        jQuery("#carousel1").tiksluscarousel({width: 640, height: 480, nav: 'thumbnails', type: "slide"});
    });
</script>
<div class="part_main">
    <section>
        <?php
        foreach ($escort_detail as $escort) {
            ?>
            <div class="main_part">
                <?php
                $img_ad = explode(",", $escort['images']);
                //echo "<pre>"; print_r($img_ad); die;
                ?>
                <div class="jqury" style="height:100%;">
                    <div id="carousel1" style="margin:0 auto;">
                        <ul>
                            <?php for ($i = 0; $i < count($img_ad); $i++) { ?>
                                <li><img height="282" width="501" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $img_ad[$i]; ?>" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="about-me" style="margin-top:14%; <?php if (!empty($color)) { ?>background:<?php echo $color ?>;<?php } ?>">
                <div class="about_left">
                    <h1 class="aboutpro_tit"><?php echo $escort['advertisement'] ?></h1>
                    <div class="aboutpro_tex">
                        <p class="aboutpro_ita">Cool off Weekend Dream Girl Massage Specials in the North Bay.</p>
                        <p class="aboutpro_ita"><?php echo $escort['description'] ?></p>
                    </div>
                </div>
                <div class="about_rgmain">
                    <div class="about_right" <?php if (!empty($color)) { ?>style="background:<?php echo $color ?>;"<?php } ?>>
                        <h1 class="iam_tit">I AM</h1>
                        <div class="iam_main">

                            <div class="iam_promain">
                                <div class="iam_prolf">Gender</div>:
                                <div class="iam_prorgs">     <?php echo $escort['gender'] ?></div>
                            </div>
                            <div class="iam_promain">
                                <div class="iam_prolf">Age </div>:
                                <div class="iam_prorgs">     <?php echo $escort['age'] ?></div>
                            </div>
                            <div class="iam_promain">
                                <div class="iam_prolf">Ethnicity</div>:
                                <div class="iam_prorgs">     <?php echo $escort['ethnicity_to'] ?></div>
                            </div>
                            <div class="iam_promain">
                                <div class="iam_prolf">Hair Color</div>:
                                <div class="iam_prorgs">     <?php echo $escort['hair'] ?></div>
                            </div>
                            <div class="iam_promain">
                                <div class="iam_prolf">Eye Color</div>:
                                <div class="iam_prorgs">     <?php echo $escort['eye'] ?></div>
                            </div>

                            <div class="iam_promain">
                                <div class="iam_prolf">Weight</div>:
                                <div class="iam_prorgs"><?php echo $escort['weight'] ?> lb</div>
                            </div>
                            <div class="iam_promain">
                                <div class="iam_prolf">Measurements</div>:
                                <div class="iam_prorgs"><?php echo $escort['bust'] ?><?php echo $escort['cup'] ?>-<?php echo $escort['waist'] ?>-<?php echo $escort['hips'] ?></div>
                            </div>
                        </div>
                        <div class="iam-bg"></div>
                        <div class="contect_main">
                            <h1 class="contect_main_tit">Contact Me</h1>
                            <div class="viewnum_main">
                                <div class="view_img"><img src="<?php echo base_url(); ?>assets/images/phone-profile.png"></div>
                                <div class="view_span">View Number</div>
                            </div>
                            <?php $con_num = explode(",", $escort['phone_number']); ?>
                            <div class="contact_num">
                                <ul>
                                    <?php for ($c1 = 0; $c1 < count($con_num); $c1++) { ?>
                                        <li><?php echo $con_num[$c1]; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="btn_webem">
                                <?php $mail = explode(",", $escort['email']); ?>

                                <a href="mailto:<?php echo $mail[0]; ?>"><input type="button" class="btn_email" value="Email ME"></a>

                                <?php $website = explode(",", $escort['website']); ?>

                                <?php if (strpos($website[0], "https://") !== false) { ?>
                                    <a target="_blank" href="<?php echo $website[0]; ?>"><input type="button" class="btn_web" value="Website"></a>
                                <?php } else {
                                    ?>
                                    <a target="_blank" href="https://<?php echo $website[0]; ?>"><input type="button" class="btn_web" value="Website"></a>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                    <div class="twitt_mainpro" <?php if (!empty($color)) { ?>style="background:<?php echo $color ?>;"<?php } ?>>
                        <h1 class="tit_twitro">CONNECT</h1>
                        <figure class="titic_twitro">
                            <a href="#"><img src="<?php echo base_url(); ?>assets/images/twitt-profile.png" alt=""></a>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="prefre" style="margin-top: 2%">
                I prefer you to email me regarding my services before you phone me. Your screening information will be required. Outside of the Northbay, I am happy to travel to your location upon your Pre-booking and web payment deposit.There will be no exceptions to this policy.I accept Prebooks, but a deposit is required via web payment.When you decide a date that you would like to book with me,Please then email me for my web payment info  so you can be Screened for a visit.
            </div>

        <?php } ?>
    </section>
</div>
</div>
</div>