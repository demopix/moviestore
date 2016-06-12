
<form action="index.php" method="get">
<input type="hidden" name="inc" value="ctg">
<table><!--la table a ete mis pour metre le titre 'gestion de categories' ensemble avec le champ de selection de categories-->
	<tr>
		
		<td><!-- Un menu déroulant en haut de la page reprend toutes les catégories de la base de données.  En sélectionnant une catégorie dans ce menu, je choisis de modifier la catégorie sélectionnée. Les champs du formulaire d’ajout/modification de catégorie sont alors pré-remplis.-->
			<select name="catOption" method="GET"><!-- ici  le name du select et mov_categorie, parce que l'idée c'est de gerir les categories. on l'a mit en get pour le recuperer dans le form suivante-->
				<option value="0">choisissez :</option>
				<option value="insert">ajouter nouveaux categorie</option>
				<?php foreach ($categorieList as $value) :?>
				<option value="<?php echo $value['cat_name']; ?>"><?php echo $value['cat_name']; ?></option><?php endforeach; ?>							
			</select><br />			
		</td><td>
&nbsp;
		</td>
				<td>
			<input class="btn btn-info" type="submit" value="OK"><br />
		</td>		
		
		<td>&nbsp;<p>&nbsp;si vous voulez modifier une categorie existante cliquez dessus pour pourvour efectuer la modification</p></td>
	</tr>
</table>
</form>
<hr>
<!-- -->
<form action="" method="post">
	<fieldset>
		<legend>Crier ou modifier une categorie</legend>	
		<div class="col-lg-5 ">
		  <input type="text" class="form-control" name="catName" placeholder="<?php echo $cat; ?>"><br />	
	    </div>	
	    <input class="btn btn-success" type="submit" value="Valider"></input>	
	</fieldset>	
</form>


