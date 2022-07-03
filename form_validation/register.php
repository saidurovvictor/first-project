<?php

		if (isset($_POST['register']) && isset($_FILES['usrImage'])) {
		

			$first_name = filter_var(trim($_POST['first_name']),FILTER_SANITIZE_STRING);
			$last_name = filter_var(trim($_POST['last_name']),FILTER_SANITIZE_STRING);
			$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
			$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
			$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
			$pass_confirm = filter_var(trim($_POST['pass_confirm']),FILTER_SANITIZE_STRING);

			if (empty($first_name)) {
				echo "Completați câmpul prenume !";
				exit();
			}else if (empty($last_name)) {
				echo "Completați câmpul nume !";
				exit();
			}else if (empty($email)) {
				echo "Completați câmpul email !";
				exit();
			}else if (empty($phone)) {
				echo "Completați câmpul telefon !";
				exit();
			}else if (empty($password)) {
				echo "Completați câmpul parola !";
				exit();
			}else if ($pass_confirm != $password) {
				echo "Confirmați parola !";
				exit();
			}
			$password = md5($password."sfewrf33frd");
			require '../db/connect.php';

			
			
			$image_name = $_FILES['usrImage']['name'];
			$image_size = $_FILES['usrImage']['size'];
			$tmp_name = $_FILES['usrImage']['tmp_name'];
			$error = $_FILES['usrImage']['error'];

			if ($error == 0) {
				if ($image_size > 1250000) {
					$em = "Imaginea contine mai mult de 3 MB !";
					header("Location: ../index.php?error=$em");
				} else{
					$image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
					$image_ex_lc = strtolower($image_ex);
					$allowed_exs = array("jpg", "jpeg", "png");
				
					if (in_array($image_ex_lc, $allowed_exs)) {
						$new_img_name = uniqid("IMG-", true).'.'.$image_ex_lc;
						$img_upload_path = '../user_images/'.$new_img_name;
						move_uploaded_file($tmp_name, $img_upload_path);
						$mysql->query("INSERT INTO `users` (`first_name`, `last_name`, `phone_number`, `email`, `password`, `user_image`) VALUES('$first_name', '$last_name', '$phone', '$email', '$password', '$new_img_name')");

						header('Location: ../index.php');
						
						$mysql->close();

					}else {
						$em = "Format insuportabil !";
						header("Location: ../index.php?error=$em");
					}
				}
			} else{
				$em = "Eroare necunoscuta !";
				header("Location: ../index.php?error=$em");
			}
			
		}

?>