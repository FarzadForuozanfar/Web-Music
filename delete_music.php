<?php if(!empty($_SESSION['login_admin'])):?>   
    <?php 
        $music_id = $_GET['id'];
        include "database.php";
        $music = $db->query("SELECT * FROM `music` WHERE `id` = '$music_id'")->fetch_assoc();
        if($music['mp3'] != "")
        {
            if(unlink($music['mp3']))
                echo "delete successfully";
            else
                echo "delete failed";
        }
        if($music['image'] != "")
        {
            if(unlink($music['image']))
                echo "delete successfully";
            else
                echo "delete failed";
        }
        $db->query("DELETE FROM music WHERE id = $music_id");
        header("Location:admin_musics.php")
    ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
             