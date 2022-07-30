<?php
    include "database.php";
    if($_POST["music-name"] != "")
    {
        $music_name = $_POST["music-name"];
        $music_id = $_POST["music-id"];

        if(!empty($_POST["album-id"]))
            {$album_id = $_POST["album-id"];}
        else
            {$album_id = 0;}

        if($_FILES["mp3"]['name'] == "" && $_FILES["image"]['name'] == "")    // not change mp3 and img
        {
            $db->query("UPDATE music SET name ='$music_name', album_id = '$album_id' WHERE id ='$music_id'");
            header("Location:admin_musics.php");
        }

        elseif($_FILES["mp3"]['name'] == "" && $_FILES["image"]['name'] != "") //not change mp3 but change image
        {
            $music = $db->query("SELECT * FROM `music` WHERE `id` = '$music_id'")->fetch_assoc();
            $date = date('Y-m-d H:i:s');
            $date = str_replace(':','-',$date);
            $img_name = "img/track/".$date.$_FILES['image']['name'];
            if($music['image'] != "")
            {
                if(unlink($music['image']))
                echo "delete successfully";
                else
                    echo "delete failed";
            }
            $db->query("UPDATE music SET name = '$music_name' , album_id = '$album_id' , image = '$img_name' WHERE id = '$music_id'");
            move_uploaded_file($_FILES['image']['tmp_name'], $img_name);
            header("Location:admin_musics.php");
        }

        elseif($_FILES["mp3"]['name'] != "" && $_FILES["image"]['name'] == "") // change mp3 but not change image
        {
            $music = $db->query("SELECT * FROM `music` WHERE `id` = '$music_id'")->fetch_assoc();
            $date = date('Y-m-d H:i:s');
            $date = str_replace(':','-',$date);
            $mp3_name = "mp3/".$date.$_FILES['mp3']['name'];
            if($music['mp3'] != "")
            {
                if(unlink($music['mp3']))
                echo "delete successfully";
                else
                    echo "delete failed";
            }
            $db->query("UPDATE music SET name = '$music_name' , album_id = '$album_id' , mp3 = '$mp3_name' WHERE id = '$music_id'");
            move_uploaded_file($_FILES['mp3']['tmp_name'], $mp3_name);
            header("Location:admin_musics.php");
        }

        else //change image and mp3
        {
            $music = $db->query("SELECT * FROM `music` WHERE `id` = '$music_id'")->fetch_assoc();
            $date = date('Y-m-d H:i:s');
            $date = str_replace(':','-',$date);
            $img_name = "img/track/".$date.$_FILES['image']['name'];
            $mp3_name = "mp3/".$date.$_FILES['mp3']['name'];

            if($music['image'] != "")
            {
                if(unlink($music['image']))
                echo "delete successfully";
                else
                    echo "delete failed";
            }

            if($music['mp3'] != "")
            {
                if(unlink($music['mp3']))
                echo "delete successfully";
                else
                    echo "delete failed";
            }

            $db->query("UPDATE music SET name = '$music_name' , album_id = '$album_id' , mp3 = '$mp3_name' ,image = '$img_name' WHERE id = '$music_id'");
            move_uploaded_file($_FILES['mp3']['tmp_name'], $mp3_name);
            move_uploaded_file($_FILES['image']['tmp_name'], $img_name);
            header("Location:admin_musics.php");

        }

    }
    else
    {
        header("Location:admin_musics.php");
    }
?>