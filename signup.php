<?php 

include("koneksi.php");

if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['name'])){
$username = $_GET['username'];
$username = mysqli_real_escape_string($mysqli, $username);
$password = $_GET['password'];
$password = mysqli_real_escape_string($mysqli, $password);
$repassword = $_GET['repassword'];
$repassword = mysqli_real_escape_string($mysqli, $repassword);
if ($password == $repassword){


$password2 = sha1($password);
$name = $_GET['name'];
$name = mysqli_real_escape_string($mysqli, $name);
$email = $_GET['email'];
$email = mysqli_real_escape_string($mysqli, $email);
$BirthMonth = $_GET['BirthMonth'];
$BirthMonth = mysqli_real_escape_string($mysqli, $BirthMonth);
$BirthDay = $_GET['BirthDay'];
//$BirthDay = mysqli_real_escape_string($mysqli, $BirthDay);
$BirthYear = $_GET['BirthYear'];
//$BirthYear = mysqli_real_escape_string($mysqli, $BirthYear);
$gender = $_GET['gender'];
$gender = mysqli_real_escape_string($mysqli, $gender);
if (is_numeric($BirthDay) && is_numeric($BirthYear)){

$query = "SELECT id from user WHERE user_name = '$username'";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));

if (mysqli_num_rows($result) == 0) {
$query2 = "INSERT INTO user( user_name, password, level) VALUES ('$username', '$password2', 2)";
$result = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
if (mysqli_num_rows($result) == 0) {
$query3 = "SELECT id from user WHERE user_name = '$username'";
$result = mysqli_query($mysqli, $query3) or die (mysqli_error($mysqli));
while ($row = mysqli_fetch_row($result)){
	$id = $row[0];
	$query4 = "INSERT INTO biodata(nama, email, gender, lahir_bln, lahir_tgl, lahir_thn, user) VALUES ('$name', '$email', '$gender', '$BirthMonth', $BirthDay, $BirthYear, $id) ";
	$result = mysqli_query($mysqli, $query4) or die (mysqli_error($mysqli));
		if (mysqli_num_rows($result) == 0) {
		$scs = "Selamat ! <br> Akun telah berhasil dibuat.";
		header("location:signup.php?scs=$scs");
		}
		else {
		$msg = "data gagal ditambahkan1";
		}
}

}
else {
$msg = "data gagal ditambahkan2";
}
}
else {
$msg = "User name telah dipakai, silahkan mengganti dengan yang lain";
}

}
else {
$msg = "tanggal lahir dan tahun lahir harus numeric";
}
}
else {
$msg = "password belum sesuai, silahkan isikan kolom confirm password dengan benar";
}
}

if (isset($msg)){
header("location:signup.php?msg=$msg");
}


else {
if (isset($_GET['msg'])){
$msg = $_GET['msg'];
}
if (isset($_GET['scs'])){
$scs = $_GET['scs'];
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
<td bgcolor="#E0E0E0">
<span align = "right">
<form id="login" name="login" method="post" action="signin.php">
<input type="text" id="username" name="username" maxlength ="25" />
<input type="password" id="password" name="password" maxlength ="25" />
<input type="submit" name="blogin" id="blogin" value="Sign in" />


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
<?php
if (isset($scs)){
print("<header>");
print("<h1 align=\"center\">$scs</h1>");
print("</header>");
}
else { 
?>

<header>
<h1 align="center">Sign Up</h1>
<br />
<?php
if (isset($msg)){
print("<h2 align=\"center\">$msg</h2>");
}
?>
</header>
<br />


      <div  class="form">
    		<form id="contactform" action="signup.php" method="get"> 
    			<p class="contact"><label for="name">Name</label></p> 
    			<input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text" maxlength="25"> 
    			 
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email" maxlength="45"> 
                
                <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text" > 
    			 
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" required=""> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword" required=""> 
        
               <fieldset>
                 <label>Birthday</label>
                  <label class="month"> 
                  <select class="select-style" name="BirthMonth">
                  <option value="">Month</option>
                  <option  value="01">January</option>
                  <option value="02">February</option>
                  <option value="03" >March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12" >December</option>
                  </label>
                 </select>    
                <label>Day<input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required="" type="number"></label>
                <label>Year <input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required="" type="number"></label>
              </fieldset>
  
            <select class="select-style gender" name="gender">
            <option value="select">i am..</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="others">Other</option>
            </select><br><br>
            
            
            
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit"> 	 
   </form> 
</div> 




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