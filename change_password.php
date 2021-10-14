<?php
  require_once("../../../private/initialize.php");
  $page_title = "Change Password";
  require_login_staff();
    $id = $_SESSION['sid'];
    $result = find_staff_by_sid($id);
  if(is_post_request()){
    $staff['sid'] = $id;
    if(password_verify($_POST['old'],$result['pass'])){
      $staff['password'] = $_POST['new'];
      // echo "<script>alert('".$staff['password']."')</script>";
      $result = update_staff_password($staff);
      if($result){
        redirect_to(url_for('/staff/staff_index.php'));
      }
    }else{
      echo "<script>alert('Incorrect Password')</script>";
    }
  }
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/password.css") ?>">
 <div class="wrap">
   <p>Update your Password ?</p>
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
   <form action="change_password.php" method="post" onsubmit="return validate_pass();">
     <label for="old">Old Password<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_old(this)" type="password" name="old" id="old" value="">
       <span id="old_error" class="error hide"></span>
     <label for="new">New Password<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_new(this)" type="password" name="new" id="new_pass" value="">
       <span id="new_error" class="error hide"></span>
     <input type="Submit" name="" value="Change Password">
   </form>
 </div>
 <script src="<?php echo url_for("/script/validation_pass.js");?>" defer async>
 </script>
 <?php
  require_once(SHARED_PATH."/footer.php");
  ?>
