<?php
session_start();
include("koneksi.php");
include_once("data_rating.php");

if (isset($_GET["id"])){
$id=$_GET["id"] ;
$id= mysqli_real_escape_string($mysqli, $id);
}
else {
header("location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="coba.css">
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" type="text/css" href="demo.css" media="all" />
<script type="text/javascript" src="nivoslider/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//  Check Radio-box
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

     
});
</script>
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
	$lokasi = $row[2];
	$deskripsi = $row[6];
	
}
$obj_rating = new data_rating;
if (isset($_SESSION['login'])){
$user = $obj_rating->retrieve($_SESSION['userID'],$id, $mysqli);
}
else{$user = 0;}

}
else {
header("location:index.php");
}

?>
<table width="100%" border="0">
<tr>
<td width="60%">
<table border="0" width="100%">
<tr>
<td style="font-size:30px;" colspan="2"><?php print($nama); ?> | <a href="testimony.php?id=<?php echo $id; ?>">Testimoni</a></td>
</tr>
<tr>
<td>Rating : <?php print($obj_rating->display($id,$mysqli)); ?></td>
<td align="right">
<div class="rating">
  <form id="rating" name="rating" method="get" action="rating.php">
  <table>
  <tr>
  <td>
    <span <?php if($user == 5){echo ("class=\"checked\"");}?>>
     <input type="radio" name="rating" id="str5" value="5" ><label for="str5"></label></span>
    <span <?php if($user == 4){echo ("class=\"checked\"");}?>><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
    <span <?php if($user == 3){echo ("class=\"checked\"");}?>><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
    <span <?php if($user == 2){echo ("class=\"checked\"");}?>><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
    <span <?php if($user == 1){echo ("class=\"checked\"");}?>><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
   </td>
   <td>
   	<input type="hidden" name="tempat" id="tempat" value="<?php echo($id);?>" />
    <input type="submit" name="coba" id="coba" value="Rate !"/>
  </td>
  </tr>
  </table>
   
   </form>
</div>
</td>
</tr>
<tr>
<td colspan="2">Lokasi : <?php print($lokasi); ?></td>
</tr>
<tr>
<td colspan="2"> <?php print($deskripsi); ?></td>
</tr>
</table>
<br />
<br />

<table border="1" width="100%">
<tr>
<td style="font-size:30px;" colspan="2" align="center">Menu Makanan</td>
</tr>
<tr style="font-size:24px;" align="center">
<td>Menu</td>
<td>Harga</td>
</tr >
<?php
$query_makanan ="SELECT * FROM menu WHERE tempat_makan=$id and kategori_makanan = 1";
$result = mysqli_query($mysqli, $query_makanan) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)) {
	print("<tr>");
	print("<td>$row[1]</td><td>$row[3]</td>");
	print("</tr>");
}
}
else {
?>
<tr>
<td colspan="2" align="center">Tidak Ada Menu Makanan</td>
</tr>
<?php
}
?>
<tr>
<td style="font-size:30px;" colspan="2" align="center">Menu Minuman</td>
</tr>
<tr style="font-size:24px;" align="center">
<td>Menu</td>
<td>Harga</td>
</tr >
<?php
$query_makanan ="SELECT * FROM menu WHERE tempat_makan=$id and kategori_makanan = 2";
$result = mysqli_query($mysqli, $query_makanan) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)) {
	print("<tr>");
	print("<td>$row[1]</td><td>$row[3]</td>");
	print("</tr>");
}
}
else {
?>
<tr>
<td colspan="2" align="center">Tidak Ada Menu Minuman</td>
</tr>
<?php
}
?>


</tr>
</table>
</td>
<td width="40%" align="center" valign="top">
<img name="<?php echo $nama; ?>" src="images/HISTORICA-02.jpg" width="200" height="200" alt="" />
</td>

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