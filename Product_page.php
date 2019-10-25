<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<link rel="stylesheet" href="style_web_site_complet.css" />
	<?php
			include('header.php');
		?>
</head>

<body  id="body_princ">
		
		
		<section class="information">
			<article id="zone_image">
				<img src="dragon_modele_dangereux.jpg" id="img_prod" alt="Ou est mon dragon?"  >
				<p id="nom_prod">Wyvern de souffre </p>
			</article>
			<aside>
				
			</aside>
			<aside class="zone_info">
				<p id="prix_prod">Prix : 8000000€</p>
				
				<p class="titre_desc">Description</p>
				<p id="desc_prod">
					Vous fournis l'autorisation de possèder votre dragon personnel<br/>
					Attention : le dragon n'est pas fournis à la livraison, vous devrez aller le chercher vous même.
					Afin de garantir votre sécurité nous vous conseillons de jeter un oeil à nos autres produits (armes, armures...)

				</p>
				<br/>
				<p class="titre_desc">Fournisseur</p>
				<p id="fournis">
					Ce produit vous est fournis par Zangdar, Maitre du Dongon de Naheulbeuk.<br/>
					Il ne sera ni échangé, ni remboursé.<br/>
					<br/>
					Dans le cas où vous insisteriez ce dernier se réserve le droit de vous envoyer une boule de feu

				</p>
				<form method="post" action="cart.php">
					<input type="submit" value="Ajouter au panier" id="ajout_panier">
				</form>
			</aside>
			<aside>

			</aside>
		</section>
		<section id="comment_zone">
			<p id="titre_comment">Commentaires</p>
			<p class="comment">Commentaire 1</p>
			<p>Commentaire 2</p>
			
		</section>

		<?php
			include('footer.php');
		?>
</body>
</html>