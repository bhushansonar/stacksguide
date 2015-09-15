<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
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


    });
</script>

<div class="part_main">
    <section>
        <div class="main_part">
            <article class="vip_main">
                <?php
                //echo "<pre>"; print_r($escort_detail);exit;
                foreach ($escort_detail as $escort) {
                    ?>
                    <figure class="vip_ribi">
                        <img src="<?php echo base_url(); ?>assets/images/vip_ribin.png" alt="">
                    </figure>
                    <div class="vip_escortmain">
                        <h1 class="vip_esnametit"><?php echo $escort['advertisement'] ?></h1>
                        <p class="vip_esnamemsg">Escort / Massage <span class="msgclr"><?php echo $city_opt[$escort['city_id']] ?>,</span></p>
                        <p class="vip_esnameroad"><img class="add_icp" src="<?php echo base_url(); ?>assets/images/add_icon.png" alt=""><?php echo $escort['location_tags'] ?></p>
                    </div>

                    <!--                    <button id="popup_window" data-popup-target="#example-popup">Profile Layout</button>-->

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

                    <hr class="sg_border" />
                    <div class="escort_infomain">
                        <div class="escort_info">
                            <p>Gender  :  <?php echo $escort['gender'] ?></p>
                            <p>Age  :  <?php echo $escort['age'] ?></p>
                            <p>Ethnicity:  : <?php echo $escort['ethnicity_to'] ?></p>
                            <p>Hair color  :  <?php echo $escort['hair'] ?></p>
                            <p>Eye color  : <?php echo $escort['eye'] ?></p>
                            <p>Height:  : <?php echo $escort['height_in'] ?></p>
                            <p>Weight  :  <?php echo $escort['weight'] ?></p>
                            <!--<p>Measurements:  :  36D - 26" - 30" </p>-->
                            <p class="independ msgclr nummargin">Independent for <?php echo $escort['available_to'] ?></p>
                            <p class="independ msgclr"><?php echo $escort['location_tags'] ?></p>
                            <p class="independ msgclr">Incall / Outcall </p>
                            <p class="nummargin nummargin1">CONTACT ME :- <span class="numclr" style="font-size: 14px;"><?php echo $escort['phone_number'] ?></span></p>
                            <div class="vipbt_main">
                                <div class="email_bt">
                                    Email Me
                                </div>
                                <div class="web_bt">
                                    Website
                                </div>
                            </div>
                            <div class="book_amin">
                                <ul>
                                    <li><img src="<?php echo base_url(); ?>assets/images/bookmark_ic.png" alt=""><a href="#">Bookmark my page</a></li>
                                    <li><img src="<?php echo base_url(); ?>assets/images/shere_link.png" alt=""><a href="#">View direct link</a></li>
                                    <li><img src="<?php echo base_url(); ?>assets/images/report_fake.png" alt=""><a href="#">Report Fake Photos</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="escort_infopic">
                            <figure class="bottlesWrapper">
                                <?php
                                $ads_image = $escort['images'];
                                ?>
                                <a class='fancybox' rel="" title="vip_escot" href="<?php echo base_url(); ?>uploads/advertisement/<?php echo reset(explode(',', $ads_image)); ?>">
                                    <img  src="<?php echo base_url(); ?>uploads/advertisement/<?php echo reset(explode(',', $ads_image)); ?>">
                                </a>
                            </figure>
                            <div class="thumbs vip_submin">
                                <?php
                                $images = explode(",", $escort['images']);
                                foreach ($images as $sub_image) {
                                    ?>
                                    <figure class="vip_subpic" id="<?php echo $sub_image; ?>">
                                        <!--<a class=""  rel="gallery" title="vip_sub1" >-->
                                        <img onclick="geimage(this)" height="100" width="100" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $sub_image; ?>" alt="">
                                        <!--</a>-->
                                    </figure>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <hr class="black_border" />
                    <div class="statclass">
                        <div class="escort_info ">
                            <h2 class="about_tit">About Me</h2>
                            <figure>
                                <?php //echo "<pre>";print_r($images[3]); ?>
                                <a class='fancybox' rel="" title="vip_escot" href="<?php echo base_url(); ?>uploads/advertisement/<?php echo $images[3] ?>">
                                    <img src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $images[3] ?>" alt="">
                                </a>
                            </figure>

                        </div>
                        <div class="escort_infopic book_amin">
    <!--                            <p>THIS WEEK HOT JULY SPECIALS! CHECK OUT THE NEW JULY BEACH MODEL PHOTOS ON MY WEBSITE! </p>
                            <p>CONTACT ME FOR SKYPE INFORMATION. </p>
                            <p>NEW PHOTOS! What's Hott Now!</p>
                            <p>New photos added today in my website gallery </p>
                            <p>http://www.alyshatulipgfe.com/ Come visit me!!! </p>
                            <p>Unforgettable Blonde Bikini Model July Specials! Come cool off with me- take it all off. </p>
                            <p>CHECK OUT NEW SLIDESHOW AND PICS ON MY WEBSITE - NOW OFFERING JULY 2014  JULY SPECIALS!</p>
                            <p>Hello, I'm....</p>
                            <p>Alysha_Tulipgfe</p>
                            <p>San Francisco Northbay.</p>-->

                            <?php
                            echo $escort['description'];

//                                $a = strlen($escort['description']);
//                                $b=$a/1.6;
//                                //$c=$b/100;
//
//                                echo $first = substr($escort['description'], 0, $b);
                            ?>

                        </div>
                        <!--                        <div style="margin-top:2px;line-height: 38px; ">
                        <?php //echo $second = substr($escort['description'], $b, $a);  ?>
                                                </div>-->
                    </div>
                    <!--                    <div class="statclass">
                                            <div class="offer">
                                                <p>Offering new Summer 2014 massage packages. Come check out my hot new website. Let me massage you from head to toe.  View all my New pics at my new website alyshatulipgfe.com</p>
                                                <p> If you are looking for a delightful "Fantasy" experience  look no further. Enjoy my 5 star experience where I will give you extra special treatment(time of your life) with a variety of relaxtion techniques. Screening is required by email.</p>
                                                <p>Let me deeply relax you. Ask about my " Fantasy Specials". (Put " Fantasy" in your email inquiry -for a Special experience & extra discount!) I cater to upscale gentlemen & offer many massage types, with a variety of techniques specifically designed to relax you. You will be massaged & given a fantasy experience from head to toe. Extra Options available.</p>
                                                <p>I am a fully certified CMT & offer Swedish, Deep Tissue, Full body, Hot Rocks, Oil, or FBSM I will massage your woes away- leaving you fully relaxed.</p>
                                                <p>Come visit me for a relaxing experience. I would love to spend some time with you I offer a variety of longer sessions & will go to dinner with you and </p>
                                            </div>
                                        </div>-->
                    <hr class="black_border" />
                    <div class="statclass agree_center">
                        <h1 class="vip_esnametit"><?php echo $escort['advertisement'] ?></h1>
                        <p class="nummargin nummargi2">CONTACT ME<span class="numclr"> <?php echo $escort['phone_number'] ?> </span></p>
                        <div class="vipbt_main">
                            <div class="email_bt">
                                Email Me
                            </div>
                            <div class="web_bt">
                                Website
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </article>
        </div>
    </section>
</div>
</div>
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