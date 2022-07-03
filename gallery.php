<?php require 'db/connect.php'; ?>
<!DOCTYPE html>
<html>
<?php require "head.php"; ?>
<body> 
<!--header-->	
<?php 
	require 'header.php';
 ?>
<!--//header-->
	<div class="banner-head">
			<h1><strong>Anunțuri</strong></h1>	
	</div>
<!--content-->
	<div class="gallery">
		<div class="filter-show-container">
			<div class="filter-show" onclick="filterShowButton()">
				<img src="images/filter-icon.png">
				<span>Filtrează anunțurile</span>
			</div>
		</div>
		<div class="filter" >
			<form action="gallery.php" method="POST" class="galleryFilter" id="filterBox">
				<?php 

					$countries = $mysql->query("SELECT * FROM `countries` ORDER BY country_name");
					$pets = $mysql->query("SELECT * FROM `pets`");
					$sizes = $mysql -> query("SELECT * FROM `sizes`");
					$looks = $mysql -> query("SELECT * FROM `looks`");
				?>
				<fieldset>
					<label for="countrySelect">JUDEȚUL </label>
					<select name="countrySelect" id="countrySelect">
						<option value="0">Toată România</option>
						<?php while($country = mysqli_fetch_assoc($countries)){ ?>
						<option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option> <?php } ?>
					</select>
				</fieldset>

				<fieldset>
					<label for="petSelect">CATEGORIA </label>
					<select name="petSelect" id="petSelect">
						<option value="0">Oricare</option>
						<?php while($pet = mysqli_fetch_assoc($pets)){ ?>
						<option value="<?php echo $pet['pet_id']; ?>"><?php echo $pet['pet_name']; ?></option><?php } ?>
					</select>
				</fieldset>

				<fieldset>
					<label for="sizeSelect">DIMENSIUNEA </label>
					<select name="sizeSelect" id="sizeSelect">
						<option value="0">Oricare</option>
						<?php while($size = mysqli_fetch_assoc($sizes)){?>
							<option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
						<?php } ?>
					</select>
				</fieldset>

				<fieldset>
					<label for="raceSelect">RASA </label>
					<select name="raceSelect" id="raceSelect">
						<option value="0">Oricare</option>
					</select>
				</fieldset>
				
				<fieldset>
					<label for="lookSelect">ASPECTUL </label>
					<select name="lookSelect" id="lookSelect">
						<option value="0">Oricare</option>
						<?php while($look = mysqli_fetch_assoc($looks)){ ?>
							<option value="<?php echo $look['look_id']; ?>"><?php echo $look['look_name']; ?></option>
						<?php } ?>
					</select>
				</fieldset>

				<fieldset>
					<input type="submit" name="filterApply" value="Aplică">
				</fieldset>
			</form>
		</div>
		<div class="container">
			<div class="grid">
				<?php 
					if (isset($_POST['filterApply'])) {	
						$countrySelect = $_POST['countrySelect'];
						$petSelect = $_POST['petSelect'];
						$sizeSelect = $_POST['sizeSelect'];
						$raceSelect = $_POST['raceSelect'];
						$lookSelect = $_POST['lookSelect'];

						if($countrySelect == 0){
							if($petSelect == 0){
								if($raceSelect == 0){
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE look = $lookSelect ORDER BY ad_id DESC"); 
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE size = $sizeSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE size = $sizeSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									}
								} else {
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE race = $raceSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE race = $raceSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE race = $raceSelect AND size = sizeSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE race = $raceSelect AND size = sizeSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									}
								}
							} else {
								if($raceSelect == 0){
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND size = $sizeSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND size = $sizeSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									}
								} else {
									if($sizeSelect == 0){
										if($lookSelect = 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND race = $raceSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND race = $raceSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND race = $raceSelect AND size = sizeSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE pet_id = $petSelect AND race = $raceSelect AND size = sizeSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									}
								}
							}
						} else {
							if($petSelect == 0){
								if($raceSelect == 0){
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND size = $sizeSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND look = $lookSelect AND size = $sizeSelect ORDER BY ad_id DESC");
										}
									}
								} else {
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND race = $raceSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND look = $lookSelect AND race = $raceSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND size = $sizeSelect AND race = $raceSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND look = $lookSelect AND race = $raceSelect AND size = $sizeSelect ORDER BY ad_id DESC");
										}
									}
								}
							} else {
								if($raceSelect == 0){
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND pet_id = $petSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND look = $lookSelect AND pet_id = $petSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND size = $sizeSelect AND pet_id = $petSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND size = $sizeSelect AND pet_id = $petSelect look = $lookSelect ORDER BY ad_id DESC");
										}
									}
								} else {
									if($sizeSelect == 0){
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND race = $raceSelect AND pet_id = $petSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND race = $raceSelect AND pet_id = $petSelect AND look = $lookSelect ORDER BY ad_id DESC");
										}
									} else {
										if($lookSelect == 0){
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND race = $raceSelect AND pet_id = $petSelect AND size = $sizeSelect ORDER BY ad_id DESC");
										} else {
											$ads = $mysql->query("SELECT * FROM `ads` WHERE country_id = $countrySelect AND race = $raceSelect AND pet_id = $petSelect AND look = $lookSelect AND size = $sizeSelect ORDER BY ad_id DESC");
										}
									}
								}
							}
						}
					} else {
						$ads = $mysql->query("SELECT * FROM `ads` ORDER BY ad_id DESC");
						}
					
					if (!empty($ads)) {
						while ($add = mysqli_fetch_assoc($ads)) {	
							$add_id = $add['ad_id'];
				?>
						
						<div class="card">
							<a href="<?php echo 'pet_view.php?add_id='.$add_id;  ?>" rel="title" name="img_block" class="">
								<img src="upload_images/<?php echo $add['image']; ?>" class="card-image-top" alt="img">
								<div class="card-body">
									<h2 class="card-title"><?php echo $add['pet_name']; ?></h2>
									<p class="card-date"><small><?php echo $add['date']; ?></small></p>
									<p class="card-time"><small><?php echo $add['time']; ?></small></p>
								</div>
							</a>
						</div>
					<?php } }?>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>	
<!--footer-->
 	<?php 
 		require 'footer.php';
 	 ?>
 	<!--//footer-->


 	<script type="text/javascript">
 		$(document).ready(function(){
		    $('#petSelect').on('change', function(){
		        var petId = $(this).val();
		        if(petId){
		            $.ajax({
		                type:'POST',
		                url:'realTimeFilter.php',
		                data:'pet_id='+petId,
		                success:function(html){
		                    $('#raceSelect').html(html); 
		                }
		            }); 
		        }else{
		            $('#raceSelect').html('<option value="">Neselectat</option>');
		        }
		    });
		});
 	</script>
</body>
</html>