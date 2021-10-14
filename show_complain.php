<?php
  require_once("../../../private/initialize.php");
  require_login_staff();
  $page_title = "Show Complain";
  if(is_get_request()){
    $id = $_GET['id'];
    $result = find_complain_admin_by_cid($id);
    print_r($result);
  }else{
    redirect_to(url_for('/general/index.php'));
  }
  // print_r($result);
  require_once(SHARED_PATH."/staff_header.php");
 ?>
 <link rel="stylesheet" href="<?php echo url_for('/stylesheets/show_map.css') ?>">
   <?php
   $status = "";
   switch($result['status']){
     case '0':
       $status = "<span style='color:red'>Received</span>";
       break;
     case '1':
       $status = "<span style='color:brown'>Verified</span>";
       break;
     case '2':
       $status = "<span style='color:blue'>On the Way</span>";
       break;
     case '3':
       $status = "<span style='color:green'>Solved</span>";
       break;
   }
    ?>
  <div id="map" style="margin-top:18px">

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
      "<tr><td><strong>CID </strong></td><td><?php echo ":".$result['cid']; ?></td></tr>"+
      "<tr><td><strong>Type </strong></td><td><?php echo ":".$result['type']; ?></td></tr>"+
      "<tr><td><strong>Status </strong></td><td><?php echo ":".$status; ?></td></tr>"+
      "<tr><td style='vertical-align:top'><strong>Description </strong></td><td><?php echo ":".$result['description']; ?></td></tr>"+
      "<tr><td><strong>Name </strong></td><td><?php echo ":".$result['name']; ?></td></tr>"+
      "<tr><td><strong>Mob. </strong></td><td><?php echo ":".$result['phone']; ?></td></tr>"+
    "</table>");
    mk.on('mouseover',function(){
      mk.openPopup();
    })
  </script>
 <?php
 require_once(SHARED_PATH."/footer.php");
  ?>
