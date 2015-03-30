<?php 
session_start();
include("koneksi.php");

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">

div#FormLogin {
	width:400px;
	margin:0 auto;
	border:1px solid #444;
	padding:20px;
	background-color:#333;
	border-radius:20px;
	color:#fff;
}
div#FormLogin h1 {
	text-align:center;
	border-bottom:1px solid #ccc;
	padding:10px;
	margin:5px;
	;
	font-size:22px;
}
div#FormLogin label {
	float:left;
	width:150px;
}
div#FormLogin .text {
	margin-bottom:5px;
}
</style>
</head>
<body>

<?php //Penangganan login jika form diisi 
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['kodeacak'])) 
{ //cek isian 
if(!empty($_POST['username']) && !empty($_POST['password']) &&!empty ($_POST['kodeacak']) ) 
{ 
if($_SESSION['kodecap'] == $_POST['kodeacak']) {

$username=$_POST['username']; 
$username = mysqli_real_escape_string($mysqli, $username);
$password=$_POST['password']; 
$pasword = mysqli_real_escape_string($mysqli, $password);
$password=sha1($password);

$myquery="SELECT * FROM user where user_name='$username' and password='$password' limit 1"; 
$result=mysqli_query($mysqli, $myquery) or die (mysqli_error($mysqli)); 
if (mysqli_num_rows($result) == 1) { 


while ($row = mysqli_fetch_row($result)) {
				$level = $row[3];
				$userID= $row[0];
				
				}
 $_SESSION['login']=true; 
 $_SESSION['uname']=$username;
 $_SESSION['userID']= $userID; 
 $_SESSION['level']=$level;
 
 if($level == 0){
 header("location:beranda_admin.php");
 }
 if($level == 1){
 header("location:beranda_klien.php");
 }
 }
 
 
 
 else { //jika username dan password tidak cocok 
 echo "<h1 align=\"center\">Username atau password salah!</h1>"; }}  
 
 
 else {
 echo "<h1 align=\"center\">Captcha anda salah !</h1>";
 }
 }
 else { //jika form kosong munculkan pesan 
 echo "<h1 align=\"center\">Isikan data secara lengkap !</h1>"; 
 } 
 } 
 ?> 
 <div id="FormLogin">
  <h1>LOGIN APLIKASI </h1>
  <form id="FLogin" name="FLogin" method="post" action="">
    <label>Akun</label>
    :
    <input name="username" type="text" id="username" size="25" maxlength="30" class="text">
    <br>
    <label>Password</label>
    :
    <input name="password" type="password" id="password" size="25" maxlength="30" class="text">
    <br>
	<label>Masukan captcha</label>
    :
    <input name="kodeacak" type="text" id="kodeval" size="10" maxlength="30" class="text">
    
	
	<p align="center"><img src="kodeacak.php" width="75" height="25" alt="Kode Acak" /></p>
    <p align="center">
      <input type="submit" name="button" id="button" value="Login" />
      <input type="reset" name="Reset" id="button" value="Reset" />
    </p>
  </form>
  
</div>
</body>
</html>
