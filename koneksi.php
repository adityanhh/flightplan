<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "flightplan";
$koneksi = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_errno()) {
    echo "error ngab : " .mysqli_connect_error();
} else {
    echo "";
}