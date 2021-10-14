<?php
  require_once("../../../private/initialize.php");
  require_login_staff();
  $page_title = "Show Notice";
  if(is_get_request()){
    $id = $_GET['id'];
    $result = find_notice_by_nid($id);
    // print_r($result);
  }else{
    redirect_to(url_for('/general/index.php'));
  }
  // print_r($result);
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for('/stylesheets/show_map.css') ?>">
  <div id="map" style="margin-top:76px">

  </div>
  <script src="https://apis.mapmyindia.com/advancedmaps/v1/kys39lfp58zmqynjubg41hra87osqulb/map_load?v=1.3">
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
    var mk =new L.marker([<?php echo $result['lng']; ?>,<?php echo $result['lat']; ?>],{icon: icon,draggable: false, title: ""});
    mk.addTo(map);
    map.setZoom(17);
    mk.bindPopup("<table class='pop' style=\'font-family: \'Montserrat\',sans-serif;font-size: 20px;border-radius: 30px;border: 3px dashed green;'>"+
      "<tr><td><strong>NID </strong></td><td><?php echo ":".$result['nid']; ?></td></tr>"+
      "<tr><td><strong>Title </strong></td><td><?php echo ":".$result['title']; ?></td></tr>"+
      "<tr><td><strong>Date </strong></td><td><?php echo ":".$result['date']; ?></td></tr>"+
      "<tr><td style='vertical-align:top'><strong>Description </strong></td><td><?php echo ":".$result['content']; ?></td></tr>"+
    "</table>");
    mk.on('mouseover',function(){
      mk.openPopup();
    })
  </script>
 <?php
 require_once(SHARED_PATH."/footer.php");
  ?>
