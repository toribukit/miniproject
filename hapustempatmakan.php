<?php
session_start();
include("koneksi.php");
include ("class_daftarTempatMakan.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}

if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET["id"])){
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);

$obj_tempatmakan = new daftarTempatMakan;
$obj_tempatmakan->delete($id, $mysqli);

header("location:tempat_makan.php");
}
else {
header("location:tempat_makan.php");
}
?>