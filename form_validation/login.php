<?php
	
	require '../db/connect.php';

	$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
	if (empty($email)) {
		echo "Scrieți email sau numărul de telefon !";
		exit();
	}

	if (empty($password)) {
		echo "Scrieți parola !";
		exit();
	}

	$password = md5($password."sfewrf33frd");

	$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' OR `phone_number` = '$email'");

	$user = $result->fetch_assoc();

	if (is_null($user)) {
		echo "Utilizatorul nu există !";
		exit();
	}

	if ($user['password'] != $password) {
		echo "Parola este greșită !";
		exit();
	}

	setcookie('user', $user['first_name'], time() +3600*24*30, '/');
	setcookie('user_id', $user['user_id'], time() +3600*24*30, '/');

	$mysql->close();

	header('Location: ../');
?>