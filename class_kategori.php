<?php
include("koneksi.php");

class kategori
{
public $display="";
public $retrieve;

public function display($mysqli, $kategori)
	{
		$query= "SELECT * FROM $kategori";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)){
			$this->display .="<tr><td width=\"40%\"><b>$row[1]</b></td><td><a href=\"ubahkategori.php?id=$row[0] & kategori=$kategori\">Change</a></td><td><a href=\"hapuskategori.php?id=$row[0] & kategori=$kategori\">Delete</a></td></tr>";
		}
		}
		else {
		$this->display = "Pilihan kategori belum tersedia";
		}
		return $this->display;
	}
	
public function delete($id, $mysqli, $kategori)
	{
		$query = "DELETE FROM $kategori WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
	}

public function retrieve($mysqli, $kategori, $id)
{
	$query= "SELECT * FROM $kategori WHERE id=$id";
	$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)){
			$this->retrieve=$row[1];
		}
	}
	else {
	$this->retrieve="Not Found";
	}
return $this->retrieve;
	
}

public function edit($id, $mysqli, $kategori, $value)
	{
		$query = "UPDATE $kategori SET $kategori=\"$value\" WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
	}
	
public function insert($mysqli, $kategori, $value)
{
	$query = "INSERT INTO $kategori($kategori) VALUES (\"$value\")";
	$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
}
}

?>