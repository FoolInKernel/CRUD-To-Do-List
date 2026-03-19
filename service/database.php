<?php

$conn =mysqli_connect("localhost" , "root" , "188209" , "crud");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}