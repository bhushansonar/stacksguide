
<div class="set_errors">
    <?php
    $this->load->model('comment_model');
    echo validation_errors();
    if ($this->session->flashdata('flash_message')) {
        echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
        echo '<a class="close" data-dismiss="alert">&#215;</a>';
        echo $this->session->flashdata("flash_message");
        echo '</div>';
    }
    ?>
</div>
<div class="part_main">
    <section>
        <div class="main_part">
            <div class="blog affilate_main" id="container">
<!--                <section id="blog_leftbar">-->
                <div class="blog_leftbar_inner">
                    <div class="page_blogtitle">
                        <h1 class="stacsguide_tit font-nor">Keeping you updated on our Blog on StacksGuide</h1>
                        <hr class="sg_border">
                    </div>
                    <?php //$language_shortcode = $this->session->userdata('language_shortcode'); ?>
                    <?php
                    for ($i = 0; $i < count($blog); $i++) {

                        $blog_title = $blog[$i]['title'];
                        $blog_description = $blog[$i]['description'];
                        ?>
                        <article class="blog_article">
                            <div class="header_blogtitle">
                                <div class="blogtitle"><h2><a rel="bookmark" title="Permalink to <?php echo $blog_title ?>" href="<?php echo site_url('blog/specific') . "/" . url_title($blog_title, 'dash', true) . "/" . $blog[$i]['blog_id'] ?>"><?php echo $blog_title ?></a></h2><div class="date_time"><span><?php //echo _clang(PUBLISHED_ON_B);                                        ?>Publish on </span> <?php echo date('j, F Y', strtotime($blog[$i]['date'])) ?></div></div>
                                <?php
                                $comment_c = $this->comment_model->get_comment('', 'comment_id', 'DESC', '', '', '', array("comment.blog_id", "comment.status"), array($blog[$i]['blog_id'], "Active"));
                                ?>
                                <div class="comments-link"><a title="Comment on How to reduce noise?" href="<?php echo site_url('blog/specific') . "/" . url_title($blog_title, 'dash', true) . "/" . $blog[$i]['blog_id'] ?>"><?php echo count($comment_c); ?><!--<span class="leave-reply">Reply</span>--></a></div>
                            </div>

                            <div class="blog_content">
                                <div class="blog_content_inner_left">
                                    <?php if (@getimagesize((site_url('uploads') . "/blog/" . $blog[$i]['featured_image']))) { ?>
                                        <img alt="Feature Image" width="80" class="feature_img_blog" src="<?php echo site_url('uploads') . "/blog/" . $blog[$i]['featured_image'] ?>"  />

                                        <?php
                                        $width = 'width:581px;';
                                    } else {

                                        $width = 'width:600px;';
                                    }
                                    ?>
                                </div>

                                <div class="blog_content_inner_right">
                                    <div><?php echo get_excerpt($blog_description, 250, '...'); ?></div>
                                    <div ><a style="padding-top:5px;" href="<?php echo site_url('blog/specific') . "/" . url_title($blog_title, 'dash', true) . "/" . $blog[$i]['blog_id'] ?>" class="more-link">more</a></div>
                                </div>  <!--</p>-->
                            </div>
                        </article>
                        <hr class="sg_border">
                    <?php } ?>

                </div>
                <?php echo '<div class="pagination">' . $link . '</div>'; ?>
                <!--                </section>-->

                <?php //include_once("includes/sidebars/blog_sidebar.php");  ?>

            </div>

        </div>
    </section>
</div>
</div>
