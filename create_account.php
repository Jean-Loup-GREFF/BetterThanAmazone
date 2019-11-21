<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />

</head>
<br>
		<h1 id='titlegeneral'>Create An Account and be part of a Better World.</h1>
	<br>
<body id='accountbody'>
	<header>
	<?php
		if(empty($_GET["chosen_page"]) or !isset($_SESSION["isConnected"]))
		{
			ob_start();
			header('Location: index.php');
			ob_end_flush();
			exit();
		}
		if($_SESSION["isConnected"] == true)
		{
			ob_start();
			header('Location: index.php');
			ob_end_flush();
			exit();
		}
	?>
	</header>

	<?php
	
		$address2 = "";
		if(isset($_POST["address2"])){$address2 = $_POST["address2"];}
		if(isset($_POST["pseudo"]) and isset($_POST["password"]) and isset($_POST["password_two"]) and isset($_POST["surname"]) and isset($_POST["name"]) and isset($_POST["email"]) and isset($_POST["phone"]) and isset($_POST["address1"]) and isset($_POST["postalCode"]) and isset($_POST["city"])) {
			createAccount($_POST["surname"], $_POST["name"], $_POST["pseudo"], 0, $_POST["email"], $_POST["password"], $_POST["password_two"],$_POST["address1"], $address2, $_POST["postalCode"], $_POST["city"]);
		}
	?>

	<div class="InscriptionBody">

	<img class="InscriptionPicture" src="src\pictures\better_postman.jpg">
	<br>
	<br>
	<br>

	<form id='accountform' method="post" action="index.php?&chosen_page=create_account.php">
		<?php
		if(isset($_POST["pseudo"])){
			$c = getCount("SELECT COUNT(`username`) AS `c` FROM `users` WHERE `username` = '".$_POST["pseudo"]."';");
			if($c["c"] != "0"){echo "<p>This pseudo is already used</p></ br>";}
		}
		?>
		<input class="InscriptionField" type="text" name="pseudo" <?php if(isset($_POST["pseudo"])){echo "value=\"".$_POST["pseudo"]."\"";}else{echo "placeholder=\"Pseudo\"";} ?> ><br><br>
		<?php
		if(isset($_POST["password"]) and isset($_POST["password_two"])){
			if($_POST["password"] != $_POST["password_two"]){echo "Both password should be the same";}
		}
		?>
		<input class="InscriptionField" type="password" name="password" <?php if(isset($_POST["password"])) {echo "value=\"".$_POST["password"]."\"";}else{echo "placeholder=\"Password\"";} ?> ><br><br>
		<input class="InscriptionField" type="password" name="password_two" <?php if(isset($_POST["password_two"])){echo "value=\"".$_POST["password_two"]."\"";}else{echo "placeholder=\"Write your password again\"";} ?> ><br><br>
		<input class="InscriptionNameField" type="text" name="surname" <?php if(isset($_POST["surname"])){echo "value=\"".$_POST["surname"]."\"";}else{echo "placeholder=\"Surname\"";} ?> >
		<input class="InscriptionNameField" type="text" name="name" <?php if(isset($_POST["name"])){echo "value=\"".$_POST["name"]."\"";}else{echo "placeholder=\"Name\"";} ?> ><br><br>
		<?php
			if(isset($_POST["email"])){
				$c = getCount("SELECT COUNT(`email`) AS `c` FROM `users` WHERE `username` = '".$_POST["email"]."';");
				if($c["c"] != "0"){echo "<p>This email is already used</p></ br>";}
			}
		?>
		<input class="InscriptionField" type="text" name="email" <?php if(isset($_POST["email"])){echo "value=\"".$_POST["email"]."\"";}else{echo "placeholder=\"E-mail address\"";} ?> ><br><br>
		<input class="InscriptionField" type="tel" name="phone" <?php if(isset($_POST["phone"])){echo "value=\"".$_POST["phone"]."\"";}else{echo "placeholder=\"Phone number\"";} ?>  pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" required><br><br>
		<input class="InscriptionField" type="text" name="address1" <?php if(isset($_POST["address1"])){echo "value=\"".$_POST["address1"]."\"";}else{echo "placeholder=\"Street, number...\"";} ?> ><br><br>
		<input class="InscriptionField" type="text" name="address2" <?php if(isset($_POST["address2"])){echo "value=\"".$_POST["address2"]."\"";}else{echo "placeholder=\"Appartement number...\"";} ?> ><br><br>
		<input class="InscriptionField" type="text" name="postalCode" <?php if(isset($_POST["postalCode"])){echo "value=\"".$_POST["postalCode"]."\"";}else{echo "placeholder=\"75000\"";} ?> pattern="[0-9]{5}"><br><br>
		<input class="InscriptionField" type="text" name="city" <?php if(isset($_POST["city"])){echo "value=\"".$_POST["city"]."\"";}else{echo "placeholder=\"Paris\"";} ?> ><br><br>
		We need your Favorite color:
		<input class="InscriptionColor" type="color" name="color" <?php if(isset($_POST["color"])){echo "value=\"".$_POST["color"]."\"";}else{echo "placeholder=\"FF0000\"";} ?> ><br><br>
		<input class="InscriptionButton" type="submit" value="Sign in">
	</form>
	</div>
	<footer>
	</footer>
</body>

</html>
