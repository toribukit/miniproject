<?php
session_start();
include("koneksi.php");
include ("class_akunUser.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET["id"])){
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);

$obj_user = new akunUser;
$obj_user->delete($id, $mysqli);

header("location:akun_user.php");

}
else {
header("location:akun_user.php");
}

?>