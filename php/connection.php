<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pokemonAPI";

$conn = new mysqli($dbhost, $dbuser, $dbpass , $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>