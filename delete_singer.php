<?php 
    $singer_id = $_GET['id'];
    include "database.php";
    $db->query("DELETE FROM singers WHERE id = $singer_id");
    header("Location:admin_artists.php")
?>