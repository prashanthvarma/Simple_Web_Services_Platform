<?php
$con=mysqli_connect("localhost","root","Pvm1990@","FPAI");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "UPDATE Install_Status ".
       "SET Authorization = '$_POST[Authorization]', Installed = '$_POST[Installed]', Download = '$_POST[Download]'".
       "WHERE End_User_Name = '$_POST[Name]'" ;

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }


mysqli_close($con);

header( 'Location: http://localhost/appstore.php' ) ;

?>
