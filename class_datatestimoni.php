<?php
include("koneksi.php");


class data_testimoni
{
	public $testimoni;
	public $date;
	public $display ="";
	
	public function delete($id, $mysqli)
	{
		$query = "DELETE from testimoni WHERE id=$id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function save($user, $tempat, $testimoni, $mysqli)
	{
		$query = "INSERT INTO testimoni (user, tempat_makan, testimoni, date) VALUES ($user, $tempat, '$testimoni', NOW())";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
	}
	
	public function retrieve($id, $mysqli)
	{
		$query= "SELECT testimoni, date FROM testimoni WHERE id = $id";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				$this->date = $row[1];
				$this->testimoni = $row[0];
			  
			}
			
		}
	}
	
	public function display($mysqli)
	{
		$query= "select a.id, a.testimoni, a.date, b.nama, c.nama from testimoni a, biodata b, tempat_makan c where b.user = a. user and c.id = a.tempat_makan";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)){
			$this->display .="<tr><td width=\"60%\"><b>$row[3]</b>, said...($row[2]) @ $row[4]</td><td><a href=\"hapusTestiAdmin.php?id=$row[0]\">Delete</a></td></tr><tr><td colspan=\"2\">$row[1] <br><br></td></tr>";
		}
		}
		else {
		$this->display = "Testimoni belum tersedia";
		}
		return $this->display;
	}
	
}

?>