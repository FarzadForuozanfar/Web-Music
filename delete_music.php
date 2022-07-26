<?php 
    $music_id = $_GET['id'];
    include "database.php";
    $db->query("DELETE FROM music WHERE id = $music_id");
    header("Location:admin_albums.php")
?>