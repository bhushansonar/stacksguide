<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li>
            <?php echo ucfirst($this->uri->segment(2)); ?>
    </ul>

    <div class="page-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
        <h3 style="margin-top:5px;">Welcome <a href="<?php echo base_url(); ?>admin/user/update/<?php echo $this->session->userdata['user_id'] ?>"><?php echo $this->session->userdata['username']; ?></a> to StacksGuide Admin.</h3>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/category" title="Category">
            <img alt="Add Category" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Category</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/escorts" title="Escorts">
            <img alt="Add Escorts" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Escorts</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/user" title="User">
            <img alt="Add User" src="<?php echo base_url(); ?>/assets/img/admin/ico/user.png" />
            <span>Users</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/cms" title="CMS">
            <img alt="Add CMS" src="<?php echo base_url(); ?>/assets/img/admin/ico/static_pageico.png" />
            <span>CMS</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/advertisement" title="Advertisement">
            <img alt="Add Advertisement" src="<?php echo base_url(); ?>/assets/img/admin/ico/advertisement.png" />
            <span>Advertisement</span>
        </a>
    </div>
    <!--    <div class="quickLink">
            <a href="<?php //echo base_url();                                     ?>admin/affiliates" title="affiliates">
                <img alt="Add Category" src="<?php //echo base_url();                                     ?>/assets/img/admin/ico/categoryico.png" />
                <span>Affiliates</span>
            </a>
        </div>-->

    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/country" title="country">
            <img alt="Add Country" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Country</span>
        </a>
    </div>

    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/state" title="state">
            <img alt="Add State" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>State</span>
        </a>
    </div>

    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/city" title="city">
            <img alt="Add City" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>City</span>
        </a>
    </div>

    <!--    <div class="quickLink">
            <a href="<?php //echo base_url();                                     ?>admin/blog" title="Blog">
                <img alt="Add Blog" src="<?php //echo base_url();                                     ?>/assets/img/admin/ico/blog_icon.png" />
                <span>Blog</span>
            </a>
        </div>-->
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/external_link" title="country">
            <img alt="Add External Link" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>External Link</span>
        </a>
    </div>

    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/events" title="events">
            <img alt="Add Events" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Events</span>
        </a>
    </div>

    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/webmag" title="country">
            <img alt="Add External Link" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Webmag</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/build_ads" title="Profile View">
            <img alt="Profile View" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Profile View</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/webcam" title="WebCam View">
            <img alt="WebCam View" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>WebCam View</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/warning_disclaimer" title="Warning Disclaimer">
            <img alt="Warning Disclaimer" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png" />
            <span>Warning Disclaimer</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/footer" title="Footer">
            <img alt="Footer" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png"/>
            <span>Footer</span>
        </a>
    </div>
    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/membership_price" title="Membership Price">
            <img alt="Footer" src="<?php echo base_url(); ?>/assets/img/admin/ico/categoryico.png"/>
            <span>Membership Price</span>
        </a>
    </div>

    <div class="quickLink">
        <a href="<?php echo base_url(); ?>admin/blog" title="Blog">
            <img alt="Add Blog" src="<?php echo base_url(); ?>/assets/img/admin/ico/blog_icon.png" />
            <span>Blog</span>
        </a>
    </div>
    <div style="position: relative">
        <div class="untreated_comment_div"><span class="untreated_commen"><span class="untreated_commen_in"><?php echo $untreated_comment; ?></span></span></div>
    </div>
    <div  class="quickLink">
        <a href="<?php echo base_url(); ?>admin/comment" title="Comment">
            <img alt="View Comment" src="<?php echo base_url(); ?>/assets/img/admin/ico/commentico.png" />
            <span>Comment</span>

        </a>
    </div>
</div>


<?php //echo '<pre>';print_r($this->session->userdata);?>

