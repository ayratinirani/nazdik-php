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

 <div id="out"></div>
<script type="text/javascript">
geoFindMe();
if ("geolocation" in navigator) { /* geolocation is available */
	alert("navigator suppots location");
	 } 
	else {
	
	 /* geolocation IS NOT available */ 
alert("no loc");
}

function geoFindMe() {
 var output = document.getElementById("mapid"); 
if (!navigator.geolocation){ output.innerHTML = "<p>Geolocation is not supported by your browser</p>"; return; } 
function success(position) { 
var latitude = position.coords.latitude; var longitude = position.coords.longitude; output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>'; var img = new Image(); img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=500x500&sensor=false"; output.appendChild(img); } 
function error() { 
output.innerHTML = "Unable to retrieve your location"; }
 output.innerHTML = "<p>Locating…</p>"; navigator.geolocation.getCurrentPosition(success, error); }
geoFindMe();

 </script>
<p><button onClick="geoFindMe()">Show my location</button></p>


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
 <input type="text" name="cat" />	
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
</html>
 </html>
