<?php
session_start();
include("koneksi.php");
include("class_daftarTempatMakan.php");

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
$query ="SELECT nama FROM tempat_makan WHERE klien=$klien AND id=$id";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
if (mysqli_num_rows($result) > 0) {

if (isset($_GET["value"]))
{
$value = $_GET["value"];
$value = mysqli_real_escape_string($mysqli, $value);

$obj_deskripsi= new daftarTempatMakan;
$obj_deskripsi->update_deskripsi($id, $value, $mysqli);

$msg = "Deskripsi telah berhasil ditambahkan / diubah.";
header("location:desripsi_restoran.php?msg=$msg");	
}
	
}
else {
header("location:desripsi_restoran.php");
}
}
else {
header("location:desripsi_restoran.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" type="text/css" href="demo.css" media="all" />


   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<title>Makan Apaya ?</title>
<style>

table {
    border-collapse: collapse;
}
</style>



</head>

<body>

<table width="100%"  height="200px">
<tr height="180px"><td width=100%>
<img name="banner" src="images/cutlery23.jpg" width="600" height="170px" alt="" />
</td></tr>

</table>
<br />


<table width="100%" border="0">
<tr>
<td width="9%">
</td>
<td width="56%" id='cssmenu'>
<ul>
   <li><a href='beranda_klien.php'>Beranda</a></li>
   <li><a href='desripsi_restoran.php'>Deskripsi Restoran</a></li>
   <li><a href='menu_restoran.php'>menu Restoran</a></li>
   <li><a href='logout.php'>Logout</a></li>
</ul>
</td>
<td width="25%">


</td>
<td width="9%">
</td>
</tr>
</table>
<br />
<br />
<table width="100%" border=0px>
<tr>
<td width="9%">
</td>

<td width ="82%">
<table>
<tr>
<td><H1>Deskripsi Restoran</H1><br /><br /></td>
</tr>
<?php

?>
<tr>
<td>
<?php
$obj_deskripsi = new daftarTempatMakan;
$obj_deskripsi->get_deskripsi($id, $mysqli);
?>
<form action="editdeskripsi.php" method="get">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<textarea name="value" cols="60" rows="10"><?php echo $obj_deskripsi->deskripsi; ?></textarea><br />
<input class="buttom" name="submit" id="submit" tabindex="5" value="Simpan Deskripsi" type="submit">
</form>
</td>
</tr>
</table>

</td>

<td width="9%">
</td>
</tr>
</table>

<br />
<br />

<table width="100%" border="0">
<tr>
<td bgcolor="#666633" align="center" width:100%>
Created by Tori
</td>
</tr>
</table>

</body>
</html>