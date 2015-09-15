<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.nestedAccordion.js"></script>
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
<script>
    $(document).ready(function() {
        //$('.dialog').css('display:block');
        openPopUP();
        closePopUP();
    });
    function openPopUP() {
        $('.dialog').fadeIn();
    }
    function closePopUP() {
        $('.click_btn').click(function() {
            var pop_pup_session_value = "1";
            $.ajax({
                type: 'POST',
                url: base_url + "home/popUpSession",
                data: {pop_pup_session: pop_pup_session_value},
                success: function(data) {
                    $('.dialog').fadeOut();
                    $('.dialog_overlay').css("display", "none");
                }
            });

        });

    }

</script>
<?php
$pop_pup_session = $this->session->userdata('pop_pup_session');
if (empty($pop_pup_session)) {
    ?>
    <div class="dialog_overlay"></div>
    <div class="dialog" style="display: none">
        <div class="pop_up">
            <div class="pop_up wi">
                <div>
                    <?php
                    echo $warning_disclaimer[0]['description'];
                    ?>
                    <button class = "click_btn" type = "submit">
                        <p class = "enter">Enter Here</p>
                        <p class = "small_content">By clicking, you agree to the Terms & Conditions</p>
                    </button>
                </div>
                <figure><img src = "<?php echo base_url(); ?>uploads/warning_disclaimer/<?php echo $warning_disclaimer[0]['image']; ?>"/></figure>
            </div>
        </div>
    </div>
    <?php
}
?>
<div class="part_main">
    <section>
        <div class="main_part">
            <?php
            echo validation_errors();
            if ($this->session->flashdata('flash_message')) {
                /* if($this->session->flashdata('flash_message') == 'add')
                  { */
                echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
                echo '<a class="close" data-dismiss="alert">&#215;</a>';
                echo $this->session->flashdata("flash_message");
                echo '</div>';
            }
            ?>
            <article class="main_left">
                <h1 class="sttit">Stacks Guide</h1>
                <h3 class="worldtit">World wide featured entertainers</h3>
                <hr class="sg_border" />

                <div class="main_box">
                    <?php
                    foreach ($escort_detail as $row_escort) {
                        $ads_image = $row_escort['images'];
                        ?>
                        <div class="gbox">
                            <div class="gpic"><a href="<?php echo base_url(); ?>vip_details/show_vip_details/<?php echo $row_escort['build_advertisement_id'] ?>">
                                    <img src="<?php echo base_url(); ?>uploads/advertisement/medium/<?php echo reset(explode(',', $ads_image)); ?>" alt="" /></a></div>
                            <div class="ginfo">
                                <p>
                                    <a href="<?php echo base_url(); ?>vip_details/show_vip_details/<?php echo $row_escort['build_advertisement_id']; ?>">
                                        <?php echo $row_escort['advertisement']; ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </article>
            <?php include_once("includes/sidebars/left_sidebar.php"); ?>
            <?php include_once("includes/sidebars/right_sidebar.php"); ?>
            <?php include_once("includes/sidebars/sidebar.php"); ?>
            <hr class="black_border" />
        </div>
        <div class="welstat">
            <h1 class="font-nor">Welcome to Stack Guide</h1>
            <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>
            <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>
        </div>
        <hr class="black_border" />
        <div class="statclass">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/classifids_add.png" alt="" /></a>
        </div>
<!--        <iframe  width='960px' id="myIframe" src="http://stacksclassifieds.com/featured_ads"></iframe>-->
        <!--<div class="other_gat">
       <p> Aix-en-Provence Escorts - Bordeaux Escorts - Cannes Escorts - Lille Escorts - Lyon Escorts - Marseille Escorts - Nantes Escorts - Nice Escorts - Paris Escorts - Strasbourg Escorts - Toulouse Escorts</p>
       <p>Alabama Escorts - Albany Escorts - Albuquerque Escorts - Arizona Escorts - Atlanta Escorts - Austin & San Antonio Escorts - Baltimore Escorts - Biloxi Escorts - Boston Escorts - Buffalo Escorts - Chicago Escorts - Colorado Escorts - Dallas Escorts - Hartford Escorts - Hawaii Escorts - Houston Escorts - Indiana Escorts - Kansas City Escorts - Las Vegas Escorts - Los Angeles Escorts - Louisville Escorts - Memphis Escorts - Miami Escorts - Michigan Escorts - Minnesota Escorts - Naples Escorts - Nashville Escorts - Nebraska Escorts - New Jersey Escorts - New Orleans Escorts - New York Escorts - North and South Carolina Escorts - North Florida Escorts - Ohio Escorts - Oklahoma Escorts - Philadelphia Escorts - Pittsburgh Escorts - Portland Escorts - Providence Escorts - Reno & Tahoe Escorts - San Diego Escorts - San Francisco Escorts - San Jose Escorts - Seattle Escorts - St. Louis Escorts - Tampa & Orlando Escorts - Utah Escorts - Virginia Escorts - Washington DC Escorts - Wisconsin Escorts</p>
       <p>Amsterdam Escorts - Den Haag Escorts - Eindhoven Escorts - Rotterdam Escorts - Tilburg Escorts - Utrecht Escorts</p>
       <p>Basel Escorts - Bern Escorts - Geneva Escorts - Zurich Escorts</p>
       <p>Berlin Escorts - Bremen Escorts - Cologne Escorts - Dusseldorf Escorts - Essen Escorts - Frankfurt Escorts - Hamburg Escorts - Hanover Escorts - Munich Escorts - Nuremberg Escorts - Stuttgart Escorts</p>
       <p>Calgary Escorts - Edmonton Escorts - Montreal Escorts - Toronto Escorts - Vancouver Escorts - Winnipeg Escorts</p>
       <p>All Caribbean Escorts</p>
       <p>London Escorts - United Kingdom Escorts</p>
       <p>Transsexual Escorts</p>
       <p>Eros XXX Female Escorts</p>
       <p>We have voluntarily registered with the following parental control programs to keep your children safe from adult materials/p>
       <p>[Net Nanny] [Cyber Patrol] [Cyber Sitter] [Safe Surf] </p>

        </div>-->
        <!--        <div class="main_trade">
                    <div class="fbtread">

                        <h1 class="font-nor">Facebook Trending</h1>
                        <div class="fbbox"></div>
                    </div>
                    <div class="tittread">
                        <h1 class="font-nor">Twitter Feed</h1>
                        <div class=" twittbox">
                            <a class="twitter-timeline" href="https://twitter.com/hardikamutech" data-widget-id="562840734387408898">Tweets by @hardikamutech</a> <script>!function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + "://platform.twitter.com/widgets.js";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, "script", "twitter-wjs");</script>

                        </div>
                    </div>
                </div>-->
        <div class="city_escort">
            <h1 class="font-nor"> City Escort</h1>
            <?php
            $ci = & get_instance();
            $ci->load->model('home_model');
            $ci->load->model('common_model');

            foreach ($city_opt as $city) {
                $city_name = $city['slug'];
                $city_id = $city['city_id'];
                //$get_cat_id = $ci->home_model->get_category_by_field_value($city_name);
//                $where = " AND country_id={$city['country_id']}";
//                $country_name = $ci->common_model->getFieldData('country', 'country_name', $where);
//                for ($m = 0; $m < count($get_cat_id); $m++) {
//                    $category_id = $get_cat_id[$m]['category'];
//
                ?>
                <div class="town_escort">
                    <ul>
                        <li><a href="<?php echo base_url("escorts/$city_id") ?>"><?php echo $city['city_name'] ?></a></li>
                    </ul>
                </div>
                <?php
                //}
            }
            ?>
            <!--            <div class="town_escort">
                            <ul>
                                <li><a href="#">Aix-en-Provence</a></li>
                                <li><a href="#">Bordeaux</a></li>
                                <li><a href="#">Cannes</a></li>
                                <li><a href="#">Lille</a></li>
                                <li><a href="#">Lyon</a></li>
                                <li><a href="#">Marseille</a></li>
                                <li><a href="#">Nantes</a></li>
                                <li><a href="#">Nice</a></li>
                                <li><a href="#">Paris</a></li>
                                <li><a href="#">Strasbourg</a></li>
                                <li><a href="#">Toulouse</a></li>
                                <li><a href="#">Vancouver</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">All Caribbean</a></li>
                                <li><a href="#">Alabama</a></li>
                                <li><a href="#">Albany</a></li>
                                <li><a href="#">Albuquerque</a></li>
                                <li><a href="#">Arizona</a></li>
                                <li><a href="#">Atlanta</a></li>
                                <li><a href="#">Austin</a></li>
                                <li><a href="#">San Antonio</a></li>
                                <li><a href="#">Baltimore</a></li>
                                <li><a href="#">Biloxi</a></li>
                                <li><a href="#">Boston</a></li>
                                <li><a href="#">Buffalo</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">Chicago</a></li>
                                <li><a href="#">Colorado</a></li>
                                <li><a href="#">Dallas</a></li>
                                <li><a href="#">Hartford</a></li>
                                <li><a href="#">Hawaii</a></li>
                                <li><a href="#">Houston</a></li>
                                <li><a href="#">Indiana</a></li>
                                <li><a href="#">Kansas City</a></li>
                                <li><a href="#">Las Vegas</a></li>
                                <li><a href="#">Los Angeles</a></li>
                                <li><a href="#">London </a></li>
                                <li><a href="#">Louisville</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">Memphis</a></li>
                                <li><a href="#">Miami</a></li>
                                <li><a href="#">Michigan</a></li>
                                <li><a href="#">Minnesota</a></li>
                                <li><a href="#">Naples</a></li>
                                <li><a href="#">Nashville</a></li>
                                <li><a href="#">Nebraska</a></li>
                                <li><a href="#">New Jersey</a></li>
                                <li><a href="#">New Orleans</a></li>
                                <li><a href="#">New York</a></li>
                                <li><a href="#">North</a></li>
                                <li><a href="#">XXX Female</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">South Carolina</a></li>
                                <li><a href="#">North Florida</a></li>
                                <li><a href="#">Ohio</a></li>
                                <li><a href="#">Oklahomat</a></li>
                                <li><a href="#">Philadelphia</a></li>
                                <li><a href="#">Pittsburgh</a></li>
                                <li><a href="#">Portland</a></li>
                                <li><a href="#">Providence</a></li>
                                <li><a href="#">Reno & Tahoe</a></li>
                                <li><a href="#">San Diego</a></li>
                                <li><a href="#">San Francisco</a></li>
                                <li><a href="#">San Jose</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">Seattle</a></li>
                                <li><a href="#">St. Louis</a></li>
                                <li><a href="#">Transsexual </a></li>
                                <li><a href="#">Tampa & Orlando</a></li>
                                <li><a href="#">Utah</a></li>
                                <li><a href="#">United Kingdom</a></li>
                                <li><a href="#">Virginia</a></li>
                                <li><a href="#">Washington DC</a></li>
                                <li><a href="#">Wisconsin</a></li>
                                <li><a href="#">Amsterdam</a></li>
                                <li><a href="#">Den Haag</a></li>
                                <li><a href="#">Eindhoven</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">Rotterdam</a></li>
                                <li><a href="#">Tilburg</a></li>
                                <li><a href="#">Utrecht</a></li>
                                <li><a href="#">Basel</a></li>
                                <li><a href="#">Bern</a></li>
                                <li><a href="#">Geneva</a></li>
                                <li><a href="#">Zurich</a></li>
                                <li><a href="#">Berlin</a></li>
                                <li><a href="#">Bremen</a></li>
                                <li><a href="#">Cologne</a></li>
                                <li><a href="#">Dusseldorf</a></li>
                                <li><a href="#">Winnipeg</a></li>
                            </ul>
                        </div>
                        <div class="town_escort">
                            <ul>
                                <li><a href="#">Essen</a></li>
                                <li><a href="#">Frankfurt</a></li>
                                <li><a href="#">Hamburg</a></li>
                                <li><a href="#">Hanover</a></li>
                                <li><a href="#">Munich</a></li>
                                <li><a href="#">Nuremberg</a></li>
                                <li><a href="#">Stuttgart</a></li>
                                <li><a href="#">Calgary</a></li>
                                <li><a href="#">Edmonton</a></li>
                                <li><a href="#">Montreal</a></li>
                                <li><a href="#">Toronto</a></li>

                            </ul>
                        </div>-->
        </div>
        <div class="other_gat">
            <p>We have voluntarily registered with the following parental control programs to keep your children safe from adult materials</p>
            <p>[Net Nanny] [Cyber Patrol] [Cyber Sitter] [Safe Surf] </p>
        </div>
<!--        <iframe width='960px' id="myIframe" src="http://stacksclassifieds.com/featured_ads"></iframe>-->
        <!--        <div class="statclass">
                    <a href=""><img src="<?php echo base_url(); ?>assets/images/classifids_add.jpg" alt="" /></a>
                </div>-->
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