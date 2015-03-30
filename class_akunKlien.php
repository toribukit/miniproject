<?php
include("koneksi.php");

class akun_klien
{
	public $nama;
	public $alamat;
	public $email;
	public $telp;
	public $img;
	public $id;
	public $display = "";
	public $msg;
	
	public function delete($user, $mysqli)
	{
		$query = "DELETE FROM biodata WHERE user=$user";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		$query2 = "DELETE FROM user WHERE id=$user";
		$result2 = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
		
	}
	
	public function display($mysqli)
	{
		$query = "SELECT * FROM user WHERE level=1";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				$this->id = $row[0];
				$query2 = "SELECT nama FROM biodata WHERE user=$this->id";
				$result2 = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
					if (mysqli_num_rows($result2) > 0) {
					 while ($row2 = mysqli_fetch_row($result2)){
					 	$this->nama = $row2[0];
						$this->display .="<tr><td width=\"20%\"><img name=\"new1\" src=\"images/caloria.jpg\" width=\"150\" height=\"150\" alt=\"\" /></td><td width=\"30%\">$this->nama</td><td><a href=\"hapus_klien.php?id=$this->id\">delete</a></td></tr>";
						
					 }
					}
					
				
			  	}
				
		}
		else {
			$this->display = "<tr><td colspan=\"3\" align=\"center\">Belum memiliki Akun Klien</td></tr>";
		}
		return $this->display;
			
	}
	
	public function save($nama, $alamat, $telp, $username, $password2, $email, $mysqli)
	{
		$query2 = "SELECT id from user WHERE user_name = '$username'";
		$result2 = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
		if (mysqli_num_rows($result2) == 0){
		
		$query = "INSERT INTO user( user_name, password, level) VALUES ('$username', '$password2', 1)";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		$query2 = "SELECT id from user WHERE user_name = '$username'";
		$result2 = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result2) > 0){
			while ($row = mysqli_fetch_row($result2)){
				$id = $row[0];
				$query3 = "INSERT INTO biodata(nama, email, telp, alamat, user) VALUES ('$nama', '$email', '$telp', '$alamat', '$id')";
				$result3 = mysqli_query($mysqli, $query3) or die (mysqli_error($mysqli));
			}
			return $this->msg = "Klien Berhasil ditambahkan";
		}
		else {
			return $this->msg = "Klien Gagal ditambahkan";
		}
		}
		else {
			return $this->msg = "User Name sudah dipakai, silahkan ganti username <a href=tambah_klien.php>disini</a>";	
		}
	}
	
	public function update()
	{
	}
}

?>