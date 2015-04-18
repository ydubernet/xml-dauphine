<?php
	//Recup des POST
	isset($_POST['pp_AUTHOR'])?$pp_AUTHOR = $_POST['pp_AUTHOR']:$pp_AUTHOR='';
	isset($_POST['pp_TITLE'])?$pp_TITLE = $_POST['pp_TITLE']:$pp_TITLE='';
	isset($_POST['pp_YEAR'])?$pp_YEAR = $_POST['pp_YEAR']:$pp_YEAR='';
	isset($_POST['pp_ORDER_TYPE'])?$pp_ORDER_TYPE = $_POST['pp_ORDER_TYPE']:$pp_ORDER_TYPE='descending';
	isset($_POST['pp_ORDER'])?$pp_ORDER = $_POST['pp_ORDER']:$pp_ORDER='title';
	
?>

<form method="POST">
<table style="margin-left: auto; margin-right: auto;" cellpadding=20 >
<tr>
	<td>	
	<table style="text-align:center;"><caption>Tri</caption>
		<tr>
			<td><input type="radio" name="pp_ORDER_TYPE" value="ascending" <?php if ($pp_ORDER_TYPE=='ascending'){echo 'checked';} ?>/>Ascendant</td>
			<td><input type="radio" name="pp_ORDER_TYPE" value="descending" <?php if ($pp_ORDER_TYPE=='descending'){echo 'checked';} ?>/>Descendant</td>
		</tr>
		<tr>
			<td>Champ : </td>
			<td><select name="pp_ORDER">
			   <option value="title" <?php if ($pp_ORDER=='title'){echo 'selected';} ?> >Titres</option>
			   <option value="author" <?php if ($pp_ORDER=='author'){echo 'selected';} ?>>Auteurs</option>
			   <option value="year" <?php if ($pp_ORDER=='year'){echo 'selected';} ?>>Années</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Trier"/><td>
		</tr>
	</td>
	</table>
	<td>
	<table style="text-align:center;"><caption>Recherche</caption>
		<tr>
			<td>Auteur :</td>
			<td><input type="text" name="pp_AUTHOR" value="<?php echo $pp_AUTHOR ?>"/></td>
		</tr>
		<tr>
			<td>Titre :</td>
			<td><input type="text" name="pp_TITLE" value="<?php echo $pp_TITLE ?>"/></td>
		</tr>
		<tr>
			<td>Année :</td>
			<td><input type="text" name="pp_YEAR" value="<?php echo $pp_YEAR ?>"/></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Rechercher"/>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
</form>
	

	
<?php
	require_once "includes/bean/articles.php";
	$a = new articles("xml/dblp_1000_lignes.xml");
	
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
	$search['year']=$pp_YEAR;
	$search['order']=$pp_ORDER;
	$search['order_type']=$pp_ORDER_TYPE;
	$abc = $a->searchArticle($search);
	
	echo $abc;

?>

<!--<br/> <br/>
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
</form>-->
