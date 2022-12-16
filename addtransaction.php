<?php
    include "config.php";

    $sql = "INSERT INTO `header_transaksis` (`tanggal_transaksi`) VALUES ('".date("Y-m-d")."')";
    $query = mysqli_query($conn,$sql);
    $id_transaksi = mysqli_insert_id($conn);

    foreach($_SESSION["cart"] as $cart => $val){
        $sql = "INSERT INTO `detail_transaksi` (`id_header_transaksi`,`id_produk`,`jumlah`) VALUES (".$id_transaksi.",".$cart.",".$val["jumlah"].")";
        $query = mysqli_query($conn,$sql);
    }
    
    echo"<script>alert('Success to checkout Plans');window.location='ordertickets.php';</script>";

    ?>