<main>
<!--    <style>body{ overflow-x:hidden}</style>-->
    <div class="set_errors">
        <?php
        $user_id = $this->session->userdata("user_id");
        $username = $this->session->userdata("username");
        if ($user_id) {
            $this->load->model('user_model');
            $get_user_data = $this->user_model->get_user_by_id($user_id);
        }
        $blog_id = $this->uri->segment(4);
        //$user_id = $this->session->userdata("username");
        if ($this->session->flashdata('validation_error_messages')) {
            echo $this->session->flashdata('validation_error_messages');
        }
        echo validation_errors();
        if ($this->session->flashdata('flash_message')) {
            echo '<div class="alert ' . $this->session->flashdata("flash_class") . '">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo $this->session->flashdata("flash_message");
            echo '</div>';
        }
        ?>
    </div>
    <?php
    $blog_title = $blog[0]['title'];
    $blog_description = $blog[0]['description'];
    ?>

    <div class="part_main">
        <section>
            <div class="main_part">
                <div class="affilate_main">
                    <h1 class="stacsguide_tit font-nor">Keeping you updated on our Blog on StacksGuide</h1>
                    <hr class="sg_border">
                    <div class="blog_article">
                        <div class="blogtitle">
                            <h2>
                                <?php echo $blog_title; ?>
                            </h2>
                            <div class="date_time">
                                <span>Posted on</span> <?php echo date("j, F Y", strtotime($blog[0]['date'])) ?></div>
                        </div>

                        <div class="blog_content">
                            <div>
                                <?php if (@getimagesize((site_url('uploads') . "/blog/" . $blog[0]['featured_image']))) { ?>
                                    <img alt="Feature Image" class="feature_img_blog_second" src="<?php echo site_url('uploads') . "/blog/" . $blog[0]['featured_image'] ?>"  />
                                <?php } ?>
                            </div>
                            <div class="blog_content_des">
                                <?php echo $blog_description; ?>
                            </div>
                        </div>
                    </div>
                    <div id="comments">
                        <header id="comments-title">
                            <h3>Comments</h3>
                            <h4><em><?php echo $blog_title ?></em> — <?php echo (!empty($comment_count)) ? $comment_count : "0"; ?> Comments</h4>
                            <?php
//echo '<pre>'; print_r($all_comment);
                            $ci = & get_instance();
                            $ci->load->model('comment_model');
                            $ci->load->model('user_model');
                            ?>
                            <div class="comments_list">
                                <ul>
                                    <?php
                                    echo $all_com = getParentCommentList(0, '', '', 1, '', false, $blog_id);
                                    ?>
                                </ul>
                                <?php
//                            if ($link) {
//                                echo '<div class="pagination">' . $link . '</div>';
//                            }
//
                                ?>
                            </div>
                            <div class="comment_form">
                                <!--                                <h1>Don't be shy, leave me a nice comment!</h1>-->
                                <?php if (!empty($user_id)) { ?>
                                    <div class="logged_in_as">loggin as <em><?php echo $username ?></em></a>
                                        <a href="<?php echo site_url('home/logout') ?>"><em>Logout</em></a></div>
                                <?php } else { ?>
                                    <div class="logged_in_as">If you have a StackGuide account, you can login to comment this article. <a href=""><em><?php echo $username ?></em></a>
                                        <!--                                        <a href="javascript:void(0)" onclick=" popup('signin')"><em>Login</em></a> </div>-->
                                    <?php } ?>
                                    <div class="form comment_form1">
                                        <form action="<?php echo site_url("blog/comment") ?>" name="comment" method="post">
                                            <input type="hidden" id="cmt" value="0" name="parent_id">
                                            <input type="hidden" name="blog_id" value="<?php echo $blog_id ?>" />
                                            <?php if ($user_id) { ?>
                                                <input type="hidden" name="name" value="<?php echo $username ?>" />
                                                <input type="hidden" name="email" value="<?php echo $get_user_data[0]['primary_email'] ?>" />
                                            <?php } else { ?>
                                                <ul style="clear:both;">
                                                    <li>Name</li>
                                                    <li class="textbox_li"><input type="text" size="35" name="name"></li>
                                                </ul>
                                                <ul style="clear:both;">
                                                    <li>E-mail</li>
                                                    <li class="textbox_li">
                                                        <input type="text" size="35" name="email">
                                                    </li>
                                                    <li style="color: #808080;font-size: 11px;font-style: italic;width: 232px;">(Your e-mail address will NOT be published)</li>
                                                </ul>

                                            <?php } ?>
                                            <div id="reply_content">
                                                <div class="reply_to_content commnet_label" style="display: inline-block;width: 500px;">

                                                </div>
                                                <div id="close_btn" style="display: inline-block;">
                                                    <a id="close_content" href="javascript:void(0)"></a>
                                                </div>
                                            </div>
                                            <div style="clear:both;">
                                                <div>
                                                    <label class="commnet_label">Comment:</label>
                                                </div>
                                                <div><textarea class="comment_textarea" style="" name="comment"></textarea></div>
                                            </div>
    <!--                                        <div class="comment_recaptcha"><?php echo $recaptcha_html; ?></div>-->
                                            <p><input type="submit" name="submit" value="submit" class="cmt_button" /></p>
                                        </form>
                                    </div>
                                </div>
                        </header>
                    </div>
                </div>
        </section>
    </div>
</div>

<script type="text/javascript">
    function reply_comment(obj, comment_id) {
        $("#cmt").val(comment_id);
        reply_to = $(obj).parent().siblings('.comment-body').html();
        username = $(obj).parent().siblings().siblings('.aut').html();
        if (reply_to.length > 10)
            reply = reply_to.substring(0, 10);
        str1 = "You replying to <u>" + username + "</u> on ";
        str2 = "Cancle";
        str3 = "...";

        res = str1.concat(reply).concat(str3);

        $('.reply_to_content').html("<h4>" + res + "</h4>");
        $('#close_btn a').html(str2);


        $("#close_content").click(function() {
            $("#cmt").val(0);
            $('.reply_to_content').html("");
            $('#close_btn a').html("");
        });

        $('html, body').animate({
            scrollTop: $('.comment_form').offset().top
        }, 'slow');

    }
</script>
