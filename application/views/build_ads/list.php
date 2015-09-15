<style>
    .main_ac{ margin: 5% 0 0 0; background:none repeat scroll 0 0 #010c17;  font-family: Roboto-light;}   
</style>
<section>
    <?php
    echo validation_errors();
    if ($this->session->flashdata('flash_message')) {
        echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
        echo '<a class="close" data-dismiss="alert">&#215;</a>';
        echo $this->session->flashdata("flash_message");
        echo '</div>';
    }
    ?>
    <div class="main_part">
        <div style="display: inline-block;">
            <a href="<?php echo base_url() ?>stacksguide_ads/add" class="bt_rg add_sub ">Building Ads</a>
        </div>
        <div  class="main_ac">

            <table style="width: 100%">
                <thead>
                <th style="text-align: left; font-weight: normal;">Actions</th>
                <th style="text-align: left; font-weight: normal;">Services</th>
                <th style="text-align: left; font-weight: normal;">Details</th>
                <th style="text-align: left; font-weight: normal;">List Price</th>
                </thead>

                <tbody>
                    <?php
                    foreach ($page_content as $advertisement) {
                        ?>
                        <tr>
                            <td style="vertical-align: middle;">
                                <a style="color: white;" href="<?php echo base_url(); ?>stacksguide_ads/update/<?php echo $advertisement['build_advertisement_id'] ?>">Edit Ad</a>
                                | <a name="" style="color: white;" href="<?php echo base_url(); ?>stacksguide_ads/delete/<?php echo $advertisement['build_advertisement_id'] ?>" class="delete">Delete Ad</a>
                            </td>
                            <td style="vertical-align: middle;">

                                <?php $ads_image = $advertisement['images']; ?>
                                <img width="72" height="72" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo reset(explode(',', $ads_image)); ?>" />
                                <?php echo reset(explode(',', $ads_image)); ?>
                            </td>
                            <td style="vertical-align: middle; font-weight: normal;">
                                <?php echo $advertisement['advertisement'] ?>
                            </td>
                            <td style="vertical-align: middle;">
                                $<?php echo $advertisement['visiting_values'] ?>.00
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>