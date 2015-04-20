<html><head>
<title>End-User GUI</title>
<style type="text/css"></style></head>

<body style="zoom: 1;">

<center><h1>Welcome to FPAI Environment</h1></center>

<?php

$con=mysqli_connect("localhost","root","Pvm1990@","FPAI");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM End_User_Requests ORDER BY ID DESC LIMIT 1");

$row = mysqli_fetch_array($result);

mysqli_close($con);
?>

<b> Logged in as:</b> <i><?php echo $row["Name"]; ?></i>
<br>
<input type="button" value="Refresh" onClick="window.location.reload()">
<button onclick="window.open('', '_self', ''); window.close();">Logout</button>

<p> </p>

<center>

<a href="http://localhost/apps.php"><img src="http://png-4.findicons.com/files/icons/1198/agua_onyx_folders/256/apps_folder_badged.png" width="200" height="200" title="Installed Apps"></a>

<a href="http://192.168.56.101:8084/test"><img src="http://www.iportal.com.hr/wp-content/uploads/2010/12/app_store.jpeg" title="App Store"></a>

<a href="http://localhost/homebox.php"><img src="http://icons.iconarchive.com/icons/judge/iphone/128/tools-icon.png" width="200" height="200" title="FPAI Home Box Settings"></a>

<a href="http://192.168.56.101:8080/client/client.html"><img src="http://www.geowebguru.com/img/guru/globe_network.jpg" width="300" height="300" title="Management Center End-User Console"></a>


</center>



</body></html>
