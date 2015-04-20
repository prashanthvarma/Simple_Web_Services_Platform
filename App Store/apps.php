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
color:#00FF00;>Installed Apps

</h1>

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
        <title>Installed Apps </title>
    </head>
    <body>
        
        <table class="striped">
            <tr class="header">
                <td>ID</td>
                <td>App Name</td>
                <td>Description</td>
                <td>App Type</td>
                <td>App Version</td>
                <td>Installed date and time</td>
                <td>Status</td>
            </tr>

            <?php

            $server = mysql_connect("localhost","root","Pvm1990@");
            $db =  mysql_select_db("FPAI",$server);
            $query = mysql_query("select * from Installed_Apps WHERE End_User_Name = '$name[Name]'");
           $i = 1;
               while ($row = mysql_fetch_array($query)) {
                   echo "<tr>";
                   echo "<td>$i</td>";
                   echo "<td>".$row[App_Name]."</td>";
                   echo "<td>".$row[Description]."</td>";
                   echo "<td>".$row[Type]."</td>";
                   echo "<td>".$row[App_Version]."</td>";
                   echo "<td>".$row[Installation_Date]."</td>";
                   echo "<td>".$row[Status]."</td>";
                   echo "</tr>";
                   $i++;
               }

            ?>
        </table></center>


</body>
</html>
 
