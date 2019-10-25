<html>
<head>
    <link rel="stylesheet" href="src/CSS/style_web_site_complet.css" />
    <?php
			include('header.php');
		?>
</head>
<body >



    <div id='searchbox'>
        <h1>Recherche</h1>
    <form><p>
    Rechercher un produit:
    <input type="text" name="search" class=string placeholder="Licorne volante..."/><br />
</p></form>
    <form><p>

    <label for="budget">Votre budget:</label>
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
</p>
</form>
<form><p>

    <label for="categorie">Catégorie:</label>
       <select name="categorie" id="categorie">
           <option value="peuimportecategorie">Tout les produits</option>
           <option value="armes">Armes</option>
           <option value="armures">Armures</option>
           <option value="potions">Potions</option>
           <option value="baguettesmagiques">Baguettes de sorcier</option>
           <option value="livredesorts">Livre de Sortilèges</option>
           <option value="creatures">Créatures</option>
       </select>
</p>
</form>
<form><p><input type="submit" value="Rechercher" /></p></form>
</div>

<TABLE>
<CAPTION> </CAPTION>

<TR>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br /><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/><br/> </p></TD>

    <TD><p ><br/><a  id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/> <br/></p></TD>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/><br/> </p></TD>
</TR>
<TR>
    <TD><p><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/> <br/></p></TD>

    <TD><p><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/> <br/></p></TD>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/><br/> </p></TD>
</TR>
<TR>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/> <br/></p></TD>

    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/><br/> </p></TD>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img  id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/> <br/></p></TD>
</TR>
<TR>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles'  src='src/pictures/5etoiles.png' /><br/> 15 euros<br/><br/> </p></TD>

    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/><img id='etoiles' src='src/pictures/5etoiles.png' /><br/> 15 euros<br/> <br/></p></TD>
    <TD><p ><br/><a id='productname' href='produit.'>Licorne volante</a><br /><br/><img id='imageminiature' src='src/pictures/licorne.png' /><br/> <img id='etoiles' src='src/pictures/5etoiles.png' /><br/>15 euros<br/> <br/></p></TD>
</TR>
</TABLE>



</body>


<footer><?php
			include('footer.php');
		?></footer>


</html>
