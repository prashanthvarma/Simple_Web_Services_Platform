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
<body>

<h1 style="font-family:Comic Sans Ms;text-align="center";font-size:20pt;
color:#00FF00;>
App Installation Status... 
</h1>

<?php

$result = mysqli_query($con,"SELECT * FROM End_User_Requests ORDER BY ID DESC LIMIT 1");

$name = mysqli_fetch_array($result);

$sql = mysqli_query($con,"SELECT * FROM Install_Status WHERE End_User_Name = '$name[Name]'");

$status = mysqli_fetch_array($sql);


$info = mysqli_query($con, "SELECT * FROM End_User_Requests WHERE Name = '$name[Name]'");

$req = mysqli_fetch_array($info);

$app = mysqli_query($con, "SELECT * FROM Apps_Specifications WHERE App_GUID = '$req[App_GUID]'");

$spec = mysqli_fetch_array($app);

mysqli_close($con);

?>

<b> Logged in as:</b> <i><?php echo $name["Name"]; ?></i>
<br>
<p></p>
<b> Authorization:</b> <i><?php echo $status["Authorization"]; ?></i>
<br>
<p></p>
<b> Installed:</b> <i><?php echo $status["Installed"]; ?></i>
<br>
<p></p>
<b> Status:</b> <i><?php echo $status["Status"]; ?>...</i>
<br>


<center>
<p></p>

<?php if ($status["Authorization"] == "Authorized" && $status[Installed] == "Not Installed Yet")
{ ?>

<b>Starting download process...</b>

  <a href="<?php echo $status["Download"]; ?>">Click Here To Download the App</a>

<form name="installed" action="installed.php" method="post">
<input type="hidden" name="App_Name" value="<?php echo $spec["App_Name"];?>"/>
<input type="hidden" name="App_Description" value="<?php echo $spec["App_Description"];?>"/>
<input type="hidden" name="App_GUID" value="<?php echo $req["App_GUID"];?>"/>
<input type="hidden" name="App_Type" value="<?php echo $spec["App_Type"];?>"/>
<input type="hidden" name="App_Version" value="<?php echo $req["App_Version"];?>"/>
<input type="hidden" name="Name" value="<?php echo $name["Name"];?>"/>
<input type="hidden" name="App_Store_ID" value="<?php echo $req["App_Store_ID"];?>"/>
<input type="hidden" name="Status" value="working"/>
<input type="hidden" name="Authorization" value="No Authorization"/>
<input type="hidden" name="Installed" value="Not Installed Yet"/>
<input type="hidden" name="Download" value=" "/>
<p><input type="submit" value="Done"/>
</form>

<?php } else { ?>

  <b>Can not start the download process...Check Above Information !!</b>

<form name="installed" action="close.php" method="post">
<input type="hidden" name="Name" value="<?php echo $name["Name"];?>"/>
<input type="hidden" name="Authorization" value="No Authorization"/>
<input type="hidden" name="Installed" value="Not Installed Yet"/>
<input type="hidden" name="Download" value=" "/>
<p><input type="submit" value="Exit / Finish"/>
</form>

<?php } ?>
<center>

<p></p>

<center>
<input type="button" value="Refresh" onClick="window.location.reload()">
<button onclick="location.href='http://localhost/appstore.php'">App Store Home</button>
<button onclick="location.href='http://localhost/fpai.php'">FPAI Home</button>
</center>

</body>
</html>
