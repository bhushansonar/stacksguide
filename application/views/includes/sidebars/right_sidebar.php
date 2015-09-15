<style>
    .item-wrapper {
        background: linear-gradient(to bottom, rgba(2, 20, 42, 1) 0%, rgba(1, 38, 81, 0) 40%, rgba(0, 64, 139, 0) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: 2px solid #858585;
        margin: 5px;
        overflow: visible;
        position: relative;
        width: 126px; /* without this you have unwanted size effects on hover*/
    }

    .item-content {
        /*        width: 200px;*/
        height: auto;
    }

    .item-actions {
        display: none;
        position: absolute;
        background: #888;
        top:300px;
        z-index: 10;
        left: 0px;
        width: 200px;
        height: 100px;
    }
</style>
<?php
$ci = & get_instance();
$ci->load->model('webcam_model');
$webcamScript = $ci->webcam_model->get_front_webcam();
//echo "<pre>";
//print_r($webcamScript);
//exit;
?>
<!--<div class="right" style="color: rgb(239, 239, 239); float: right; position: absolute; right: 0px; top: 288px; width: 13%;">
    <div class="item-wrapper">
        <div class="item-content">
            <div>
                <div style="margin-left: 13px;margin-top: 14px;">
<?php foreach ($webcamScript as $key => $value) { ?>
                            <a href="#">
    <?php //echo $value['webcam_script'] ?>

                            </a>
<?php } ?>
                </div>
                                <div>
                                    <p>
                                        <a href="http://localhost/stacksguide/vip_details/show_vip_details/1">lorren</a>
                                    </p>
                                </div>

            </div>
        </div>
                <div class="item-actions">
                                <button class="buy">Buy</button>
                </div>
    </div>
</div>-->