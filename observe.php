<?php 
session_start();
include_once "db.php";
$dds="select * from amaken";
$sth=$dbo->query($dds);
$data=array();
//print("Fetch all of the remaining rows in the result set:\n");
$result=$sth->fetchAll(PDO::FETCH_ASSOC);
$data['result']=$result;
$data['success']=1;
foreach ($result as $rowc) {
  # code...

}
 ?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<link rel="stylesheet" href="style.css" />
<script src="leaflet/leaflet.js"></script>
</head>
<body onload="loadAll();">
    <div id="test"></div>
<h1 id="demo"></h>
<div class="main">
	<h1 ><?php echo $_SESSION['MESSAGE'];$_SESSION['MESSAGE']="";?></h1>
 <div id="mapid"></div>
<table>

 	<tr>
	<td>
 	<label for="name">نام مکان را وارد کنید</label></td>
	<td>
 <input type="text" name="name" id="name" />	
</td>
</tr>
 <tr><td>
 <label for="cat">نوع مکان</label>
</td>
<td>
 <input type="text" name="cat" id="cat" />	
</td>

<tr><td>
 <label for="phone"> شماره تلفن</label>
</td>
<td>
 <input type="text" name="phone" id="phone" />	
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
<td >
 <a id="link-del" href="">
    <div style="height:100%;width:100%">
   حذف مورد مورد نظر
    </div>
  </a>
</td>
<td >
 <a id="link-conf" href="">
    <div style="height:100%;width:100%">
   تایید مورد 
    </div>
  </a>
</td>

</tr>
</table>

 </div>
 <script type="text/javascript">
 	

var points=JSON.parse( '<?php echo json_encode($result); ?>' );




var mymap = L.map('mapid').setView([points[0].latitude, points[0].longitude], 14);
 	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 22,
    id: 'mapbox.streets',
    // accessToken: 'pk.eyJ1IjoiYXlyYXRuIiwiYSI6ImNqM3BkdXZ5NTAwMzQzM3Fka2hlNHMzbmQifQ.YMeXZx5WpB7DishB0_YnGw'
}).addTo(mymap);
    var markers;
	function loadAll(){
var out= document.getElementById("test");
for (i = 0; i < points.length; i++) { 
    var point=points[i];
    var marker=L.marker([point.latitude,point.longitude]).addTo(mymap); 
    marker.bindPopup(point.id+"<br>" +point.name +"<br>" +point.phone +"<br>نوع   "+point.category).openPopup();
    marker.on('click',function(){
       document.getElementById("name").value=point.name;
       document.getElementById("cat").value=point.category;
       document.getElementById("mokhtasat").value=point.latitude+','+point.longitude;
       delbtn=document.getElementById('link-del');
       
     delbtn.href='delete.php?id='+point.id;
  confbtn=document.getElementById('link-conf');
       
     confbtn.href='confirm.php?id='+point.id;

    });
}}

var popup = L.popup();
 var mokh=  document.getElementById("mokhtasat");
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
     
      mokh.value=e.latlng;
}
//mymap.on('click',onMapClick(e));
// mymap.on('click', function(e){
//  mokh.value=e.latlng;
//  lat = e.latlng.lat;
//     lon = e.latlng.lng;
//     marker.remove();
//     marker=L.marker([lat,lon]).addTo(mymap);
// });
 </script>
</body>
</html>