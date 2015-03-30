<?php
session_start();
include("koneksi.php");
include ("class_kategori.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET["id"]) && isset($_GET['kategori'])){
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);
$kategori = $_GET["kategori"];
$kategori = mysqli_real_escape_string($mysqli, $kategori);

$obj_kategori = new kategori;
$obj_kategori->delete($id, $mysqli, $kategori);

if ($kategori == "jenis_lokasi"){
$id = 1;
}
if ($kategori == "jenis_makanan"){
$id = 2;
}
if ($kategori == "daftar_kategori"){
$id = 3;
}

header("location:kategori.php?id=$id");

}
else {
header("location:setting.php");
}

?>