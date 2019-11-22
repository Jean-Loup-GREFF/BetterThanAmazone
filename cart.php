<!DOCTYPE html>
<html>
<head>
	<title>Your Cart</title>
	<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
</head>
<body>
	<?php
	if(empty($_GET["chosen_page"]) or !isset($_SESSION["isConnected"]))
	{
		ob_start();
		header('Location: index.php');
		ob_end_flush();
		exit();
	}
	?>
	
	<div id="header">
		<?php
		if($_SESSION["isConnected"] == false)
		{
			ob_start();
			header('Location: index.php');
			ob_end_flush();
			exit();
		}
		$user = $_SESSION["userID"];
		
		if(isset($_POST["deleteproduct"])){
			$cartOrder = array_slice(getCartOrderOfUser($_SESSION["userID"]), 0, 1);
			$productOrder = array_slice(getOrderProductOfOrderAndSpecificProduct($cartOrder[0]["id"], $_POST["deleteproduct"]), 0, 1);
			if(Count($productOrder) > 0)
			{
				if(isset($_POST["deletionQuantity"])){
					addToCart($_SESSION["userID"],$_POST["deleteproduct"], $_POST["deletionQuantity"]);
				}
				else {
					addToCart($_SESSION["userID"],$_POST["deleteproduct"], -1 * $productOrder[0]["quantity"]);
				}
			}
		}
		
		
		
		
		
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
						<td><p id='cart'><?php echo $value["name"];?><br />
						<form action="" method="post">
							<button type="submit" name="deleteproduct" value=2 >Supprimer</button>
						</form>
						<td>Quantity: <?php echo $value["quantity"];?></td>
						<td><?php echo $value["unit_price"]*$value["quantity"];?></td>
					</tr>
					<?php }?>
				</table>
			</div>
		</section>
	</div>
	<div id="footer">
	</div>
</body>
</html>
