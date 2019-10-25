<html> 
<head>
    <link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
    <?php
            include('header.php');
            include("connexion.php")
		?>
</head>
<body >

    
    
    <div id='searchbox'>
        <h1>Recherche</h1>
    <form action="SearchProductList.php" method="post"><p>
    Rechercher un produit: 
    <input type="text" name="search" class=string placeholder="Licorne volante..."/><br />
</p>
    <p>
    
    <label for="budget">Votre budget:</label>
	<input type="number" name="budget" id="budget" value=50 />
	<?php
	/*
       <select name="budget" id="budget">
           <option value="peuimporte">C'est peu important</option>
           <option value="moins5">moins de 5 euros</option>
           <option value="entre5et10">5-10 euros</option>
           <option value="entre10et20">10-20 euros</option>
           <option value="entre20et30">20-30 euros</option>
           <option value="entre30et40">30-40 euros</option>
           <option value="entre40et50">40-50 euros</option>
           <option value="plusde50">plus de 50 euros</option>
       </select>  
	 */?>
</p>

<p>
    
    <label for="categorie">Catégorie:</label>
       <select name="categorie" id="categorie">
	   <?php 
			$listCategories = getAllCategoriesName();
			foreach($listCategories as $categorie)
			{
				echo "<option value=".$categorie["id"].">".$categorie["name"]."</option>";
			}
			/*
           <option value="peuimportecategorie">Tout les produits</option>
           <option value="armes">Armes</option>
           <option value="armures">Armures</option>
           <option value="potions">Potions</option>
           <option value="baguettesmagiques">Baguettes de sorcier</option>
           <option value="livredesorts">Livre de Sortilèges</option>
           <option value="creatures">Créatures</option>*/
		?>
       </select>  
</p>

<p><input type="submit" name="valider" value="Rechercher" /></p></form>

<p>

</p>
</div>
<TABLE>
<CAPTION> </CAPTION>

<?php 
	$productList = array();
	if (isset($_POST["valider"])) {
		$searchEntries=True;
		$searchString = htmlentities($_POST["search"],ENT_QUOTES, "UTF-8");
		$searchPrice=(int)($_POST["budget"]);
		$searchCategorieId=htmlentities($_POST["categorie"],ENT_QUOTES, "UTF-8");
		$productsList=intersectLists( intersectLists( getProductsContainingName($searchString), getProductsByCategorieId($searchCategorieId) ),  getProductsBetweenPrices(0, $searchPrice) ) ;
	}
    else{
		$productsList=getAllProducts();
    }
	$column=0;
	foreach($productsList as $product){
		echo '<TD><p ><br/><a id="productname"  method="post"  href="Product_page.php?id_prod='.$product["id"].'">'.$product["name"].'</a><br /><br/><img id="imageminiature" src='.$product["image"].' /><br /><img id="etoiles" src="src/pictures/5etoiles.png" /><br/> '.$product["unit_price"].' euros<br/><br/> </p></TD>';
	}
	$column+=1;
	if ($column%3==0){
		echo '</TR><TR>';
		$column=0;
	}
?>
</TR>
</TABLE>



</body>


<footer><?php
			include('footer.php');
		?></footer>


</html>