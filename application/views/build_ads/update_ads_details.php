<style type="text/css">

    ul.tabs {
        /*        margin: 8px 0 0 5px;*/
        padding: 0;
        float: left;
        list-style: none;
        height: 32px;
        border-bottom: 1px solid #043d63;
        border-left: 1px solid #999999;
        border-radius: 5px;
        /*        width: 99%;*/
    }
    .tabs_class{
        padding: 0;
        float: left;
        list-style: none;
        height: 32px;
        border-bottom: 1px solid #043d63;
        border-left: 1px solid #999999;
        border-radius: 5px;
    }
    ul.tabs_class li {
        float: left;
        margin: 0;
        cursor: pointer;
        padding: 0px 21px ;
        height: 31px;
        line-height: 31px;
        border: 1px solid #999999;
        border-left: none;
        font-weight: bold;
        background: #EEEEEE;
        overflow: hidden;
        position: relative;
        color: #333333;
    }
    ul.tabs_class li:hover {
        background: #CCCCCC;
    }
    ul.tabs_class li.active{
        background: #FFFFFF;
        border-bottom: 1px solid #FFFFFF;
    }
    .tab_div{
        border-radius: 5px;
        margin: 2% 0;
        overflow: hidden;
        width: 68%;
    }
    ul.tabs li {
        float: left;
        margin: 0;
        cursor: pointer;
        padding: 0px 21px ;
        height: 31px;
        line-height: 31px;
        border: 1px solid #999999;
        border-left: none;
        font-weight: bold;
        background: #EEEEEE;
        overflow: hidden;
        position: relative;
        color: #333333;
    }
    ul.tabs li:hover {
        background: #CCCCCC;
    }
    ul.tabs li.active{
        background: #FFFFFF;
        border-bottom: 1px solid #FFFFFF;
    }
    .tab_container {

        border-top: none;
        clear: both;
        float: left;
        width: 99%;
        margin: 0 0 0 5px;

        background: linear-gradient(to bottom, rgba(1, 32, 65, 1) 0%, rgba(1, 32, 65, 0.98) 1%, rgba(1, 45, 95, 0) 41%, rgba(0, 64, 139, 0) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    }
    .tab_content {
        padding: 20px;
        font-size: 1.2em;
        display: none;
    }
    #container {
        width: 600px;
        margin: 0 auto;
    }
    #panel,#flip
    {
        padding:5px;
        background-color:#fff;
        border:solid 1px #c3c3c3;
        width: auto;
        border-radius: 5px;
        height: 30px;
    }
    #panel
    {
        padding:30px;
        display:none;
        width: auto;
        height: auto;
    }
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
    .bio{
        font-size: 20px;
    }
    .bio_desc{
        margin: 3% 0 0 0;
    }
    .lbl_dis{
        margin: 1% 0 0 0;
    }
    .lbl_bio{
        margin: 1% 0;
    }
    .messurement_second{
        display: inline-block;
    }
    .messurement_first{
        display: inline-block;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php echo validation_errors(); ?>
<section>
    <div class="main_part">
        <form style="margin: 10px;" id="fileupload" action="<?php echo base_url() ?>stacksguide_ads/update_ads_details" method="POST" enctype="multipart/form-data">
            <article class="main_left" style="width: 77%">
                <h1 class="sttit aboutcl" style="font-size: 25px;">YOUR BIO</h1>

                <hr class="sg_border">
                <?php
//                echo "<pre>";
//                print_r($get_advertisement_detail);
//                exit;
                foreach ($get_advertisement_detail as $key => $get_advertisement_detail) {
                    ?>
                    <div style="margin: 0px 0px 0px 2.5%;">
                        <p class="bio_desc">Your ad bio is an important way to give clients more detailed information about who you are, the services you provide, and booking info.</p>

                        <div class="lbl_bio"> <label for="inputError" class="bio">Bio Text</label></div>
                        <textarea class="tinymce ckeditor" id="editor" name="description"><?php echo $get_advertisement_detail['description'] ?></textarea>

                        <div class="lbl_dis bio">

                            <label>Disclaimer</label>
                        </div>
                        <div>
                            <textarea class="adds_in" cols="80" maxlength="175" name="disclaimer" style="width: 100%; height: 120px;"><?php echo $get_advertisement_detail['disclaimer'] ?></textarea>
                        </div>
                        <div class="affilate_main">
                            <h1 class="stacsguide_tit font-nor aboutcl" style="font-size: 25px;">Your Details & Additional Categories</h1>
                            <hr class="sg_border">
                            <div style="margin: 0px 0px 0px 3%;">
                                <div style="margin: 0 0 3% 0;">
                                    <p class="bio_desc">
                                        This information will appear on your ad to give viewers a quick summary of your physical attributes. Many qualify your ad for additional categories, giving your ad more visibility.
                                    </p>
                                </div>
                                <article class="main_right" style="width: 47%">
                                    <div class="bio">Your Stats</div>
                                    <div style="margin: 1% 0 1% 0">

                                        <label><strong>Hair Color</strong></label>
                                    </div>
                                    <div>
                                        <?php
                                        //$hair_opt = array();
                                        $attribute = 'id="" class="adds_sel" style="width:52%"';
                                        echo form_dropdown('hair', $hair_opt, $get_advertisement_detail['hair'], $attribute);
                                        ?>
                                    </div>
                                    <div style="margin: 1% 0 1% 0">

                                        <label><strong>Eye Color</strong></label>
                                    </div>
                                    <div>
                                        <?php
                                        $attribute = 'id="" class="adds_sel" style="width:52%"';
                                        echo form_dropdown('eye', $eyes_opt, $get_advertisement_detail['eye'], $attribute);
                                        ?>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">

                                        <label><strong>Ethnicity</strong></label>
                                    </div>
                                    <div style="margin: 1% 0 1% 0">

                                        <label>Please select your ethnicity.</label>
                                    </div>
                                    <div style="margin: 1% 0 1% 0" >
                                        <span id="m_ethnicity">
                                            <?php
                                            $ethnicity_to = explode(",", $get_advertisement_detail['ethnicity_to']);

                                            if (in_array('Asian', $ethnicity_to)) {
                                                $asian = 'checked="checked"';
                                            } else {
                                                $asian = '';
                                            }
                                            if (in_array('Black/Ebony', $ethnicity_to)) {
                                                $black_ebony = 'checked="checked"';
                                            } else {
                                                $black_ebony = '';
                                            }
                                            if (in_array('Caucasian', $ethnicity_to)) {
                                                $caucasian = 'checked="checked"';
                                            } else {
                                                $caucasian = '';
                                            }
                                            if (in_array('East Indian', $ethnicity_to)) {
                                                $east_indian = 'checked="checked"';
                                            } else {
                                                $east_indian = '';
                                            }
                                            if (in_array('Exotic', $ethnicity_to)) {
                                                $exotic = 'checked="checked"';
                                            } else {
                                                $exotic = '';
                                            }
                                            if (in_array('Latino/Hispanic', $ethnicity_to)) {
                                                $latino_hispanic = 'checked="checked"';
                                            } else {
                                                $latino_hispanic = '';
                                            }
                                            if (in_array('Middle Eastern', $ethnicity_to)) {
                                                $middle_eastern = 'checked="checked"';
                                            } else {
                                                $middle_eastern = '';
                                            }
                                            if (in_array('Native American', $ethnicity_to)) {
                                                $native_american = 'checked="checked"';
                                            } else {
                                                $native_american = '';
                                            }
                                            if (in_array('Pacific Islander', $ethnicity_to)) {
                                                $pacific_islander = 'checked="checked"';
                                            } else {
                                                $pacific_islander = '';
                                            }
                                            ?>
                                            <input type="checkbox"  name="ethnicity[]" <?php echo $asian; ?>  value="Asian"> Asian
                                            <br>
                                            <input type="checkbox"  name="ethnicity[]" <?php echo $black_ebony; ?> value="Black/Ebony"> Black/Ebony
                                            <br>
                                            <input type="checkbox"  name="ethnicity[]" <?php echo $caucasian; ?> value="Caucasian"> Caucasian
                                            <br>
                                            <input type="checkbox"   name="ethnicity[]"  <?php echo $east_indian; ?> value="East Indian"> East Indian
                                            <br>
                                            <input type="checkbox" name="ethnicity[]"   <?php echo $exotic; ?> value="Exotic"> Exotic
                                            <br>
                                            <input type="checkbox"   name="ethnicity[]"   <?php echo $latino_hispanic; ?> value="Latino/Hispanic"> Latino/Hispanic
                                            <br>
                                            <input type="checkbox"   name="ethnicity[]"  <?php echo $middle_eastern; ?> value="Middle Eastern"> Middle Eastern
                                            <br>
                                            <input type="checkbox"   name="ethnicity[]"  <?php echo $native_american; ?>  value="Native American"> Native American
                                            <br>
                                            <input type="checkbox"   name="ethnicity[]"  <?php echo $pacific_islander; ?> value="Pacific Islander"> Pacific Islander
                                            <br>
                                        </span>
                                    </div>
                                </article>
                                <article class="main_right" style="width: 48%;">
                                    <div class="bio">Measurements</div>
                                    <div class="tab_div">
                                        <ul class="tabs">
                                            <li rel="tab1" class="active">US ft/lbs</li>
                                            <li rel="tab2" class="">Metric m/kg</li>

                                        </ul>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">
                                        <div style="display: inline-block; margin: 0 8px;"><label>Height:</label></div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('height_ft', $common_opt, $get_advertisement_detail['height_ft'], $attribute);
                                            ?>
                                        </div>
                                        <div style="display: inline-block;" class="messurement_first">
                                            <div><label>ft</label></div>
                                        </div>
                                        <div style="display: none" class="messurement_second">
                                            <div style="display: inline-block; margin: 0 4%;"><label>m</label></div>
                                        </div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('height_in', $common_opt, $get_advertisement_detail['height_in'], $attribute);
                                            ?>
                                        </div>
                                        <div class="messurement_first" style="display: inline-block;  margin: 0 2%;">
                                            <div>
                                                <label>in</label>
                                            </div>
                                        </div>
                                        <div style="display: none" class="messurement_second">
                                            <div style="display: inline-block;  margin: 0 2%;">
                                                <label>cm</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">
                                        <div style="display: inline-block;margin: 0 2%;"><label>Weight:</label></div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('weight', $common_opt, $get_advertisement_detail['weight'], $attribute);
                                            ?>
                                        </div>
                                        <div class="messurement_first">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>lbs</label></div>
                                        </div>
                                        <div style="display: none;"class="messurement_second">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>kg</label></div>
                                        </div>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">
                                        <div style="display: inline-block;margin: 0 14px;"><label>Bust:</label></div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('bust', $common_opt, $get_advertisement_detail['bust'], $attribute);
                                            ?>
                                        </div>
                                        <div class="messurement_first">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>in</label></div>
                                        </div>
                                        <div style="display: none" class="messurement_second">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>cm</label></div>
                                        </div>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">
                                        <div style="display: inline-block; margin: 0 16px;"><label>Cup:</label></div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('cup', $cup_opt, $get_advertisement_detail['cup'], $attribute);
                                            ?>
                                        </div>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">
                                        <div style="display: inline-block;margin: 0 11px;"><label>Waist:</label></div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('waist', $common_opt, $get_advertisement_detail['waist'], $attribute);
                                            ?>
                                        </div>
                                        <div class="messurement_first">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>in</label></div>
                                        </div>
                                        <div style="display: none;"class="messurement_second">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>cm</label></div>
                                        </div>
                                    </div>
                                    <div style="margin: 5% 0 5% 0">
                                        <div style="display: inline-block;margin: 0 14px;"><label>Hips:</label></div>
                                        <div style="display:inline-block">
                                            <?php
                                            $attribute = 'id="" class="adds_sel" style="width:92px"';
                                            echo form_dropdown('hips', $common_opt, $get_advertisement_detail['hips'], $attribute);
                                            ?>
                                        </div>
                                        <div class="messurement_first">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>in</label></div>
                                        </div>
                                        <div style="display: none" class="messurement_second">
                                            <div style="display: inline-block;  margin: 0 2%;"><label>cm</label></div>
                                        </div>
                                    </div>
                                </article>
                                <div style="margin: 3% 0 3% 0;">
                                    <div style="display: inline-block; vertical-align: top; margin: 21px 0 0 0">
                                        <label><strong>Affiliation?</strong></label>
                                    </div>
                                    <div style="display: inline-block;" class="tab_div">
                                        <ul class="tabs_class">
                                            <li rel="tab3" class="active">Agency</li>
                                            <li rel="tab4" class="">Independent</li>

                                        </ul>
                                    </div>
                                </div>
                                <div style="margin: 3% 0 3% 0">

                                    <label><strong>Available to?</strong></label>
                                </div>
                                <span>
                                    <?php
                                    $available_to = explode(",", $get_advertisement_detail['available_to']);
                                    if (in_array('Men', $available_to)) {
                                        $men = 'checked="checked"';
                                    } else {
                                        $men = '';
                                    }
                                    if (in_array('Women', $available_to)) {
                                        $women = 'checked="checked"';
                                    } else {
                                        $women = '';
                                    }
                                    if (in_array('Couples', $available_to)) {
                                        $couples = 'checked="checked"';
                                    } else {
                                        $couples = '';
                                    }
                                    if (in_array('Groups', $available_to)) {
                                        $groups = 'checked="checked"';
                                    } else {
                                        $groups = '';
                                    }
                                    if (in_array('TV', $available_to)) {
                                        $tv = 'checked="checked"';
                                    } else {
                                        $tv = '';
                                    }
                                    ?>
                                    <input type="checkbox"  name="available[]"  <?php echo $men; ?>  value="Men"> Men
                                    <br>
                                    <input type="checkbox"  name="available[]" <?php echo $women; ?> value="Women"> Women
                                    <br>
                                    <input type="checkbox"  name="available[]"  <?php echo $couples; ?> value="Couples"> Couples
                                    <br>
                                    <input type="checkbox"  name="available[]"  <?php echo $groups; ?> value="Groups"> Groups
                                    <br>
                                    <input type="checkbox"  name="available[]"  <?php echo $tv; ?>  value="TV"> TV/TS
                                    <br>
                                </span>
                                <div style="margin: 3% 0 3% 0">

                                    <label><strong>Specialty Categories</strong></label>
                                    <p style="margin: 1% 0 1% 0">Select any specialty categories that apply to you or the service you provide. Adding specialty categories increases exposure by targeting viewers searching for providers with specific attributes.</p>
                                    <?php
                                    $ci = & get_instance();
                                    $ci->load->model('category_model');
                                    $subcategory = $ci->category_model->get_front_sub_category();
                                    ?>
                                    <article class="main_right" style="width: 47%">
                                        <div style="margin: 1% 0 1% 0">
                                            <?php
                                            $cart_data_arr = explode(",", $get_cart_data[0]['category_name']);
//                                            if (in_array('All Natural', $cart_data_arr)) {
//                                                $all_natural = 'checked="checked"';
//                                            } else {
//                                                $all_natural = '';
//                                            }
//                                            if (in_array('Alternative', $cart_data_arr)) {
//                                                $alternative = 'checked="checked"';
//                                            } else {
//                                                $alternative = '';
//                                            }
//                                            if (in_array('BBW', $cart_data_arr)) {
//                                                $BBW = 'checked="checked"';
//                                            } else {
//                                                $BBW = '';
//                                            }
//                                            if (in_array('Centerfold', $cart_data_arr)) {
//                                                $centerfold = 'checked="checked"';
//                                            } else {
//                                                $centerfold = '';
//                                            }
//                                            if (in_array('College Girls', $cart_data_arr)) {
//                                                $college_girls = 'checked="checked"';
//                                            } else {
//                                                $college_girls = '';
//                                            }
//                                            if (in_array('Dominant', $cart_data_arr)) {
//                                                $dominant = 'checked="checked"';
//                                            } else {
//                                                $dominant = '';
//                                            }
//                                            if (in_array('European', $cart_data_arr)) {
//                                                $european = 'checked="checked"';
//                                            } else {
//                                                $european = '';
//                                            }
//                                            if (in_array('GFE', $cart_data_arr)) {
//                                                $GFE = 'checked="checked"';
//                                            } else {
//                                                $GFE = '';
//                                            }
//                                            if (in_array('Mature', $cart_data_arr)) {
//                                                $mature = 'checked="checked"';
//                                            } else {
//                                                $mature = '';
//                                            }
//                                            if (in_array('Petite', $cart_data_arr)) {
//                                                $petite = 'checked="checked"';
//                                            } else {
//                                                $petite = '';
//                                            }
//                                            if (in_array('Submissive', $cart_data_arr)) {
//                                                $submissive = 'checked="checked"';
//                                            } else {
//                                                $submissive = '';
//                                            }
//                                            if (in_array('Super Booty', $cart_data_arr)) {
//                                                $super_booty = 'checked="checked"';
//                                            } else {
//                                                $super_booty = '';
//                                            }
//                                            if (in_array('Switch', $cart_data_arr)) {
//                                                $switch = 'checked="checked"';
//                                            } else {
//                                                $switch = '';
//                                            }
//                                            if (in_array('XXX', $cart_data_arr)) {
//                                                $XXX = 'checked="checked"';
//                                            } else {
//                                                $XXX = '';
//                                            }
//                                            if (in_array('Native American', $cart_data_arr)) {
//                                                $native_american = 'checked="checked"';
//                                            } else {
//                                                $native_american = '';
//                                            }
                                            ?>
                                            <span>
                                                <?php
                                                foreach ($subcategory as $key => $sub_category_list) {
                                                    $categoryCheck = preg_replace("/[^a-zA-Z]+/", "", $sub_category_list['category_name']);
                                                    if (in_array($categoryCheck, $cart_data_arr)) {
                                                        $checked = 'checked="checked"';
                                                    } else {
                                                        $checked = '';
                                                    }
                                                    ?>
                                                    <input type="checkbox" class="group1" onchange="do_check()" <?php echo $checked; ?> name="special_category[]" value="<?php echo $sub_category_list['price'] ?>" id="<?php echo $categoryCheck; ?>" cat-id="<?php echo $sub_category_list['category_id'] ?>"><?php echo $sub_category_list['category_name'] ?> - $
                                                    <br/>
                                                    <?php if ($key == "20") { ?>
                                                    </span></div> </article>
                                            <article class="main_right" style="width: 48%;">
                                                <div style="margin: 1% 0 1% 0">
                                                    <span>
                                                        <?php
                                                    }
                                                }
                                                ?>


                                                                <!--                                                <input type="checkbox" class="group1" onchange="do_check()" <?php echo $all_natural; ?> name="special_category[]" value="30" id="All Natural" cat-id="20">All Natural - $
                                                                <br>
                                                                <input type="checkbox" class="group1" onchange="do_check()" <?php echo $alternative; ?> onclick="toggle_location('.alternative', this)"  name="special_category[]" value="30" cat-id="26" id="Alternative"> Alternative - $
                                                                <br>
                                                                <div class="bmw">
                                                                    <input type="checkbox" class="group1" onchange="do_check()" <?php echo $BBW; ?>  onclick="toggle('.myClass', this)"  name="special_category[]" value="30" id="BBW" cat-id="27"> BBW - $
                                                                </div>
                                                                <input type="checkbox" class="group1" onchange="do_check()" <?php echo $centerfold; ?> name="special_category[]" value="30" id="Centerfold" cat-id="24"> Centerfold - $
                                                                <br>
                                                                <div class="clg_girl">
                                                                    <input type="checkbox" class="group1" onchange="do_check()" <?php echo $college_girls; ?> onclick="toggle('.mature', this)" name="special_category[]" value="30" cat-id="22" id="College Girls"> College Girls - $
                                                                </div>
                                                                <input type="checkbox" class="group1"  onchange="do_check()" <?php echo $dominant; ?> name="special_category[]" value="30" id="Dominant" cat-id="52"> Dominant
                                                                <br>
                                                                <input type="checkbox" class="group1" onchange="do_check()" <?php echo $european; ?> name="special_category[]" value="30" id="European" cat-id="57"> European
                                                                <br>
                                                                </span>-->

                                                <!--
                                                                                                <input type="checkbox" class="group1" onchange="do_check()" <?php echo $GFE; ?> name="special_category[]" value="30" cat-id="13" id="GFE"> GFE - $
                                                                                                <br>
                                                                                                <div class="mature">
                                                                                                    <input type="checkbox" class="group1" onchange="do_check()" <?php echo $mature; ?> onclick="toggle('.clg_girl', this)" name="special_category[]" value="30" cat-id="23" id="Mature"> Mature - $
                                                                                                </div>
                                                                                                <div class="myClass">
                                                                                                    <input type="checkbox" class="group1"  onchange="do_check()" <?php echo $petite; ?> onclick="toggle('.bmw', this)" name="special_category[]" value="30" cat-id="21" id="Petite"> Petite - $
                                                                                                </div>
                                                                                                <input type="checkbox" class="group1"  onchange="do_check()" <?php echo $submissive; ?> name="special_category[]" value="30" cat-id="53" id="Submissive"> Submissive
                                                                                                <br>
                                                                                                <input type="checkbox" class="group1"  onchange="do_check()" <?php echo $super_booty; ?> name="special_category[]" value="30" cat-id="25" id="Super Booty"> Super Booty - $
                                                                                                <br>
                                                                                                <input type="checkbox" class="group1"  onchange="do_check()" <?php echo $switch; ?> name="special_category[]" value="30" cat-id="54" id="Switch"> Switch
                                                                                                <br>
                                                                                                <input type="checkbox" class="group1" onchange="do_check()" <?php echo $XXX; ?> name="special_category[]" value="30" cat-id="19" id="XXX"> XXX - $
                                                                                                <br>
                                                                                                <input type="checkbox" class="group1"  onchange="do_check()" <?php echo $native_american; ?> name="special_category[]" value="30" cat-id="55" id="Native American"> Native American
                                                                                                <br>-->
                                            </span>
                                        </div>
                                    </article>

                                    <!--                                    <div class="alternative" style="margin: 3% 0 3% 0;display: none;">
                                                                            <div> <label><strong>How are you alternative?</strong></label></div>
                                                                            <span>
                                                                                <input type="checkbox" class="group1" name="alternative[]"> Alternative hairstyle or lifestyle
                                                                                <br>
                                                                                <input type="checkbox" class="group1"  name="alternative[]"> Other body modifications
                                                                                <br>
                                                                                <input type="checkbox" class="group1"  name="alternative[]"> Piercings
                                                                                <br>
                                                                                <input type="checkbox" class="group1"  name="alternative[]"> Tattoos

                                                                            </span>
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="affilate_main">
                            <h1 class="stacsguide_tit font-nor aboutcl" style="font-size: 25px;">Location & Mapping</h1>
                            <hr class="sg_border">
                            <div style="margin: 0px 0px 0px 3%;">
                                <label class="aboutcl">
                                    Where about are you located, and where are you willing to travel?
                                </label>
                                <div style="margin: 1% 0 1% 0">
                                    <span>
                                        <?php
                                        //echo $get_advertisement_detail['incall'];
                                        if ($get_advertisement_detail['incall'] == "incall") {
                                            //echo "come";
                                            $incall = "checked = 'checked'";
                                        } else {
                                            //echo "else";
                                            $incall = "";
                                        }
                                        if ($get_advertisement_detail['incall'] == "outcall") {
                                            $outcall = "checked='checked'";
                                        } else {
                                            $outcall = "";
                                        }
//                                        $a=($get_advertisement_detail['incall'] == "incall" ? 'checked' : '');
//
//                                        $b=($get_advertisement_detail['incall'] == "outcall" ? 'checked' : '');
//                                        $outcall="checked={$b}";
                                        ?>
                                        <input type="checkbox" class="location_class" onclick="toggle_location('.incall', this)" id="incall" value="incall" name="call_type" <?php echo $incall ?> > Incall
                                        <br>
                                        <input type="checkbox" class="location_class" onclick="toggle_location('.outcall', this)" id="outcall" value="outcall" name="call_type" <?php echo $outcall; ?> > Outcall
                                        <br>
                                    </span>
                                </div>
                                <div class="incall" style="display: none;margin: 1% 0 1% 0">
                                    <div>
                                        <?php
                                        $js = " getPerPlaces(this,'state') ";
                                        $attribute = 'id="per_country" class="adds_sel" onchange="' . $js . '" ';
                                        echo form_dropdown('i_country', $country_opt, $get_advertisement_detail['i_country'], $attribute);
                                        ?>
                                    </div><br>
                                    <div>
                                        <?php
                                        $js = "getPerPlaces(this,'city')";
                                        $attribute = 'id="per_state" class="adds_sel" onchange="' . $js . '" ';
                                        echo form_dropdown('i_state', $state_opt, $get_advertisement_detail['i_state'], $attribute);
                                        ?>
                                    </div>
                                    <br>
                                    <div>
                                        <?php
                                        $attribute = 'id="per_city" class="adds_sel" ';
                                        echo form_dropdown('i_city', $city_opt, $get_advertisement_detail['i_city'], $attribute);
                                        ?>
                                    </div><br>
                                </div>
                                <div class="outcall" style="display: none;margin: 1% 0 1% 0">
                                    <div>
                                        <?php
                                        $js = " getPerPlaces1(this,'state') ";
                                        $attribute = 'id="o_country" class="adds_sel" onchange="' . $js . '" ';
                                        echo form_dropdown('o_country', $country_opt, $get_advertisement_detail['o_country'], $attribute);
                                        ?>
                                    </div>
                                    <br>
                                    <div>
                                        <?php
                                        $js = "getPerPlaces1(this,'city')";
                                        $attribute = 'id="o_state" class="adds_sel" onchange="' . $js . '" ';
                                        echo form_dropdown('o_state', $state_opt, $get_advertisement_detail['o_state'], $attribute);
                                        ?>
                                    </div>
                                    <br>
                                    <div>
                                        <?php
                                        $attribute = 'id="o_city" class="adds_sel" ';
                                        echo form_dropdown('o_city', $city_opt, $get_advertisement_detail['o_city'], $attribute);
                                        ?>
                                    </div>
                                    <br>
                                </div>
                                <div style="margin: 3% 0 3% 0">
                                    <label class="aboutcl">
                                        <strong>Location Categories</strong>
                                    </label>
                                    <p style="margin: 1% 0 1% 0">Only select locations where you are willing to provide service.</p>
                                </div>
                                <div style="margin: 5% 0 3% 0">
                                    <label class="aboutcl">
                                        <strong>Location Tags</strong>
                                    </label>
                                    <p style="margin: 1% 0 1% 0">Define additional cities, towns, suburbs or boroughs where you provide service.</p>
                                </div>
                                <div>
                                    <input style="width: 100%" type="text" name="location_tags" maxlength="35" value="<?php echo $get_advertisement_detail['location_tags']; ?>" class="adds_in">
                                </div>
                                <div id="hidden">

                                </div>
                                <div id="category">

                                </div>
                                <div id="flip1">

                                </div>
                                <div id="flip2">

                                </div>
                                <div id="flip3">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </article>

            <article class="main_right" style="width: 20%">
                <div class="map_bx"><p>The Details</p></div>
            </article>
            <input type="submit" name="submit" value="Continue" class="bt_rg add_sub ">
        </form>
    </div>
</section>
</div>
<script>

                                                        function do_check() {
                                                            var ids = [];
                                                            var values = [];
                                                            var catId = [];
                                                            $('input[name="special_category[]"]:checked').each(function() {
                                                                var cat_id = $(this).attr('cat-id');
//                                                        alert(abc);
//                                                        var cat_id = $("#" + this.id).attr('cat-id');
                                                                catId.push(cat_id);
                                                                ids.push(this.id);
                                                                values.push(this.value);
                                                            });
                                                            //alert(ids);
                                                            var htmls = "";
                                                            var hidden_fields = "";
                                                            var input_text = "";
                                                            for (var i = 0; i < ids.length; i++) {
                                                                htmls += "<div><div style='display:inline-block'><input type='hidden' name='special_category[]' value='" + ids[i] + "'> " + ids[i] + "</div> " + "<div style='display:inline-block; float:right;'>$" + values[i] + "</div></div>";
                                                                hidden_fields += "<input type='hidden' name='category_name[]' value='" + ids[i] + "'> ";
                                                            }
                                                            for (var i = 0; i < catId.length; i++) {
                                                                input_text += "<input type='hidden' name='category_id[]' value='" + catId[i] + "'>";
                                                            }
                                                            $("#hidden").html(hidden_fields);
                                                            $("#cart_second").html(htmls);
                                                            $("#category").html(input_text);
                                                        }
                                                        var base_url = '<?php echo base_url() ?>';
//
                                                        function getPerPlaces(obj, child_type) {
                                                            var parent_id = $(obj).val();
                                                            $('#per_' + child_type)
                                                            if (parent_id != "") {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: base_url + "common_ctrl/get_places1",
                                                                    data: {child_type: child_type, parent_id: parent_id},
                                                                    success: function(data) {
                                                                        $('#per_' + child_type).html(data);
                                                                        $('#per_' + child_type).change();
                                                                    }
                                                                });
                                                            } else {
                                                                $('#per_' + child_type).html('<option value="">Select</option>');
                                                                $('#per_' + child_type).change();
                                                            }
                                                        }
                                                        function getPerPlaces1(obj, child_type) {
                                                            var parent_id = $(obj).val();
                                                            $('#per_' + child_type)
                                                            if (parent_id != "") {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: base_url + "common_ctrl/get_places1",
                                                                    data: {child_type: child_type, parent_id: parent_id},
                                                                    success: function(data) {
                                                                        $('#o_' + child_type).html(data);
                                                                        $('#o_' + child_type).change();
                                                                    }
                                                                });
                                                            } else {
                                                                $('#o_' + child_type).html('<option value="">Select</option>');
                                                                $('#o_' + child_type).change();
                                                            }
                                                        }

                                                        function toggle(className, obj) {
                                                            var $input = $(obj);
                                                            if ($input.prop('checked'))
                                                                $(className).hide();
                                                            else
                                                                $(className).show();
                                                        }
                                                        function toggle_location(className, obj) {
                                                            var $input = $(obj);
                                                            if ($input.prop('checked'))
                                                                $(className).show();
                                                            else
                                                                $(className).hide();
                                                        }
                                                        $("ul.tabs_class li").click(function() {
                                                            $("ul.tabs_class li").removeClass("active");
                                                            $(this).addClass("active");
                                                            $(".tab_content").hide();
                                                            var activeTab = $(this).attr("rel");
                                                            $("#" + activeTab).fadeIn();
                                                        });
                                                        $("ul.tabs li").click(function() {

                                                            $("ul.tabs li").removeClass("active");
                                                            $(this).addClass("active");
                                                            var a = $('.tabs .active').attr('rel');
                                                            //alert(a);
                                                            if (a == "tab1") {
                                                                $('.messurement_first').show();
                                                                $('.messurement_second').hide();
                                                            } else {
                                                                $('.messurement_second').show();
                                                                $('.messurement_first').hide();
                                                            }

                                                            $(".tab_content").hide();
                                                            var activeTab = $(this).attr("rel");
                                                            $("#" + activeTab).fadeIn();
                                                        });
                                                        $(document).ready(function() {
                                                            //alert('hiii');
//                                                    var location1=$('.incall').attr('checked');
//                                                    alert(location1);
//                                                    if ()
//                                                    {
//                                                        $('incall').show();
//                                                        $('outcall').show();
//                                                    }
//                                                    else {
//                                                        $('incall').hide();
//                                                        $('outcall').hide();
//                                                    }



                                                            $('#tbl tr td').each(function() {
                                                                var category_name = $(this).html().trim();

                                                                $("#flip2").append('<input type="hidden" name="category_name[]" value="' + category_name + '"/>');
                                                            });
                                                            $('#tbl2 tr td .pro_val').each(function() {
                                                                var special_category = $(this).html().trim();
                                                                //alert(special_category);
                                                                $("#flip3").append('<input type="hidden" name="special_category[]" value="' + special_category + '"/>');
                                                            });
                                                        });
                                                        var tot = 0;
                                                        tot += parseInt($('#tot').html());
                                                        //alert(tot);
                                                        function recalculate(tot) {
                                                            var sum = 0;
                                                            sum += parseInt(tot);
                                                            $("input[name='special_category[]']:checked").each(function() {
                                                                sum += parseInt($(this).attr("value"));
                                                            });
                                                            $("#flip").html('<div><div style="display:inline-block"><input type="hidden" name="total" value="' + sum + '"/>Total</div><div style="display:inline-block;float:right"><div style="display:inline-block"> $ </div><div style="display:inline-block">' + sum + '</div></div></div>');
                                                            $("#flip1").html('<input type="hidden" name="total" value="' + sum + '"/>');
                                                        }

                                                        $("input[name='special_category[]']").change(function()
                                                        {
                                                            recalculate(tot);
                                                        });
                                                        $("#m_ethnicity :checkbox").click(function() {

                                                            if ($("#m_ethnicity :checkbox:checked").length >= 2) {
                                                                alert('2 are already selected!');
                                                                $("#m_ethnicity :checkbox:not(:checked)").attr("disabled", "disabled");
                                                            } else {
                                                                $("#m_ethnicity :checkbox").attr("disabled", false);
                                                            }
                                                        });
</script>
