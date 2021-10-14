<?php
      require_once('../../private/initialize.php');
      $page_title='Login Option';
      require_once(SHARED_PATH.'/header.php');
?>
<link rel="stylesheet" href="<?php echo url_for('/stylesheets/login_option.css') ?>">
<div class="wrap">
  <a class="option" href="<?php echo url_for('/admin/login.php'); ?>" style="background-color: brown">
    <img class="option_img" src="<?php echo url_for('/images/admin_white.svg')?>">
    </br>
    Admin Login
  </a>
  <a class="option" href="<?php echo url_for('/staff/login.php'); ?>" style="background-color: green">
    <img class="option_img" src="<?php echo url_for('/images/staff_white.svg')?>">
    </br>
    Staff Login
  </a>
</div>
<?php include(SHARED_PATH.'/footer.php'); ?>
