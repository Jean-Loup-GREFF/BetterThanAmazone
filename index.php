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
			if(empty($_GET))
			{
				include('SearchProductList.php');
			}
			include('footer.php');
		?>
</body>
</html>
