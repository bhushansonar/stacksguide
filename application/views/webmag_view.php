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
        width: 950px;
    }
    .content_view1 {
        background: linear-gradient(to bottom, rgba(2, 20, 42, 1) 0%, rgba(1, 38, 81, 0) 40%, rgba(0, 64, 139, 0) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-radius: 5px;
        display: inline-block;
        padding: 23px 0 0;
        width: 950px;
    }
</style>
<!--<section>-->
<!--    <div class="main_part">
        <div class="content_view">-->

<div class="part_main">
    <section>
        <div class="main_part">
            <div class="affilate_main">
                <h1 class="stacsguide_tit font-nor">Coming Events </h1>
                <hr class="sg_border">
                
                <?php foreach ($webmag as $key => $row) {
                        ?>
                
                <div class="featurd_main" style="margin: 20px 0 10px 9px; width:99%;">
                    
                     <div style="float:left; width:10%;">
                   <?php $webmag_id = $row['webmag_id']; ?>
                	<a href="<?php echo base_url('webmag/getFullView/'.$webmag_id); ?>"><img src="<?php echo base_url(); ?>uploads/webmag/<?php echo $row['webmag_img'] ?>" alt="" /></a>
                </div> 
                    <div class="featurd_cantain" style="margin: 0 2%;">
                        <h4 class="featurd_gictit">
                            <a href="<?php echo base_url('webmag/getFullView/'.$webmag_id); ?>"><?php echo $row['webmag_title'] ?></a>
                        </h4>
                        <div style="font-size: 14px; height:8%;"class="featurd_date">
                           <?php echo $row['webmag_description'] ?>
                        </div>
                    </div>
                      
                </div>
                <?php } ?>   
                <hr class="sg_border">

            </div>
    </section>
</div>
</div>
