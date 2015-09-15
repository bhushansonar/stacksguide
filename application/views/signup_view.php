<style>
    tr {
        border: 1px solid #bfbfe7;
    }
    th {
        border-top: 2px solid #bfbfe7;
    }
    td{
        border: 1px solid #bfbfe7;
    }
    .bt_rg{
        cursor: pointer;
    }
</style>
<?php
echo validation_errors();
//echo $this->session->flashdata('flash_message');
if ($this->session->flashdata('flash_message')) {
    /* if($this->session->flashdata('flash_message') == 'add')
      { */
    echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
    echo '<a class="close" data-dismiss="alert">&#215;</a>';
    echo $this->session->flashdata("flash_message");
    echo '</div>';
}
?>
<div class="part_main">
    <section>
        <div class="main_part">
            <article class="alc_left">
                <?php if (!$this->session->userdata('is_logged_in')) { ?>
                    <form method="post" name="signup" class="form_home" action="<?php echo site_url('signup/create_member') ?>">
                        <div class="alc_tital">
                            <h1 class="create_tit" style="margin-top: 0;">Create a Stack Account</h1>
                            <span class="alcar"><img src="<?php echo base_url(); ?>assets/images/alc_arrow.png" alt="" /></span>
                            <h2 class="pay2tit">Payment Information</h2>

                        </div>
                        <hr class="sg_border" />
                        <fieldset>
                            <div class="alc_left_line">
                                <label class="create_usname">Username:</label>
                                <input class="crete_in" name="username" type="text" placeholder="">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Email Address:</label>
                                <input type="text"  class="crete_in" value="" id="email" name="email">
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Password:</label>
                                <input type="password" class="crete_in"  value="" id="loginPassword" name="password">
                            </div>
                            <div class="alc_left_line">

                                <table cellspacing="1" cellpadding="1" style="margin-left: 11%;" border="0">
                                    <tbody>
                                        <tr>
                                            <td style="border: none;"colspan="2">Select a background color for your profile :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table border="1">
                                                    <tbody>
                                                        <tr>
                                                            <td style="background-color: #2b3d61;">&nbsp;</td>
                                                            <td style="background-color: #a49c8d; ">&nbsp;</td>
                                                            <td style="background-color: #4a555a; ">&nbsp;</td>
                                                            <td style="background-color: #892816; ">&nbsp;</td>
                                                            <td style="background-color: #497070; ">&nbsp;</td>
                                                            <td style="background-color: #000000; ">&nbsp;</td>
                                                            <td style="background-color: #885252; ">&nbsp;</td>
                                                            <td style="background-color: #a49c8d; ">&nbsp;</td>
                                                            <td style="background-color: #3b193b; ">&nbsp;</td>
                                                            <td style="background-color: #134b62; ">&nbsp;</td>
                                                            <td style="background-color: #4f4f4f; ">&nbsp;</td>
                                                            <th style="background-color: #000000; ">Other</th>
                                                            <th style="background-color: #000000; ">RGB color</th>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <input type="Radio" value="#2b3d61" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#a49c8d" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#4a555a" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#892816" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#497070" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#000000" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#885252" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#a49c8d" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#3b193b" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#134b62" name="color">
                                                            </td>
                                                            <td>
                                                                <input type="Radio" value="#4f4f4f" name="color">
                                                            </td>
                                                            <th>
                                                                <input type="Radio" value="other" name="color">
                                                                <script>
                                                                    signup.color[2].checked = true
                                                                </script>
                                                            </th>
                                                            <td>#<input type="text" onfocus="signup.color[11].checked = true" value="" name="color2" size="4" maxlength="6"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                            <div class="alc_left_line">
                                <label class="create_usname">Membership:</label>
                                <div class="alc_left_rg2">
                                    <?php
                                    $ci = & get_instance();
                                    $ci->load->model('membership_price_model');

                                    $membership = $ci->membership_price_model->get_membership_price_front();
                                    ?>

                                    <?php
//                                    echo "<pre>";
//                                    print_r($membership);
//                                    exit;
                                    foreach ($membership as $key => $membership_price) {
                                        if ($membership_price['membership_duration'] == "1") {
                                            $month = " month";
                                        } else {
                                            $month = " months";
                                        }
                                        ?>
                                        <p class="alc_left_rg">
                                            <input type="radio"  name="membership" value="<?php echo $membership_price['price']; ?>"/>
                                            My Stacks Membership<br />
                                            <?php echo "$" . $membership_price['price']; ?>  for (<?php echo $membership_price['membership_duration'] . $month ?>)
                                        </p>

                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="alc_left_line">

                                <input type="checkbox" name="term_condition"/>
                                I have read and agreed to the <span style="color:#f39c12;">My Stacks Terms and Conditions.</span>
                            </div>
                            <div class="alc_left_line continue_button">

                                <input type="submit" name="submit" class="bt_rg " value="Continue" />
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>
            </article>
            <article class="alc_right">
                <h1 class="sampaltit" style="margin-top: 0">A sample of what you'll be able to do!</h1>
                <div class="findul">
                    <ul>
                        <li>Find escorts by zip code</li>
                        <li>Advanced custom search</li>
                        <li>Save & tag your favorites</li>
                        <li>Get alerts when an entertainer updates their info</li>
                        <li>Check out all Stack Guide locations at once</li>
                        <li>Save your favorite searches</li>
                        <li>View results on Google Maps</li>
                        <li>Receive email and SMS alerts</li>
                    </ul>
                    <h3 class="limittit">Limited Time Offer!</h3>
                    <p>FREE Basic Membership (no credit card required) OR Pay a 30-day intro rate of $2.98 USD when you sign-up for our full membership options!</p>
                    <div class="pay_ic">
                        <a href="#"><img class="pay_im" src="<?php echo base_url(); ?>assets/images/mastercard_ic.png" alt="" /></a>
                        <a href="#"><img class="pay_im" src="<?php echo base_url(); ?>assets/images/visa_ic.png" alt="" /></a>
                        <a href="#"><img class="pay_im" src="<?php echo base_url(); ?>assets/images/american_ic.png" alt="" /></a>
                        <a href="#"><img class="pay_im" src="<?php echo base_url(); ?>assets/images/discover.png" alt="" /></a>
                        <a href="#"><img class="pay_im" src="<?php echo base_url(); ?>assets/images/paypal_ic.png" alt="" /></a>
                    </div>
                    <p> MEG 8883847811 will appear on your card holder statement. </p>
                </div>
            </article>
            <hr class="black_border" />
        </div>
        <div class="welstat">
            <h1 class="font-nor">Secure Policy</h1>
            <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>
            <p>LoremIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries....</p>

        </div>
        <hr class="black_border" />



    </section>
</div>
</div>