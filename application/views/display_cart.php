<style>
    .content_view {
        background: linear-gradient(to bottom, rgba(2, 20, 42, 1) 0%, rgba(1, 38, 81, 0) 40%, rgba(0, 64, 139, 0) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-radius: 5px;
        display: inline-block;
        padding: 23px 0 0;
        width: 100%;
    }
    #goto-checkout {
        float: right;
        padding-top: 9px;
        position: relative;
        text-align: right;
    }
    .btn {
        -moz-user-select: none;
        border: 1px solid transparent;
        cursor: pointer;
        display: inline-block;
        font-weight: normal;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        white-space: nowrap;
        border-radius: 5px;
        font-size: 15px;
        line-height: 1.33;
        padding: 5px 20px;
        color: #333333;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        background: linear-gradient(to bottom, #fded46, #f2cb30);
    }
</style>
<section>
    <div class="main_part">
        <div class="content_view">


            <?php echo form_open('stacksguide_ads/payment_send'); ?>

            <table cellpadding="6" cellspacing="1" style="width:100%;clear:both">

                <tr>
                    <th>Action</th>
                    <th>Services</th>
                    <th>Details</th>
                    <th>Renew Options</th>
                    <th>Item Price</th>
                    <th>Sub-Total</th>
                </tr>

                <?php
                $i = 1;
                $user_id = $this->session->userdata('user_id');
                if (isset($user_id)) {
                    $uid = $user_id;
                } else {
                    $uid = "0";
                }
                ?>
                <?php
                foreach ($checkout_content as $items):
                    ?>
                    <input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>"/>
                    <input type="hidden" name="advertisement_id" value="<?php echo $items['id']; ?>"/>
                    <input type="hidden" name="user_id" value="<?php echo $uid; ?>"/>

                    <tr>
                        <td><a name="" style="color: white;" href="<?php echo base_url(); ?>stacksguide_ads/remove_item_from_cart/<?php echo $items['rowid']; ?>/<?php echo $items['id']; ?>" class="delete">Delete Ad</a></td>
                        <td style="text-align: center">
                            <img width="100" src="<?php echo base_url(); ?>uploads/advertisement/thumb/<?php echo $items['options']['image']; ?>" /><?php echo $items['name']; ?>
                        </td>
                        <td style="text-align: center">
                            <span><?php echo $items['options']['city']; ?></span>
                            <span><?php echo $items['options']['ads_type']; ?></span>
                        </td>
                        <td style="text-align: center">
                            <?php echo $items['options']['finish_ads_days']; ?>
                        </td>
                        <td style="text-align:center"><?php echo $this->cart->format_number($items['price']); ?>
                            <?php //echo form_hidden('price', $items['subtotal']);   ?>

                        </td>
                        <td style="text-align:center">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    </tr>

                    <?php $i++; ?>

                <?php endforeach; ?>

                <tr>
                    <td> </td>
                    <td> </td>
                    <td class="right" style="text-align: center;font-size: 14px;"><strong>Total</strong></td>
                    <td class="right" style="text-align: center;font-size: 14px;" ><strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong>
                        <input type="hidden" name="price" value="<?php echo $this->cart->format_number($this->cart->total()); ?>"/>
                    </td>
                </tr>
            </table>

            <div id="goto-checkout">
                <?php
                $attributes = 'class = btn';
                echo form_submit('', 'Proceed to Checkout', $attributes);
                ?>
            </div>
        </div>
    </div>
</section>
</div>