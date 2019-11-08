<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
<?php
			include('header.php');
		?>
</head>
<br>
		<h1 id='titlegeneral'>Connect to buy your dreams...</h1>
	<br>
<body id='accountbody'>
	<header>

	</header>

	<div class="InscriptionBody">

	<img class="InscriptionPicture" src="src\pictures\connect.jpg">
	<br>
	<br>
	<br>
	<form id='accountform'>
		<input class="InscriptionField" type="text" name="pseudo" placeholder="Pseudo"><br><br>

		<input class="InscriptionField" type="password" name="password" placeholder="Password"><br><br>

        <br><br>
		<input class="InscriptionButton" type="submit" value="Sign up">
	</form>
	</div>
	<footer>
	<?php
			include('footer.php');
		?>
	</footer>
</body>

</html>
