<style type="text/css">

    ul.tabs {
        margin: 8px 0 0 5px;
        padding: 0;
        float: left;
        list-style: none;
        height: 32px;
        border-bottom: 1px solid #043d63;
        border-left: 1px solid #999999;
        width: 99%;
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
        color: #6f6f6f;
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
        /*        text-align:center;*/
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
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/file_upload/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/file_upload/jquery.ui.plupload/css/jquery.ui.plupload.css">
<link href="<?php echo base_url(); ?>assets/css/file_upload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<?php echo validation_errors(); ?>
<section>
    <div class="main_part">
        <article class="main_left" style="width: 72%">
            <h1 class="sttit aboutcl">Stacks Guide</h1>
            <h3 class="worldtit aboutcl">World wide featured entertainers</h3>
            <hr class="sg_border">
            <?php
            foreach ($advertisement_data as $advertisement_content) {
                ?>
                <div style="margin: 0px 0px 0px 2.5%;">
                    <h2 class="aboutcl" style="font-size: 25px;">YOUR PHOTOS</h2>
                    <div id="uploaderform" style="display: block; margin: 21px 0px 0px;">
                        <form action="<?php echo base_url() ?>stacksguide_ads/upload_file" method="post" name="UploadForm" id="UploadForm" enctype="multipart/form-data">
                            <h1>StacksGuide Advertisement Photo</h1>
                            <p>Each recommended image file size must be less than 1MB!</p>
                            <div>
                                <label style="display: inline-block; vertical-align: top;">Files

                                </label>
                                <div id="AddFileInputBox" style="display: inline-block;">
                                    <input type="file" id="fileInputBox" style="margin-bottom: 5px;" name="file[]" multiple="multiple">
                                </div>
                            </div>
                            <button type="submit" class="button" id="SubmitButton">Upload</button>
                            <div id="progressbox">
                                <div id="progressbar"></div>
                                <div id="statustxt">0%</div>
                            </div>
                        </form>
                    </div>
                </div>
                <form style="margin: 10px;" id="fileupload" action="<?php echo base_url() ?>stacksguide_ads/update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="build_advertisement_id" value="<?php echo $id; ?>"/>
                    <div id="uploadResults">
                        <div align="center" style="margin:20px;"><a id="ShowForm" href="#">Toggle Form</a></div>
                        <div id="output"></div>
                    </div>
                    <div id="uploadResults1">
                        <div id="output1">
                            <ul style="background-color:#f5f5f5">
                                <table cellspacing="0" cellpadding="4" width="100%" border="0" id="tbl_form">
                                    <tbody>
                                        <?php
                                        $advertisement_img = explode(",", $advertisement_content['images']);
                                        for ($i = 0; $i < count($advertisement_img); $i++) {
                                            $row_img = $advertisement_img[$i];
                                            ?>
                                            <tr style="display:inline-block;padding: 3px;">
                                                <td align="center">
                                                    <img width="100" height="100" alt="Thumbnail" src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $row_img; ?>" id="<?php echo $row_img; ?>">
                                                    <input type="hidden"  class ='existing_img' value="<?php echo $row_img; ?>" name="upload_image[]">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </ul>
                        </div>
                    </div>
                    <div style="margin: 0px 0px 0px 2.5%;">
                        <h2 class="aboutcl" style="font-size: 25px;">ABOUT YOU</h2>
                        <label class="aboutcl">
                            Advertising Name<span class="star">*</span>
                        </label>
                        <div>
                            <input type="text" name="advertisement" maxlength="35" value="<?php echo $advertisement_content['advertisement'] ?>" id="advertisement" class="adds_in">
                        </div>
                        <br>
                        <label class="aboutcl">
                            Tagline-
                        </label>
                        <i class="aboutcl">A short eye-catching headline to grab viewers' attention.
                            <span class="star">*</span> </i>
                        <div>
                            <textarea style="width: 75%; height: 120px;" name="tagline" maxlength="175" cols="80" class="adds_in"><?php echo $advertisement_content['tagline'] ?></textarea>
                        </div>
                        <br>
                        <label class="aboutcl">
                            Age:
                        </label>
                        <input type="text" style="width: 100px; margin-left: 25px;" value="<?php echo $advertisement_content['age'] ?>" name="age" maxlength="35" id="age" class="adds_in">
                        <br><br>
                        <label class="aboutcl">
                            Gender:<span class="star">*</span>
                        </label>
                        <?php
                        $gender_opt = array('' => 'Select', 'female' => 'Female', 'transsexual' => 'Transsexual', 'female_to_male_transsexual' => 'Female to Male Transsexual', 'hermaphrodite' => 'Hermaphrodite', 'male' => 'Male');
                        $attribute = 'id="gender" class="adds_sel"';
                        echo form_dropdown('gender', $gender_opt, $advertisement_content['gender'], $attribute);
                        ?>
                        <br><br>
                        <h4 class="aboutcl">image should be Minimum 1200X324</h4>
                        <label class="aboutcl">Cover Image<span class="star">*</span>:</label>
                        <input class="cover_image" type="file" name="cover_image" />
                        <?php if ($advertisement_content['cover_image']) { ?>
                            <div><img width="100" src="<?php echo base_url(); ?>uploads/advertisement/cover/<?php echo $advertisement_content['cover_image'] ?>" /></div>
                        <?php } ?>
                        <input type="hidden" name="old_webmag_img" value="<?php echo $advertisement_content['cover_image'] ?>" />
                        <br><br><br>
                        <h4 class="aboutcl">Contact Info (phone, email &amp; website)</h4>
                        <label class="aboutcl">Add at least one phone number or email contact on the ad<span class="star">*</span></label>
                        <?php
                        $phone_number = explode(",", $advertisement_content['phone_number']);
                        $count_number = count($phone_number);
                        for ($p = 0; $p < count($phone_number); $p++) {
                            ?>
                            <div id="TextBoxesGroup" class="aboutpad">
                                <div id="TextBoxDiv1">
                                    <input type="text" class="inabout adds_in" value="<?php echo $phone_number[$p]; ?>"name="phone_number[]" placeholder="Phone1" id="phone_number">
                                    <a href="javascript:void(0)" style="color:#ffffff;" id="addPhone">Add Another</a>
                                </div>
                            </div>
                        <?php } ?>
                        <br>
                        <?php
                        $email = explode(",", $advertisement_content['email']);
                        $count_email_id = count($email);
                        for ($e = 0; $e < count($email); $e++) {
                            ?>
                            <div id="TextBoxesGroup1" class="aboutpad">
                                <div id="TextBoxEmail">
                                    <input type="text" class="inabout adds_in" value ="<?php echo $email[$e] ?>" name="email[]" placeholder="Email1" id="email">
                                    <a href="javascript:void(0)" style="color:#ffffff;" id="addEmail">Add Another</a>
                                </div>
                            </div>
                        <?php } ?>
                        <br>
                        <?php
                        $website = explode(",", $advertisement_content['website']);
                        $count_website = count($website);
                        for ($w = 0; $w < count($website); $w++) {
                            ?>
                            <div id="TextBoxesGroup2" class="aboutpad">
                                <div id="TextBoxWebsite">
                                    <input type="text" class="inabout adds_in" name="website[]" value ="<?php echo $website[$w] ?>" placeholder="www.yourwebsite.com" id="website">
                                    <a href="javascript:void(0)" style="color:#505050;" id="addWebsite">Add Another</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="affilate_main">
                        <h1 class="stacsguide_tit font-nor aboutcl">ABOUT YOUR AD</h1>
                        <hr class="sg_border">
                        <div style="margin: 0px 0px 0px 3%;">
                            <label class="aboutcl">
                                Where should your ad appear?<span class="star">*</span>
                            </label>
                            <div>
                                <?php
                                $js = " getPerPlaces(this,'state') ";
                                $attribute = 'id="per_country" class="adds_sel" onchange="' . $js . '" ';
                                echo form_dropdown('country', $country_opt, $advertisement_content['country_id'], $attribute);
                                ?>
                            </div><br>
                            <div>
                                <?php
                                $js = "getPerPlaces(this,'city')";
                                $attribute = 'id="per_state" class="adds_sel" onchange="' . $js . '" ';
                                echo form_dropdown('state', $state_opt, $advertisement_content['state_id'], $attribute);
                                ?>
                            </div>
                            <br>
                            <div>
                                <?php
                                $attribute = 'id="per_city" class="adds_sel" ';
                                echo form_dropdown('city', $city_opt, $advertisement_content['city_id'], $attribute);
                                ?>
                            </div>
                            <br>
                        </div>
                        <div>
                            <ul class="tabs">
                                <li class="active" rel="tab1">Standard</li>
                                <li rel="tab2">Visiting</li>
                            </ul>
                        </div>
                        <div class="tab_container">
                            <div style="display: block;" id="tab1" class="tab_content">
                                <?php
                                $Today = date('y:m:d');
                                $NewDate1 = Date('F j, Y.', strtotime("+30 days"));
                                ?>
                                <div class="show aboutcl" style="display: none">
                                    Your ad will be online for 30 days
                                    <div id="days_limit"><input type="hidden" name="finish_ads_days" value="30"> </div>
                                    <?php
                                    $Today = date('y:m:d');
                                    $NewDate = Date('F j, Y.', strtotime("+15 days"));
                                    ?>
                                    <h4 style="margin: 20px 0 20px 0" class="l_top_padding memo">
                                        <span ng-if="" class="buffer ng-scope"> Your ad will be online until:
                                            <span class="type_ad_date ng-binding"><?php echo $NewDate1; ?></span>

                                        </span>
                                    </h4>
                                </div>
                                <label class="aboutcl"> What services do you provide?</label>
                                <p class="aboutcl">
                                    A single main category is included in the cost of your ad. You can appear in additional main categories for a small extra cost.
                                    <span class="star">*</span></p>
                                <div id="hidden_checkbox1"></div>
                                <?php
                                $ci = & get_instance();
                                $ci->load->model('category_model');
                                $category = $ci->category_model->get_front_category();
                                $cart_data_arr = explode(",", $get_cart_data[0]['category_name']);
//                                echo "<pre>";
//                                print_r($cart_data_arr);
//                                exit;
                                ?>
                                <div id="checkbox_show1" style="display: none" class="aboutcl">
                                    <?php
//
                                    foreach ($category as $key => $category_list) {
                                        $categoryCheck = preg_replace("/[^a-zA-Z]+/", "", $category_list['category_name']);
                                        if (in_array($categoryCheck, $cart_data_arr)) {
                                            $checked = 'checked="checked"';
                                        } else {
                                            $checked = '';
                                        }
                                        ?>
                                        <input type="checkbox" class="group1" onchange = "do_check()" <?php echo $checked; ?> name = "check_visiting[]" id = "<?php echo $categoryCheck; ?>" value = "<?php echo $category_list['price'] ?>" cat-id = "<?php echo $category_list['category_id'] ?>"> <?php echo $category_list['category_name']; ?><br/>
                                        <?php
                                    }
                                    ?>


                                                                                                                                                                <!--                                    <input type="checkbox" class="group1"  <?php echo $checked; ?>  onchange="do_check()" name="check_visiting[]" id="BDSM" value="20" cat-id="51"> BDSM
                                                                                                                                                                  <br>
                                                                                                                                                                  <input type="checkbox" class="group1" <?php echo $dancer; ?> onchange="do_check()" name="check_visiting[]" id="Dancer" value="20" cat-id="49"> Dancer
                                                                                                                                                                  <br>
                                                                                                                                                                  <input type="checkbox" class="group1" <?php echo $fantasy; ?> onchange="do_check()" name="check_visiting[]" id="Fantasy" value="20" cat-id="50"> Fantasy
                                                                                                                                                                  <br>
                                                                                                                                                                  <input type="checkbox" class="group1" <?php echo $tantra; ?> onchange="do_check()" name="check_visiting[]" id="Tantra" value="20" cat-id="48"> Tantra
                                                                                                                                                                  <br>-->
                                </div>
                            </div>
                            <div style="display: none;" id="tab2" class="tab_content">
                                <div class="show aboutcl" style="display: none">
                                    Your ad will be online for 15 days
                                    <div id="days_limit_second"></div>
                                    <h4 style="margin: 20px 0 20px 0" class="l_top_padding memo">
                                        <span ng-if="" class="buffer ng-scope aboutcl"> Your ad will be online until:
                                            <span id="show_in_textarea" class="type_ad_date ng-binding"><?php echo $NewDate; ?></span>
                                        </span>
                                    </h4>
                                </div>
                                <h3 class="aboutcl">
                                    Great! You want visiting!
                                </h3>
                                <label class="aboutcl">
                                    Visiting Ad Text!
                                </label>
                                <div>
                                    <textarea style="width: 90%; height: 80px;" id="visiting_ads" name="visiting_ads" cols="80"></textarea>
                                </div>
                                <br>
                                <label class="aboutcl"> What services do you provide?</label>
                                <p class="aboutcl">
                                    A single main category is included in the cost of your ad. You can appear in additional main categories for a small extra cost.
                                    <span class="star">*</span>
                                </p>
                                <div id="hidden_checkbox2" class="aboutcl"> </div>
                                <div id="checkbox_show2" style="display: none" class="aboutcl">
                                    <?php
//
                                    foreach ($category as $key => $category_list) {
                                        $categoryCheck = preg_replace("/[^a-zA-Z]+/", "", $category_list['category_name']);
                                        if (in_array($categoryCheck, $cart_data_arr)) {
                                            $checked = 'checked="checked"';
                                        } else {
                                            $checked = '';
                                        }
                                        ?>
                                        <input type="checkbox" class="group2" onchange = "do_check()" <?php echo $checked; ?> name = "check_visiting[]" id = "<?php echo $categoryCheck; ?>" value = "<?php echo $category_list['price'] ?>" cat-id = "<?php echo $category_list['category_id'] ?>"> <?php echo $category_list['category_name']; ?><br/>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <hr class="sg_border">
                    </div>
                    <div id="hidden"></div>
                    <div id="cat">
                        <?php
                        if (!empty($get_cart_data[0]['category_name'])) {
                            $category_name = explode(",", $get_cart_data[0]['category_name']);
                            foreach ($category_name as $key => $category) {
                                ?>
                                <input type="hidden" name="category_name[]" value="<?php echo $category; ?>"/>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php if (!empty($advertisement_content['visiting_values'])) {
                        ?>
                        <input type="hidden" name="total" value="<?php echo $advertisement_content['visiting_values']; ?>"/>
                    <?php } ?>
                    <div id="flip1"></div>
                    <div id="category"></div>
                    <input type="submit" name="submit" value="Continue" class="bt_rg add_sub ">
                </form>
            </article>
            <article class="main_right" style="width: 25%"></article>
            <?php } ?>
    </div>
</section>
</div>
<script type="text/javascript">

                                            var base_url = '<?php echo base_url() ?>';
                                            $(document).ready(function() {
                                                var progressbox = $('#progressbox'); //progress bar wrapper
                                                var progressbar = $('#progressbar'); //progress bar element
                                                var statustxt = $('#statustxt'); //status text element
                                                var submitbutton = $("#SubmitButton"); //submit button
                                                var myform = $("#UploadForm"); //upload form
                                                var output = $("#output");
                                                var output1 = $("#output1");//ajax result output element
                                                var completed = '0%'; //initial progressbar value
                                                var FileInputsHolder = $('#AddFileInputBox'); //Element where additional file inputs are appended
                                                var MaxFileInputs = 8; //Maximum number of file input boxs

                                                // adding and removing file input box
                                                var i = $("#AddFileInputBox div").size() + 1;
                                                $("#AddMoreFileBox").click(function(event) {
                                                    event.returnValue = false;
                                                    if (i < MaxFileInputs)
                                                    {
                                                        $('<span><input type="file" id="fileInputBox" size="20" name="file[]" class="addedInput" value=""/><a href="#" class="removeclass small2"><img src="images/close_icon.gif" border="0" /></a></span>').appendTo(FileInputsHolder);
                                                        i++;
                                                    }
                                                    return false;
                                                });

                                                $("body").on("click", ".removeclass", function(event) {
                                                    event.returnValue = false;
                                                    if (i > 1) {
                                                        $(this).parents('span').remove();
                                                        i--;
                                                    }

                                                });

                                                $("#ShowForm").click(function() {
                                                    $("#uploaderform").slideToggle(); //Slide Toggle upload form on click
                                                });

                                                $(myform).ajaxForm({
                                                    beforeSend: function() { //brfore sending form
                                                        submitbutton.attr('disabled', ''); // disable upload button
                                                        statustxt.empty();
                                                        progressbox.show(); //show progressbar
                                                        progressbar.width(completed); //initial value 0% of progressbar
                                                        statustxt.html(completed); //set status text
                                                        statustxt.css('color', '#000'); //initial color of status text

                                                    },
                                                    uploadProgress: function(event, position, total, percentComplete) { //on progress
                                                        progressbar.width(percentComplete + '%') //update progressbar percent complete
                                                        statustxt.html(percentComplete + '%'); //update status text
                                                        if (percentComplete > 50)
                                                        {
                                                            statustxt.css('color', '#fff'); //change status text to white after 50%
                                                        } else {
                                                            statustxt.css('color', '#000');
                                                        }

                                                    },
                                                    complete: function(response) {
                                                        $(".existing_img").prop('disabled', true);
                                                        output1.hide();
                                                        output.html(response.responseText); //update element with received data
                                                        myform.resetForm();
                                                        submitbutton.removeAttr('disabled'); //enable submit button
                                                        progressbox.hide(); // hide progressbar
                                                        $("#uploaderform").slideUp(); // hide form after upload
                                                    }
                                                });

                                                if ($('.tabs .active').attr('rel')) {
                                                    $('div #days_limit').html('<input type="hidden" name="finish_ads_days" value="30"> ');
                                                }
                                                function recalculate() {
                                                    var sum = 0;
                                                    $("input[type=checkbox]:checked").each(function() {
                                                        sum += parseInt($(this).attr("value"));
                                                    });
                                                    $("#flip").html('<div><div style="display:inline-block"><input type="hidden" name="total" value="' + sum + '"/>Total</div><div style="display:inline-block;float:right;"><div style="display:inline-block;margin-right:2px;">$</div><div style="display:inline-block">' + sum + '</div></div></div>');
                                                    $("#flip1").html('<input type="hidden" name="total" value="' + sum + '"/>');
                                                }
                                                $("input[type=checkbox]").change(function()
                                                {
                                                    recalculate();
                                                });
                                                $('select[name=city][id=per_city]').change(function() {
                                                    $('.show').show();
                                                    var val = $('#show_in_textarea').text();
                                                    $('#visiting_ads').html("Visiting until " + val);

                                                });
                                                var counter_phone_number = <?php echo $count_number; ?>;
                                                var counter_email = <?php echo $count_email_id; ?>;
                                                var $counter_website = <?php echo $count_website; ?>;
                                                //alert($counter_website);

                                                if (counter_phone_number == 1) {
                                                    var counter = 2;
                                                    $("#addPhone").click(function() {
                                                        if (counter > 3) {
                                                            $("#addPhone").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
                                                        newTextBoxDiv.html('<input style="margin-top:7px;" class="inabout adds_in" type="text" name="phone_number[]" id="phone_number' + counter + '" value="" placeholder="Phone" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup");
                                                        counter++;
                                                    });
                                                } else if (counter_phone_number == 2) {
                                                    var counter = 3;
                                                    $("#addPhone").click(function() {
                                                        if (counter > 3) {
                                                            $("#addPhone").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
                                                        newTextBoxDiv.html('<input style="margin-top:7px;" class="inabout adds_in" type="text" name="phone_number[]" id="phone_number' + counter + '" value="" placeholder="Phone" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup");
                                                        counter++;
                                                    });
                                                } else if (counter_phone_number == 3) {

                                                } else {
                                                    var counter = 2;
                                                    $("#addPhone").click(function() {
                                                        if (counter > 3) {
                                                            $("#addPhone").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
                                                        //alert(newTextBoxDiv);
                                                        newTextBoxDiv.html('<input style="margin-top:7px;" class="inabout adds_in" type="text" name="phone_number[]" id="phone_number' + counter + '" value="" placeholder="Phone" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup");
                                                        counter++;
                                                    });
                                                }
                                                if (counter_email == 1) {
                                                    var cnt = 2;
                                                    $("#addEmail").click(function() {
                                                        if (cnt > 3) {
                                                            $("#addEmail").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxEmail' + cnt);
                                                        newTextBoxDiv.html('<input type="text" class="inabout adds_in" style="margin-top:7px;" name="email[]" id="email' + cnt + '" placeholder="Email" value="" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup1");
                                                        cnt++;
                                                    });
                                                } else if (counter_email == 2) {
                                                    var cnt = 3;
                                                    $("#addEmail").click(function() {
                                                        if (cnt > 3) {
                                                            $("#addEmail").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxEmail' + cnt);
                                                        newTextBoxDiv.html('<input type="text" class="inabout adds_in" style="margin-top:7px;" name="email[]" id="email' + cnt + '" placeholder="Email" value="" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup1");
                                                        cnt++;
                                                    });
                                                } else if (counter_email == 3) {

                                                } else {
                                                    var cnt = 2;
                                                    $("#addEmail").click(function() {
                                                        if (cnt > 3) {
                                                            $("#addEmail").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxEmail' + cnt);

                                                        newTextBoxDiv.html('<input type="text" class="inabout adds_in" style="margin-top:7px;" name="email[]" id="email' + cnt + '" placeholder="Email" value="" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup1");
                                                        cnt++;
                                                    });
                                                }
                                                if ($counter_website == 1) {
                                                    var count = 2;
                                                    $("#addWebsite").click(function() {
                                                        if (count > 3) {
                                                            $("#addWebsite").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxWebsite' + count);
                                                        newTextBoxDiv.html('<input type="text" style="margin-top:7px;" class="inabout adds_in" name="website[]" id="website' + count + '" placeholder="www.yourwebsite.com" value="" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup2");
                                                        count++;
                                                    });
                                                } else if ($counter_website == 2) {
                                                    var count = 3;
                                                    $("#addWebsite").click(function() {
                                                        if (count > 3) {
                                                            $("#addWebsite").hide();
                                                            return false;
                                                        }

                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxWebsite' + count);
                                                        newTextBoxDiv.html('<input type="text" style="margin-top:7px;" class="inabout adds_in" name="website[]" id="website' + count + '" placeholder="www.yourwebsite.com" value="" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup2");
                                                        count++;
                                                    });
                                                }
                                                else if ($counter_website == 3) {

                                                } else {
                                                    var count = 2;
                                                    $("#addWebsite").click(function() {
                                                        if (count > 3) {
                                                            $("#addWebsite").hide();
                                                            return false;
                                                        }
                                                        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxWebsite' + count);
                                                        newTextBoxDiv.html('<input type="text" style="margin-top:7px;" class="inabout adds_in" name="website[]" id="website' + count + '" placeholder="www.yourwebsite.com" value="" >');
                                                        newTextBoxDiv.appendTo("#TextBoxesGroup2");
                                                        count++;
                                                    });
                                                }

                                                $(".tab_content").hide();
                                                $(".tab_content:first").show();
                                                $("ul.tabs li").click(function() {
                                                    $("ul.tabs li").removeClass("active");
                                                    $(this).addClass("active");
                                                    var a = $('.tabs .active').attr('rel');
                                                    if (a == "tab1") {
                                                        $('div #checkbox_show1').show();
                                                        $('div #days_limit').html('<input type="hidden" name="finish_ads_days" id="base" value="30"> ');
                                                        $('#hidden_checkbox1').html('<input type="checkbox"  style="display:none;" class="group1" checked="checked" name="check_visiting[]" cat-id="0" id="Base" value="25">');
                                                        $('#Visit').prop('checked', false);
                                                        $('#checkbox_show2 input[name="check_visiting[]"]').attr('checked', false);
                                                        $("input.group2").attr('disabled', true);
                                                        $("input.group1").attr('disabled', false);
                                                    } else {
                                                        $('div #checkbox_show2').show();
                                                        $('div #days_limit_second').html('<input type="hidden" name="finish_ads_days" id="visit" value="15"> ');
                                                        $('#hidden_checkbox2').html('<input type="checkbox"  style="display:none;" checked="checked"  class="group2" id="Visit" cat-id="0" name="check_visiting[]" value="50">');
                                                        $('#Base').prop('checked', false);
                                                        $('#checkbox_show1 input[name="check_visiting[]"]').attr('checked', false);
                                                        $("input.group1").attr('disabled', true);
                                                        $("input.group2").attr('disabled', false);
                                                    }

                                                    $(".tab_content").hide();
                                                    var activeTab = $(this).attr("rel");
                                                    $("#" + activeTab).fadeIn();
                                                });
                                                $("#flip").click(function() {
                                                    $("#panel").slideToggle("slow");
                                                });
                                            });
                                            function getPerPlaces(obj, child_type) {
                                                var parent_id = $(obj).val();
                                                $('#per_' + child_type)
                                                if (parent_id != "") {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: base_url + "common_ctrl/get_places",
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
                                            function do_check() {
                                                $('#cat').html('');
                                                var ids = [];
                                                var values = [];
                                                var catId = [];
                                                $('input[name="check_visiting[]"]:checked').each(function() {
                                                    var cat_id = $("#" + this.id).attr('cat-id');
                                                    catId.push(cat_id);
                                                    ids.push(this.id);
                                                    values.push(this.value);
                                                });
                                                var input_text = "";
                                                var htmls = "";
                                                var hidden_fields = "";
                                                for (var i = 0; i < catId.length; i++) {
                                                    input_text += "<input type='hidden' name='category_id[]' value='" + catId[i] + "'>";
                                                }
                                                for (var i = 0; i < ids.length; i++) {
                                                    htmls += "<div><div style='display:inline-block;'><input type='hidden' name='check_visiting_name[]' value='" + ids[i] + "'> " + ids[i] + " </div>" + "<div style='float:right;'><div style='display:inline-block;'>$</div><div style='display:inline-block;'>" + values[i] + "</div></div></div>";
                                                    hidden_fields += "<input type='hidden' name='category_name[]' value='" + ids[i] + "'> ";
                                                }
                                                $("#hidden").html(hidden_fields);
                                                $("#cart").html(htmls);
                                                $("#category").html(input_text);
                                            }
</script>