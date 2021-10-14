<?php
  $page_title = "Menu";
  require_once("../../private/initialize.php");
  require_login_admin();
  require_once(SHARED_PATH."/admin_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/inside_index.css"); ?>">
 <div class="index">
   <a href="complain/complain.php" style="background-color: #FF3A3A">
     Complaint
     <img src="<?php echo url_for("/images/complain_white.svg"); ?>" alt="">
   </a>
   <a href="notice/notice.php" style="background-color: #07CAB6">
     Notice
     <img src="<?php echo url_for("/images/notice_white.svg"); ?>" alt="">
   </a>
   <a href="staff/staff.php" style="background-color: green">
     Staff
     <img src="<?php echo url_for("/images/staff_white.svg"); ?>" alt="">
   </a>
   <!-- <a href="admin.php" style="background-color: brown">
     Admin
     <img src="<?php echo url_for("/images/admin_white.svg"); ?>" alt="">
   </a> -->
 </div>
<?php
  require_once(SHARED_PATH."/footer.php");
 ?>
