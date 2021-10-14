<?php
  require_once("../../../private/initialize.php");
  require_login_staff();
  $page_title = "Delete Notice";
  if(is_get_request()){
    $id = $_GET['id'];
    $notice = find_notice_by_nid($id);
  }
  else if(is_post_request()){
    $ans = $_POST['ans'];
    // echo $ans[4];
    $nid = $_POST['nid'];
    if($ans['4']=='Y'){
      $result = delete_notice($nid);
    }else{
      redirect_to(url_for('/staff/notice/notice.php'));
    }
    if($result){
      redirect_to(url_for('/staff/notice/notice.php'));
    }
  }else{
    redirect_to(url_for('/staff/notice/notice.php'));
  }

  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/delete.css") ?>">
 <div class="wrap">
   <h2 class='delete-top'>
     Delete this notice?
   </h2>
   <div class="notice">
     <div class="notice-top">
       <?php echo $notice['date']." : ";
              echo $notice['title'];
        ?>
      </div>
        <p class="notice-content">
          <?php echo $notice['content'];
          echo "</br><a class='notice_map' href='";
          echo url_for("/staff/notice/show_notice.php?id=".$notice['nid'])."'>";
          echo "<img class='notice_map' src='";
          echo url_for('/images/map_marker.svg');
          echo "'></a>";
          ?>
        </p>
     </div>
     <form class='delete-form' action="delete_notice.php" method="post">
       <input type="hidden" name="nid" value="<?php echo $id; ?>">
       <input type='submit' class='effect' value='&#10004; Yes' name='ans' style="background-color: green;">
			 <input type='submit' class='effect' value='&#10006; No' name='ans' style="background-color: red;">
     </form>
   </div>
 </div>
 <?php
  require_once(SHARED_PATH."/footer.php");
  ?>
