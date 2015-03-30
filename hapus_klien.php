<?php
session_start();
include("koneksi.php");
include_once("class_akunKlien.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET["id"])){
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);

$obj_akun = new akun_klien;
$obj_akun->delete($id, $mysqli);

header("location:akun_klien.php");

}
else {
header("location:akun_klien.php");
}

?>