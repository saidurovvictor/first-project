<?php require "db/connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
<body class="profile_body"> 
	<?php 
		require 'header.php';
	 ?>

	 	<div class="tab">
			<div class="container">
				<div class="tabs">
					<button class="tablinks first_item" onclick="openTab(event, 'ads')" id="defaultOpen" name="ads_button">Anunțurile mele</button>
					<button class="tablinks active" onclick="openTab(event, 'messages')" name="messages_button">Mesaje</button>
					<button class="tablinks" onclick="openTab(event, 'settings')" name="settings_button">Setări</button>
					<a href="form_validation/exit.php" class="exitProfileButton">Ieșire</a>
				</div>
			</div>
		</div>
	<div class="container">
		<div id="ads" class="tabcontent">
		  	<h3>Anunțuri</h3>
		  	<?php 
		  		$res = '';
		  		$cookie = $_COOKIE['user_id'];
		  		$res = $mysql->query("SELECT * FROM ads WHERE ads.user_id = $cookie ORDER BY ads.ad_id DESC LIMIT 20");
		  		if ($res) {
		  			
		  		while ($add = mysqli_fetch_assoc($res)) {
		  	 ?>
			<div class="profile_add">
			  	<form action="profile.php" method="POST">
			  		<input type="submit" name="profile_add_delete" class="profile_add_delete" value="Șterge">
			  	</form> 
			  	<?php 
			  		if (isset($_POST['profile_add_delete'])) {
			  			$mysql->query("DELETE FROM `ads` WHERE ads.ad_id = ".$add['ad_id']);
			  			exit();
			  			Location(this);
			  		}
			  	 ?>
				<a href="pet_view.php?add_id=<?php echo $add['ad_id']; ?>" >
				  	<span class="profile_add_text">
				  		<span class="profile_add_title"><?php echo $add['pet_name']; ?></span>
				  		<span class="profile_add_description"><?php echo substr($add['ad_description'], 0, 120)."..."; ?></span>
				  	</span>
				  	<span class="profile_add_datetime">
				  		<span class="profile_add_date"><?php echo $add['date']." "; ?></span>
				  		<span class="profile_add_time"><?php echo $add['time']; ?></span>
				  	</span>
			  	</a>
		  	</div>
		  	<?php  }} else{ ?>
		  		<p>nu sunt anunturi!</p>;
		<?php  	} ?>
		</div>
	</div>


	<div class="container">
		<div id="messages" class="tabcontent">
		  	<h3>Mesaje</h3>
		  	<?php 
		  		$cookie = $_COOKIE['user_id'];

		  		$res = $mysql->query("SELECT DISTINCT users.user_id, users.first_name, users.last_name FROM users INNER JOIN messages ON ((users.user_id = messages.fromUser) AND (messages.toUser = $cookie)) OR((users.user_id = messages.toUser) AND (messages.fromUser = $cookie))");
		  		while ($messages = mysqli_fetch_assoc($res)) {
		  				$user_id = $messages['user_id'];
		  				$user_fName = $messages['first_name'];
		  				$user_lName = $messages['last_name'];
		  			
		  	 ?>
			<div class="profile_message">
			  	<span class="profile_message_delete">Șterge</span>
				<a href="messages.php?<?php echo 'user='.$user_id;?>">
				  	<span class="profile_message_text">
				  		<span class="profile_message_title"><?php echo $user_fName." ".$user_lName; ?></span>
				  <!--		<span class="profile_message_description"><?php echo $messages['message_text']; ?></span> -->
				  	</span>
			  	</a>
		  	</div>
		  	<?php 
		  		
		  	} 
		  	?>
		</div>
	</div>

	<div id="settings" class="tabcontent">
	  
	  	<div class="container">
	  		<h3>Setări</h3>
	  		<?php 
	  			$panel = mysqli_fetch_assoc($mysql->query("SELECT * FROM users WHERE user_id = $cookie"));
	  		 ?>
		  	<div class="accordion_pannels">
		  		<button class="accordion">Schimbă datele de contact</button>
				<div class="panel">
				  	<form action="profile.php" method="post">
				  		<fieldset>
				  			<label for="first_name">Completează prenumele: </label>
				  			<input type="text" name="first_name" value="<?php echo $panel['first_name']; ?>">
				  		</fieldset>
						<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<label for="last_name">Completează numele: </label>
				  			<input type="text" name="last_name" value="<?php echo $panel['last_name']; ?>">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">							
				  		<fieldset>
				  			<label for="phone">Completează numărul de telefon: </label>
				  			<input type="text" name="phone" value="<?php echo $panel['phone_number']; ?>">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<input type="submit" name="profile_info_change" value="Schimbă">
				  		</fieldset>
				  	</form>
				  	<?php 
				  		if (isset($_POST['profile_info_change'])) {
				  			$first_name = $_POST['first_name'];
				  			$last_name = $_POST['last_name'];
				  			$phone = $_POST['phone'];
				  			$mysql->query("UPDATE `users` SET `first_name` = '', `last_name` = '$last_name', `phone_number` = '$phone' WHERE `user_id` = $cookie");
				  		}
				  	 ?>
				</div>
				<button class="accordion">Schimbă parola</button>
				<div class="panel">
				  	<form action="profile.php" method="post">
				  		<fieldset>
				  			<label for="password">Parola veche: </label>
				  			<input type="password" name="old_password">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<label for="password">Parola nouă: </label>
				  			<input type="password" name="new_password">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<label for="password">Confirmă parola nouă: </label>
				  			<input type="password" name="password">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<input type="submit" name="profile_password_change" value="Schimbă">
				  		</fieldset>
				  	</form>
				  	<?php 
				  		if (isset($_POST['profile_password_change'])) {
				  			$old_pass = md5($_POST['old_password']."sfewrf33frd");
				  			if ($old_pass != $panel['password']) {
				  				alert("Parola gresita !");
				  			} elseif ($_POST['new_password'] != $_POST['password']) {
				  				alert("Confirmati parola !");
				  			} else{
				  				$password = md5($_POST['password']."sfewrf33frd");
				  				$mysql->query("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $cookie");
				  			}
				  		}
				  	 ?>
				</div>
				<button class="accordion">Schimbă adresa de e-mail</button>
				<div class="panel">
				  	<form action="profile.php" method="post">
				  		<fieldset>
				  			<label for="email">Completează adresa de e-mail: </label>
				  			<input type="email" name="email" value="<?php echo $panel['email']; ?>">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<input type="submit" name="profile_email_change" value="Schimbă">
				  		</fieldset>
				  	</form>
				  	<?php 
				  		if (isset($_POST['profile_email_change'])) {
				  			$email = $_POST['email'];
							if (empty($_POST['email'])) {
										alert("Scrieți adresa de email !");
							} else{
								$mysql->query("UPDATE `users` SET `email` = '$email' WHERE `user_id` = $cookie");
							}		
				  		}
				  	 ?>
				</div>
				<button class="accordion">Logo</button>
				<div class="panel">
				  	<form action="profile.php" method="post" enctype="multipart/form-data">
				  		<fieldset>
				  			<label for="logo">Adaugă o imagine:</label>
				  			<input type="file" name="profile_logo">
				  		</fieldset>
				  		<hr class="horizontal_line_fieldset">
				  		<fieldset>
				  			<input type="submit" name="profile_logo_change" value="Adaugă">
				  		</fieldset>
				  	</form>
				  	<?php 
				  		if (isset($_POST['profile_logo_change']) && isset($_FILES['profile_logo'])) {
				  			$image_name = $_FILES['profile_logo']['name'];
							$image_size = $_FILES['profile_logo']['size'];
							$tmp_name = $_FILES['profile_logo']['tmp_name'];
							$error = $_FILES['profile_logo']['error'];

							if ($error == 0) {
								if ($image_size > 125000) {
									$em = "Imaginea contine mai mult de 3 MB !";
									header("Location: profile.php?error=$em");
								} else{
									$image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
									$image_ex_lc = strtolower($image_ex);
									$allowed_exs = array("jpg", "jpeg", "png");
								
									if (in_array($image_ex_lc, $allowed_exs)) {
										$new_img_name = uniqid("IMG-", true).'.'.$image_ex_lc;
										$img_upload_path = '../user_images/'.$new_img_name;
										move_uploaded_file($tmp_name, $img_upload_path);
										$mysql->query("INSERT INTO `users` (`first_name`, `last_name`, `phone_number`, `email`, `password`, `user_image`) VALUES('$first_name', '$last_name', '$phone', '$email', '$password', '$new_img_name')");

										header('Location: profile.php');
										
										$mysql->close();

									}else {
										$em = "Format insuportabil !";
										header("Location: profile.php?error=$em");
									}
								}
							} else{
								$em = "Eroare necunoscuta !";
								header("Location: ../index.php?error=$em");
							}
						}
					  ?>
				</div>
				<button class="accordion">Administrare profil</button>
				<div class="panel">
				  	<form action="profile.php" method="post">
				  		<fieldset>
				  			<label for="drop">Șterge contul:</label>
				  			<input type="submit" name="profile_drop" value="Șterge contul">
				  		</fieldset>
				  	</form>
				  	<?php 
				  		if (isset($_POST['profile_drop'])) {
				  			$mysql -> query("DELETE FROM users, messages, ads WHERE $cookie = users.user_id and $cookie = ads.user_id and ($cookie = messages.transmitter_id OR $cookie = messages.destination_id)");
				  			header("Location: ../index.php");
				  		}
				  	 ?>
				</div>
			</div>
	  	</div>
	  
	  <script lang="js"> 
	  	var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    this.classList.toggle("activeaccordion");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight) {
		      panel.style.maxHeight = null;
		    } else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    } 
		  });
		}
	  </script>
	</div>
	 
	<script lang="js">
		document.getElementById("defaultOpen").click();
	</script>
	<?php require 'footer.php'; ?>
</body>
</html>