<?php
	include('connexion.php');
?>
<?php
	if(isset($_SESSION["isConnected"]) == false)
	{
		$_SESSION["isConnected"] = false;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
	<?php
			include('header.php');
		?>
	<link rel="stylesheet" href="style_web_site_complet.css" />
</head>


<body  id="body_princ">

		

		<?php
			if(empty($_GET)||$_GET["chosen_page"]=='SearchProductList.php')
			{
				include('SearchProductList.php');
			}
			else
			{
				include($_GET["chosen_page"]);
			}
			include('footer.php');
		?>
</body>
</html>
