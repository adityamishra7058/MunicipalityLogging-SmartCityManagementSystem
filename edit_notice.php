<?php
  require_once("../../../private/initialize.php");
  require_login_staff();
  $page_title = "Edit Notice";
  $date = date("Y-m-d");
  if(is_get_request()){
    $id = $_GET['id'];
    $result = find_notice_by_nid($id);
  }else if(is_post_request()){
    $notice['nid'] = $_POST['nid'];
    $notice['date'] = $_POST['date'];
    $notice['title'] = $_POST['title'];
    $notice['content'] = $_POST['content'];
    $notice['lat'] = $_POST['lat'];
    $notice['lng'] = $_POST['lng'];
    $result = update_notice($notice);
    if($result){
      redirect_to(url_for('/staff/notice/notice.php'));
    }
  }else{
    redirect_to(url_for('/staff/notice/notice.php'));
  }
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/notice_form.css"); ?>">
 <script src="https://apis.mapmyindia.com/advancedmaps/v1/kys39lfp58zmqynjubg41hra87osqulb/map_load?v=1.3"></script>
 <div class="wrap">
   <h1><img class='head_icon' src="<?php echo url_for("/images/notice.svg"); ?>">Edit Notice</h1>
   <form action="#" method="post" onsubmit="return validate_notice()">
     <label for="title">Title<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_title(this)" type="text" name="title" id="title" value="<?php echo $result['title']; ?>">
       <span id="title_error" class="error hide"></span>
     <label for="content">Content<span class='required'>*</span></label>
       <textarea cols="10" rows="8" class='login-form' onkeyup="validate_content(this)" name="content" id="content" value="<?php echo $result['content']; ?>"><?php echo $result['content']; ?></textarea>
       <span id="content_error" class="error hide"></span>
         <div id="map">
         </div>
        <input type='hidden' name="lat" id="lat" value="">
        <input type='hidden' name="lng" id="lng" value="">
        <input type='hidden' name="nid" id="lng" value="<?php echo $id; ?>">
        <input type='hidden' name="date" value="<?php echo $date; ?>">
     <input class="btn" type="submit" value="Submit"></input>
   </form>
 </div>
 <script src="<?php echo url_for("/script/notice_form.js");?>" defer async>
 </script>
 <script defer async>
   var map=new MapmyIndia.Map("map",{ center:[<?php echo $result['lng']; ?>,<?php echo $result['lat']; ?>],zoomControl: true,hybrid:true });
   var full_path = "http://localhost/mun_log/public";
   var icon = L.icon({
    iconUrl: full_path + '/images/map_marker.svg',
    iconRetinaUrl: full_path + '/images/map_marker.svg',
    iconSize: [45, 45],
    popupAnchor: [0,-15]
  });
   var mk =new L.marker([<?php echo $result['lng']; ?>,<?php echo $result['lat']; ?>],{icon: icon,draggable: true, title: ""});
   mk.addTo(map);
   map.setZoom(17);
   function mapmyindia_removeMarker() {
     map.removeLayer(mk);
     delete mk;
   }
   map.on("dblclick",function(e){
     mapmyindia_removeMarker();
     mk =new L.marker(e.latlng,{icon:icon,draggable: true, title: "Submitted Location"});
     mk.addTo(map);
     // alert(e.latlng);
   });
   function getLocation() {
     lat.value = mk._latlng.lat;
     lng.value = mk._latlng.lng;
   }
 </script>
 <?php
  require_once(SHARED_PATH."/footer.php");
  ?>
