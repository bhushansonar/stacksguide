<div class="country_bx">
    <h2 class="calcat_tit"> Escorts Categories</h2>
    <div class="catul">

        <?php
       // echo $cat_id;exit;
        foreach ($escort as $getAllEscort) {
            $view_images = explode(",", $getAllEscort['images']);
            $first_value = current($view_images);
            ?>
            <ul> 
                <li>
                    <a href="<?php echo site_url() ?>escorts/<?php echo $city_name ?>/<?php echo $cat_id; ?>/<?php echo $getAllEscort['escort_id'] ?>"> <img width="72" height="72" src="<?php echo base_url(); ?>uploads/images/<?php echo $first_value; ?>" /></a>
                    <span><a href="<?php echo site_url() ?>escorts/<?php echo $city_name ?>/<?php echo $cat_id; ?>/<?php echo $getAllEscort['escort_id'] ?>"> <?php echo $getAllEscort['model_name']; ?></a></span>
                </li>
            </ul>
        <?php } ?>
    </div>
</div>