<?php
  require_once("../../../private/initialize.php");
  $page_title = "Add admin";
  if(is_post_request()){
    $admin['name']=$_POST['name'];
    $admin['email']=$_POST['email'];
    $admin['password']=$_POST['password'];
    $admin['phone']=$_POST['number'];
    $result = insert_admin($admin);
    if($result){
      redirect_to(url_for("admin/admin/admin.php"));
    }
  }
  require_once(SHARED_PATH."/admin_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/form.css"); ?>">
 <div class="wrap">
   <h1><img class='head_icon' src="<?php echo url_for("/images/add_user.svg"); ?>">Add admin</h1>
   <form action="#" method="post" onsubmit="return validate_form()">
     <label for="name">Name<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_name(this)" type="text" name="name" id="name" value="">
       <span id="name_error" class="error hide"></span>
     <label for="email">Email<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_email(this)" type="text" name="email" id="email" value="">
       <span id="email_error" class="error hide"></span>
     <label for="number">Mobile Number<span class='required'>*</span></label>
       <input class='login-form'  onkeyup="validate_number(this)" type="text" name="number" id="number" value="">
       <span id="number_error" class="error hide"></span>
     <label for="password">Password<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_password(this)" type="password" name="password" id="password" value="">
       <span id="password_error" class="error hide"></span>
     <label for="confirm"> Confirm Password<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_confirm(this)" type="password" name="confirm" id="confirm" value="">
       <span id="confirm_error" class="error hide"></span>
     <input class="btn" type="submit" value="Submit"></input>
   </form>
 </div>
 <script src="<?php echo url_for("/script/validation_functions.js");?>" defer async>
 </script>
 <?php
  require_once(SHARED_PATH."/footer.php");
  ?>
