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

<center><h1>FPAI HomeBox Settings</h1></center>

<p></p>

<body>

<?php

$result = mysqli_query($con,"SELECT * FROM End_User_Requests ORDER BY ID DESC LIMIT 1");

$name = mysqli_fetch_array($result);

mysqli_close($con);

?>

<b> Logged in as:</b> <i><?php echo $name["Name"]; ?></i>
<br>
<input type="button" value="Refresh" onClick="window.location.reload()">
<button onclick="location.href='http://localhost/fpai.php'">Home</button>
<button onclick="window.open('', '_self', ''); window.close();">Logout</button>


<p></p>

<center><h1 style="font-family:Comic Sans Ms;text-align="center";font-size:20pt;
color:#00FF00;>HomeBox Information</center>

    <center><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <style type="text/css">
            tr.header
            {
                font-weight:bold;
            }
            tr.alt
            {
                background-color: #777777;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
               $('.striped tr:even').addClass('alt');
            });
        </script>
        <title>HomeBox Information </title>
    </head>
    <body>
        
        <table class="striped">
            <tr class="header">
                <td>ID</td>
                <td>Type</td>
                <td>Provider</td>
                <td>Installed date and time</td>
                <td>Status</td>
            </tr>

            <?php

            $server = mysql_connect("localhost","root","Pvm1990@");
            $db =  mysql_select_db("FPAI",$server);
            $query = mysql_query("select * from Home_Boxes WHERE End_User_Name = '$name[Name]'");
           $i = 1;
               while ($row = mysql_fetch_array($query)) {
                   echo "<tr>";
                   echo "<td>$i</td>";
                   echo "<td>".$row[Type]."</td>";
                   echo "<td>".$row[Provider]."</td>";
                   echo "<td>".$row[Installation_Date]."</td>";
                   echo "<td>".$row[Status]."</td>";
                   echo "</tr>";
                   $i++;
               }

            ?>
        </table></center>

<center><h1 style="font-family:Comic Sans Ms;text-align="center";font-size:20pt;
color:#00FF00;>Running Apps List</center>
<center><?php
 
$n = $name["Name"];

if ($n == "prashanth") {
    
$dir = "/home/mpv/Desktop/Prashanth_Home_Box";

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "$file";
             echo "<br />\n";
        }
        closedir($dh);
    }
}
} elseif ($n == "tim") {
$dir = "/home/mpv/Desktop/Tim_Home_Box";

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "$file";
             echo "<br />\n";
        }
        closedir($dh);
    }
    
} 

}
elseif ($n == "bob") {
$dir = "/home/mpv/Desktop/Bob_Home_Box";

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "$file";
             echo "<br />\n";
        }
        closedir($dh);
    }
    
} 

}else {
$dir = "/home/mpv/Desktop/Fabian_Home_Box";

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "$file";
             echo "<br />\n";
        }
        closedir($dh);
    }
    
} 
    
}
?></center>

<p></P>


</body></html>
