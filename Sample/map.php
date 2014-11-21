<?php
  include 'connect.php';
 
  $apikey = "AIzaSyB9KEVscsGM1AnH-pVQf9IqlG_9-L4WAb4";
  $id = $_GET['id'];
  $lat = 0;
  $long = 0;
  $zoom = 8;
 
  $findmap = "SELECT centerLat, centerLong, zoom FROM maps WHERE ID = $id";
 
  if(!$result = $con->query($findmap)){
     die('There was an error running the query [' . $con->error . ']');
  } else {
    $row = $result->fetch_assoc();
    $lat = $row['centerLat'];
    $long = $row['centerLong'];
    $zoom = $row['zoom'];
  }   
 
?><!DOCTYPE html>
<html>
  <head>
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9KEVscsGM1AnH-pVQf9IqlG_9-L4WAb4">
    </script>
    <script type="text/javascript">
      function initialize() {
		var myLatlng1 = new google.maps.LatLng(<?php echo $lat.','.$long;?> )
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $lat.', '.$long; ?>),
          zoom: <?php echo $zoom; ?>
        };		
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions); 
 
    var marker1 = new google.maps.Marker({ 
    position: myLatlng1, 
    map: map, 
    title: '<?php echo $lat.','.$long;?>'
  });
    }			
	  
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>


