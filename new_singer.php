<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php
    include "database.php";
        if(isset($_POST["singer_name"]) && $_POST["singer_name"] != null && $_POST["singer_name"] != "")
        {
            $name =  $_POST["singer_name"];
            if($_FILES["image"]['name'] != "")
            {
                $date = date('Y-m-d H:i:s');
                $date = str_replace(':','-',$date);
                $img_name = "img/singers/".$date.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
            }
            else
                $img_name = "";
            $db->query("INSERT INTO `singers`(name, image) VALUES('$name','$img_name')");
            
            header("Location:admin_artists.php");
        }
        else
        {
            header("Location:admin_artists.php");
        }
    ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
                    
