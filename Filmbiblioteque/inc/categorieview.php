
<form action="categorie.php" method="get">
<table><!--la table a ete mis pour metre le titre 'gestion de categories' ensemble avec le champ de selection de categories-->
	<tr>
		<td>
			<h1>Gestion des Categories</h1>
		</td>
		<td></td>
		<td><!-- Un menu déroulant en haut de la page reprend toutes les catégories de la base de données.  En sélectionnant une catégorie dans ce menu, je choisis de modifier la catégorie sélectionnée. Les champs du formulaire d’ajout/modification de catégorie sont alors pré-remplis.-->
			<select name="catOption" method="GET"><!-- ici  le name du select et mov_categorie, parce que l'idée c'est de gerir les categories. on l'a mit en get pour le recuperer dans le form suivante-->
				<option value="0">choisissez :</option>
				<option value="insert">ajouter nouveaux categorie</option>
				<?php foreach ($categorieList as $value) :?>
				<option value="<?php echo $value['cat_name']; ?>"><?php echo $value['cat_name']; ?></option><?php endforeach; ?>							
			</select><br />			
		</td>
		<td>
			<input type="submit" value="OK"><br />
		</td>		
		
		<td><p>si vous voulez modifier une categorie existante clicker dessus pour pourvour efectuer la modification</p></td>
	</tr>
</table>
</form>
<hr>
<!-- -->
<form action="" method="post">
	<fieldset>
		<legend>Crier ou modifier une categorie</legend>				
			<input type="text" name="catName" value="" placeholder="<?php echo $cat; ?>"><br />	
	<input type="submit" value="Valider"></input>	
	</fieldset>	
</form>


