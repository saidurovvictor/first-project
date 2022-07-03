<?php 
	require "db/connect.php";
	$pet_id = $_POST['pet_id'];
	if (isset($_POST['pet_id'])) {
		$races = $mysql->query("SELECT * FROM `races` WHERE pet_id = '$pet_id' ORDER BY race_name ASC");
		echo '<option value = "0">Oricare</option>';
		 while($race = mysqli_fetch_assoc($races)){
			$raceId = $race['race_id'];
			echo "<option value='".$raceId."'>".$race['race_name']."</option>";
		 } 
	}
 ?>