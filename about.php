<?php require 'db/connect.php'; ?>
<!DOCTYPE html>
<html lang="fr" xml:lang="fr">
<?php require "head.php"; ?>
<body> 
<!--header-->	
<?php 
	require 'header.php';
 ?>
<!--//header-->
<div class="banner-head">
		<div class="container">
			<h1>Despre</h1>	
		</div>
</div>
<!--content-->
<div class="about">
		<!--content-top-->
		<div class="container">
			<div class="about-top">
			<div class="col-sm-4 top-content">
				<img class="img-responsive" src="images/qmark (2).png" alt="">
				<h4><a href="single.html">Cum adaug un anunt?</a></h4>
				<p>E foarte simplu să adaugi un anunț! Pentru început trebuie să ai un cont în care să fii logat. Pe pagina <strong>Home</strong> dăm click butonul de adăugare a unui anunț. În formularul care va apărea, trebuie de completat cu cât mai multe informații. La sfârșit Dăm click pe <strong>Publică anunț</strong> și anunțul va fi salvat.</p>
			</div>
			<div class="col-sm-4 top-content">
				<img class="img-responsive" src="images/qmark (2).png" alt="">
				<h4><a href="single.html">Cate anunturi pot adauga de pe un cont?</a></h4>
				<p>Puteți adăuga un număr nelimitat de anunțuri de pe un cont. Condiția este să fie anunțuri diferite. Anunțurile repetitive nu vor fi publicate.</p>
			</div>
			<div class="col-sm-4 top-content">
				<img class="img-responsive" src="images/qmark (2).png" alt="">
				<h4><a href="single.html">Cum cresc sansele de a gasi un stapan animalutului?</a></h4>
				<p>Încercați să completați cât mai multe date în anunț (vârstă, talie, rasă, culoare). De asemenea, adăugați o fotografie de calitate cât mai bună. Nu în ultimul rând, completați locația (s-ar putea să găsiți un adoptator aflat în apropierea dumneavoastră).</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!---->
	<div class="why">
		<div class="container">
			<div class="why-top-top">
				<div class="why-top">
					<h2>De ce aici</h2>
				</div>
				<div class="col-sm-4 why-top1">
					<span>1</span>
					<h6>Gratis</h6>
					<p>Poți posta un anunț aici fără a plăti nici un ban</p>
				</div>
				<div class="col-sm-4 why-top1">
					<span>2</span>
					<h6>Doar adopții</h6>
					<p>Este o platformă destinată doar adopțiilor de animale</p>
				</div>
				<div class="col-sm-4 why-top1">
					<span>3</span>
					<h6>Eficient</h6>
					<p>Poți găsi foarte ușor pe cineva care ar vrea să adopte animalul tău și astfel reducem numărul animalelor din stradă</p>
				</div>
				<div class="clearfix"> </div>
			</div>		
		</div>
	</div>
</div>
<!--footer-->
 	<?php 
 		require 'footer.php';
 	 ?>
 	<!--//footer-->
</body>
</html>