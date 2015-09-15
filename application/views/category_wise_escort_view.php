<div class="part_main">
    <section>
        <div class="main_part">
            <article class="main_left" style="width: 100%">
                <h1 class="sttit">Female Escort In <?php echo $name; ?></h1>
                <h3 class="worldtit"></h3>
                <hr class="sg_border" />

                <div class="main_box">
                    <?php
                    foreach ($escort_detail as $row_escort) {
                        $ads_image = $row_escort['images'];
                        ?>
                        <div class="gbox">
                            <div class="gpic"><a href="<?php echo base_url(); ?>vip_details/show_vip_details/<?php echo $row_escort['build_advertisement_id'] ?>">
                                    <img class="vip_img" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo reset(explode(',', $ads_image)); ?>" alt="" /></a></div>
                            <div class="ginfo">
                                <p>
                                    <a href="<?php echo base_url(); ?>vip_details/show_vip_details/<?php echo $row_escort['build_advertisement_id'] ?>">
                                        <?php echo $row_escort['advertisement'] ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </article>

            <hr class="black_border" />
        </div>

    </section>
</div>
</div>
</div>