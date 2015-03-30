<?php
session_start();
include("koneksi.php");
include_once("data_rating.php");

if (isset($_GET["rating"]) && isset($_GET["tempat"])){
$rating=$_GET["rating"] ;
$rating= mysqli_real_escape_string($mysqli, $rating);
$id=$_GET["tempat"] ;
$id= mysqli_real_escape_string($mysqli, $id);
}
else if(isset($_GET["tempat"])) {
$id=$_GET["tempat"] ;
$id= mysqli_real_escape_string($mysqli, $id);
header("location:tempatmakan.php?id=$id");
}
else {
header("location:index.php");
}

if (!isset($_SESSION['login'])){
header("location:login_user.php");
}

$obj_rating = new data_rating;
$user = $obj_rating->retrieve($_SESSION['userID'],$id, $mysqli);

if($user == 0){
$obj_rating->rate($_SESSION['userID'], $id, $rating, $mysqli);
header("location:tempatmakan.php?id=$id");
}
else {
$obj_rating->unrate($_SESSION['userID'], $rating, $mysqli);
header("location:tempatmakan.php?id=$id");
}
?>