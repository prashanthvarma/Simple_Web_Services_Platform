<?php
$con=mysqli_connect("localhost","root","Pvm1990@","FPAI");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO End_User_Requests (Name, Authorization_Credentials)
VALUES
('$_POST[userid]','$_POST[pswrd]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

mysqli_close($con);

header( 'Location: http://localhost/gui.html' ) ;
?>
