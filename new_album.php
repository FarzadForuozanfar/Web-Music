<?php
include "database.php";
    if(((int)($_POST["singer_id"]))!= 0 && isset($_POST["album_id"]) && isset($_POST["singer_id"]))
    {
        $name =  $_POST["album_name"];
        $singer_id = $_POST["singer_id"];
        $date = date('Y-m-d H:i:s');
        $date = str_replace(':','-',$date);
        $img_name = "img/albums/".$date.$_FILES['image']['name'];
        $db->query("INSERT INTO `albums`(name, image,singers_id) VALUES('$name','$img_name','$singer_id')");
        var_dump($img_name);
        
        move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
        header("Location:admin_albums.php");
    }
    else
    {
        header("Location:admin_albums.php");
    }
    
    
    
?>