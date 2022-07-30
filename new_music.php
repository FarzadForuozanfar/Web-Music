<?php if(!empty($_SESSION['login_admin'])):?>     
    <?php
    include "database.php";
        if(isset($_POST["music_name"]) && $_POST["music_name"] != null && $_POST["music_name"] != "" && $_FILES["mp3"]['name'] != "")
        {
            $name =  $_POST["music_name"];
            $album_id = (int)($_POST["album_id"]);
            $date = date('Y-m-d H:i:s');
            $date = str_replace(':','-',$date);
            $mp3_name = "mp3/".$date.$_FILES['mp3']['name'];
            if($_FILES["image"]["name"] != "")
            {
                $img_name = "img/track/".$date.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
            }
            else
            {
                $img_name = "";
            }
            echo $mp3_name.'<br>';
            $db->query("INSERT INTO `music`(name, image, album_id, mp3) VALUES('$name','$img_name','$album_id','$mp3_name')");
            move_uploaded_file($_FILES['mp3']['tmp_name'],$mp3_name);
            header("Location:admin_musics.php");
        }
        else
        {
            header("Location:admin_musics.php");
        }    
    ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
                    
                
 