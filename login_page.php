
<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
<body>
	<?php require "header.php"; ?>
	<div class="container">
		<div id="loginContainer">
			<div id="loginBox" class="loginBox active">                
			  <form id="loginForm" action="form_validation/login.php" method="POST">
		           <fieldset id="body">
		                <fieldset>
		                    <label for="email">Email</label>
		                    <input type="text" name="email" id="email">
		                </fieldset>
		                <fieldset>
		                    <label for="password">Parola</label>
		                    <input type="password" name="password" id="password">
		                </fieldset>
		                <fieldset>
		                    <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Salvează parola</i></label>
		                </fieldset>
	                    <input type="submit" id="login" value="Sign in"> 	
		            </fieldset>
		            <span><a href="#">Ai uitat parola?</a></span>
		            <span><a href="#" class="Register" onclick="regFunction()">Înregistrare</a></span>
				 </form>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="regContainer">
			<div id="regBox" class="regBox">  
				<form id="regForm" action="form_validation/register.php" method="post" enctype="multipart/form-data">
		           <fieldset id="body">
		           		<fieldset>
		           			<label for="first_name">Nume</label>
		           			<input type="text" name="first_name" id="first_name">
		           		</fieldset>
		           		<fieldset>
		           			<label for="last_name">Prenume</label>
		           			<input type="text" name="last_name" id="last_name">
		           		</fieldset>
		           		<fieldset>
		           			<label for="phone">Telefon</label>
		           			<input type="text" name="phone" id="phone">
		           		</fieldset>
		                <fieldset>
		                    <label for="email">Email</label>
		                    <input type="text" name="email" id="email">
		                </fieldset>
		                <fieldset>
		                    <label for="password">Parola</label>
		                    <input type="password" name="password" id="password">
		                </fieldset>
		                <fieldset>
		                	<label for="pass_confirm">Confirmă parola</label>
		                	<input type="password" name="pass_confirm" id="pass_confirm">
		                </fieldset>
		                <fieldset>
		                	<label for="image">Adaugă o imagine</label>
		                	<input type="file" name="usrImage">
		                </fieldset>
		                <fieldset>
		                    <input type="submit" name="register" id="register" value="Inregistreaza">
		            	</fieldset>
		            </fieldset>
		            <span><a href="login_page.php" class="login_link">Autentificare</a></span>
				</form>
			</div>
		</div>
	</div>

	
	<div class="clearfix"> </div>

	<?php require "footer.php"; ?>
</body>
</html>
						

