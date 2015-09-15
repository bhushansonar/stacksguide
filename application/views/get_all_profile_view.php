<style type="text/css">

    .aboutcl{ color:#fff; font-family: Roboto-light; font-weight: normal; font-size: 15px;}
    .aboutpad{ margin:0.5% 0 0.5% 0;}
    .inabout{ width: 40%;}

    .adds_in {
        background-color: #fff;
        border: medium none;
        border-radius: 5px;
        color: #000;
        display: inline-block;
        height: 41px;
        padding: 0 0 0 2%;
        width: 58%;
    }
    .adds_sel {
        background-color: #fff;
        border: medium none;
        border-radius: 5px;
        color: #000;
        display: inline-block;
        height: 37px;
        padding: 0 0 0 2%;
        width: 32%;
    }
    .add_sub{ margin: 0 0 0 3%;}

</style>

<?php echo validation_errors(); ?>
<section>
    <div class="main_part">
        <?php if (!empty($vip_escorts)) { ?>
            <article class="main_left" style="width: 100%; margin-top: 5%;">
                <h1 class="sttit aboutcl">Escorts</h1>
                <h3 class="worldtit aboutcl"><a href="<?php echo base_url('find_profile/see_profile'); ?>">Find Profiles</a></h3>
                <hr class="sg_border">

                <?php
                //echo "<pre>"; print_r($vip_escorts); die;
                foreach ($vip_escorts as $vip_escorts_data) {
                    //echo "<pre>"; print_r($vip_escorts_data); die;
                    $img = explode(',', $vip_escorts_data['images']);
                    $build_ad_id = $vip_escorts_data['build_advertisement_id'];
                    ?>
                    <div style="width:100%;">
                        <div style="width:100px; float:left; margin:0 10px;">
                            <a href="<?php echo base_url('vip_details/show_vip_details/' . $build_ad_id) ?>"><img height="115" width="100" src="<?php echo base_url() ?>uploads/advertisement/thumb/<?php echo $img[0]; ?>" alt="" /></a>
                            <?php echo $vip_escorts_data['advertisement']; ?>,<br>
                            <?php echo $city_name; ?>
                        </div>

                    </div>
                <?php }
                ?>

            </article>
        <?php } else { ?>
            <article class="main_left" style="width: 100%; margin-top: 5%;">
                <h1 class="sttit aboutcl">Escorts</h1>
                <h3 class="worldtit aboutcl"><a href="<?php echo base_url('find_profile/see_profile'); ?>">Find Profiles</a></h3>
                <hr class="sg_border">
            </article>
        <?php } ?>

    </div>
</div>

</section>