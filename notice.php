<?php
  $page_title = "Notice Board";
  require_once("../../../private/initialize.php");
  require_login_staff();
  require_once(SHARED_PATH."/staff_header.php");
  $result = find_all_notice();
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/notice.css"); ?>">
 <div class="manage-bar">
   <img src="<?php echo url_for("/images/search.svg"); ?>"  class="icon" alt="">
   <input type="text" name="" id="search" value="" placeholder="Search Notice.." class="search">
   <a href="add_notice.php" class="add-btn">+ Add Notice</a>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
 </script>
 <script>
   $("document").ready(function(){
       $("#search").keyup(function(){
         let value = $(this).val();
         if(value!=''){
           value = value.toUpperCase();
           $(".notice").each(function(){
             let txt = $(this).text();
             txt = txt.toUpperCase();
             if(txt.includes(value)){
               $(this).show();
             }else{
               $(this).hide();
             }
           });
         }else{
           $(".notice").each(function(){
             $(this).show();
           });
         }
       });
   });
 </script>
 <div class="notice-board">
   <h2 class="notice-top">
     Notice Board
   </h2>
     <?php
       while($row=mysqli_fetch_assoc($result)){
           echo "<article class='notice'>";
           echo "<h4 class='notice-title'>";
           echo $row['date']." : ";
           echo $row['title'];
           echo "</h4>";
           echo "<p class='notice-content'>";
           echo $row['content'];
           echo "<div class='edit'>";
           echo "<a href='".url_for("/staff/notice/delete_notice.php?id=".$row['nid'])."' style='background-color:red'><img src='";
           echo url_for("/images/delete.svg");
           echo "'></a>";
           echo "<a href='".url_for("/staff/notice/edit_notice.php?id=".$row['nid'])."' style='background-color:green'><img src='";
           echo url_for("/images/edit.svg");
           echo "'></a>";
           echo "<a href='".url_for("/staff/notice/show_notice.php?id=".$row['nid'])."' style='background-color:black'><img src='";
           echo url_for("/images/map_marker.svg");
           echo "'></a>";
           echo "</div>";
           echo "</p>";
           echo "</article>";
       }
      ?>
 </div>
<?php
  require_once(SHARED_PATH."/footer.php");
 ?>
