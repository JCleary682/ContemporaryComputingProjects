<?php
$user = "swallace574";
$password = "jjwfc4mdz1v2y18v";
$webserver = "lamp.eeecs.qub.ac.uk";
$db = "team12";

$conn = mysqli_connect($webserver, $user, $password, $db);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
} else {
}
?>