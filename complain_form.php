<?php
      require_once('../../../private/initialize.php');
      $page_title='Complaint Form';
      require_once(SHARED_PATH.'/header.php');
      $date = date("Y-m-d");
      $complain = [];
      if(is_get_request()){
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];
      }else if(is_post_request()){
        $complain['date'] = $date;
        $complain['name'] = $_POST['name'];
        $complain['phone'] = $_POST['number'];
        $complain['description'] = $_POST['description'];
        $complain['type'] = $_POST['type'];
        $complain['lat'] = $_POST['lat'];
        $complain['lng'] = $_POST['lng'];
        $result = insert_complain($complain);
        if($result){
          redirect_to(url_for('/general/complain/complain.php'));
        }else{
          echo $result;
      }
    }else{
      redirect_to(url_for('/general/index.php'));
    }
?>
<link rel="stylesheet" href="<?php echo url_for("/stylesheets/notice_form.css"); ?>">
<div class="wrap">
  <h1><img class='head_icon' src="<?php echo url_for("/images/complain.svg"); ?>">Write Complaint</h1>
  <form action="complain_form.php" method="post" onsubmit="return validate_complain()">
    <label for="name">Name<span class='required'>*</span></label>
      <input class='login-form' onkeyup="validate_name(this)" type="text" name="name" id="name" value="">
      <span id="name_error" class="error hide"></span>
    <!-- <label for="email">Email<span class='required'>*</span></label>
      <input class='login-form' onkeyup="validate_email(this)" type="text" name="email" id="email" value="">
      <span id="email_error" class="error hide"></span> -->
    <label for="number">Mobile Number<span class='required'>*</span></label>
      <input class='login-form'  onkeyup="validate_number(this)" type="text" name="number" id="number" value="">
      <span id="number_error" class="error hide"></span>
    <label for="type">Type of Complaint:</label>
      <select class="login-form" name="type">
        <option value="ROAD" selected>ROAD</option>
        <option value="CLEANLINESS">CLEANLINESS</option>
        <option value="DRAINAGE">DRAINAGE</option>
      </select>
    <label for="description">Description<span class='required'>*</span></label>
      <textarea cols="10" rows="8" class='login-form' onkeyup="validate_description(this)" name="description" id="description" value=""></textarea>
      <span id="description_error" class="error hide"></span>
      <input type="hidden" name="lng" value="<?php echo $lat; ?>">
      <input type="hidden" name="lat" value="<?php echo $lng;?>">
      <input type="hidden" name="date" value="<?php echo $date; ?>">
    <input class="btn" type="submit" value="Submit"></input>
  </form>
</div>
<script src="<?php echo url_for("/script/complain_form.js");?>" defer async>
</script>
<?php
      require_once(SHARED_PATH.'/footer.php');
 ?>
