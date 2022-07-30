<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php
    include "database.php";
        if((isset($_POST["album_name"]) && $_POST["singer_id"] != 0))
        {
            echo $_POST["singer_id"];
            $name =  $_POST["album_name"];
            $singer_id = $_POST["singer_id"];
            if($_FILES["image"]['name'] != "")
            {
                $date = date('Y-m-d H:i:s');
                $date = str_replace(':','-',$date);
                $img_name = "img/singers/".$date.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
            }
            else
                $img_name = "";
            $db->query("INSERT INTO `albums`(name, image,singers_id) VALUES('$name','$img_name','$singer_id')");        
            header("Location:admin_albums.php");
        }
        else
        {
            echo"else";
            header("Location:admin_albums.php");
        }
        
        
        
    ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
                    
                
 