<?php
	require "db/connect.php";

	$fromUser = $_COOKIE['user_id'];
	$toUser = $_POST['toUser'];
	$output = "";

	$chats = $mysql->query("SELECT * FROM `messages` WHERE (fromUser = '$fromUser' AND toUser = '$toUser') OR (fromUser = '$toUser' AND toUser = '$fromUser') ");

	while($chat = mysqli_fetch_assoc($chats)){
		if ($fromUser == $chat['fromUser']) { 
			echo "<div style='text-align: right'>
					<p style='float: right; text-align: right; background-color: #80b3ff; padding: 5px; max-width: 70%; word-wrap: break-word; display: inline-block; margin: 5px 0; border-radius: 5px;'>".$chat['message_text']."</p>		
				</div>";
		
		} else
		{

			echo "<div style='text-align: left'>
					<p style='text-align: left; background-color: #ccc; padding: 5px; max-width: 70%; word-wrap: break-word; display: inline-block; margin: 5px 0; border-radius: 5px;'>".$chat['message_text']."</p>
				</div>";			
 
		}
	}
	echo $output;
?>