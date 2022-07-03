<?php 
	require 'db/connect.php';

	$pets = $mysql->query("SELECT * FROM `pets`");
	$countries = $mysql->query("SELECT * FROM `countries` ORDER BY `country_name`");
	$sizes = $mysql -> query("SELECT * FROM `sizes`");
	$races = $mysql -> query("SELECT * FROM `races`");
	$looks = $mysql -> query("SELECT * FROM `looks`");

 ?>

<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
<body>
	<?php require 'header.php'; ?>

	<div class="addContent">
		<div class="container">
			<form id="addForm" action="form_validation/add_action.php" method="post" enctype="multipart/form-data">
				<fieldset .body>
					<label for="name">Numele animalului: </label>
					<input type="text" name="pet_name">
					<?php if (!empty($_GET['pet_name'])) {
						?><span style="color: red;"><?php echo $_GET['pet_name'];?></span><?php
					} ?>
					<label for="category">Categoria: </label>
					<select name="category" id="category">
						<option value="0">Alege o categorie</option>
						<?php 
							while ($pet = mysqli_fetch_assoc($pets)) {
						?>		
							<option value="<?php echo $pet['pet_id']; ?>"><?php echo $pet['pet_name']; ?></option>				
						
						<?php } ?>
					</select>
				</fieldset>
				<fieldset .body>
					<label for="race">Rasa: </label>
					<select name="race" id="race">
						<?php 
						while($race = mysqli_fetch_assoc($races)){
							?>
							<option value="0">Neselectat</option>
						<?php } ?>
					</select>

					<label for="size">Dimensiunea: </label>
					<select name="size" id="size">
						<option value="0">Neselectat</option>
						<?php 
						while($size = mysqli_fetch_assoc($sizes)){
							?>
							<option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
						<?php } ?>
					</select>

					<label for="look">Aspectul: </label>
					<select name="look" id="look">
						<option value="0">Neselectat</option>
						<?php 
						while($look = mysqli_fetch_assoc($looks)){
							?>
							<option value="<?php echo $look['look_id']; ?>"><?php echo $look['look_name']; ?></option>
						<?php } ?>
					</select>
				</fieldset>
				<fieldset .body>
					<label for="description">Adăugați o descriere: </label>
					<textarea name="addDescription" rows="10"></textarea>
					<?php if (!empty($_GET['addDescription'])) {
						?><span style="color: red;"><?php echo $_GET['addDescription'];?></span><?php
					} ?>
					<label for="image">Imagine: </label>
					<input type="file" name="addImage">
					<?php if (!empty($_GET['addImageEmpty'])) {
							?><span style="color: red;"><?php echo $_GET['addImageEmpty'];?></span><?php
						}
						if (!empty($_GET['addImage'])) {
							?><span style="color: red;"><?php echo $_GET['addImage'];?></span><?php
						}
					?>
					<label for="location">Adăugați locația: </label>
					<select name="addCountry" id="addCountry">
						<option value="0">Neselectat</option>
						<?php 
							while ($country = mysqli_fetch_assoc($countries)) {
						?>
								<option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
						<?php	
							}
						 ?>
					</select>
				</fieldset>
				<fieldset class="submit">
					<input type="reset" name="reset" id="addResetButton" value="Șterge tot">
					<input type="submit" name="addSubmitButton" id="addSubmitButton" value="Publică anunțul">
				</fieldset>
			</form>
		</div>
	</div>
	<?php require 'footer.php'; ?>

	<script type="text/javascript">
 		$(document).ready(function(){
		    $('#category').on('change', function(){
		        var petId = $(this).val();
		        if(petId){
		            $.ajax({
		                type:'POST',
		                url:'realTimeAddRace.php',
		                data:'pet_id='+petId,
		                success:function(html){
		                    $('#race').html(html); 
		                }
		            }); 
		        }else{
		            $('#race').html('<option value="">Altceva</option>');
		        }
		    });
		});
 	</script>
</body>
</html>


