<?php
$ci = & get_instance();
$ci->load->model('home_model');
$ci->load->model('common_model');
$ci->load->model('category_model');
$ci->load->model('stackguide_ads_model');
$subcategorys = $ci->category_model->get_front_sub_category();
$where = " AND state_id={$state}";
$name = $ci->common_model->getFieldData('state', 'state_name', $where);
//$count_escort1 = $ci->home_model->CountEscort($state, $cat_id);
?>

<div class="part_main">
    <section>
        <div class="main_part">
            <article class="main_left" style="width: 100%">
                <h1 class="sttit">Female Escorts In <?php echo $name; ?> </h1>
                <hr class="sg_border"/>
                <div class="main_box">
                    <div class="escortcat_menu">
                        <?php
                        foreach ($subcategorys as $key => $subcat) {
                            $count = $ci->stackguide_ads_model->get_count_advertisement_by_state($state, $subcat['category_id']);
                            ?>
                            <div><a href="<?php echo site_url() ?>home/get_escort_details/<?php echo $state ?>/<?php echo $subcat['category_id']; ?>" style="color: #fff;font-size: 14px;line-height: 25px;"><?php echo $subcat['category_name']; ?><span style="color: #fff">(<?php echo $count; ?>)</span></a></div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="affilate_main">
                    <h1 class="stacsguide_tit font-nor">Featured Female Escorts </h1>
                    <hr class="sg_border" />
                    <div class="featurd_main">
                        <?php
                        $escort = $ci->stackguide_ads_model->get_advertisement_by_city('2');
                        foreach ($escort as $key => $getAllEscort) {
                            $view_images = explode(",", $getAllEscort['images']);
                            $first_value = current($view_images);
                            ?>
                            <figure class="featurd_gic">
                                <a href="<?php echo site_url() ?>home/escort_detail/<?php echo $getAllEscort['build_advertisement_id']; ?>">
                                    <img width="100" height="100" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $first_value; ?>" />
                                </a>
                            </figure>
                            <div class="featurd_cantain">
                                <h4 class="featurd_gictit">
                                    <a href="<?php echo site_url() ?>home/escort_detail/<?php echo $getAllEscort['build_advertisement_id']; ?>"><?php echo $getAllEscort['advertisement']; ?>
                                    </a> - Escort
                                </h4>
                                <?php //echo $escort[$key]['date'];         ?>
                                </p>
                                <p>Seduction Waiting To Be Experienced.. Visiting <?php echo ucfirst($state) ?> **Prebooking Now** </p>
                            </div>
                        <?php } ?>
                    </div>
                    <hr class="sg_border"/>
                </div>
            </article>
            <hr class="black_border"/>
        </div>
        <div class="statclass">
            <a href="#"><img alt="" src="<?php echo base_url(); ?>assets/images/classifids_add.jpg"></a>
        </div>
        <div class="affilate_main">
            <h1 class="stacsguide_tit font-nor">Featured Stacks Affiliates & Sponsors</h1>
            <hr class="sg_border"/>
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