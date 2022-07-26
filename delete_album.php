<?php 
    $album_id = $_GET['id'];
    include "database.php";
    $db->query("DELETE FROM albums WHERE id = $album_id");
    header("Location:admin_albums.php")
?>