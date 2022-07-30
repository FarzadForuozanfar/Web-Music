<?php
    include "database.php";
    $album_id = $_POST['album-id'];
    $album = $db->query("SELECT * FROM albums WHERE id = $album_id")->fetch_assoc();
    if ($_POST['album-name'] != null) // set singer name
    {
        if($_FILES['image']['name'] == null) // dont change image album
        {
            echo "dont edit img";
            $album_name = $_POST['album-name'];
            $singer_id = $_POST['singer_id'];
            $db->query("UPDATE albums SET name ='$album_name', singers_id ='$singer_id' WHERE id = '$album_id'");
            header("Location:admin_albums.php");

        }
        else // change image album
        {
            echo "set edit img";
            $album_name = $_POST['album-name'];
            $singer_id = $_POST['singer_id'];
            $album_id = $_POST['album-id'];
            $date = date('Y-m-d H:i:s');
            $date = str_replace(':','-',$date);
            $img_name = "img/albums/".$date.$_FILES['image']['name'];
            if(unlink($album['image']))
                echo "delete successfully";
            else
                echo "delete failed";
            $db->query("UPDATE albums SET name ='$album_name', singers_id ='$singer_id', image ='$img_name' WHERE id = '$album_id'");
            move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
            header("Location:admin_albums.php");
        }

    }
    else // dont set singer name
    {
        echo "name is null";
        header("Location:admin_albums.php");
    }
?>
