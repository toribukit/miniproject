<?php
include("koneksi.php");


class data_rating
{
	public $rating_tempat = 0;
	public $rating_user = 0;
	
	public function rate($user, $tempat, $rating, $mysqli)
	{
		$query = "INSERT INTO rating(user, tempat_makan, rating) VALUES($user, $tempat, $rating)";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function unrate($user, $rating, $mysqli)
	{
		$query = "UPDATE rating SET rating=$rating WHERE user=$user";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
	}
	
	public function display($tempat, $mysqli)
	{
		$query = "SELECT rating FROM rating WHERE tempat_makan = $tempat";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
			if (mysqli_num_rows($result) > 0) {
				$i = 0;
			while ($row = mysqli_fetch_row($result)){
				$this->rating_tempat = $row[0] + $this->rating_tempat;
			  	$i++;
			}
			$this->rating_tempat = $this->rating_tempat / $i;
			
		}
		$query2 = "UPDATE tempat_makan SET rating=$this->rating_tempat WHERE id=$tempat";
		$result2 = mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
			return $this->rating_tempat;
	}
	
	public function retrieve($user, $tempat, $mysqli)
	{
		$query = "SELECT rating FROM rating WHERE tempat_makan = $tempat AND user = $user";
		$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				$this->rating_user = $row[0];
			}
		}
	return $this->rating_user;
	}
}
?>