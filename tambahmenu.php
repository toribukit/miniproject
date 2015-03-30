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
$query ="SELECT nama FROM tempat_makan WHERE klien=$klien AND id=$id";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
if (mysqli_num_rows($result) > 0) {

if (isset($_GET['makanan']))
{
	$tempat_makan = $id;
	$tempat_makan = mysqli_real_escape_string($mysqli, $tempat_makan);
	$makanan = $_GET['makanan'];
	$makanan = mysqli_real_escape_string($mysqli, $makanan);
	$harga = $_GET['harga'];
	$harga = mysqli_real_escape_string($mysqli, $harga);
	if (! is_numeric($harga)){$harga = 0;}
	$kategori_makanan = $_GET['kategori_makanan'];
	$kategori_makanan = mysqli_real_escape_string($mysqli, $kategori_makanan);
	$Jenis_Makanan = $_GET['Jenis_Makanan'];
	$Jenis_Makanan = mysqli_real_escape_string($mysqli, $Jenis_Makanan);
	
	$obj_menu = new menu;
	$obj_menu->add($tempat_makan, $makanan, $harga, $kategori_makanan, $Jenis_Makanan, $mysqli);
	header("location:menu.php?id=$id");
	
}
	
}
else {
header("location:menu.php");
}
}
else {
header("location:menu.php");
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
<td><H1>Tambah Menu</H1><br /><br /></td>
</tr>
<form action="tambahmenu.php" method="get">
<tr>
<td>
<table style="border-collapse:separate" cellspacing="7px">
<tr>
<td>Nama Menu</td>
<td>
<input id="makanan" name="makanan" placeholder="nama menu" required="" type="text" > 
</td>
</tr>
<tr>
<td>Makanan / Minuman</td>
<td>
<select name="kategori_makanan" size="1">
<option value =1 >Makanan</option>
<option value =2 >Minuman</option>
</select>
</td>
</tr>
<tr>
<td>Jenis Menu</td>
<td>
<select name="Jenis_Makanan" size="1">
<option value =0 selected="selected">Pilih Jenis Makanan</option>
<?php
$query = "SELECT * FROM jenis_makanan";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>
</td>
</tr>
<tr>
<td>Harga (K)</td>
<td>
<input id="harga" name="harga" required="" type="text" > 
</td>
</tr>
<tr>
<td colspan="2">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<input class="buttom" name="submit" id="submit" tabindex="5" value="Tambah Menu" type="submit">
</td>
</tr>
</form>
</table>
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