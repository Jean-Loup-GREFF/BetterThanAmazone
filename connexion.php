<?php

	$bdd = new PDO('mysql:host=localhost;dbname=bamazone','root', '');
	
	
	function getFromRequest($request, $parameterList)
	{
		$list = array();
		$response = $GLOBALS["bdd"]->query($request);
		$i = 0;
		while($result = $response->fetch())
		{
			$i = $result["id"];
			foreach ($parameterList as $parameter){
				$newParameterToAdd = $result[$parameter];
				$list[$i][$parameter] = $newParameterToAdd;
			}
			$i+=1;
		}
		$response->closeCursor();
		return $list;
	}
	
	
	
	function getAllCategoriesName() { return getFromRequest("SELECT * FROM `ranges`", ["name", "created_at", "id", "parent_id"]); }
	function getAllUsersName() {return getFromRequest("SELECT * FROM `users`", ["id", "firstname", "lastname", "username", "color", "email", "password", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getUserByUsername($username) { return getFromRequest("SELECT `u`.* FROM `users` `u` WHERE `u`.`username` = \"".$username."\"", ["id", "firstname", "lastname", "username",]);}


//	var_dump(getAllUsersName());
//	var_dump(getUserByUsername("Frederic"));

?>