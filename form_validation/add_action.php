<?php 
	require '../db/connect.php';
	$pet_name = $_POST['pet_name'];
	$location =(int) $_POST['addCountry'];
	$category =(int) $_POST['category'];
	$description = $_POST['addDescription'];
	$date = date("Y.m.d");
	$time = date("H:i");
	$race = $_POST['race'];
	$size = $_POST['size'];
	$look = $_POST['look'];
	$user = (int) $_COOKIE['user_id'];
	if (isset($_POST['addSubmitButton']) && isset($_FILES['addImage'])) {	
		$image_name = $_FILES['addImage']['name'];
		$image_size = $_FILES['addImage']['size'];
		$tmp_name = $_FILES['addImage']['tmp_name'];
		$error = $_FILES['addImage']['error'];
 
		if (empty($_POST['pet_name'])){
			$em = "Completați titlul anunțului!";
			header("Location: ../add.php?pet_name=".$em);
		}elseif(empty($_POST['addDescription'])){
			$em = "Dați o descriere!";
			header("Location: ../add.php?addDescription=".$em);
		}elseif($image_name==''){
			$em = "Nu s-a gasit o imagine!";
			header("Location: ../add.php?addImageEmpty=".$em);
		}  elseif ($image_size > 32500000) {
			$em = "Imaginea contine mai mult de 3 MB !";
			header("Location: ../add.php?addImage=".$em);
		}else {
			$image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
			$image_ex_lc = strtolower($image_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($image_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$image_ex_lc;
				$img_upload_path = '../upload_images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$mysql->query("INSERT INTO `ads` (`pet_name`, `ad_description`, `pet_id`, `user_id`, `date`, `time`, `image`, `country_id`, `size`, `race`, `look`) VALUES('$pet_name', '$description', '$category', '$user', '$date', '$time', '$new_img_name', '$location', '$size', '$race', '$look')");
				header("Location: ../profile.php");

			}else {
				$em = "Formatul imaginii nu este suportat!";
				?> <script type="text/javascript">alert("<?php echo $em; ?>");</script><?php
				header("Location: ../add.php");
			}
		}
	}
	

/*	$mysql->query("INSERT INTO `ads` (`ad_title`, `ad_description`, `pet_id`, `user_id`, `date`, `time`, `image`, `country_id`) VALUES('$title', '$description', $category, $user, '$date', '$time', '$image', $location)");
	$mysql->close();
	header("Location: ../profile.php");
*/
//	echo "Anuntul a fost adaugat cu succes!";
 ?>