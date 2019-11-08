<!DOCTYPE html>
<html>

<br>
		<h1 id='titlegeneral'>Connect to buy your dreams...</h1>
	<br>
<body id='accountbody'>
	<header>

	</header>
	
	<?php
	
	if(!empty($_POST["pseudo"]))
	{
		$user = array_slice(getUserByUsernameAndPassword($_POST["pseudo"], $_POST["password"]), 0, 1);
		//Wrong username of password (maybe not subscribed yet
		if(count($user) == 0)
		{
			echo("<br> <h1 id='titlegeneral'>ERREUR DE MOT DE PASSE OU DE NOM DE COMPTE, HACKEUR!!!!</h1> <br>");
		}
		else if(count($user) == 1)
		{
			$_SESSION["userID"] = $user[0]["id"];
			$_SESSION["username"] = $user[0]["username"];
			$_SESSION["isConnected"] = true;
		}
	}

	
	if($_SESSION["isConnected"] == false)
	{
		echo("

		<div class=\"InscriptionBody\">

		<img class=\"InscriptionPicture\" src=\"src\pictures\connect.jpg\">
		<br>
		<br>
		<br>
		<form id='accountform' method='POST'>
			<input class=\"InscriptionField\" type=\"text\" name=\"pseudo\" placeholder=\"Pseudo\"><br><br>

			<input class=\"InscriptionField\" type=\"password\" name=\"password\" placeholder=\"Password\"><br><br>

			<br><br>
			<input class=\"InscriptionButton\" type=\"submit\" value=\"Sign up\">
		</form>
		</div>");
	}
	else
	{
		echo "Vous êtes déjà connecté!!!";
		echo "Bonjour, ".$_SESSION["username"]." !";
	}
	
	?>
	
</body>

</html>
