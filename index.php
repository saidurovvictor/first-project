<?php require "db/connect.php"; ?>
<!DOCTYPE html>
<html>
<?php require "head.php"; ?>
<body> 
	<?php 
		require 'header.php';
	 ?>
<div class="banner">
	<div class="banner-1"> </div>
		<div class="container">
			<div class="banner-top">
				 <div class="col-sm-6 head-banner">
					<h1>HAPPY PET</h1>
					<h4>Platformă socială destinată adopțiilor de animale</h4>
					
					<p></p>
					<?php if (empty($_COOKIE['user'])): ?>
						<a href="login_page.php" id="addButton"><span>Oferă spre adopție</span></a>

				 	<?php else : ?>
						<a href="add.php" id="addButton"><span>Oferă spre adopție</span></a>
				 </div>
				<?php endif; ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--content-->
<div class="content">
	<!---->
	<div class="events">
		<div class="container">
			<h2>Ultimele anunțuri</h2>
			<div class="events-top">

				<?php 
					$ads = $mysql->query("SELECT * FROM `ads` INNER JOIN `countries` ON countries.country_id = ads.country_id ORDER BY ads.ad_id DESC LIMIT 6");
					while($add = mysqli_fetch_assoc($ads)){
						$add_id = $add['ad_id'];

				 ?>
				<div class="col-em-4 top-event">
					<div class="event-image">
						<a href="<?php echo 'pet_view.php?add_id='.$add_id;  ?>" class="pet_view_img"><img src="upload_images/<?php echo $add['image']; ?>" class="img-responsive" alt="image not found"></a>
					</div>
					<h4><a href="<?php echo 'pet_view.php?add_id='.$add_id;  ?>"><?php echo $add['pet_name']; ?></a></h4>
					<div class="time-location-block">
						<span><i class="glyphicon glyphicon-calendar"></i><?php echo $add['date']."  ".$add['time']; ?></span>
						<span class="country"><?php echo $add['country_name']; ?></span>
					</div>
					<p><?php echo substr($add['ad_description'], 0, 100); ?></p>
				</div>
			<?php } ?>
					
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!---->
</div>
<!--footer-->
 	<?php
 		require 'footer.php';
 	?>
 	<!--//footer-->
</body>
</html>