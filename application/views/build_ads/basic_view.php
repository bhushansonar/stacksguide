<style>
    .text-center{
        text-align: center;
    }
    h1.heading_size{
        font-size: 2.6em;
        line-height: 1.42857;
    }
    h2.heading_size{
        font-size: 1.7em;
        margin-top: 0.75em;
        line-height: 1.42857;
    }
    h1, h2, h3 {
        margin-bottom: 10px;
    }
    span.ng-binding {
        padding-left: 0.5em;
    }
    .trans_ad_name {
        font-weight: 600;
    }
    h3.heading_size {
        font-size: 1.25em;
        line-height: 1.42857;
    }

    .row:before, .row:after {
        content: " ";
        display: table;
    }
    .row:before, .row:after {
        content: " ";
        display: table;
    }
    *, *:before, *:after {
        box-sizing: border-box;
    }
    .row:after {
        clear: both;
    }
    .row:before, .row:after {
        content: " ";
        display: table;
    }
    .row:after {
        clear: both;
    }
    .row:before, .row:after {
        content: " ";
        display: table;
    }
    *, *:before, *:after {
        box-sizing: border-box;
    }
    div.row.btn_row {
        margin-top: 4em;
    }
    .row {
        margin-left: -15px;
        margin-right: -15px;
    }
    p.p-inline {
        display: inline;
        text-align: center;
    }
    .col-md-offset-3 {
        margin-left: 25%;
    }
    .col-md-9 {
        width: 75%;
    }
    .btn-details {
        background: linear-gradient(to bottom, #79c161 0px, #5aa242 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    }
    .btn-ea {
        color: #f1f1f1;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.75);
    }
    .btn-lg {
        border-radius: 6px;
        font-size: 18px;
        line-height: 1.33;
        padding: 10px 16px;
    }
    .btn {
        -moz-user-select: none;
        border: 1px solid transparent;
        cursor: pointer;
        display: inline-block;
        font-weight: normal;
        margin-bottom: 0;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        white-space: nowrap;
    }
    hr.line_division.ld-left {
        margin-left: 2em;
    }
    hr.line_division {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-image: none;
        border-style: solid none none;
        border-width: 1px 0 0;
        display: inline-block;
        height: 1px;
        padding: 0;
        vertical-align: middle;
        width: 6%;
    }
    hr {
        box-sizing: content-box;
    }
    hr.line_division.ld-right {
        margin-right: 2em;
    }
    .btn-checkout {
        background: linear-gradient(to bottom, #eee 0px, #eee 0px, #d3d3d3 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        color: #444;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    }
    .btn-default {
        border-color: #ccc;
    }
    .content_view {
        background: linear-gradient(to bottom, rgba(2, 20, 42, 1) 0%, rgba(1, 38, 81, 0) 40%, rgba(0, 64, 139, 0) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-radius: 5px;
        display: inline-block;
        padding: 23px 0 0;
        width: 100%;
    }
</style>
<section>
    <div class="main_part">
        <div class="content_view">
            <div class="text-center">
                <h1 class="heading_size">
                    <strong>Congratulations, the BASICS of your ad are complete!</strong>
                </h1>
                <h2 class="heading_size">Your<span class="trans_ad_name ng-binding">demo advertisement</span> ad is ready to be submitted.</h2>
                <h3 class="heading_size ng-binding">Your ad is currently at 61% strength. Increase visibility to your ad via the DETAILS now!</h3>
                <h3 class="heading_size ng-scope">
                    Complete these fields to improve the strength of you ad:
                    <span>
                        Location Categories,
                    </span>
                    <span >
                        Bio,
                    </span>
                    <span>
                        Incall.
                    </span>
                </h3>
            </div>
            <div class="row btn_row">
                <p class="p-inline">
                </p>
                <div class="col-sm-10 col-sm-offset-2 col-md-9 col-md-offset-3">
                    <?php
                    $ads_details = @$get_advertisement_detail[0]['ads_details'];
                    if ($ads_details == "YES") {
                        ?>
                        <a href="<?php echo base_url() ?>stacksguide_ads/update_ads_details"><button class="btn btn-lg btn-ea btn-details">Update Details</button> </a>

                    <?php } else { ?>
                        <a href="<?php echo base_url() ?>stacksguide_ads/ads_details"><button class="btn btn-lg btn-ea btn-details">Add Details</button> </a>
<?php } ?>
                    <span> <hr class="line_division ld-left"> <span class="trans_divide"> or </span> <hr class="line_division ld-right"> </span>

                    <a href="<?php echo base_url() ?>stacksguide_ads/cart"><button class="btn btn-default btn-lg btn-checkout">Preview and Checkout</button></a>

                </div>

            </div>
        </div>
    </div>
</section>
</div>