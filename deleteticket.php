<?php
    include "config.php";
    $id = $_GET["id"];

    unset($_SESSION["cart"][$id]);
    echo"<script>alert('Plans Removed');window.location='ordertickets.php';</script>";

?>