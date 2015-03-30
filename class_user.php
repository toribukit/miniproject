<?php
include("koneksi.php");


class user
{
	public $nama;
	//public $coba;
	
	public function display($id, $mysqli)
	{
		$query = "SELECT nama from biodata WHERE user=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				return $this->nama = $row[0];
			  
			}
			
		}
		else {
				return $this->nama = "unknown";
		}
	}
}

?>