<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
	<?php
			include('header.php');
			include('connexion.php')
		?>
	<link rel="stylesheet" href="style_web_site_complet.css" />
</head>


<body  id="body_princ">
		
		<?php
			$id_prod = $_GET["id_prod"];
			
			$prod_data = array_slice(getProductById($id_prod),0,1);

			$prod_com = array_slice(getCommentsByProductId($id_prod),0,1);
			
		?>
		<section class="information">
			<article id="zone_image">
				<img src="src/Pictures/<?php
						echo $prod_data[0]["image"];
					?>" id="img_prod" alt="Ou est mon dragon?"  >
				<p id="nom_prod">
					<?php
						echo $prod_data[0]["name"];
					?>
				</p>
			</article>
			<aside>

			</aside>
			<aside class="zone_info">
				<p id="prix_prod">Prix : 
					<?php
						echo $prod_data[0]["unit_price"]." €";
					?>
				</p>

				<p class="titre_desc">Description</p>
				<p id="desc_prod">
					<?php
						echo $prod_data[0]["description"];
					?>

				</p>
				<br/>
				<p class="titre_desc">Fournisseur</p>
				<p id="fournis">
					<?php
						echo $prod_data[0]["supplier"];
					?>

				</p>
				<form method="post" action="<?php addToCart(1,$id_prod)?>">
					<input type="submit" value="Ajouter au panier" id="ajout_panier">
				</form>
			</aside>
			<aside>

			</aside>
		</section>
		<section id="comment_zone">
			<p id="titre_comment">Commentaires</p>
			<p class="comment">

				<?php
					foreach ($prod_com as $com)
					{ 
						echo "Redige par : ".$com['username']."<br>";
						echo "Note : ".$com['rating'];
						echo "<br>".$com['comment'];
					}
				?>
			</p>
			

		</section>

		<?php
			include('footer.php');
		?>
</body>
</html>
