<!DOCTYPE html>
<html>
    <header>
	
	<? // This style was added since it doesn't work from the stylesheet direcly. ?>
	
	 <style type="text/css">
    #connection{
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      background-color: rgb(211, 181, 105);
      color: black;
      border-radius:5%;
      box-shadow:3px 3px 12px black;
      padding: 16px 16px;
      margin: 16px 16px;
    }
    #menu_connected
    {
      box-sizing: border-box;
      border: none;
      background-color: rgb(211, 181, 105);
      color: black;
      border-radius:5%;
      width: 210px;
      height: 65px;
      box-shadow:3px 3px 12px black;
      padding: 16px 16px;
      margin: 32px 16px;
      font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
  </style>
	
	
      <p><img id='imagebanderole' src='src/pictures/imageacheter.png' /></p>

      <ul id = "menu_page">
       <li class = "essai2"><a class = "menu_reference" href="index.php?&chosen_page=home.php">Home</a></li>
       <li class = "essai2"><a class = "menu_reference" href="http://www.legorafi.fr/">News</a></li>
       <li class = "essai2"><a class = "menu_reference" href="index.php?&chosen_page=SearchProductList.php">Products</a></li>
       <li class = "essai2"><a class = "menu_reference" href="https://fr.wikipedia.org/wiki/Donjons_et_Dragons">About</a></li>
       
       
	<?php
		if($_SESSION["isConnected"] == true){
			echo "<li class = \"essai2\"><a class = \"menu_reference\" href=\"index.php?&chosen_page=cart.php\">Your Cart</a></li>";
		}
		else
		{
			echo "<li class = \"essai2\"><a class = \"menu_reference\" href=\"index.php?&chosen_page=create_account.php\">Sign in</a></li>";
			echo "<li class = \"essai2\"><a class = \"menu_reference\" href=\"index.php?&chosen_page=connect.php\">Sign up</a></li>";
		}
		echo "</ul><div id = \"essai\" align = \"right\">";
		if($_SESSION["isConnected"] == true){
			echo "<p id=\"menu_connected\">Vous êtes déjà connecté!\nBonjour, ".$_SESSION["username"]." !</p>";
			echo "
			<form method=\"POST\">
				<input id = \"connection\" type=\"submit\" name=\"isDisconnecting\" value=\"Disconnect\";\">
			</form>";
		}
		else
		{
			echo "<form method=\"POST\" class=\"connection\">
				  <input id = \"connection\" type=\"text\" name=\"username\" placeholder=\"Pseudo\">
				  <input id = \"connection\" type=\"password\" name=\"password\" placeholder=\"Password\">
				  <input id = \"connection\" type=\"submit\" value=\"Sign up\">
				</form>";
		}
		echo "</div>";
	?>

    </header>
</html>
