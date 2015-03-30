<?php
session_start();
include("koneksi.php");



if (isset($_POST['password']) && isset($_POST['username'])){
$username=$_POST['username'];
$username = mysqli_real_escape_string($mysqli, $username);
$password=$_POST['password']; 
$password = mysqli_real_escape_string($mysqli, $password);
$password2 = sha1($password);

$myquery="SELECT * FROM user where user_name='$username' and password='$password2' limit 1";
$result=mysqli_query($mysqli,$myquery) or die (mysql_error()); 
if (mysqli_num_rows($result) == 1) { 
 $_SESSION['login']=true; 
 $_SESSION['uname']=$username;
 while ($row = mysqli_fetch_row($result)) {
 $_SESSION['userID'] = $row[0];
 }
 
 header("location:index.php");
}
else {
$msg = "Username dan Email tidak valid !";
}
 
}
else {
header("location:index.php");
}

if (isset($msg)) {
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

</td></tr>
<tr>
<td bgcolor="#E0E0E0">
<span align = "right">
<form id="login" name="login" method="post" action="signin.php">
<input type="text" id="username" name="username" maxlength ="25" />
<input type="password" id="password" name="password" maxlength ="25" />
<input type="submit" name="blogin" id="blogin" value="Sign in" />


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
   <li><a href='#'>Tentang Kami</a></li>
   <li><a href='#'>Daftar Tempat Makan</a></li>
   <li><a href='#'>Kontak</a></li>
</ul>
</td>
<td width="25%">
<span align = "right">
<form>
<input class="inputan" type="text" placeholder="Cari disini..."required>
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

<h1>Cari Berdasarkan <br />Kategori</h1>


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
<td width="56%" class="container">
<header>
<h1 align="center"><?php echo $msg; ?></h1>
<br />
<h2 align="center">Silahkan masukan kembali username dan password anda</h2>
</header>
<br />
<div  class="form">
<form id="login" name="login" method="post" action="signin.php">
 <p class="contact"><label for="username">Username</label></p> 
  <input id="username" name="username" placeholder="username" required="" tabindex="2" type="text" > 
 <p class="contact"><label for="password">password</label></p> 
  <input type="password" id="password" name="password" required=""> 
  <input class="buttom" name="submit" id="submit" tabindex="5" value="Login" type="submit"> 	 
   </form> 
</div>

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