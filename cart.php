<!DOCTYPE html>
<html>
<head>
	<title>Your Cart</title>
	<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
</head>
<body>
	<div id="header">
		<?php include 'header.php'?>
	</div>
	<div id="cart">
		<section>
			<div id="items">
				<table>
					<caption><h2 id='titlegeneral'>Your Cart</h2></caption>
					<tr>
						<td><img src="src/pictures/image_essai.jpg" id="cart"></td>
						<td><p id='cart'>Produit 1<br /><a href="cart.php" id="cart">Supprimer</a></p></td>
						<td>Quantity: 1</td>
						<td>8.000.000€</td>
					</tr>
					<tr>
						<td><img src="image_essai.jpg" id="cart"></td>
						<td><p id="cart">Produit 1<br /><a href="cart.php" id="cart">Supprimer</a></p></td>
						<td>Quantity: 1</td>
						<td>8.000.000€</td>
					</tr>
				</table>
			</div>
		</section>
	</div>
	<div id="footer">
		<?php include 'footer.php'?>
	</div>
</body>
</html>
