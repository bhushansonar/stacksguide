<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style>
    .my_acc{
        cursor: pointer;
        font-size: 14px;
        font-weight: normal;
        margin-top: 5px;
        padding: 6px 6px 0 11px;
        color: #ffffff;
        list-style: outside none none;
        margin: 0 auto 40px;
    }
    h3 a{
        color: #ffffff;
    }
</style>
<article class="main_right"> 
    <div class="map_bx"><p>Stacks Map</p></div>
    <div class="country_bx">

<?php
$ci = & get_instance();
$ci->load->model('home_model');
?>
                <div class="accordian">
                    <div>
                        <ul>
                    <ul class="acc" id="acc">
<?php
$break = 1;
for ($i = 0; $i < count($country_opt); $i++) {
    ?> 
                                        <li>
                <div class="accordian my_acc" >
                    <h3>
                        <a href="#">
    <?php echo $country_opt[$i]['country_name']; ?>
                        </a>
                    </h3>

                                                  <div class="acc-section">
                                                <div class="acc-content">
    <?php
    $get_state = $ci->home_model->getState_by_field_value("country_id", $country_opt[$i]['country_id']);
    $country_name = $country_opt[$i]['country_name'];
    ?>
                    <div class="acc-section acc-content">
                        <ul class="my_acc">
                                                        <ul class='acc' id='nested'>
    <?php
    for ($s = 0; $s < count($get_state); $s++) { // state loop start
        if ($get_state[$s]['state_name'] != "(none)") {
            ?>
                                            <li>
                                                <div class='accordian my_acc'>
                                                    <h3>
                                                        <a href="#">
            <?php echo $get_state[$s]['state_name']; ?>
                                                        </a>
                                                    </h3>
                                                    <div class="acc-section acc-content">
            <?php
            $get_city = $ci->home_model->getCity_by_field_value("state_id", $get_state[$s]['state_id']);
            ?>
                                                        <ul class="my_acc">
            <?php
            for ($c = 0; $c < count($get_city); $c++) {
                $city_name = $get_city[$c]['slug'];
                $get_cat_id = $ci->home_model->get_category_by_field_value($city_name);
                for ($m = 0; $m < count($get_cat_id); $m++) {
                    $category_id = $get_cat_id[$m]['category'];
                    ?>
                                                                            <li>
                                                                                <a href="<?php echo base_url("escorts/get_escorts/$country_name/$city_name/$category_id") ?>">
                                                                                    <h3><?php echo $get_city[$c]['city_name'] ?></h3>
                                                                                </a>
                                                                            </li>
                    <?php
                }
            }//city loop close
            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
            <?php
        }
    }//state loop close
    ?>
                        </ul>
                    </div>
                                                </div>
                </div>
                                        </li>
<?php } ?>
                        </ul>
            </div>
        </div>
    </div>
</article>
<script>
    $("div.accordian").accordion({
        autoHeight: false,
        collapsible: true,
        active: false,
    });
</script>-->