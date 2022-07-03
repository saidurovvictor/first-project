<div class="header">
	<div class="container header-responsive">
		 <div class="logo">
		  	<a href="index.php"><span>HAPPY PET</span></a>
	  	 </div>
	    <div class="head-right">
		   	<div class="head-grid">
		   		<div class="top-nav">
				    <span class="menu"><img src="images/menu.png" alt=""> </span>
						<ul id="menu_list">
							<li class="links"><a href="index.php">Home</a></li>
						   	<li class="links"> <a href="about.php">Despre</a></li>
						   	<li class="links"><a href="gallery.php">Anunțuri</a></li>
						   	<li class="links">
						   		<?php 
						   			if (empty($_COOKIE['user'])):
						   		 ?>

						   		 <a href="login_page.php" onclick="RegisterFormFunction()">Autentificare</a>

								<?php 
									else :
								?>
								<a href="profile.php" id="nameButton" onclick="exitFunction()"><?=$_COOKIE['user']?></a>
							<?php endif; ?>
							</li>	
							<div class="clearfix"> </div>
						</ul>

						<!--script-->
					<script>
						$("span.menu").click(function(){
							$(".top-nav ul").slideToggle(500, function(){
							});
						});

						var btns = document.getElementsByClassName("links");
						for (var i = 0; i < btns.length; i++) {
						  btns[i].addEventListener("click", function() {
						    var current = document.getElementsByClassName("active");

						 
						    if (current.length > 0) {
						    	current[0].className = current[0].className.replace(" active", "");
						    }
						    // Add the active class to the current/clicked button
						    this.className += " active";
						  });
						}
					</script>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>


