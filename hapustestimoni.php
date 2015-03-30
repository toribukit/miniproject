<?php
session_start();

include("koneksi.php");
include_once("class_datatestimoni.php");

if (!isset($_SESSION['login'])){
	header("location:index.php");
}

if (isset($_GET["id"])){
$id=$_GET["id"] ;
$id= mysqli_real_escape_string($mysqli, $id);

$query = "SELECT user, tempat_makan FROM testimoni WHERE id=$id";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				$user = $row[0];
				if ($user == $_SESSION['userID']){
				$obj_testimoni = new data_testimoni;
				$obj_testimoni->delete($id, $mysqli);
				
				header("location:testimony.php?id=$row[1]");
				
				}
			  
			}
			
		}
		else {
				header("location:index.php");
		}
}
else {
header("location:index.php");
}

?>