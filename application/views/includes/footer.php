<footer>
    <div class="foot_main">
        <div class="foot">
            <div class="foot_nav">
                <h3 class="legal3">Legal</h3>
                <hr class="foot_br1" />
                <hr class="foot_br2" />
                <ul>
                    <li><a href="<?php echo site_url('privacy') ?>">Privacy</a></li>
                    <li><a href="<?php echo site_url('term') ?>">Terms & Conditions</a></li>
                    <li><a href="<?php echo site_url('about') ?>">About Stacks</a></li>
                    <!--                    <li><a href="#">2257 Exemption</a></li>
                                        <li><a href="#">DMCA/Photo Complaints</a></li>
                                        <li><a href="#">Trademarks/IP</a></li>
                                        <li><a href="#">Report Abuse</a></li>
                                        <li><a href="#">Stacks Authenticated</a></li>-->
                </ul>
            </div>
            <div class="foot_nav">
                <h3 class="legal3">Resources</h3>
                <hr class="foot_br1" />
                <hr class="foot_br2" />
                <ul>
                    <!--                    <li><a href="#">For Entertainers</a></li>
                                        <li><a href="#">Advertise</a></li>
                                        <li><a href="#">For Webmasters</a></li>
                                        <li><a href="#">Stacks Adult Advertising</a></li>
                                        <li><a href="#">For Viewers:</a></li>
                                        <li><a href="#">FAQ's & Help</a></li>-->
                    <li><a href="<?php echo site_url('contactus') ?>">Contact</a></li>

                </ul>
            </div>
            <div class="foot_nav">
                <h3 class="legal3">My Stacks Guide</h3>
                <hr class="foot_br1" />
                <hr class="foot_br2" />
                <ul>
                    <li><a href="<?php echo site_url('learn') ?>">Learn More</a></li>
                    <!--                    <li><a href="#">Login</a></li>
                                        <li><a href="#">Signup</a></li>
                                        <li><a href="#">Signup</a></li>
                                        <li><a href="#">Signup</a></li>
                                        <li><a href="#">Signup</a></li>-->
                </ul>
            </div>
            <div class="foot_nav">
                <h3 class="legal3">Explore Stacks</h3>
                <hr class="foot_br1" />
                <hr class="foot_br2" />
                <ul>
                    <li><a href="<?php echo site_url('home') ?>">Stacks.com</a></li>
                    <!--                    <li><a href="#">Stacks Locations</a></li>
                                        <li><a href="#">Stacks Transsexuals</a></li>
                                        <li><a href="#">Stacks Cams</a></li>
                                        <li><a href="#">Casual Sex</a></li>
                                        <li><a href="#">Shemale Dating</a></li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="foot_copy">
        <div class="foot_reserve">
            <?php
            $ci = & get_instance();
            $ci->load->model('footer_model');
            $footerContent = $ci->footer_model->get_footer_front();
            foreach ($footerContent as $key => $footer) {
                echo $footer['title'];
            }
            ?>
        </div>
    </div>
</footer>
</div>
</div>
<script src = "<?php echo base_url(); ?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nav.js"></script>
<script src="<?php echo base_url(); ?>assets/js/responsive-nav.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fixed-responsive-nav.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>

<script type="text/javascript">

    var parentAccordion = new TINY.accordion.slider("parentAccordion");
    parentAccordion.init("acc", "h3", 0, 1);

    var nestedAccordion = new TINY.accordion.slider("nestedAccordion");
    nestedAccordion.init("nested", "h3", 0, 1, "acc-selected");

</script>
<!--

<script src="<?php //echo base_url();                                ?>assets/js/fastclick.js"></script>
<script src="<?php //echo base_url();                                ?>assets/js/scroll.js"></script>
<script src="<?php //echo base_url();                                ?>assets/js/fixed-responsive-nav.js"></script>


-->
</body>
</html>
