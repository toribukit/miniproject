<?php
session_start();
include("koneksi.php");
include ("class_datatestimoni.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}

if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET["id"])){
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);

$obj_testi = new data_testimoni;
$obj_testi->delete($id, $mysqli);

header("location:testi_admin.php");
}
else {
header("location:testi_admin.php");
}
?>