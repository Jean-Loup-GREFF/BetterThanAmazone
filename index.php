<?php
	session_start();
	include('connexion.php');
?>
<?php
	if(isset($_SESSION["isConnected"]) == false)
	{
		$_SESSION["isConnected"] = false;
	}
	
	//Connexion handler
	if(!empty($_POST["username"]))
	{
		$userP = array_slice(getUserByUsernameAndPassword($_POST["username"], $_POST["password"]), 0, 1);
		$userE = array_slice(getUserByEmailAndPassword($_POST["username"], $_POST["password"]), 0, 1);
		//Wrong username of password (maybe not subscribed yet)
		if(count($userP) == 0 and count($userE) == 0)
		{
			echo("<br> <h1 id='titlegeneral'>ERREUR DE MOT DE PASSE OU DE NOM DE COMPTE, HACKEUR!!!!</h1> <br>");
		}
		else if(count($userP) == 1)
		{
			$_SESSION["userID"] = $userP[0]["id"];
			$_SESSION["username"] = $userP[0]["username"];
			$_SESSION["isConnected"] = true;
		}
		else if(count($userE) == 1)
		{
			$_SESSION["userID"] = $userE[0]["id"];
			$_SESSION["username"] = $userE[0]["username"];
			$_SESSION["isConnected"] = true;
		}
	}
	if(!empty($_POST["isDisconnecting"]))
	{
		if($_POST["isDisconnecting"] == "Disconnect")
		{
			$_SESSION["userID"] = -1;
			$_SESSION["username"] = "";
			$_SESSION["isConnected"] = false;
		}
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
</head>


<body  id="body_princ">

		

		<?php
			if(empty($_GET))
			{
				include('Home.php');
			}
			else if(!empty($_GET["chosen_page"]) and file_exists($_GET["chosen_page"]))
			{
				include($_GET["chosen_page"]);
			}
			else
			{
				include('Home.php');
			}
			include('footer.php');
		?>
</body>
</html>
