<script>
    $(function() {
        $('.layout_1,.layout_2').click(function() {
            var template_url = $(this).attr('href');
            var ad_id = template_url.substring(template_url.lastIndexOf('/') + 1);
            var profile_value = $(this).attr('data-value');
            console.log(ad_id);
            $.ajax({
                type: "GET",
                url: base_url + 'vip_details/add_profile_layout_to_user/' + ad_id + '/' + profile_value,
                success: function(data) {
                    console.log('done');
                },
                error: function() {
                    console.log('fail');
                }
            });

        });
    });
</script>
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
</script>
<script>
    $(document).ready(function() {
        $(".view_numbg").click(function() {
            $(".view_numbg").hide();
            $(".contact_num").show();

        });
        $(".view_numbg1").click(function() {
            $(".view_numimg1").hide();
            $(".view_numtex1").hide();
            $(".contact_num1").show();
        });

    });
</script>
<script language="javascript">
    jQuery(document).ready(function() {
        jQuery("#carousel1").tiksluscarousel({width: 600, nav: 'thumbnails', type: "slide"});
    });
</script>
<?php //echo $close_div; ?>
<?php if ($close_div == "true") { ?>
    </div>
<?php } ?>
<?php if (!empty($cover1)) { ?>
    <div class="proiner_bg">
        <img width="100%" src="<?php echo base_url(); ?>uploads/advertisement/cover/<?php echo $cover1; ?>" >
    </div>
<?php } ?>
<div class="part_main">
    <section>
        <?php foreach ($escort_detail as $escort) { ?>
            <div class="main_part">
                <div class="aboutpro_maindiv">
                    <div class="aboutpro_left" <?php if (!empty($color)) { ?>style="background:<?php echo $color ?>;" <?php } ?>>

                        <!--<button id="popup_window" data-popup-target="#example-popup" style="margin-top:0px;">Profile Layout</button>-->

                        <!--                        <div id="example-popup" class="popup">
                                                    <div class="popup-body">
                                                        <span class="popup-exit"></span>
                                                        <div class="popup-content">

                                                            <div class="avalibal">
                        <?php $build_ad_id = $escort['build_advertisement_id']; ?>
                                                                <img class="on_now" src="<?php echo base_url(); ?>assets/images/profile_layout_1.jpg" alt=""><a class="layout_1" data-value="1" href="<?php echo base_url('profile_pageinner/show_innerpage_details/' . $build_ad_id) ?>">Layout 1</a></div>
                                                            <div class="avalibal1">
                        <?php $build_ad_id = $escort['build_advertisement_id']; ?>
                                                                <img class="on_now" src="<?php echo base_url(); ?>assets/images/profile_layout_2.jpg" alt=""><a class="layout_2" data-value="2" href="<?php echo base_url('profile_pageinner/show_page_detail/' . $build_ad_id) ?>">Layout 2</a></div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="popup-overlay"></div>-->
                        <h1 class="proiner_tit"><?php echo $escort['advertisement'] ?></h1>
                        <div class="hell_main">
                            <?php
                            $img_ad = explode(",", $escort['images']);
                            //echo "<pre>"; print_r($img_ad);
                            ?>
                            <div class="hell_left_one">
                                <?php echo $escort['description']; ?>
                            </div>
                            <div class="hell_right_one">
                                <img class="hellrg_border" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $img_ad[0]; ?>" alt="">

                            </div>

                        </div>
                        <div class="jqury">
                            <div id="carousel1">
                                <ul>
                                    <?php for ($i = 0; $i < count($img_ad); $i++) { ?>
                                        <li><img src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $img_ad[$i]; ?>" /></li>

                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                        <div class="info_cnmain">
                            <h1 class="info_cntit">CONTACT INFO</h1>
                            <div class="view_numbg">
                                <div class="view_numtex">View number</div>
                                <div class="view_numimg"><img src="<?php echo base_url(); ?>assets/images/phone-profile.png"></div>
                            </div>
                            <?php $con_num = explode(",", $escort['phone_number']); ?>
                            <div class="contact_num"><label>Contact Me :</label>
                                <ul>
                                    <?php for ($c1 = 0; $c1 < count($con_num); $c1++) { ?>
                                        <li><?php echo $con_num[$c1]; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <p class="smart_tex smart_tex_extra">11:00 AM TO 12:00 Midnight</p>
                            <!--<p class="smart_tex">Your Address Book</p>
                            <p class="smart_tex">Your Smartphone</p>-->
                        </div>
                    </div>
                    <div class="aboutpro_right">
                        <div class="add_fav" <?php if (!empty($color)) { ?>style="background:<?php echo $color ?>;" <?php } ?>>Add to Favorities</div>
                        <div class="info_rightmain" <?php if (!empty($color)) { ?>style="background:<?php echo $color ?>;" <?php } ?>>
                            <div class="info_cnmain1">
                                <h1 class="info_cntit1">CONTACT INFORMATION</h1>
                                <div class="view_numbg1">
                                    <div class="view_numtex1">View number</div>
                                    <div class="view_numimg1"><img src="<?php echo base_url(); ?>assets/images/phone-profile.png"></div>
                                </div>

                                <div class="contact_num1">
                                    <ul>
                                        <?php for ($c = 0; $c < count($con_num); $c++) { ?>
                                            <li><?php echo $con_num[$c]; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <p class="smart_tex1">11:00 AM <br>TO<br> 12:00 Midnight</p>

                            </div>
                            <hr class="coninfo_br1"/>
                            <hr class="coninfo_br2"/>
                        </div>

                        <div class="add_vip">
                            <h2 class="pam_tit">ADD VIP PAMELA TO.....</h2>
                            <p>Your Address book</p>
                            <p>Your  Smartphone</p>
                        </div>
                        <div class="add_vipsoc">
                            <figure class="vip_fb"></figure>
                            <figure class="vip_twitt"></figure>
                            <figure class="vip_gplus"></figure>
                            <figure class="vip_linked"></figure>
                        </div>
                        <div class="look_the" <?php if (!empty($color)) { ?>style="background:<?php echo $color ?>;" <?php } ?>>
                            <div class="lok_main">
                                <h1 class="look_tit">THE LOOK</h1>
                                <p>Vip is a <?php echo $escort['height_ft'] ?>&#39;<?php echo $escort['height_in'] ?>&#34;,Slander,<?php echo $escort['age'] ?>
                                    year old</p>
                                <p>caucassian woman with
                                    <?php echo $escort['hair'] ?> hair and
                                    <?php echo $escort['eye'] ?> eyes.</p>
                                <p>She is available for
                                    <?php echo $escort['available_to'] ?>.</p>
                                <figure class="look_img"><img src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $img_ad[0]; ?>" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </section>

</div>
<?php if ($close_div != "true") { ?>
    </div>
<?php } ?>
<script type="text/javascript">
    function geimage(obj) {
        var thmb = obj;
        var src = obj.src;
        var href = obj.src;
        $('.bottlesWrapper img').fadeOut(400, function() {
            thmb.src = obj.src;
            $(this).fadeIn(400)[0].src = src;

        });
        $('.bottlesWrapper a').fadeOut(400, function() {
            thmb.href = obj.href;
            $(this).fadeIn(400)[0].href = href;

        });
    }

//var a = $('.vip_subpic').attr('id');
//alert(a);
//$('.thumbs img').click(function() {
//   var thmb = this;
//        //alert(this);
//        var src = this.src;
//        $('.bottlesWrapper img').fadeOut(400, function() {
//            thmb.src = this.src;
//            $(this).fadeIn(400)[0].src = src;
//        });
//});
</script>
<script type='text/javascript'>//<![CDATA[
    $(window).load(function() {
        jQuery(document).ready(function($) {

            $('[data-popup-target]').click(function() {
                $('html').addClass('overlay');
                var activePopup = $(this).attr('data-popup-target');
                $(activePopup).addClass('visible');

            });

            $(document).keyup(function(e) {
                if (e.keyCode == 27 && $('html').hasClass('overlay')) {
                    clearPopup();
                }
            });

            $('.popup-exit').click(function() {
                clearPopup();

            });

            $('.popup-overlay').click(function() {
                clearPopup();
            });

            function clearPopup() {
                $('.popup.visible').addClass('transitioning').removeClass('visible');
                $('html').removeClass('overlay');

                setTimeout(function() {
                    $('.popup').removeClass('transitioning');
                }, 200);
            }

        });
    });//]]>

</script>
</div>
</div>