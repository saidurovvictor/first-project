<?php require 'db/connect.php'; ?>
<!DOCTYPE html>
<html>
<?php require "head.php"; ?>
<body> 
	<?php 
		require 'header.php';
	 ?>


	<?php 
		$add_id = $_GET['add_id'];
		$ads = $mysql->query("SELECT ads.ad_id, ads.pet_name, ads.ad_description, ads.date, ads.time, ads.image,users.user_id, users.first_name, users.last_name, users.email, users.phone_number, users.user_image, countries.country_name, races.race_name, looks.look_name, sizes.size_name FROM ads INNER JOIN users ON (users.user_id = ads.user_id) INNER JOIN countries ON (countries.country_id = ads.country_id) INNER JOIN races ON (races.race_id = ads.race) INNER JOIN sizes ON (sizes.size_id = ads.size) INNER JOIN looks ON (looks.look_id = ads.look) WHERE (ads.ad_id = '$add_id')");
		while ($add = mysqli_fetch_assoc($ads)) {	
			$user_id = $add['user_id'];
	?>
			<div class="pet-view-image">
				<img src="upload_images/<?php echo $add['image']; ?>" class="img" alt="img">
			</div>
			<div class="pet_view">
				<div class="add_info">
					<span>
						<small>
							<?php 
								if ($add['date'] === date("Y-m-d")) {
									echo "Azi | ".$add['time'].", | ".$add['country_name'];
								} else{
									echo $add['date']." | ".$add['time']." | ".$add['country_name'];
								} 
							?>
						</small>
					</span>
					<h2><?php echo $add['pet_name']; ?></h2>
					<div class="pet-view-parametters">
						<span><strong>Rasa: </strong>
							<?php 
								echo $add['race_name'];
							 ?>
						</span>
						<span><strong>Aspectul: </strong>
							<?php 
								echo $add['look_name'];
							 ?>
						</span>
						<span><strong>Dimensiunea: </strong>
							<?php 
								echo $add['size_name'];
							 ?>
						</span>
					</div>
					<p><?php echo $add['ad_description']; ?></p>
				</div>

				<div class="vertical-line"></div>

				<div class="user_info">
					<div class="usr_info">
						<img src="user_images/<?php echo $add['user_image']; ?>" alt="">
						<span><?php echo $add['first_name']." ".$add['last_name']; ?></span>
						<p class="pet_view_phone_number"><strong>Telefon:</strong><?php echo " 0".$add['phone_number']; ?></p>
						<?php 
							if (!empty($_COOKIE['user_id'])) {
								if ($_COOKIE['user_id'] != $add['user_id']): ?>
									<a href="messages.php?<?php echo'user='.$user_id; ?>" class="user_mess">Trimite mesaj</a>
							<?php endif;
							} else { ?>
								<a href="login_page.php" class="user_mess">Trimite mesaj</a>
						<?php	}
						 ?>
					</div>
				</div>
			</div>
			
	<?php } ?>

	
<!--footer-->
 	<?php 
 		require 'footer.php';
 	 ?>
 	<!--//footer-->
</body>
</html>