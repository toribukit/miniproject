<?php
include("koneksi.php");

class menu
{
	public $makanan;
	public $jenis_makanan;
	public $harga;
	public $tempat_makan;
	public $kategori_makanan;
	
	public function delete($id, $mysqli)
	{
		$query = "DELETE FROM menu WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function add($tempat_makan, $makanan, $harga, $kategori_makanan, $Jenis_Makanan, $mysqli)
	{
		$query = "INSERT INTO `menu`(`makanan`, `jenis_makanan`, `harga`, `tempat_makan`, `kategori_makanan`) VALUES('$makanan', $Jenis_Makanan, $harga, $tempat_makan, $kategori_makanan)";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function display($id, $mysqli)
	{
		$query = "SELECT * FROM menu WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				$this->makanan=$row[1];
				$this->jenis_makanan=$row[2];
				$this->harga = $row[3];
				$this->tempat_makan= $row[4];
				$this->kategori_makanan=$row[5];
			}
			
			
		}
				return $this->makanan;
				return $this->jenis_makanan;
				return $this->harga;
				return $this->tempat_makan;
				return $this->kategori_makanan;
				
	}
	
	public function update($makanan, $harga, $kategori_makanan, $Jenis_Makanan, $mysqli, $id)
	{
		$query = "UPDATE menu SET makanan='$makanan', harga=$harga, kategori_makanan=$kategori_makanan, jenis_makanan=$Jenis_Makanan WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	
	
}
?>