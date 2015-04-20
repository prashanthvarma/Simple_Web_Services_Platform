<?php

$con=mysqli_connect("localhost","root","Pvm1990@","FPAI");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<html>

<head>
<title>End-User GUI</title>
</head>

<head>
<script>
function PM()
  {
var r=confirm("Do you want to install the PowerMatcher client app");
if (r==true)
  {
window.open('http://localhost/pm.php')
  }
else
  {
  alert("You have cancelled the installation proces !!");
  }
  }
function MH()
  {
var r=confirm("Do you want to install the Miele@Home app");
if (r==true)
  {
   window.open('http://localhost/mh.php')
  }
else
  {
  alert("You have cancelled the installation proces !!");
  }
  }
function PV()
  {
var r=confirm("Do you want to install the PV Panel Simulation app");
if (r==true)
  {
   window.open('http://localhost/pv.php')
  }
else
  {
  alert("You have cancelled the installation proces !!");
  }
  }
function BS()
  {
var r=confirm("Do you want to install the Battery Simulation app");
if (r==true)
  {
   window.open('http://localhost/bs.php')
  }
else
  {
  alert("You have cancelled the installation proces !!");
  }
  }
function SS()
  {
var r=confirm("Do you want to install the Smart Meter Simulation app");
if (r==true)
  {
   window.open('http://localhost/ss.php')
  }
else
  {
  alert("You have cancelled the installation proces !!");
  }
  }
</script>
</head>

<body>

<center><h1>Welcome to the FPAI App Store</h1></center>

<?php

$result = mysqli_query($con,"SELECT * FROM End_User_Requests ORDER BY ID DESC LIMIT 1");

$row = mysqli_fetch_array($result);

mysqli_close($con);

?>

<b> Logged in as:</b> <i><?php echo $row["Name"]; ?></i>
<br>
<input type="button" value="Refresh" onClick="window.location.reload()">
<button onclick="location.href='http://localhost/fpai.php'">Home</button>
<button onclick="window.open('', '_self', ''); window.close();">Logout</button>




<h1> App Catalogue: </h1>

<p> </p>

<center>

<button onClick="MH()">
<img src="http://vacuumdenver.com/wp-content/uploads/2013/09/Miele-Logo-200x200.jpg" Title="Adds support for the Miele@Home gateway with all the Miele appliances that are coupled to it"></a>
<br/>
Miele@Home -- Purchase : 0.99
</button>

<button onClick="PV()">
<img src="http://www.trueshopping.co.uk/images/category/5676_image.jpg" Title="This app simulates a PV Panel that can be configured"></a>
<br/>
PV Panel Simulation -- Purchase : 0.49
</button>

<p> </p>

<button onClick="PM()">
<img src="http://www.tno.nl/images/shared/nieuwsbericht/pm_compact_logo_240.jpg"  width="200" height="200" Title="The PowerMatcher client that is able to optimize the energy usage by using a energy market mechanism"></a>
<br/>
Purchase : FREE
</button>

<p> </p>

<button onClick="BS()">
<img src="http://images.all-free-download.com/images/graphicmedium/battery_94299.jpg" Title= "This app simulaties a Battery that can be configured"></a>
<br/>
Battery Simulation -- Purchase : 0.49
</button>

<button onClick="SS()">
<img src="http://www.navigantresearch.com/wp-assets/uploads/2013/07/SmartMeters_Icon.gif" Title= "This app simulaties a Smart Meter that can be configured"></a>
<br/>
Smart Meter Simulation -- Purchase : 0.49
</button>

</center>


</body></html>
