<?php
$CI = & get_instance();
//$CI->load->model('Imap_model');
//$m_count = $CI->Imap_model->get_mail_count();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Stacks Guide Admin - <?php echo ucfirst($this->uri->segment(2)); ?></title>
        <meta charset="utf-8">
        <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
        <script type="text/javascript"> var base_url = '<?php echo base_url(); ?>'</script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">

      <a class="brand"><!--<img src="<?php echo base_url(); ?>assets/images/admin/logo.png" />-->Stacks Guide Admin</a>
                    <div class="brand logininfo">logged in as <a href="<?php echo base_url(); ?>admin/user/update/<?php echo $this->session->userdata['user_id'] ?>"><?php echo $this->session->userdata['username']; ?></a>&nbsp; <a href="<?php echo base_url(); ?>admin/logout">Logout</a></div>
                    <ul class="nav">
                        <li <?php if ($this->uri->segment(2) == 'dashboard') {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">StacksGuide<b <?php //echo ($m_count > 0) ? 'style="margin-top:11px"' : '' ?> class="caret"></b></a>
                            <?php // if($m_count > 0){?>
                            <div class="tip_div"><span class="tip"><span class="tip_in"><?php //echo $m_count; ?></span></span></div>
<?php // } ?>
                            <ul class="dropdown-menu">
                                <li <?php if ($this->uri->segment(2) == 'category') {
    echo 'class="active"';
} ?>>
                                    <a href="<?php echo base_url(); ?>admin/category">Category</a>
                                </li>

                            </ul>
                        </li>


                        <li <?php if ($this->uri->segment(2) == 'user') {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url(); ?>admin/user">User</a>
                        </li>

<?php /* ?> <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
  <ul class="dropdown-menu">

  </ul>
  </li><?php */ ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>