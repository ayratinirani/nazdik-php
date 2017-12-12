<?php 
session_start();
include_once "db.php";
$dds="select * from categories";
$sth=$dbo->query($dds);
$data=array();
//print("Fetch all of the remaining rows in the result set:\n");
$resultcat=$sth->fetchAll(PDO::FETCH_ASSOC);
$data['success']=1;
 ?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<link rel="stylesheet" href="style.css" />
<script src="leaflet/leaflet.js"></script>
</head>
<body>
<h1 id="demo"></h>
<div class="main">
	<h1 ><?php echo $_SESSION['MESSAGE'];$_SESSION['MESSAGE']="";?></h1>
 <div id="mapid"></div>
<table>
 <form action="sabt.php" method="post">
 	<tr>
	<td>
 	<label for="name">نام مکان را وارد کنید</label></td>
	<td>
 <input type="text" name="name" />	
</td>
</tr>
 <tr><td>
 <label for="cat">نوع مکان</label>
</td>
<td>
  <select id="cas-sel" name="cat">
    <?php 
    foreach ($resultcat as $row) {
        # code...
   echo '<option value=\"'.$row['id'].'\">'.$row['name']."</option>";

    }
    ?>
 </select>
</td>

<tr><td>
 <label for="phone"> شماره تلفن</label>
</td>
<td>
 <input type="text" name="phone"/>	
</td>
<tr>
<td>
 <label for="latlon">مختصات</label />
</td>
<td>
 <input type="text" name="latlon" id="mokhtasat"/>	
</td>
</tr>
<tr>
<td>
 <input type="submit" name="ok" value="send"/>
</td>
 </form>
</tr>
</table>
 </div>
 <script type="text/javascript">


var mymap = L.map('mapid').setView([36.821, 54.450], 14);
 	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 22,
    id: 'mapbox.streets',
    // accessToken: 'pk.eyJ1IjoiYXlyYXRuIiwiYSI6ImNqM3BkdXZ5NTAwMzQzM3Fka2hlNHMzbmQifQ.YMeXZx5WpB7DishB0_YnGw'
}).addTo(mymap);
	var marker=L.marker([36.821,54.450]).addTo(mymap); 

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