<?php
include("koneksi.php");
class akunUser
{
	
public $display;


public function delete($id, $mysqli)
	{
		$query = "DELETE FROM biodata WHERE user=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		$query2 = "DELETE from user WHERE id=$id";
		$result2 = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
	}
	
public function update()
{
}

public function validate()
{
}

public function display($mysqli, $posisi, $batas)
	{
		$query= "SELECT * FROM user WHERE level=2 limit $posisi, $batas";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)){
			$this->display .="<tr><td width=\"60%\"><b>$row[1]</b></td><td><a href=\"hapusAkunUser.php?id=$row[0]\">Delete</a> <br><br></td></tr>";
		}
		}
		else {
		$this->display = "User belum tersedia";
		}
		return $this->display;
	}

}


?>