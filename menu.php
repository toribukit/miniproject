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
	
}
else {
header("location:menu_restoran.php");
}
}
else {
header("location:menu_restoran.php");
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
<table width="100%">
<tr>
<td><H1>Menu Restoran</H1><br /><br /></td>
</tr>
<tr>
<td>
<table border="1" width="100%">
<tr>
<td style="font-size:30px;" colspan="4" align="center">Menu Makanan</td>
</tr>
<tr style="font-size:24px;" align="center">
<td>Menu</td>
<td>Harga (K)</td>
<td></td>
<td></td>
</tr >
<?php
$query_makanan ="SELECT * FROM menu WHERE tempat_makan=$id and kategori_makanan = 1";
$result = mysqli_query($mysqli, $query_makanan) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)) {
	print("<tr style=\"font-size:20px;\">");
	print("<td>$row[1]</td><td>$row[3]</td><td><a href=\"ubahmenu.php?id=$row[0]\">Change</a></td><td><a href=\"hapusmenu.php?id=$row[0]\">Delete</td>");
	print("</tr>");
}
}
else {
?>
<tr>
<td colspan="4" align="center">Tidak Ada Menu Makanan</td>
</tr>
<?php
}
?>
<tr>
<td style="font-size:30px;" colspan="4" align="center">Menu Minuman</td>
</tr>
<tr style="font-size:24px;" align="center">
<td>Menu</td>
<td>Harga (K)</td>
<td></td>
<td></td>
</tr >
<?php
$query_makanan ="SELECT * FROM menu WHERE tempat_makan=$id and kategori_makanan = 2";
$result = mysqli_query($mysqli, $query_makanan) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)) {
	print("<tr style=\"font-size:20px;\">");
	print("<td>$row[1]</td><td>$row[3]</td><td><a href=\"ubahmenu.php?id=$row[0]\">Change</a></td><td><a href=\"hapusmenu.php?id=$row[0]\">Delete</td>");
	print("</tr>");
}
}
else {
?>
<tr>
<td colspan="4" align="center">Tidak Ada Menu Minuman</td>
</tr>
<?php
}
?>


</tr>
</table>
<br />
<br />

<form action="tambahmenu.php" method="get">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<input class="buttom" name="submit" id="submit" tabindex="5" value="Tambah Menu" type="submit">
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