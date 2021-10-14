<?php
  require_once("../../../private/initialize.php");
  $page_title = "Edit admin";
  require_login_admin();
    $id = $_SESSION['aid'];
    $result = find_admin_by_aid($id);
  if(is_post_request()){
    $admin['aid'] = $_POST['aid'];
    $admin['name'] = $_POST['name'];
    $admin['email'] = $_POST['email'];
    $admin['phone'] = $_POST['number'];
    $result = update_admin($admin);
    if($result){
      redirect_to(url_for('/admin/admin_index.php'));
    }
  }
  require_once(SHARED_PATH."/admin_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/form.css"); ?>">
 <div class="wrap">
   <h1><img class='head_icon' src="<?php echo url_for("/images/edit_user.svg"); ?>">Edit admin: <?php echo $result['aid']; ?></h1>
   <form action="edit_admin.php" method="post" onsubmit="return validate_form()">
     <input type="hidden" name="aid" value="<?php echo $id; ?>">
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
