<?php 
require '../db/connect.php';
	if (!empty($_POST['message'])) {
		$fromUser = $_COOKIE['user_id'];
		$toUser = $_POST['toUser'];
		$message = $_POST['message'];
		$mysql->query("INSERT INTO `messages` (`fromUser`, `toUser`, `message_text`) 
			VALUES('$fromUser', '$toUser', '$message')");
	} 
 ?>