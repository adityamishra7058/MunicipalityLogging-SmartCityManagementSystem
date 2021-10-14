<?php
  require_once("../../../private/initialize.php");
  $page_title = "Manage Staff";
  require_login_admin();
  $result = find_all_staff();
  require_once(SHARED_PATH."/admin_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/manage.css"); ?>">
 <div class="manage-bar">
   <img src="<?php echo url_for("/images/search.svg"); ?>"  class="icon" alt="">
   <input type="text" name="search" id="search" value="" placeholder="Search Staff.." class="search">
   <a href="add_staff.php" class="add-btn">+ Add Staff</a>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
 </script>
 <script>
   $("document").ready(function(){
     $("#search").keyup(function(){
       let value = $(this).val();
       if(value!=''){
         value = value.toUpperCase();
         $("tbody tr").each(function(){
           let flag = 0;
           $(".data",this).each(function(){
             let txt = $(this).text();
             txt = txt.toUpperCase();
             if(txt.includes(value)){
               flag++;
               $(this).parent().css("display","table-row");
             }
           });
           if(flag==0){
             $(this).hide();
           };
         });

       }else{
         $("tr").each(function(){
           $(this).css("display","table-row");
         });
       };
     });
   });
 </script>
 <table style="margin-bottom: 250px;">
   <thead class="fk">
     <th>SID</th>
     <th>Name</th>
     <th>Email</th>
     <th>Mob. Number</th>
     <th></th>
   </thead>
   <?php
    while($row=mysqli_fetch_assoc($result)){
      echo "<tr>";
      echo "<td class='data'>".$row['sid']."</td>";
      echo "<td class='data'>".$row['name']."</td>";
      echo "<td class='data'>".$row['email']."</td>";
      echo "<td class='data'>".$row['phone']."</td>";
      echo "<td>";
      echo "<div class='edit'>";
      echo "<a href='".url_for("/admin/staff/edit_staff.php?id=".$row['sid'])."' style='background-color:green'><img src='";
      echo url_for("/images/edit.svg");
      echo "'></a>";
      echo "<a href='".url_for("/admin/staff/change_password.php?id=".$row['sid'])."' style='background-color:gold'><img src='";
      echo url_for("/images/key.svg");
      echo "'></a>";
      echo "<a href='".url_for("/admin/staff/delete_staff.php?id=".$row['sid'])."' style='background-color:red'><img src='";
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
