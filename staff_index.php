<?php
  $page_title = "Menu";
  require_once("../../private/initialize.php");
  require_login_staff();
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/inside_index.css"); ?>">
 <div class="index">
   <a href="complain/complain.php" style="width: 40%;background-color: #FF3A3A">
     Complaint
     <img src="<?php echo url_for("/images/complain_white.svg"); ?>" alt="" style="margin: 10px auto;">
   </a>
   <a href="notice/notice.php" style="width: 40%;background-color: #07CAB6">
     Notice
     <img src="<?php echo url_for("/images/notice_white.svg"); ?>" alt="" style="margin: 10px auto;">
   </a>
 </div>
<?php
  require_once(SHARED_PATH."/footer.php");
 ?>
