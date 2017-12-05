<?php 
session_start();

 ?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<link rel="stylesheet" href="style.css" />
<script src="leaflet/leaflet.js"></script>
</head>
<body>
<div class="main">
	<h1 ><?php echo $_SESSION['MESSAGE'];$_SESSION['MESSAGE']=""; ?></h1>
 <div id="mapid"></div>
 <form action="sabt.php" method="post">
 	
 	<br>
 	<label for="name">نام مکان را وارد کنید</label>
 <input type="text" name="name">	
 <br>
 <label for="cat">نوع مکان</label>
 <input type="text" name="cat">	
 <br>
 <label for="latlon">مختصات</label>
 <input type="text" name="latlon" id="mokhtasat">	
 <input type="submit" name="ok" value="send">
 </form>
 </div>
 <script type="text/javascript">
 	

//  	var mymap = L.map('mapid').setView([36.821, 54.450], 13);
//  	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
//     attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
//     maxZoom: 18,
//     id: 'mapbox.streets',
//     accessToken: 'pk.eyJ1IjoiYXlyYXRuIiwiYSI6ImNqM3BkdXZ5NTAwMzQzM3Fka2hlNHMzbmQifQ.YMeXZx5WpB7DishB0_YnGw'
// }).addTo(mymap);

var mymap = L.map('mapid').setView([36.821, 54.450], 13);
 	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    // accessToken: 'pk.eyJ1IjoiYXlyYXRuIiwiYSI6ImNqM3BkdXZ5NTAwMzQzM3Fka2hlNHMzbmQifQ.YMeXZx5WpB7DishB0_YnGw'
}).addTo(mymap);
 	var marker=L.marker([36.82,54.450]).addTo(mymap); 

var popup = L.popup();
 var mokh=  document.getElementById("mokhtasat");
function onMapClick(e) {
    // popup
    //     .setLatLng(e.latlng)
    //     .setContent("You clicked the map at " + e.latlng.toString())
    //     .openOn(mymap);
     
      mokh.value=e.latlng;
}

mymap.on('click', function(e){
 mokh.value=e.latlng;
 lat = e.latlng.lat;
    lon = e.latlng.lng;
    marker.remove();
    marker=L.marker([lat,lon]).addTo(mymap);
});
 </script>
</body>
</html>