<?php
	//Recup des POST
	isset($_POST['pp_AUTHOR'])?$pp_AUTHOR = $_POST['pp_AUTHOR']:$pp_AUTHOR='';
	isset($_POST['pp_TITLE'])?$pp_TITLE = $_POST['pp_TITLE']:$pp_TITLE='';
?>
<fieldset>
		<legend>Tri</legend>
<form method="POST">
<input type="hidden" name="MODE"  value="T"/>
<table>
<tr>
	<td><input type="radio" name="order" value="asc" checked>Ascendant</td>
	<td><input type="radio" name="order" value="desc">Descendant</td>
</tr>
<tr>
	<td>Champ : </td>
	<td><select >
	   <option value="title">Titre</option>
	   <option value="author">Auteurs</option>
	   <option value="year">Année</option>
	</select></td>
</tr>
<input type="submit" value="Trier"/>
</form>
</fieldset>
	<fieldset>
		<legend>Recherche</legend>
	<form method="POST">
			<input type="hidden" name="MODE"  value="R"/>
			<table style="margin-left: auto; margin-right: auto;text-align:center;"><caption>Recherche d'un article</caption>
				<tr>
					<td>Author :</td>
					<td><input type="text" name="pp_AUTHOR" value="<?php echo $pp_AUTHOR ?>"/></td>
				</tr>
				<tr>
					<td>Titre :</td>
					<td><input type="text" name="pp_TITLE" value="<?php echo $pp_TITLE ?>"/></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Rechercher"/>
					</td>
				</tr>
			</table>
		</form>
		</fieldset>

	
<?php
	require_once "includes/bean/articles.php";
	$a = new articles("xml/dblp_100000_lignes.xml");
	
	//Gestion de la suppression et de la modification
	if (isset($_POST['REF'])){	
		if ($_POST['MODE']=='S'){
			echo 'demande delete : '.$_POST['REF'];
			$a->deleteArticle($_POST['REF']);
		}
		else if ($_POST['MODE']=='M'){
			echo 'demande modif : '.$_POST['REF'];
			$a->updateArticle($_POST['REF'],$_POST['title'],$_POST['pages'],$_POST['volume'],$_POST['journal']);
		}
	}
	
	$search['title']=$pp_TITLE;
	$search['author']=$pp_AUTHOR;
	$abc = $a->searchArticle($search);
	
	echo $abc;

?>

<br/> <br/>
<form method="POST">
	<input type="hidden" name="MODE"  value="C"/>
	<table style="margin-left: auto; margin-right: auto;text-align:center;"><caption>Création d'un article</caption>
		<tr>
			<td>Key :</td>
			<td><input type="text" name="key"/></td>
		</tr>
		<tr>
			<td>Authors :</td>
			<td><input type="text" name="authors"/></td>
		</tr>
		<tr>
			<td>Titre :</td>
			<td><input type="text" name="title"/></td>
		</tr>
		<tr>
			<td>Pages :</td>
			<td><input type="text" name="pages"/></td>
		</tr>
		<tr>
			<td>Volume :</td>
			<td><input type="text" name="volume"/></td>
		</tr>
		<tr>
			<td>Journal :</td>
			<td><input type="text" name="journal"/></td>
		</tr>
		<tr>
			<td>Number :</td>
			<td><input type="text" name="number"/></td>
		</tr>
		<tr>
			<td>Url :</td>
			<td><input type="text" name="url"/></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" value="Ajouter"/></td>
		</tr>
	</table>
</form>
