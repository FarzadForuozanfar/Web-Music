<?php
include "database.php";
    if(isset($_POST["music_name"]) && $_POST["music_name"] != null && $_POST["music_name"] != "")
    {
        $name =  $_POST["music_name"];
        $album_id = (int)($_POST["album_id"]);
        $date = date('Y-m-d H:i:s');
        $date = str_replace(':','-',$date);
        $img_name = "img/track/".$date.$_FILES['image']['name'];
        $mp3_name = "img/mp3/".$date.$_FILES['mp3']['name'];
        $db->query("INSERT INTO `music`(name, image,album_id,mp3) VALUES('$name','$img_name','$album_id','$mp3_name')");
        var_dump($img_name);
        
        move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
        move_uploaded_file($_FILES['mp3']['tmp_name'],$mp3_name);
        header("Location:admin_musics.php");
    }
    else
    {
        header("Location:admin_musics.php");
    }
    /*echo $_FILES['image']['name'].'<br>';
    echo $_FILES['mp3']['name'].'<br>';*/
?>