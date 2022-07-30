<?php
    include 'database.php';
    $singer_id = $_POST['singer-id'];
    $singer = $db->query("SELECT * FROM singers WHERE id = $singer_id")->fetch_assoc();
    if($_POST['artist-name'] != "")
    {
        echo "if"."<br>";
        $name = $_POST['artist-name'];
        if($_FILES['image']['name'] != "") // post img
        {
            echo "change image"."<br>";
            $date = date('Y-m-d H:i:s');
            $date = str_replace(':','-',$date);
            $img_name = "img/albums/".$date.$_FILES['image']['name'];
            if(unlink($singer['image']))
                echo "delete successfully";
            else
                echo "delete failed";
            $db->query("UPDATE singers SET name ='$name', image ='$img_name' WHERE id = '$singer_id'");
            move_uploaded_file($_FILES['image']['tmp_name'],$img_name);
            header("Location:admin_artists.php");

        }
        else // dont change image
        {
            echo "not change image"."<br>";
            $db->query("UPDATE singers SET name = '$name' WHERE id = '$singer_id'");
            header("Location:admin_artists.php");
        }

    }
    else
    {
        echo "else"."<br>";
        header("Location:admin_edit_artist.php");
    }
?>