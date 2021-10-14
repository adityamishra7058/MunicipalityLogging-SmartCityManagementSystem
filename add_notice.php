<?php
  require_once("../../../private/initialize.php");
  require_login_staff();
  $page_title = "Add Notice";
  $date = date("Y-m-d");
  if(is_post_request()){
    $notice['date'] = $_POST['date'];
    $notice['title'] = $_POST['title'];
    $notice['content'] = $_POST['content'];
    $notice['lat'] = $_POST['lat'];
    $notice['lng'] = $_POST['lng'];
    $result = insert_notice($notice);
    if($result){
      redirect_to(url_for('/staff/notice/notice.php'));
    }
  }
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for("/stylesheets/notice_form.css"); ?>">
 <script src="https://apis.mapmyindia.com/advancedmaps/v1/kys39lfp58zmqynjubg41hra87osqulb/map_load?v=1.3"></script>
 <div class="wrap">
   <h1><img class='head_icon' src="<?php echo url_for("/images/notice.svg"); ?>">Add Notice</h1>
   <form action="add_notice.php" method="post" onsubmit="return validate_notice()">
     <label for="title">Title<span class='required'>*</span></label>
       <input class='login-form' onkeyup="validate_title(this)" type="text" name="title" id="title" value="">
       <span id="title_error" class="error hide"></span>
     <label for="content">Content<span class='required'>*</span></label>
       <textarea cols="10" rows="8" class='login-form' onkeyup="validate_content(this)" name="content" id="content" value=""></textarea>
       <span id="content_error" class="error hide"></span>
         <div id="map">
         </div>
        <input type='hidden' name="lat" id="lat" value="">
        <input type='hidden' name="lng" id="lng" value="">
        <input type='hidden' name="date" value="<?php echo $date; ?>">
     <input class="btn" type="submit" value="Submit"></input>
   </form>
 </div>
 <script src="<?php echo url_for("/script/notice_form.js");?>" defer async>
 </script>
 <script>
 var map=new MapmyIndia.Map("map",{ center:[22.660525381253986,88.34938037402028],zoomControl: true,hybrid:true });
 var lat = document.getElementById("lat");
 var lng = document.getElementById("lng");
 var full_path = "http://localhost/mun_log/public";
 var icon = L.icon({
   iconUrl: full_path + '/images/map_marker.svg',
   iconRetinaUrl: full_path + '/images/map_marker.svg',
   iconSize: [45, 45],
   popupAnchor: [-10, -15]
 });
 var mk =new L.marker([22.660525381253986,88.34938037402028],{draggable: true, title: ""});
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
