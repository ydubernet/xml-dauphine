
	
	
	<form method="POST">
			<input type="hidden" name="MODE"  value="R"/>
			<table style="margin-left: auto; margin-right: auto;text-align:center;"><caption>Recherche d'un article</caption>
				<tr>
					<td>Author :</td>
					<td><input type="text" name="r_author" value="<?php isset($_POST['r_author'])?$_POST['r_author']:''?>"/></td>
				</tr>
				<tr>
					<td>Titre :</td>
					<td><input type="text" name="r_title" value="<?php isset($_POST['r_title'])?$_POST['r_title']:''?>"/></td>
                                </tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Rechercher"/>
					</td>
				</tr>
			</table>
		</form>

	<?php
	
	require_once "includes/bean/articles.php";
	$a = new articles("xml/article.xml");
<<<<<<< HEAD

=======
	//$title
>>>>>>> origin/master
	//Gestion de la suppression et de la modification
	if (isset($_POST['REF'])){	
		if ($_POST['MODE']=='S'){
			echo 'demande delete : '.$_POST['REF'];		
			echo(var_dump($a->deleteArticle($_POST['REF'])));
		}
		else if ($_POST['MODE']=='M'){
			echo 'demande modif : '.$_POST['REF'];
		}
	}

	if (isset($_POST['MODE']) && $_POST['MODE']=='R'){
		echo $_POST['r_title'];
		echo $_POST['r_author'];
		$search['title']=$_POST['r_title'];
		$search['author']=$_POST['r_author'];
		$abc = $a->searchArticle($search);
	}
	else
		$abc = $a->getAllArticles();
	
	echo $abc;
?>

