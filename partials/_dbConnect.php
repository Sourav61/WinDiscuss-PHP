<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "windiscuss";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}


?>