<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style_web_site_complet.css" />
<?php
			include('header.php');
		?>
</head>
<br> 
		<h1 id='titlegeneral'>Create An Account and be part of a Better World.</h1>
	<br>
<body id='accountbody'>
	<header>
	
	</header>

	<div class="InscriptionBody">
	
	<img class="InscriptionPicture" src="src\pictures\better_postman.jpg">
	<br> 
	<br> 
	<br> 
	<form id='accountform'>
		<input class="InscriptionField" type="text" name="pseudo" placeholder="Pseudo"><br><br>
		<input class="InscriptionNameField" type="text" name="Surname" placeholder="Surname"><br><br>
		<input class="InscriptionNameField" type="text" name="Name" placeholder="Name"><br><br>
		<input class="InscriptionField" type="text" name="email" placeholder="E-mail address"><br><br>
		<input class="InscriptionField" type="tel" name="phone" placeholder="Phone number" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" required><br><br>
		<input class="InscriptionField" type="password" name="password" placeholder="Password"><br><br>
		<input class="InscriptionField" type="password" name="password_two" placeholder="Write your password again"><br><br>
		<p>We need your Favorite color:</p>
		<input class="InscriptionColor" type="color" placeholder="000000"><br><br>
		<input class="InscriptionButton" type="submit" value="Sign in">
	</form>
	</div>
	<footer>
	<?php
			include('footer.php');
		?>
	</footer>
</body>

</html>