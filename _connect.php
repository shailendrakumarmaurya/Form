<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "user";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Error: cannot connect." . mysqli_connect_error());
}


?>