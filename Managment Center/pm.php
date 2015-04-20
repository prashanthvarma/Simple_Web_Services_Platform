<html>
<head>
<title>End-User GUI</title>
</head>
<body>

<h1 style="font-family:Comic Sans Ms;text-align="center";font-size:20pt;
color:#00FF00;>
App Installation Confirmation 
</h1>

<p><b>App Details:</b></p>
<p></p>
<p> App Name: PowerMatcher </p>
<p> App Description: The PowerMatcher client that is able to optimize the energy usage by using a energy market mechanism</p>
<p> App Price: FREE </p>
<p> App Store Name: App Store </p>
<p></p>
<?php
if(isset($_POST['update']))
{
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'Pvm1990@';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$guid = $_POST['guid'];
$version = $_POST['version'];
$verify = $_POST['verify'];
$store_id = $_POST['store_id'];
$access = $_POST['access'];

$sql = "UPDATE End_User_Requests ".
       "SET App_GUID = $guid, App_Version = $version, Verification = '$verify', App_Store_ID = $store_id, Access_Token = '$access'".
       "ORDER BY ID DESC LIMIT 1" ;

mysql_select_db('FPAI');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('==> Could not submit the request to the management center...: ' . mysql_error());
}
echo "==> Request submited to the management center...\n";

$send = "UPDATE App_Stores_Information ".
       "SET Access_Token = '$access'".
       "ORDER BY ID DESC LIMIT 1" ;

mysql_select_db('FPAI');
$retval = mysql_query( $send, $conn );
if(! $retval )
{
  die('Try later !!: ' . mysql_error());
}
echo "Success !!\n";
mysql_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">App GUID</td>
<td><input name="guid" type="text" id="guid" value="1"></td>
</tr>
<tr>
<td width="100">App Version</td>
<td><input name="version" type="text" id="version" value="1"></td>
</tr>
<tr>
<td width="100">App Verification</td>
<td><input name="verify" type="text" id="verify" value="yes"></td>
</tr>
<tr>
<td width="100">App Store ID</td>
<td><input name="store_id" type="text" id="store_id" value="1"></td>
</tr>
<tr>
<td width="100">Access Token</td>
<td><input name="access" type="text" id="access"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="update" type="submit" id="update" value="Submit">
</td>
</tr>
</table>
</form>
<?php
}
?>

<p></p>

<center>
<button onclick="location.href='http://localhost/status.php'">Next</button>
</center>

</body>
</html>
