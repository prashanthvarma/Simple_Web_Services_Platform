<html> 
<head> 
<title></title> 
</head> 

<body> 


<?php 
if($_GET['action'] == "confirm"){?> 
<form name="delete" action="<?=$PHP_SELF?>" method="GET" enctype="multipart/form-data"> 
<input type="hidden" name="action" value="delete" /> 
<input type="hidden" name="id" value="<?=$_GET['id'] ?>" /> 
Are you sure you wish to delete "<?echo $_GET['id'];?>" ? 
<input type="submit" name="doaction" value="YES" /> 
</form><? } 


if ($_GET['doaction']) 
{ 
    $file = $_GET['id']; 
    if (file_exists($file)) 
    { 
        unlink('/home/mpv/Desktop/Prashanth_Home_Box/' .$file); 
        echo "Deleted '$file'"; 
    } 
    else 
    { 
        echo "The file '$file' does not exist."; 
    } 
} 

?>  
