<?php

include 'config.php';

$id = $_GET["id"];

$sql = "SELECT * FROM `produk` WHERE `id` =".$id;
$query = mysqli_query($conn,$sql);
$hasil = mysqli_fetch_object($query);

$_SESSION["cart"][$id] = [
    "judul" => $hasil->judul,
    "tujuan" => $hasil->tujuan,
    "harga" => $hasil->harga,
    "jumlah" => 1
];
    echo"<script>alert('Plans added!');window.location='ordertickets.php';</script>";
?>