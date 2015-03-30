<?php 
session_start();
include("koneksi.php");


 
 $batas = 10;
$page = isset( $_GET['page'] ) ? $_GET['page'] : "";

if ( empty( $page ) ) {
$posisi = 0;
$page = 1;
} 
else {
$posisi = ( $page - 1 ) * $batas;
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
<tr>
<?php
if(isset($_SESSION['login'])){
?>
<td bgcolor="#E0E0E0" width="100%" align="right">

Welcome, <?php echo $_SESSION['uname'];?> | <a href="logout.php">Logout</a>  

</td>
<?php
}
else {
?>
<td bgcolor="#E0E0E0">
<span align = "right">
<form id="login" name="login" method="post" action="signin.php">
<input type="text" id="username" name="username" maxlength ="25" />
<input type="password" id="password" name="password" maxlength ="25" />
<input type="submit" name="blogin" id="blogin" value="Sign in"/>

</form>

</span>
</td>
<td>
<span align = "right">
<form id="signup" name="signup" method="post" action="signup.php">
<input type="submit" name="bsignup" id="bsignup" value="Sign up" />

</form>

</span>
</td>
<?php
}
?>
</tr>
</table>
<br />


<table width="100%" border="0">
<tr>
<td width="9%">
</td>
<td width="56%" id='cssmenu'>
<ul>
   <li><a href='index.php'>Beranda</a></li>
   <li><a href='aboutus.php'>Tentang Kami</a></li>
   <li><a href='daftartempatmakan.php'>Daftar Tempat Makan</a></li>
   <li><a href='contactus.php'>Kontak</a></li>
</ul>
</td>
<td width="25%">
<span align = "right">
<form id="cari_keyword" name="cari_keyword" method="GET" action="carikeyword.php">
<input id="keyword" name="keyword" class="inputan" type="text" placeholder="Cari disini..."required>
<button class="submit" type="submit">Cari</button>
</form>
</span>

</td>
<td width="9%">
</td>
</tr>
</table>
<br />
<br />
<table width="100%" border="0">
<tr>
<td width="9%">
</td>
<td width="18%" valign="top">
Cari Berdasarkan Kategori
<br />
<br />
<table width="90%" border=0px>
<tr>
<td>
<form action="carikategori.php" method="get" name="cari_kategori">
<select name="Harga" size="1" >

<option value="null" selected="selected">Pilih Harga</option>
<option value="between 0 and 29">dibawah 30 k</option>
<option value="between 30 and 49">30k - 50k</option>
<option value="between 50 and 99">50k - 100k</option>
<option value=" >= 100">diatas100k</option>
</select>

<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Lokasi" size="1">
<option value=0 selected="selected">Pilih Lokasi</option>
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
<br />
<br />
</td>
</tr>
<tr>
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
<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Jenis_Tempat_Makan">
<option value =0 selected="selected">Pilih Jenis Tempat Makan</option>
<?php
$query = "SELECT * FROM daftar_kategori";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>
<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Rating">
<option value="null" selected="selected">Pilih Rating</option>
<option value="between 1 and 1.9">1 Stars</option>
<option value="between 2 and 2.9">2 Stars</option>
<option value="between 3 and 3.9">3 Stars</option>
<option value="between 4 and 4.9">4 Stars</option>
<option value="between 5 and 5.9">5 Stars</option>


</select>
<br />
<br />
<button value="Cari" type="submit">Cari</button>
</form>
</td>
</tr>


</table>
</td>
<td width="56%" valign="top" align="center">
<?php
$query = "select * from tempat_makan limit $posisi, $batas";
$result= mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));

if(mysqli_num_rows($result) > 0){ 
while ($row2 = mysqli_fetch_row($result)) {
print("<table border=0 width=\"70%\">");
print("<tr height=\"18%\"><td align= left  valign=\"bottom\" width=\"60%\" style=\"font-size:25px;\"><b>".$row2[1]."</b></td>");
print("<td rowspan=\"3\" width=\"40%\"><img name=\"cari\" src=\"images/caloria.jpg\" width=\"300\" height=\"300\" alt=\"\" /></td></tr> ");
print("<tr><td align= left valign=\"top\" width=\"60%\" height=\"72%\">".$row2[6]."</td></tr>");
print("<tr><td align=right  height=\"10%\"><a href=\"tempatmakan.php?id=".$row2[0]."\" >read more</a></td></tr>");
//print($row2[0]."<br>"."<br>".$row2[2]."<br>");
print("</table>");
print("<br>");
print("<br>");



}
$query="select * from tempat_makan WHERE deskripsi";
$jml_data = mysqli_num_rows(mysqli_query($mysqli, $query));
$JmlHalaman = ceil($jml_data / $batas);

if ( $page > 1 ) {
$link = $page-1;
$prev = "<a href='carikeyword.php?page=$link&keyword=$keyword'>Sebelumnya </a>";
}
else {
$prev = "Sebelumnya ";
}

if ( $page < $JmlHalaman ) {
$link = $page + 1;
$next = " <a href='carikeyword.php?keyword=$keyword&page=$link'>Selanjutnya</a>";
}
else {
$next = " Selanjutnya";
}

echo $prev. " | ".$next;
}
else
{
	print("Data Tidak ditemukan");
}


?>
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