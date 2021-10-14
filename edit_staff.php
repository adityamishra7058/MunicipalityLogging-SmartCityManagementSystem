<?php
  require_once("../../../private/initialize.php");
  $page_title = "Edit Staff";
  require_login_staff();
    $id = $_SESSION['sid'];
    $result = find_staff_by_sid($id);
  if(is_post_request()){
    $staff['sid'] = $_POST['sid'];
    $staff['name'] = $_POST['name'];
    $staff['email'] = $_POST['email'];
    $staff['phone'] = $_POST['number'];
    $result = update_staff($staff);
    if($result){
      redirect_to(url_for('/staff/staff_index.php'));
    }
  }
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/form.css"); ?>">
 <div class="wrap">
   <h1><img class='head_icon' src="<?php echo url_for("/images/edit_user.svg"); ?>">Edit staff: <?php echo $result['sid']; ?></h1>
   <form action="edit_staff.php" method="post" onsubmit="return validate_form()">
     <input type="hidden" name="sid" value="<?php echo $id; ?>">
     <label for="name">Name<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_name(this)" type="text" name="name" id="name" value="<?php echo $result['name']; ?>">
       <span id="name_error" class="error hide"></span>
     <label for="email">Email<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_email(this)" type="text" name="email" id="email" value="<?php echo $result['email']; ?>">
       <span id="email_error" class="error hide"></span>
     <label for="number">Mobile Number<span class='required'>*</span></label>
       <input class='login-form'  onkeyup="validate_number(this)" type="text" name="number" id="number" value="<?php echo $result['phone']; ?>">
       <span id="number_error" class="error hide"></span>
     <input class="btn" type="submit" value="Submit"></input>
   </form>
 </div>
 <script src="<?php echo url_for("/script/validation_functions.js");?>" defer async>
 </script>
 <?php
  require_once(SHARED_PATH."/footer.php");
  ?>
