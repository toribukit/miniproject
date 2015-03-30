<?php
session_start();

include("koneksi.php");
include_once("class_datatestimoni.php");
if (!isset($_SESSION['login'])){
	header("location:login_user.php");
}


if (isset($_GET["id"])){
$id=$_GET["id"] ;
$id= mysqli_real_escape_string($mysqli, $id);
}
else if (isset($_GET['testimoni']) && isset($_GET["tempatmakan"])) {
$testimoni=$_GET['testimoni'] ;
$testimoni= mysqli_real_escape_string($mysqli, $testimoni);
$tempatmakan=$_GET["tempatmakan"] ;
$tempatmakan= mysqli_real_escape_string($mysqli, $tempatmakan);
$user = $_SESSION['userID'];

$tbhtesti = new data_testimoni;
$tbhtesti -> save($user, $tempatmakan, $testimoni, $mysqli);

header("location:testimony.php?id=$tempatmakan");
}
else {
header("location:index.php");
}


if (isset($testimoni)){
}
else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
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
<table width="100%" border=0px>
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
$query="SELECT * FROM tempat_makan WHERE id= $id";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)) {
	$nama = $row[1];
	$rating = $row[8];
}
}
else {
header("location:index.php");
}

?>
<table width="90%" border="0">
<tr>
<td width="60%">
<table border="0">
<tr>
<td style="font-size:30px;"> <a href="tempatmakan.php?id=<?php echo $id; ?>"> <?php print($nama); ?> </a>| Testimoni</td>
</tr>
<tr>
<td>Our Testimony</td>
</tr>
<tr>
<td><?php print($nama); ?></td>
</tr>
<tr>
<td>Rating : <?php print($rating); ?></td>
</tr>
</table>
<br />
<br />


<table>
<tr>
<td>USER</td>
</tr>
<tr>
<td>
<form action="tambahtestimoni.php" method="get" name="tbh_testimoni">
<input type="hidden" id="tempatmakan" name="tempatmakan" value="<?php echo $id;?>" />
<textarea required="required" name="testimoni" id="testimoni" rows="10" cols="50" >

</textarea>
<br />
<br />
</td>
</tr>
<tr>
<td align="right">
<button value="send" type="submit">Send</button>
</form>
</td>
</tr>
</table>

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
<?php
}
?>