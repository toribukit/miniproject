<?php
session_start();
include("koneksi.php");
include("class_kategori.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (!isset($_GET['id'])){
header("location:setting.php");
}
else {
$id = $_GET["id"];
$id = mysqli_real_escape_string($mysqli, $id);

if ($id == 1){
	$judul = "Lokasi";
	$kategori = "jenis_lokasi";
}
else if ($id == 2){
	$judul = "Jenis Makanan";
	$kategori = "jenis_makanan";
}
else if ($id == 3){
	$judul = "Jenis Tempat Makan";
	$kategori = "daftar_kategori";
}
else {
header("location:setting.php");
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" type="text/css" href="style2.css" media="all" />
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
   <li><a href='beranda_admin.php'>Beranda</a></li>
   <li><a href='akun_klien.php'>Akun Klien</a></li>
   <li><a href='akun_user.php'>Akun User</a></li>
   <li><a href='tempat_makan.php'>Tempat Makan</a></li>
   <li><a href='testi_admin.php'>Testimoni</a></li>
   <li><a href='setting.php'>Setting</a></li>
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

<td width ="82%" align="left">
<table width="70%">
<tr>
<th><H1><?php echo $judul;?> :</H1><br /><br /></th>
</tr>
<?php
$obj_kategori = new kategori;
$obj_kategori->display($mysqli, $kategori);
echo $obj_kategori->display;
?>
<tr>
<td colspan="3"><br /><br /><a href="tambahkategori.php?kategori=<?php echo $kategori;?>">Tambah Pilihan Kategori</a></td>
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