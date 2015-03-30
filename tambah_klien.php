<?php
session_start();
include("koneksi.php");
include_once("class_akunKlien.php");

if (!isset($_SESSION['login'])){
header("location:index.php");
}
if ($_SESSION['level'] != 0){
header("location:index.php");
}

if (isset($_GET['msg'])){
$msg = $_GET['msg'];
$msg = mysqli_real_escape_string($mysqli, $msg);
}

if (isset($_GET["username"]) && isset($_GET["password"])) {
	$nama = $_GET["name"];
	$nama = mysqli_real_escape_string($mysqli, $nama);
	$alamat = $_GET["address"];
	$alamat = mysqli_real_escape_string($mysqli, $alamat);
	$telp = $_GET["telp"];
	$telp = mysqli_real_escape_string($mysqli, $telp);
	$username = $_GET["username"];
	$username = mysqli_real_escape_string($mysqli, $username);
	$password = $_GET["password"];
	$password = mysqli_real_escape_string($mysqli, $password);
	$repassword = $_GET["repassword"];
	$repassword = mysqli_real_escape_string($mysqli, $repassword);
	$email = $_GET["email"];
	$email = mysqli_real_escape_string($mysqli, $email);
	
	
	if ($password != $repassword) {
	header("location:tambah_klien.php?msg=password belum benar, silahkan ulangi <a href=tambah_klien.php>disini</a>");
	}
	else if (!isset($_GET["name"]) or !isset($_GET["address"]) or !isset($_GET["telp"]) or !isset($_GET["username"]) or !isset($_GET["password"]) or !isset($_GET["repassword"]) or !isset($_GET["email"])){
		
	header("location:tambah_klien.php?msg=data belum lengkap, silahkan ulangi <a href=tambah_klien.php>disini</a>");
	}
	else {
	$password2 = sha1($password);
	
	$obj_klien = new akun_klien;
	$msg = $obj_klien->save($nama, $alamat, $telp, $username, $password2, $email, $mysqli);
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
   <li><a href='beranda_admin.php'>Beranda</a></li>
   <li><a href='akun_klien.php'>Akun Klien</a></li>
   <li><a href='akun_user.php'>Tempat Makan</a></li>
   <li><a href='testi_admin.php'>Testimoni</a></li>
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

<td width ="82%" align="center">
<?php
if (isset($msg)){
echo "<H1>$msg</H1>";
}
else {
?>
<table>
<tr>
<td><H1>Tambah Akun Klien</H1></td>
</tr>
<tr>
<td>
<div  class="form">
<form id="tambahKlien" name="tambahKlien" method="GET" action="tambah_klien.php">
<p class="contact"><label for="name">Nama Klien</label></p>
<input id="name" name="name" placeholder="name" required="" tabindex="2" type="text" maxlength="25"> 
<p class="contact"><label for="address">Alamat Klien</label></p>
<input id="address" name="address" placeholder="alamat" required="" tabindex="2" type="text" maxlength="25"> 
<p class="contact"><label for="telp">No. Telp Klien</label></p>
<input id="telp" name="telp" placeholder="telp" required="" tabindex="2" type="text" maxlength="25">
<p class="contact"><label for="username">Create a username</label></p> 
<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text" > 
 <p class="contact"><label for="password">Create a password</label></p> 
<input type="password" id="password" name="password" required=""> 
<p class="contact"><label for="repassword">Confirm your password</label></p> 
<input type="password" id="repassword" name="repassword" required=""> 
<p class="contact"><label for="email">Email</label></p> 
<input id="email" name="email" placeholder="example@domain.com" required="" type="email" maxlength="45"><br /><br />  
<input class="buttom" name="submit" id="submit" tabindex="5" value="Tambah Klien" type="submit">

</form>
</td>
</tr>
</table>
<?php
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