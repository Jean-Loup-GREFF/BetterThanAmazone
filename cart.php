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
		
		if(isset($_POST["validateCart"])){
			$cartOrder = array_slice(getCartOrderOfUser($_SESSION["userID"]), 0, 1);
			$userInfo = array_slice(getUserById($_SESSION["userID"]), 0, 1);
			
			
			if(Count($cartOrder) > 0 && $userInfo > 0)
			{
				insertToBDD("UPDATE `orders` SET `type`=\"ORDER\",`status`=\"WAIT_FOR_BILL\" WHERE `id`=\"".$cartOrder[0]["id"]."\"");
				insertToBDD("INSERT INTO `orders` (`user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`)"." VALUES (\"".$user."\", \"CART\", \"CART\", \"0\", \"".$userInfo[0]["billing_adress_id"]."\", \"".$userInfo[0]["delivery_adress_id"]."\")");
			
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
							<button class = "menu_reference" type="submit" name="deleteproduct" value=<?php echo $value["id"];?> >Supprimer</button>
						</form>
						<td>Quantity: <?php echo $value["quantity"];?></td>
						<td><?php echo $value["unit_price"]*$value["quantity"];?></td>
					</tr>
					<?php }?>
				</table>
			</div>
		</section>
		<?php if(Count($cart) > 0) {?>
		<form align="right" action="" method="post">
			<br/><br/><br/><br/><br/><button class = "menu_reference" type="submit" name="validateCart" value=true >Commander</button>
		</form>
		<?php }?>
	</div>
	<div id="footer">
	</div>
</body>
</html>
