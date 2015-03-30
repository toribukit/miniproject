<?php
session_start();
include("koneksi.php");
include ("class_daftarTempatMakan.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET['nama']) && ($_GET['klien'] != 0) && isset($_GET['lokasi']))
{
$nama = $_GET['nama'];
$nama = mysqli_real_escape_string($mysqli, $nama);
$lokasi = $_GET['lokasi'];
$lokasi  = mysqli_real_escape_string($mysqli, $lokasi );
$jenis_lokasi = $_GET['jenis_lokasi'];
$jenis_lokasi= mysqli_real_escape_string($mysqli, $jenis_lokasi);
$klien = $_GET['klien'];
$klien = mysqli_real_escape_string($mysqli, $klien);
$kategori = $_GET['daftar_kategori'];
$kategori = mysqli_real_escape_string($mysqli, $kategori);

$obj_tempatmakan = new daftarTempatMakan;
$obj_tempatmakan->insert($nama, $lokasi, $jenis_lokasi, $klien, $kategori, $mysqli);

header("location:tempat_makan.php");	
}
else if (isset($_GET['nama'])) {
$msg = "Data belum diisikan dengan lengkap. Silahkan isikan dengan lengkap !";	
}
else {

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
<table width="100%" border=1px>
<tr>
<td width="9%">
</td>

<td width ="82%" align="left">
<table width="70%">
<tr>
<th><H1>Tambah Tempat Makan</H1><br /><br /></th>
<?php
if(isset($msg)){
print("<tr><td>$msg</td></tr>");
}
?>
</tr>
<tr>
<td>
<div  class="form">
    		<form id="contactform" action="tambahTempatMakan.php" method="get"> 
    			<p class="contact"><label for="nama">Nama</label></p> 
    			<input id="nama" name="nama" placeholder="nama" required="" tabindex="1" type="text" maxlength="25"> 
    			 
    			<p class="contact"><label for="lokasi">Lokasi</label></p> 
    			<input id="lokasi" name="lokasi" placeholder="lokasi" required="" type="text" maxlength="40"> 
                
                <p class="contact"><label for="jenis_lokasi">Kategori Lokasi</label></p> 
    			<select name="jenis_lokasi" class="select-style">
<option value="0" selected="selected">Pilih Lokasi</option>
<?php
$query = "SELECT*FROM jenis_lokasi";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>

    			 
                <p class="contact"><label for="klien">Klien</label></p> 
    			<select name="klien" class="select-style">
<option value=0 selected="selected">Pilih Klien</option>
<?php
$query = "SELECT*FROM user WHERE level=1";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>

<p class="contact"><label for="kategori">Kategori</label></p>
 <select name="daftar_kategori" class="select-style">
<option value=0 selected="selected">Pilih Kategori</option>
<?php
$query = "SELECT * FROM daftar_kategori";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select><br><br>            
            
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Tambah Tempat Makan" type="submit"> 	 
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

<table width="100%" border="1">
<tr>
<td bgcolor="#666633" align="center" width:100%>
Created by Tori
</td>
</tr>
</table>

</body>
</html>