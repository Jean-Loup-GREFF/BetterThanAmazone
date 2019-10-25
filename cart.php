<!DOCTYPE html>
<html>
<head>
	<title>Your Cart</title>
	<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
</head>
<body>
	<div id="header">
		<?php include 'header.php';
		 include 'connexion.php';
		 $user = 1;
		 $id = array_slice(getCartOrderOfUser($user), 0, 1)[0]["id"];
		 $cart = getProductsByOrderId($id);
		 ?>
	</div>
	<div id="cart">
		<section>
			<div id="items">
				<table>
					<caption><h2 id='titlegeneral'>Your Cart</h2></caption>
					<?php foreach ($cart as $value) {?>
					<tr>
						<td><img src="src/pictures/<?php echo $value["image"];?>" id="cart" widht=200 height="300"></td>
						<td><p id='cart'><?php echo $value["name"];?><br /><a href="cart.php" id="cart">Supprimer</a></p></td>
						<td>Quantity: <?php echo $value["quantity"];?></td>
						<td><?php echo $value["unit_price"]*$value["quantity"];?></td>
					</tr>
					<?php }?>
				</table>
			</div>
		</section>
	</div>
	<div id="footer">
		<?php include 'footer.php'?>
	</div>
</body>
</html>
