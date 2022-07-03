<?php require 'db/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
<body>
	<?php require "header.php"; ?>
		<?php
			$cookie = $_COOKIE['user_id'];
			$second = $_GET['user'];
			$user_info = $mysql->query("SELECT * FROM `users` WHERE user_id = $second");
		?>
		<div class="msg_content">
			<?php while($user = mysqli_fetch_assoc($user_info)){ ?>
					<div class="msg_header">
						<input type="text" id="toUser" value="<?php echo $second; ?>" hidden>
						<img src="user_images/<?php echo $user['user_image']; ?>" alt="logo">
						<span class="msg_second"><?php echo $user['first_name']; ?></span>
						
					</div>
				<?php 
				break;
				}
			 ?>

		
			<div class="contentmsg">
				<div class="msg_body" id="msg_body">
					<?php 
						$result = $mysql->query("SELECT DISTINCT messages.message_id, messages.fromUser, messages.toUser, messages.message_text FROM `messages` WHERE ($cookie = messages.fromUser AND $second = messages.toUser) OR ($cookie = messages.toUser AND $second = messages.fromUser) ORDER BY message_id");
						$message_id = "";
						while ($messages = mysqli_fetch_assoc($result)) {
						if ($message_id != $messages['message_id']) {
							$message_id = $messages['message_id'];
					?>
					<fieldset>
						<hr size="margin-bottom: 10px;">
						<?php if ($messages['fromUser'] == $cookie) { ?>
							<span class="msg_right"><?php echo $messages['message_text']; ?></span>
						<?php } else{ ?>
							<span class="msg_left"><?php echo $messages['message_text']; ?></span>
						<?php } ?>
					</fieldset>
					<?php 
						}
					}

					 ?>
					
					
				</div>
				<div class="msg_footer">
					<textarea name="msg_text" id="message" class="form-control" style="height: 70px; width: 80%;"></textarea>
					<input type="submit" id="send" name="msg_send" value="Trimite" class="btn btn-primary" style="height:70%;">
				</div>
			</div>
		</div>

		<script type="text/javascript">
			window.setInterval(function() {
				document.getElementById('msg_body').scrollTop =  document.getElementById('msg_body').scrollHeight;
			},5000);

			$(document).ready(function(){
				$("#send").on("click", function(){
					$.ajax({
						url: "form_validation/message_sender.php",
						method: "POST",
						data:{
							toUser: $("#toUser").val(),
							message: $("#message").val()
						},
						dataType:"text",
						success:function(data)
						{
							$("#message").val("");
						}
					});
				});

				setInterval(function(){
					$.ajax({
						url: "realTimeChat.php",
						method: "POST",
						data:{
							toUser: $("#toUser").val()
						},
						dataType: "text",
						success:function(data)
						{
							$("#msg_body").html(data);
						}
					}, 700)
				});
			});
		</script>
	
	<?php require "footer.php"; ?>
</body>
</html>