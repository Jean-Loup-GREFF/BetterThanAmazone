<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
	
	<link rel="stylesheet" href="style_web_site_complet.css" />
</head>


<body  id="body_princ">

	<?php
	if(empty($_GET["chosen_page"]) or !isset($_SESSION["isConnected"]))
	{
		ob_start();
		header('Location: index.php');
		ob_end_flush();
		exit();
	}
	?>

		<?php
		#include('connexion.php');
		  if(isset($_POST["cartproduct"])){
				if(isset($_POST["quantity"])){
					addToCart(1,$_POST["cartproduct"],$_POST["quantity"]);
			  }
				else {
					addToCart(1,$_POST["cartproduct"]);
				}
		  }
			if(empty($_POST["id_prod"]) && empty($_GET["id_prod"]))
			{
				$id_prod = -1000;
			}
			else
			{
				if (empty($_GET["id_prod"])) 
				{
					$id_prod = $_POST["id_prod"];
				}
				else 
				{
					$id_prod = $_GET["id_prod"];
				}

				$prod_data = array_slice(getProductById($id_prod),0,1);

			$prod_com = array_slice(getCommentsByProductId($id_prod),0,1);	
			}
			
		?>
		<section class="information">
			<article id="zone_image">
				<img src="src/Pictures/<?php
						if($id_prod != -1000){
							echo $prod_data[0]["image"];
						}
					?>" id="img_prod" alt="Pas de produit"  >
				<p id="nom_prod">
					<?php
						if($id_prod != -1000){
							echo $prod_data[0]["name"];
						}
						else
						{
							echo "Pas de produit";
						}
					?>
				</p>
			</article>
			<aside>

			</aside>
			<aside class="zone_info">
				<p id="prix_prod">Prix :
					<?php
						if($id_prod != -1000){
							echo $prod_data[0]["unit_price"]." €";
						}
						else
						{
							echo "Pas de produit";
						}
					?>
				</p>

				<p class="titre_desc">Description</p>
				<p id="desc_prod">
					<?php
						if($id_prod != -1000){
							echo $prod_data[0]["description"];
						}
						else
						{
							echo "Aucun produit a decrire";
						}
					?>

				</p>
				<br/>
				<p class="titre_desc">Fournisseur</p>
				<p id="fournis">
					<?php
						if($id_prod != -1000){
							echo $prod_data[0]["supplier"];
						}
						else
						{
							echo "Pas de produit";
						}
					?>

				</p>
				<form method="post" action="index.php?chosen_page=Product_page.php">
     			<input type="text" name="quantity" value="1"/><br />
    			<input type="hidden" name="id_prod" value="<?php echo $id_prod ?>" />
    			<input type="hidden" name="cartproduct" value="<?php echo $id_prod ?>" />
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
					if($id_prod != -1000){
						foreach ($prod_com as $com)
						{
							echo "Redige par : ".$com['username']."<br>";
							echo "Note : ".$com['rating'];
							echo "<br>".$com['comment'];
						}

					}
					else
					{
						echo "Aucun produit";
					}
				?>
			</p>


		</section>

</body>
</html>
