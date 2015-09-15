<script>
    $(function() {
        $('.layout_1,.layout_2').click(function() {
            var template_url = $(this).attr('href');
            var ad_id = template_url.substring(template_url.lastIndexOf('/') + 1);
            var profile_value = $(this).attr('data-value');
            //console.log(ad_id);
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
            //echo "<pre>"; print_r($escort); die;
            ?>

            <div class="main_part">
                <?php
                $img_ad = explode(",", $escort['images']);
                ?>
                <div class="jqury carousel_height">
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
                    <!--  <div class="about-scs">
                      <h1 class="scs_tit"> s c h e d u l e</h1>
                      <p>(Schedule -9am-Midnight, in-call North Bay)</p>
                      <ul>
                      <li>Oct 19th - 22nd San Francisco, North bay, Marin, Rohnert Park, Sonoma, Napa,& Wine Country</li>
                      <li>Oct 23rd North bay until 1pm</li>
                      <li>Oct 23rd North Bay or Silicon Valley TBD</li>
                      <li>October 24th North Bay or Silicon Valley TBD</li>
                      <li>Oct 24th North bay afternoon & evening</li>
                      <li>Oct 24th-30th North bay</li>
                      <li>Oct 30th Nbay or Silicon Valley TBD</li>
                      <li>Oct 31st until 3pm NBay</li>
                      </ul>
                      <p class="aboutpro-mar">Looking forward to meeting you.</p>
                      <p class="aboutpro-mar">COME VISIT ME IN THE NORTHBAY!!!</p>
                      <p class="aboutpro-mar">References Required<br>
      All people with no reference ....WORK verification required.
      This includes work address, main number, extension, website and an email sent to me from
      your company email.
      </p>
      <p class="aboutpro-mar">Expectations & Behavior :<br>
      I do not see people under the influence of heavy alcohol and do not tolerate drugs under
      any circumstances. If you arrive to your appointment in this state, our session will be
      terminated immediately.</p>
                      </div>-->
                </div>
                <div class="about_rgmain">


                    <!--<button id="popup_window" data-popup-target="#example-popup" style="margin-top:0px;">Profile Layout</button>-->

                    <div id="example-popup" class="popup">
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
                    <div class="popup-overlay"></div>


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