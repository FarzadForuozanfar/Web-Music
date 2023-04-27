<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "webmusic";

$db = new mysqli(
    $hostname,
    $username,
    $password,
    $database
);
if ($db->connect_error) {
    echo $db->connect_error;
} else {
    $db->query("SET CHARACTER SET utf8");
}
