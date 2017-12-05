<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<link rel="stylesheet" href="style.css" />
<script src="leaflet/leaflet.js"></script>
</head>
<body>
<div class="main">
	<h1 ><?php echo $_SESSION['MESSAGE'];$_SESSION['MESSAGE']="";?></h1>
 <div id="mapid"></div>
 <form action="checkuser.php" method="post">
 	
 	<br>
 	<label for="username">نام مکان را وارد کنید</label>
 <input type="text" name="username">	
 <br>
 <label for="email">ایمیل</label>
 <input type="text" name="email">	
 <br>
 <label for="password">رمز عبور</label>
 <input type="password" name="password" id="mokhtasat">	
 <input type="submit" name="ok" value="send">
 </form>
 </div>
 
</body>
</html>