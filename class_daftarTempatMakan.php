<?php
include("koneksi.php");

class daftarTempatMakan
{
	public $display="";
	public $deskripsi="";
	
	
	public function display($letter, $mysqli)
	{
		$query= "select nama, deskripsi, id FROM tempat_makan WHERE nama LIKE '$letter%'";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				$this->display .="<tr><td width=\"60%\"><a href=\"ubahtempatmakan.php?id=$row[2]\"><b>$row[0]</b></a></td><td><a href=\"hapustempatmakan.php?id=$row[2]\">Delete</a></td></tr><tr><td colspan=\"2\">$row[1]<br><br></td></tr>";
			}
		}
		else {
		$this->display = "<tr><td colspan=\"2\">Tidak ada data tempat makan</td></tr>";
		}
		return $this->display;
	}
	
	public function insert($nama, $lokasi, $jenis_lokasi, $klien, $kategori, $mysqli)
	{
		$query = "INSERT INTO tempat_makan(nama, lokasi, jenis_lokasi, klien, kategori, tanggal_berdiri) VALUES ('$nama', '$lokasi', $jenis_lokasi, $klien, $kategori, now())";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
	}
	
	public function delete($id, $mysqli)
	{
		$query = "DELETE FROM tempat_makan WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function update($nama, $lokasi, $jenis_lokasi, $klien, $kategori, $mysqli, $id)
	{
		$query = "UPDATE tempat_makan SET nama='$nama', lokasi='$lokasi', jenis_lokasi=$jenis_lokasi, klien=$klien, kategori=$kategori WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function get_deskripsi($id, $mysqli){
		$query= "select deskripsi FROM tempat_makan WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
			$this->deskripsi=$row[0];
			}
		}
		else {
		$this->deskripsi="";
		}
		
		return $this->deskripsi;
	}
	
	public function update_deskripsi($id, $value, $mysqli)
	{
		$query = "UPDATE tempat_makan SET deskripsi='$value' WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
}

?>