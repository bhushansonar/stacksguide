
<div class="part_main">
    <section>
        <div class="main_part">
            <div class="wel_main">

                <h1 class="welpage_tit">Welcome to Stack Guide</h1>
                <div class="welpage_left"> 
                    <p><?php echo ucfirst($city); ?> Escorts,<?php echo ucfirst($city); ?> Shemale Escorts,and <?php echo ucfirst($city); ?> Escort Agencies</p>
                    <p>
                        The Eros Guide to Eros <?php echo ucfirst($city); ?> escort, shemale escort escort agency listings - <?php echo ucfirst($city); ?> BDSM, shemale escorts, escort agencies and more. The Eros Guide to <?php echo ucfirst($city); ?> escorts and <?php echo ucfirst($city); ?> BDSM presents the largest listings of female and shemale escorts in <?php echo ucfirst($city); ?> - including photos and contact information for <?php echo ucfirst($city); ?> escorts, escort agencies, BDSM and shemale escorts in <?php echo ucfirst($city); ?>!
                    </p>

                </div>
                <div class="prem_box">
                    <h1 class="preent_tit">Premier Entertainers</h1>

                    <?php
                    $ci = & get_instance();
                    $ci->load->model('home_model');
                    //echo "<pre>";print_r($escort);exit;
                    $escort = $ci->escorts_model->get_escorts_by_city($city, $cat_id);
                    foreach ($escort as $key => $getAllEscort) {
                        $view_images = explode(",", $getAllEscort['images']);
                        $first_value = current($view_images);
                        ?>
                        <div class="prepic_bx">
                            <figure class="prepc">
                            <!--<a href="#"><img src="<?php echo base_url(); ?>assets/images/preent1.jpg" alt=""></a>-->

                                <a href="<?php echo site_url() ?>escorts/<?php echo $city ?>/<?php echo $cat_id;?>/<?php echo $getAllEscort['escort_id'] ?>">
                                    <img width="72" height="72" src="<?php echo base_url(); ?>uploads/images/<?php echo $first_value; ?>" />
                                </a>

                            </figure>

                            <div class="prepc_name"><a href="<?php echo site_url() ?>escorts/<?php echo $city ?>/<?php echo $cat_id;?>/<?php echo $getAllEscort['escort_id'] ?>"><?php echo $getAllEscort['model_name'] ?></a></div>
                        </div>
                    <?php } ?>


                </div>
                <h2 class="view_tit"><a href="<?php echo site_url() ?>escorts/get_escorts/<?php echo $country ?>/<?php echo $city ?>/<?php echo $cat_id;?>">View all Entertainers</a></h2>
            </div> 
            <div class="affilate_main">
                <h1 class="stacsguide_tit font-nor">New Posts</h1>
                <hr class="sg_border">
                <div class="newpost_main">


                    <h4 class="add_gictit"><a href="#">Escort, Fetish and Fantasy - New Ad </a></h4>
                    <p class="featurd_date">We are a very sexy and wildly open COUPLE up for anything! Whether you're male, female, straight, another couple, bi or just curious we are ready for you.</p>
                    <p class="post_add"> - Posted by Alyina and Peter on Jul 20, 2014 </p>

                </div>
                <hr class="black_border">
                <div class="newpost_main">


                    <h4 class="add_gictit"><a href="#">Escort, Fetish and Fantasy - New Ad </a></h4>
                    <p class="featurd_date">We are a very sexy and wildly open COUPLE up for anything! Whether you're male, female, straight, another couple, bi or just curious we are ready for you.</p>
                    <p class="post_add"> - Posted by Alyina and Peter on Jul 20, 2014 </p>

                </div>
                <hr class="black_border">
                <div class="newpost_main">


                    <h4 class="add_gictit"><a href="#">Escort, Fetish and Fantasy - New Ad </a></h4>
                    <p class="featurd_date">We are a very sexy and wildly open COUPLE up for anything! Whether you're male, female, straight, another couple, bi or just curious we are ready for you.</p>
                    <p class="post_add"> - Posted by Alyina and Peter on Jul 20, 2014 </p>

                </div>
                <hr class="black_border">
                <div class="newpost_main">


                    <h4 class="add_gictit"><a href="#">Escort, Fetish and Fantasy - New Ad </a></h4>
                    <p class="featurd_date">We are a very sexy and wildly open COUPLE up for anything! Whether you're male, female, straight, another couple, bi or just curious we are ready for you.</p>
                    <p class="post_add"> - Posted by Alyina and Peter on Jul 20, 2014 </p>

                </div>
                <hr class="black_border">
                <div class="newpost_main">


                    <h4 class="add_gictit"><a href="#">Escort, Fetish and Fantasy - New Ad </a></h4>
                    <p class="featurd_date">We are a very sexy and wildly open COUPLE up for anything! Whether you're male, female, straight, another couple, bi or just curious we are ready for you.</p>
                    <p class="post_add"> - Posted by Alyina and Peter on Jul 20, 2014 </p>

                </div>
                <hr class="black_border">
                <div class="newpost_main">


                    <h4 class="add_gictit"><a href="#">Escort, Fetish and Fantasy - New Ad </a></h4>
                    <p class="featurd_date">We are a very sexy and wildly open COUPLE up for anything! Whether you're male, female, straight, another couple, bi or just curious we are ready for you.</p>
                    <p class="post_add"> - Posted by Alyina and Peter on Jul 20, 2014 </p>

                </div>
                <hr class="black_border">


            </div> 

        </div>
        <div class="city_escort">
            <h1 class="font-nor"> City Escort</h1>
            <div class="town_escort">
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
            </div>
        </div>
        <div class="other_gat">
            <p>We have voluntarily registered with the following parental control programs to keep your children safe from adult materials</p>
            <p>[Net Nanny] [Cyber Patrol] [Cyber Sitter] [Safe Surf] </p>
        </div>
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