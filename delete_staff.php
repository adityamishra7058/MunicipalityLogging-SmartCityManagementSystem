<?php
  require_once("../../../private/initialize.php");
  $page_title = "Delete Staff";
  require_login_admin();
  if(is_get_request()){
    $id = $_GET['id'];
    $result = find_staff_by_sid($id);
  }
  else if(is_post_request()){
    $ans = $_POST['ans'];
    // echo $ans[4];
    $sid = $_POST['sid'];
    if($ans['4']=='Y'){
      $result = delete_staff($sid);
    }else{
      redirect_to(url_for('/admin/staff/staff.php'));
    }
    if($result){
      redirect_to(url_for('/admin/staff/staff.php'));
    }
  }else{
    redirect_to(url_for('/admin/staff/staff.php'));
  }

  require_once(SHARED_PATH."/admin_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/delete.css") ?>">
 <div class="wrap">
   <h2 class='delete-top'>
     Delete Staff?
   </h2>
   <table>
     <tr>
       <td>
         <strong>Name </strong>
       </td>
       <td>:&nbsp;
         <?php echo $result['name']; ?>
       </td>
     </tr>
     <tr>
       <td>
         <strong>Email </strong>
       </td>
       <td>:&nbsp;
         <?php echo $result['email']; ?>
       </td>
     </tr>
     <tr>
       <td>
         <strong>Mobile </strong>
       </td>
       <td>:&nbsp;
         <?php echo $result['phone']; ?>
       </td>
     </tr>
   </table>
     <form class='delete-form' action="delete_staff.php" method="post">
       <input type="hidden" name="sid" value="<?php echo $id; ?>">
       <input type='submit' class='effect' value='&#10004; Yes' name='ans' style="background-color: green;">
			 <input type='submit' class='effect' value='&#10006; No' name='ans' style="background-color: red;">
     </form>
   </div>
 </div>
 <?php
  require_once(SHARED_PATH."/footer.php");
  ?>
