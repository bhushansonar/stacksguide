<link href="<?php echo base_url(); ?>assets/css/accordiance.css" rel="stylesheet" type="text/css">
<style>
    .mtree-demo .mtree {
        background: #EEE;
        margin: 20px auto;
        max-width: 320px;
        border-radius: 3px;
    }

    .mtree-skin-selector {
        text-align: center;
        background: #EEE;
        padding: 10px 0 15px;
    }

    .mtree-skin-selector li {
        display: inline-block;
        float: none;
    }

    .mtree-skin-selector button {
        padding: 5px 10px;
        margin-bottom: 1px;
        background: #BBB;
    }

    .mtree-skin-selector button:hover { background: #999; }

    .mtree-skin-selector button.active {
        background: #999;
        font-weight: bold;
    }

    .mtree-skin-selector button.csl.active { background: #FFC000; }
</style>
<article class="main_right">
    <div class="map_bx"><p>Stacks Map</p></div>
    <div class="country_bx">

        <?php
        $ci = & get_instance();
        $ci->load->model('home_model');
//
        ?>
        <ul class="mtree transit" style="padding: 0">
            <?php for ($i = 0; $i < count($country_opt); $i++) { ?>
                <li>
                    <a href="#">
                        <?php echo $country_opt[$i]['country_name'];
                        ?>
                    </a>
                    <?php
                    $get_state = $ci->home_model->getState_by_field_value("country_id", $country_opt[$i]['country_id']);
                    $country_name = $country_opt[$i]['country_name'];
                    ?>
                    <ul style="padding-left: 10px;">
                        <?php
                        for ($s = 0; $s < count($get_state); $s++) { // state loop start
                            if ($get_state[$s]['state_name'] != "(none)") {
                                ?>
                                <li>
                                    <a href="#"><?php echo $get_state[$s]['state_name'] ?></a>
                                    <?php $get_city = $ci->home_model->getCity_by_field_value("state_id", $get_state[$s]['state_id']); ?>
                                    <ul style="padding-left: 10px;">
                                        <?php
                                        for ($c = 0; $c < count($get_city); $c++) {
                                            $city_name = $get_city[$c]['slug'];
                                            $city_id = $get_city[$c]['city_id'];
//                                            $get_cat_id = $ci->home_model->get_category_by_field_value($city_name);
//                                            for ($m = 0; $m < count($get_cat_id); $m++) {
//                                                $category_id = $get_cat_id[$m]['category'];
                                            ?>
                                            <li><a href="<?php echo base_url("escorts/$city_id") ?>"><?php echo $get_city[$c]['city_name'] ?></a></li>
                                            <?php
                                            //}
                                        }//city loop close
                                        ?>
                                    </ul>

                                </li>
                                <?php
                            }
                        }//state loop close
                        ?>
                    </ul>

                </li>
            <?php } ?>
        </ul>
        <script src="<?php echo base_url(); ?>assets/js/jquery.1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.velocity.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/accordiance.js"></script>
    </div>
</article>