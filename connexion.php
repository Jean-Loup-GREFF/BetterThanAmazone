<?php

	$database = new PDO('mysql:host=localhost;dbname=bamazone','root', '');


	function insertToBDD($request)
	{
		//$response = $GLOBALS["database"]->exec($request);
		$response = $GLOBALS["database"]->exec($request);

		$last_id = $GLOBALS["database"]->lastInsertId();

		//echo $last_id;

		return $last_id;
	}
	function getFromRequest($request, $parameterList)
	{
		$list = array();
		$response = $GLOBALS["database"]->query($request);
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

	function intersectLists($listA, $listB)
	{
		$listFinale = array();
		foreach($listA as $a)
		{
			foreach($listB as $b)
			{
				if($a["id"] == $b["id"])
					$listFinale[] = $a;
			}
		}
		return $listFinale;
	}

	function getAllCategoriesName() { return getFromRequest("SELECT * FROM `ranges`", ["name", "created_at", "id", "parent_id"]); }
	function getCategoriesById($rangeId) { return getFromRequest("SELECT `r`.* FROM `ranges` `r` WHERE `r`.`id` = \"".$rangeId."\"", ["name", "created_at", "id", "parent_id"]); }
	function getCategoriesChildByCategorieId($rangeId) { return getFromRequest("SELECT `r`.* FROM `ranges` `r` WHERE `r`.`parent_id` = \"".$rangeId."\"", ["name", "created_at", "id", "parent_id"]); }
	function getCategoriesChildByCategorieName($rangeName) { return getFromRequest("SELECT `r`.* FROM `ranges` `r` INNER JOIN `ranges` `p` ON `p`.`id` = `r`.`parent_id` WHERE `p`.`name` = \"".$rangeName."\"", ["name", "created_at", "id", "parent_id"]); }

	function getAllOrders() {return getFromRequest("SELECT * FROM `orders`", ["id", "user_id", "type", "status", "amount", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getOrdersOfUser($userId) {return getFromRequest("SELECT `o`.* FROM `orders` `o` INNER JOIN `users` `u` ON `o`.`user_id` = `u`.`id` WHERE `u`.`id` = \"".$userId."\"", ["id", "user_id", "type", "status", "amount", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getCartOrderOfUser($userId) {return getFromRequest("SELECT `o`.* FROM `orders` `o` INNER JOIN `users` `u` ON `o`.`user_id` = `u`.`id` WHERE `u`.`id` = \"".$userId."\" AND `o`.`type` = \"CART\" ", ["id", "user_id", "type", "status", "amount", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getOrderByID($orderId) {return getFromRequest("SELECT `o`.* FROM `orders` `o` WHERE `o`.`id` = \"".$orderId."\"", ["id", "user_id", "type", "status", "amount", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getOrderProductOfOrder($orderId) {return getFromRequest("SELECT `op`.* FROM `order_products` `op` INNER JOIN `orders` `o` ON `op`.`order_id` = `o`.`id` WHERE `o`.`id` = \"".$orderId."\"", ["id", "order_id", "product_id", "quantity", "unit_price", "rating", "comment", "created_at", "updated_at"]);}
	function getOrderProductOfOrderAndSpecificProduct($orderId, $productId) {return getFromRequest("SELECT `op`.* FROM `order_products` `op` WHERE `op`.`order_id` = \"".$orderId."\" AND `op`.`product_id` = \"".$productId."\"", ["id", "order_id", "product_id", "quantity", "unit_price", "rating", "comment", "created_at", "updated_at"]);}

	function getAllUsers() {return getFromRequest("SELECT * FROM `users`", ["id", "firstname", "lastname", "username", "color", "email", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getUserByUsername($username) { return getFromRequest("SELECT `u`.* FROM `users` `u` WHERE `u`.`username` = \"".$username."\"", ["id", "firstname", "lastname", "username", "color", "email", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getUserByUsernameAndPassword($username, $password) { return getFromRequest("SELECT `u`.* FROM `users` `u` WHERE `u`.`username` = \"".$username."\" AND `u`.`password` = \"".$password."\"", ["id", "firstname", "lastname", "username", "color", "email", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getUserByEmailAndPassword($mail, $password) { return getFromRequest("SELECT `u`.* FROM `users` `u` WHERE `u`.`email` = \"".$mail."\" AND `u`.`password` = \"".$password."\"", ["id", "firstname", "lastname", "username", "color", "email", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getUserById($userId) { return getFromRequest("SELECT `u`.* FROM `users` `u` WHERE `u`.`id` = \"".$userId."\"", ["id", "firstname", "lastname", "username", "color", "email", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}
	function getUserByEmail($userMail) {return getFromRequest("SELECT * FROM `users` WHERE `email` = \"".$userMail."\"",["id", "firstname", "lastname", "username", "color", "email", "billing_adress_id", "delivery_adress_id", "created_at", "updated_at"]);}

	function getAddressById($addressId) { return getFromRequest("SELECT `a`.* FROM `user_addresses` `a` WHERE `a`.`id` = \"".$addressId."\"", ["id", "human_name", "address_one", "address_two", "postal_code", "city", "country", "created_at", "updated_at"]);}
	function getIdByAddress($pseudo,$address1,$address2,$postal_code,$city){return getFromRequest("SELECT * FROM `user_addresses` `ua` WHERE `ua`.`human_name`='".$pseudo."' AND `ua`.`address_one`='".$address1."' AND `ua`.`address_two`='".$address2."' AND `ua`.`postal_code`='".$postal_code."' AND `ua`.`city`='".$city."';",["id", "human_name", "address_one", "address_two", "postal_code", "city", "country", "created_at", "updated_at"]);}

	function getAllProducts() {return getFromRequest("SELECT * FROM `products`", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsBetweenPrices($inferiorPrice, $superiorPrice) {return getFromRequest("SELECT `p`.* FROM `products` `p` WHERE `p`.`unit_price` >= \"".$inferiorPrice."\" AND `p`.`unit_price` <= \"".$superiorPrice."\"", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductById($productId) { return getFromRequest("SELECT `o`.* FROM `products` `o` WHERE `o`.`id` = \"".$productId."\"", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsByCategorieId($rangeId) {return getFromRequest("SELECT `p`.* FROM `products` `p` INNER JOIN `ranges` `r` ON `p`.`range_id` = `r`.`id` WHERE `r`.`id`= \"".$rangeId."\"", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsByCategorie($range) {return getFromRequest("SELECT `p`.* FROM `products` `p` INNER JOIN `ranges` `r` ON `p`.`range_id` = `r`.`id` WHERE `r`.`name`= \"".$range."\"", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsByOrderId($orderId) {return getFromRequest("SELECT `p`.*,`op`.`quantity`, `op`.`unit_price` as `order_unit_price` FROM `products` `p` INNER JOIN `order_products` `op` ON `p`.`id` = `op`.`product_id` WHERE `op`.`order_id`= \"".$orderId."\"", ["id", "name", "quantity", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsByUserId($userId) {return getFromRequest("SELECT `p`.* FROM `products` `p` INNER JOIN `order_products` `op` ON `p`.`id` = `op`.`product_id` INNER JOIN `orders` `o` ON `o`.`id` = `op`.`order_id` WHERE `o`.`user_id`= \"".$userId."\"", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsContainingName($name) { return getFromRequest("SELECT `p`.* FROM `products` `p` WHERE `p`.`name` LIKE \""."%".$name."%"."\"", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getProductsContainingNameByCategorie($name, $range) { return getFromRequest("SELECT `p`.* FROM `products` `p` INNER JOIN `ranges` `r` ON `p`.`range_id` = `r`.`id` WHERE `p`.`name` LIKE \""."%".$name."%"."\" AND `r`.`name`= \"".$range."\" ", ["id", "name", "image", "description", "supplier", "unit_price", "range_id", "created_at", "updated_at"]);}
	function getCommentsByProductId($productId) {return getFromRequest("SELECT `op`.*, `u`.`username` FROM `order_products` `op` INNER JOIN `products` `p` ON `op`.`product_id` = `p`.`id` INNER JOIN `orders` `o` ON `op`.`order_id` = `o`.`id` INNER JOIN `users` `u` ON `o`.`user_id` = `u`.`id` WHERE `p`.`id`= \"".$productId."\"", ["username", "rating", "comment", "created_at", "updated_at"]);}

	function addToCart($userId ,$productId, $amount = 1) {

		$user = array_slice(getUserById($userId), 0, 1);
		$product = array_slice(getProductById($productId), 0, 1);

		if(count($user) == 0 || count($product) == 0)  { return "ERROR, wrong userID or productID"; }

		$orderAsCart = array_slice(getCartOrderOfUser($userId), 0, 1);

		//If the user doesn't possess an order yet
		if (count($orderAsCart) == 0)
		{
			insertToBDD("INSERT INTO `orders` (`user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`)"." VALUES (\"".$user[0]["id"]."\", \"CART\", \"CART\", \"0\", \"".$user[0]["billing_adress_id"]."\", \"".$user[0]["delivery_adress_id"]."\")");
			$orderAsCart = array_slice(getCartOrderOfUser($userId), 0, 1);
			if(count($orderAsCart) == 0)
			{
				return "ERROR, Can't add a new cart order";
			}
		}
		$orderProduct = array_slice(getOrderProductOfOrderAndSpecificProduct($orderAsCart[0]["id"], $productId), 0, 1);

		//If the cart doesn"t possess the product yet
		if (count($orderProduct) == 0)
		{
			insertToBDD("INSERT INTO `order_products` (`order_id`, `product_id`, `quantity`, `unit_price`)"." VALUES (\"".$orderAsCart[0]["id"]."\", \"".$productId."\", \"".$amount."\", \"".$product[0]["unit_price"]."\")");
			$orderProduct = array_slice(getCartOrderOfUser($userId), 0, 1);
			if(count($orderProduct) == 0)
			{
				return "ERROR, Can't add a new order_product";
			}
		}
		else
		{
			$quantity = $orderProduct[0]["quantity"] + $amount;
			insertToBDD("UPDATE `order_products` SET `quantity` = \"".$quantity."\" WHERE `id` = \"".$orderProduct[0]["id"]."\"");
			$price = array_slice(getOrderByID($orderAsCart[0]["id"]),0,1)[0]["amount"]+$quantity*$orderProduct[0]["unit_price"];
			insertToBDD("UPDATE `orders` SET `amount` = \"".$price."\" WHERE `id` = \"".$orderAsCart[0]["id"]."\"");
		}
	}
	
	function getAllCategoriesSubchildById($id)
	{
		$categorieList = [$id];
		$newSubChild = false;
		for($i = 0; $i < count($categorieList); $i += 1)
		{
			$categorieChildList = getCategoriesChildByCategorieId($categorieList[$i]);
			$categorieChildList = array_slice($categorieChildList, 0, count($categorieChildList));
			if(count($categorieChildList) > 0)
			{
				$newSubChild = true;
				for($j = 0; $j < count($categorieChildList); $j += 1)
				{
					array_push($categorieList, (int)$categorieChildList[$j]["id"]);
				}
			}
		}
		return $categorieList;
	}
	
	function getProductOfMotherAndChildCategoryById($id)
	{
		$rangeList = getAllCategoriesSubchildById($id);
		$rangeList = array_slice($rangeList, 0, count($rangeList));
		$productList = array();
		for($i = 0; $i < count($rangeList); $i += 1)
		{
			$partProductList = getProductsByCategorieId($rangeList[$i]);
			$partProductList = array_slice($partProductList, 0, count($partProductList));
			$productList = array_merge($productList, $partProductList);
		}
		return $productList;
	}

	function createAddress($humanName, $address_one, $address_two, $postal_code, $city, $country)
	{
		return insertToBDD("INSERT INTO `user_addresses` (`human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`) VALUES (\"".$humanName."\", \"".$address_one."\", \"".$address_two."\", \"".$postal_code."\", \"".$city."\", \"".$country."\")");
	}

	//if not billing_adress, it is a delivery address
	function addAddressToAccount($userId, $addressId, $isBillingAddress)
	{
		if($isBillingAddress == TRUE)
			insertToBDD("UPDATE `users` SET `billing_adress_id` = \"".$addressId."\" WHERE `id` = \"".$userId."\"");
		else
			insertToBDD("UPDATE `users` SET `delivery_adress_id` = \"".$addressId."\" WHERE `id` = \"".$userId."\"");
	}


	function createAccount($firstName, $lastName, $username, $color, $email, $password, $passwordAgain,$address1,$address2,$postalcode,$city)
	{
		if(count(getUserByUsername($username)) > 0)
		{
			return "ERROR, username already taken!";
		}
		if(count(getUserByEmail($email)) > 0)
		{
			return "ERROR, username already taken!";
		}
		if($password != $passwordAgain)
		{
			return "ERROR, the passwords are not the same!";
		}
		createAddress($username,$address1,$address2,$postalcode,$city,"FRANCE");
		$address = array_slice(getIdByAddress($username,$address1,$address2,$postalcode,$city),0,1);
		$idAddress = $address[0]["id"];
		return insertToBDD("INSERT INTO `users` (`firstname`, `lastname`, `username`, `color`, `email`, `password`, `billing_adress_id`) VALUES ('$firstName', '$lastName', '$username', '$color', '$email', '$password','$idAddress')");
	}

	function getCount($request)
	{
		$list;
		$response = $GLOBALS["database"]->query($request);
		while($result = $response->fetch())
		{
			$list = $result;
		}
		$response->closeCursor();
		return $list;
	}

//	var_dump(getCategoriesChildByCategorieId(2));
//	var_dump(getCategoriesChildByCategorieName("Main range"));

//	var_dump(getAllUsers());
//	var_dump(getUserByUsername("Frederic"));
//	var_dump(getUserByUsernameAndPassword("Frederic", "password"));
//	var_dump(getUserById(3));

//	var_dump(getAllOrders());
//	var_dump(getOrdersOfUser(2));
//	var_dump(array_slice(getCartOrderOfUser(2), 0, 1));

//	var_dump(getOrderProductOfOrder(2));
//	var_dump(getOrderProductOfOrderAndSpecificProduct(2, 3));

//	var_dump(getAllProducts());
//	var_dump(getProductsByCategorie("Main range"));
//	var_dump(getCommentsByProductId(2));
//	var_dump(getProductsByUserId(2));
//	var_dump(getProductsByOrderId(4));
//	var_dump(getProductsContainingName("esT"));
//	var_dump(getProductsContainingNameByCategorie("esT", "Main range"));

//var_dump(getProductById(2));


//	var_dump(addToCart(2, 3, 2));
//	var_dump(addToCart(3, 2, 3));
//	echo createAddress("Bobby Bob", "123 rue du trou", "Chez mamie", "59000", "Lille", "FRANCE");

//	var_dump(getProductOfMotherAndChildCategoryById(2));

?>
