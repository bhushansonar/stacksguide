<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/media.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/nav-log.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox.css"/>
        <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/tiksluscarousel.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/github.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" />
        <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>assets/css/style_12.css" />


        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/responsivemobilemenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tiksluscarousel.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rainbow.min.js"></script>
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dialog.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dialog-showme.js"></script>-->
        <script type="text/javascript">var base_url = '<?php echo base_url(); ?>'</script>

        <title>StacksGuide</title>
        <style>
            @font-face {
                font-family: Roboto;
                src:url(<?php echo base_url(); ?>assets/Roboto-Regular.ttf);}
            @font-face {
                font-family: Roboto-light;
                src:url(<?php echo base_url(); ?>assets/Roboto-Light.ttf);}
            </style>
            <script>
                $(document).ready(function() {
                    $("#flip").click(function() {
                        //alert('hi');
                        $("#panel").slideToggle("slow");
                    });
                });
            </script>
        </head>
        <body>
            <div id="wrap">
                <?php //include_once("includes/sidebars/left_sidebar.php"); ?>
                <?php //include_once("includes/sidebars/right_sidebar.php"); ?>
            <div id="main_div">
                <div id="main_work">
                    <header>

                        <div class="head_main">
                            <!--                            <article class="head_left">
                                                        </article>-->
                            <article class="head_right">
                                <div class="soc">
                                    <figure class="soc_ic">
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/images/fb_icon.png" alt="" /></a>
                                    </figure>
                                    <figure class="soc_ic">
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/images/twiter_icon.png" alt="" /></a>
                                    </figure>
                                    <figure class="soc_ic">
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/images/youtube_ic.png" alt="" /></a>
                                    </figure>
                                    <figure class="soc_ic">
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/images/gplus_icon.png" alt="" /></a>
                                    </figure>
                                    <figure class="soc_ic">
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/images/addplus_icon.png" alt="" /></a>
                                    </figure>
                                </div>

                                <div class="menulog">
                                    <?php
                                    //echo "<pre>";print_r($this->session->all_userdata());
                                    //exit;
                                    if (!empty($this->session->userdata['user_id'])) {
                                        if (isset($this->session->userdata['is_logged_in_ads'])) {
                                            if (isset($this->session->userdata['build_advertisement_id'])) {
                                                //if (!empty($get_cart_data)) {
                                                ?>
                                                <div class="cart_menu">
                                                    <div id="flip">
                                                        <div style="display:inline-block;">Cart</div>
                                                        <div style="display:inline-block;float:right">
                                                            <div style="display:inline-block;">$</div>
                                                            <div id="tot" style="display:inline-block;">
                                                                <?php echo @$get_cart_data[0]['total']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="panel" style="padding:15px;">
                                                        <div id="cart">
                                                            <div style="width:100%">
                                                                <table class="cart_tbl">
                                                                    <tr>
                                                                        <?php
                                                                        if (!empty($get_cart_data)) {
                                                                            foreach ($get_cart_data as $cart_data) {
                                                                                ?>
                                                                                <td>
                                                                                    <?php $product_name = explode(",", $cart_data['category_name']); ?>
                                                                                    <table id="tbl" style="color:#000;float:left">
                                                                                        <?php for ($p = 0; $p < count($product_name); $p++) { ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <?php echo $product_name[$p]; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php }
                                                                                        ?>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="float:right;">
                                                                                    <?php $product_value = explode(",", $cart_data['category_value']); ?>
                                                                                    <table id="tbl2" style="color:#000;">
                                                                                        <?php for ($v = 0; $v < count($product_value); $v++) { ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    $
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div class="pro_val"> <?php echo $product_value[$v]; ?></div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                    </table>
                                                                                </td>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                        </div>
                                                        <div id="cart_second">

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                //}
                                            } else {
                                                ?>
                                                <div class="cart_menu">
                                                    <div id="flip">Cart
                                                    </div>
                                                    <div id="panel">
                                                        <div id="cart">

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        if (isset($this->session->userdata['is_logged_in_ads'])) {
                                            ?>
                                            <div class="logout_cont"> <span><?php echo $this->session->userdata('username'); ?> <a style="color: #FFF; " href="<?php echo site_url('stacksguide_ads_signin/ads_logout') ?>">, Logout</a></span></div>
                                        <?php } else { ?>
                                            <div class="logout_cont"> <span><?php echo $this->session->userdata('username'); ?> <a style="color: #FFF; " href="<?php echo site_url('home/logout') ?>">, Logout</a></span></div>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="login login_bt login_bt_right">
                                            <a href="<?php echo site_url() ?>signin"> Login </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </article>

                        </div>
                        <div class="main_nav">
                            <nav class="nav-collapse" style=" margin-left: 10px;">

                                <ul>
                                    <li><a href="<?php echo site_url() ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('events') ?>">Events </a></li>
                                    <li><a href="http://stacksclassifieds.com">Classifieds</a></li>
                                    <li><a href="<?php echo site_url('external_link') ?>">Stacks Shop</a></li>
                                    <li><a href="<?php echo site_url('find_profile/see_profile') ?>">Profiles</a></li>
<!--                                    <li><a href="<?php echo site_url('webmag') ?>"> Webmag</a></li>-->
                                    <li><a href="<?php echo site_url('stacksguide_ads_signin') ?>">Advertisements </a></li>
                                    <li><a href="<?php echo site_url('blog') ?>">Blogs</a></li>
                                    <li><a href="<?php echo site_url('contactus') ?>">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </header>
