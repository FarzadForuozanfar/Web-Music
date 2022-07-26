<?php
    $db = new mysqli("localhost","id19312075_farzad","[4LT_HSEk@Jk=l5%","id19312075_webmusic");
    //$db = new mysqli("localhost","root","","webmusic");
    if($db->connect_error)
    {
        echo $db->connect_error;
    }
?>