<?php
include "database.php";
    if(isset($_POST["singer_name"]) && $_POST["singer_name"] != null && $_POST["singer_name"] != "")
    {
        $name =  $_POST["singer_name"];
        $date = date('Y-m-d H:i:s');
        $date = str_replace(':','-',$date);
        $img_name = "img/singers/".$date.$_FILES['image']['name'];
        $db->query("INSERT INTO `singers`(name, image) VALUES('$name','$img_name')");
        var_dump($img_name);
        
        move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
        header("Location:admin_artists.php");
    }
    else
    {
        header("Location:admin_artists.php");
    }
?>