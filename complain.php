<?php
  require_once("../../../private/initialize.php");
  require_login_staff();
  $page_title = "Manage Complain";
  if(is_post_request()){
    update_complain($_POST['cid'],$_POST['status']);
  }
  $result = find_all_complain_admin();
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/complain.css"); ?>">
 <div class="manage-bar">
   <img src="<?php echo url_for("/images/search.svg"); ?>"  class="icon" alt="">
   <input type="text" name="search" id='search' value="" placeholder="Search Complain.." class="search">
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
 </script>
 <script>
   $("document").ready(function(){
     $("#search").keyup(function(){
       let value = $(this).val();
       if(value!=''){
         value = value.toUpperCase();
         $("tr:odd").each(function(){
           let flag = 0;
           $(".data",this).each(function(){
             let txt = $(this).text();
             txt = txt.toUpperCase();
             if(txt.includes(value)){
               flag++;
               $(this).parent().css("display","table-row");
             }
           });
           let txt = $("select option:selected",this).text();
           txt = txt.toUpperCase();
           // console.log(txt);
           if(txt.includes(value)){
             flag++;
             $(this).css("display","table-row");
           };
           txt = $(this).next().text();
           txt = txt.toUpperCase();
           if(txt.includes(value)){
             flag++;
             $(this).css("display","table-row");
           };
           if(flag==0){
             $(this).hide();
           };
         });

       }else{
         $("tr:odd").each(function(){
           $(this).show();
           $(this).css("display","table-row");
         });
       };
     });
   });
 </script>
 <table>
   <thead>
     <th>CID</th>
     <th>Date</th>
     <th>Type</th>
     <th>Location</th>
     <th>Status</th>
     <th></th>
     <th></th>
   </thead>
 <?php
 $i=0;
 while($row = mysqli_fetch_assoc($result)){
   echo "<tr>";
   echo "<td class='data'>".$row['cid']."</td>";
   echo "<td class='data'>".$row['date']."</td>";
   echo "<td class='data'>".$row['type']."</td>";
   echo "<td>";
   echo "<a href='";
   echo url_for("/staff/complain/show_complain.php?id=".$row['cid'])."' class='map_marker'><img src='";
   echo url_for("/images/map_marker.svg");
   echo "'></a>";
   echo "</td>";
   echo "<td>";
   echo "<form method='post' action='complain.php'>";
   echo "<select name='status' onchange='change_color(this)' class='selection'>";
   echo "<option value='0' style='color:red'";
   if($row['status']=='0'){
     echo "selected";
   }
   echo ">Received</option>";
   echo "<option value='1' style='color:brown'";
   if($row['status']=='1'){
     echo "selected";
   }
   echo ">Verified</option>";
   echo "<option value='2' style='color:blue'";
   if($row['status']=='2'){
     echo "selected";
   }
   echo ">On the Way</option>";
   echo "<option value='3' style='color:green'";
   if($row['status']=='3'){
     echo "selected";
   }
   echo ">Solved</option>";
   echo "</select>";
   echo "</td>";
   echo "<td class='$i' onclick='show(this)' style='color:green;font-size:23px;font-weight:bold;'>";
   echo "+ Expand</td>";
   echo "<td>";
   echo "<input type='hidden' name='cid' value='";
   echo $row['cid']."'>";
   echo "<input type='submit' class='submit-btn' value='Apply'>";
   echo "</form>";
   echo "</td>";
   echo "</tr>";
   echo "<tr class='expand' id='$i' style='text-align:left'>";
   echo "<td colspan='8' style='border: 2px solid brown'>";
   echo "<p style='padding:7px;margin:5px'>";
   echo $row['description']."</br>";
   echo "</p>";
   echo "<p style='text-align:left;padding:5px;font-size:18px;margin:5px'>";
   echo "<strong>Name : </strong><span>".$row['name']."</span></br>";
   echo "<strong>Mobile Number : </strong><span>".$row['phone']."</span></br>";
   echo "</p>";
   echo "</td>";
   echo "</tr>";
   $i++;
 }
  ?>
</table>
<script defer async>
  function change_color(x){
    switch (x.value) {
      case '0':
        x.style.color='red';
        break;
      case '1':
        x.style.color='brown';
        break;
      case '2':
        x.style.color='blue';
        break;
      case '3':
        x.style.color='green';
        break;
    }
  }
  let e = document.querySelectorAll('.selection');
  for (let i = 0; i < e.length; i++) {
    change_color(e[i]);
  }
  function show(x){
    let k = x.getAttribute('class');
    let m = document.getElementById(k);
    if(x.innerHTML=='+ Expand'){
      x.innerHTML="- Collapse";
      x.style.padding = "4px";
      x.style.color="red";
      m.style.display="table-row";
    }else{
      x.innerHTML="+ Expand"
      x.style.padding = "8px";
      x.style.color="green";
      m.style.display="none";
    }
    // console.log(m);
  }
</script>
 <?php
 require_once(SHARED_PATH."/footer.php");
  ?>
