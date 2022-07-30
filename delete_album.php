<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php 
        $album_id = $_GET['id'];
        include "database.php";
        $album = $db->query("SELECT * FROM albums WHERE id = $album_id")->fetch_assoc();
        if($album['image'] != "")
        {
            if(unlink($album['image']))
                echo "delete successfully";
            else
                echo "delete failed";
        }
        $db->query("DELETE FROM albums WHERE id = $album_id");
        header("Location:admin_albums.php")
    ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
             