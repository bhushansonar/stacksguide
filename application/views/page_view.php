<div class="part_main">
    <section id="container">
        <div class="main_part">
            <div class="affilate_main">
                <h1 class="stacsguide_tit font-nor"><?php echo $block_name_title;?></h1>
                <hr class="sg_border">
                <div class="featurd_main" style="margin: 20px 0 10px 2px; padding: 13px;">
                    <div class="set_errors">
                        <?php
                        echo validation_errors();
                        if ($this->session->flashdata('flash_message')) {
                            echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
                            echo '<a class="close" data-dismiss="alert">&#215;</a>';
                            echo $this->session->flashdata("flash_message");
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <?php echo cms_block($cms_block); ?>
                </div>
                <hr class="sg_border">
            </div>
        </div>
    </section>
</div>
</div>
</div>