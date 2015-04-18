<?php
	
	require_once "includes/bean/articles.php";
	$a = new articles("xml/article.xml");

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

	$search = array("_title"=>"0", "_author"=>"1", "author"=>"H", "title"=>"NULL");
	$abc = $a->searchArticle($search);
	echo $abc;
?>
