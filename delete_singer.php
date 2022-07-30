<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php 
        $singer_id = $_GET['id'];
        include "database.php";
        $singer = $db->query("SELECT * FROM singers WHERE id = '$singer_id'")->fetch_assoc();
        if($singer['image'] != "")
        {
            if(unlink($singer['image']))
                echo "delete successfully";
            else
                echo "delete failed";
        }
        $db->query("DELETE FROM singers WHERE id = $singer_id");
        header("Location:admin_artists.php")
    ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
             