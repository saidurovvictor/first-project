<?php 
	setcookie('user', $user['first_name'], time() - 3600, '/');
	header('Location: /happy pet/');
?>