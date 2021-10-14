<?php
  require_once("../../../private/initialize.php");
  $page_title = "Manage Staff";
  require_once(SHARED_PATH."/admin_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/manage.css"); ?>">
 <div class="manage-bar">
   <img src="<?php echo url_for("/images/search.svg"); ?>"  class="icon" alt="">
   <input type="text" name="" value="" placeholder="Search Admin.." class="search">
   <a href="add_admin.php" class="add-btn">+ Add Admin</a>
 </div>
 <table>
   <thead>
     <th>AID</th>
     <th>Name</th>
     <th>Email</th>
     <th>Mob. Number</th>
     <th></th>
   </thead>
   <?php
    for($i=0;$i<20;$i++){
      echo "<tr>";
      echo "<td>$i</td>";
      echo "<td>Name</td>";
      echo "<td>name@gmail.com</td>";
      echo "<td>0123456789</td>";
      echo "<td>";
      echo "<div class='edit'>";
      echo "<a href='".url_for("/admin/admin/edit_admin.php")."' style='background-color:green'><img src='";
      echo url_for("/images/edit.svg");
      echo "'></a>";
      echo "<a href='#' style='background-color:red'><img src='";
      echo url_for("/images/delete.svg");
      echo "'></a>";
      echo "</div>";
      echo "</td>";
      echo "</tr>";
    }
    ?>
 </table>
 <?php
 require_once(SHARED_PATH."/footer.php");
  ?>
