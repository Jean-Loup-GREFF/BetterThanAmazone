<!DOCTYPE html>
<html>

<br>
		<h1 id='titlegeneral'>Connect to buy your dreams...</h1>
	<br>
<body id='accountbody'>
	<header>

	</header>
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
	
	if($_SESSION["isConnected"] == false)
	{
		echo("

		<div class=\"InscriptionBody\">

		<img class=\"InscriptionPicture\" src=\"src\pictures\connect.jpg\">
		<br>
		<br>
		<br>
		<form id='accountform' method='POST'>
			<input class=\"InscriptionField\" type=\"text\" name=\"username\" placeholder=\"Pseudo\"><br><br>

			<input class=\"InscriptionField\" type=\"password\" name=\"password\" placeholder=\"Password\"><br><br>

			<br><br>
			<input class=\"InscriptionButton\" type=\"submit\" value=\"Sign up\">
		</form>
		</div>");
	}
	else
	{
		ob_start();
		header('Location: index.php');
		ob_end_flush();
		exit();
	}
	
	?>
	
</body>

</html>
