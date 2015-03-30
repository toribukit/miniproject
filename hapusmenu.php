<?php
session_start();
include("koneksi.php");
include("class_menu.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 1){
header("location:index.php");
}

if (isset($_GET["id"])){
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);
$klien = $_SESSION['userID'];
$obj_menu = new menu;
$obj_menu->display($id, $mysqli);
$query ="SELECT nama FROM tempat_makan WHERE klien=$klien AND id=$obj_menu->tempat_makan";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
if (mysqli_num_rows($result) > 0) {
$obj_menu->delete($id, $mysqli);

header("location:menu.php?id=$obj_menu->tempat_makan");
	
}
else {
header("location:menu.php");
}
}
else {
header("location:menu.php");
}

?>