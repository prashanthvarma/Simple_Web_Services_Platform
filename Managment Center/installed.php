
<?php
$con=mysqli_connect("localhost","root","Pvm1990@","FPAI");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "INSERT INTO Installed_Apps(App_Name, Description, App_GUID, Type, App_Version, End_User_Name, App_Store_ID, Status) VALUES ('$_POST[App_Name]', '$_POST[App_Description]', '$_POST[App_GUID]', '$_POST[App_Type]', '$_POST[App_Version]','$_POST[Name]', '$_POST[App_Store_ID]', '$_POST[Status]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

$sql1 = "UPDATE Install_Status ".
       "SET Authorization = '$_POST[Authorization]', Installed = '$_POST[Installed]', Download = '$_POST[Download]'".
       "WHERE End_User_Name = '$_POST[Name]'" ;

if (!mysqli_query($con,$sql1))
  {
  die('Error: ' . mysqli_error($con));
  }


mysqli_close($con);

header( 'Location: http://localhost/appstore.php' ) ;

?>
