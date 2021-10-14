<?php
      require_once('../../private/initialize.php');
      $page_title='Homepage-Mun-Log';
      $result = find_all_notice();
      require_once(SHARED_PATH.'/header.php');
?>
<link rel="stylesheet" href="<?php echo url_for('/stylesheets/index.css');?>">
<script src="https://apis.mapmyindia.com/advancedmaps/v1/kys39lfp58zmqynjubg41hra87osqulb/map_load?v=1.3"></script>
  <div id="map">
  </div>
  <script>
    var map=new MapmyIndia.Map("map",{ center:[22.660525381253986,88.34938037402028],zoomControl: true,hybrid:true });
    var full_path = "http://localhost/mun_log/public";
    var icon = L.icon({
     iconUrl: full_path + '/images/map_marker.svg',
     iconRetinaUrl: full_path + '/images/map_marker.svg',
     iconSize: [45, 45],
     popupAnchor: [-10, -15]
   });
    var mk =new L.marker([22.660525381253986,88.34938037402028],{draggable: false, title: ""});
    mk.addTo(map);
    var currentDiameter =new L.circle([22.660525381253986,88.34938037402028], {
           color: '#59ff6a',
           fillColor: '#59ff6a',
           fillOpacity: 0.1,
           radius: 13000
         });
  currentDiameter.addTo(map);
  map.fitBounds(currentDiameter.getBounds());
    // map.setZoom(17);
    function mapmyindia_removeMarker() {
      map.removeLayer(mk);
      delete mk;
    }
    map.on("dblclick",function(e){
      let lat_difference = (Math.abs(e.latlng.lat-22.660525381253986))*111;
      let lng_difference = (Math.abs(e.latlng.lng-88.34938037402028))*111;
      let distance = Math.sqrt(Math.pow(lat_difference,2)+Math.pow(lng_difference,2));

      if(distance<=13.8){
        mapmyindia_removeMarker();
        mk =new L.marker(e.latlng,{icon:icon,draggable: false, title: "Submitted Location"});
        mk.addTo(map);
      }else{
        alert("Out of Jurisdiction Area");
      }
    });

    function getLocation() {
      var map_btn = document.getElementById("map_btn");
      let lat = mk._latlng.lat;
      let lng = mk._latlng.lng;
      map_btn.setAttribute("href","<?php echo url_for("/general/complain/complain_form.php?lat=");?>"+lat+"&lng="+lng);
    }
  </script>
  <div class="form-wrap">
    <a id="map_btn" href="#" onclick="getLocation()">Submit Location</a>
  </div>
  <div class="notice-board">
    <a class="notice-top" href="<?php echo url_for("/general/notice/notice.php"); ?>">
      Notice Board
    </a>
      <?php
        $i = 0;
        while(($row=mysqli_fetch_assoc($result)) && ($i<3)){
            echo "<article class='notice'>";
            echo "<h4 class='notice-title'>";
            echo $row['date']." : ";
            echo $row['title'];
            echo "</h4>";
            echo "<p class='notice-content'>";
            echo $row['content'];
            echo "</br><a class='notice_map' href='";
            echo url_for("/general/notice/show_notice.php?id=".$row['nid'])."'>";
            echo "<img class='notice_map' src='";
            echo url_for('/images/map_marker.svg');
            echo "'></a>";
            echo "</p>";
            echo "</article>";
            $i++;
        }
       ?>
  </div>
<?php include(SHARED_PATH.'/footer.php'); ?>
