<?php
	
	require_once "includes/bean/articles.php";
	$a = new articles("xml/article.xml");
	
	if (isset($_GET['del'])){
		echo 'demande delete : '.$_GET['del'];		
		echo(var_dump($a->deleteArticle($_GET['del'])));
	}
	
	//$searchStr = '&apos;journals/acta/Saxena96&apos;';
	//echo $searchStr;
	$search = array("_title"=>"0", "_author"=>"1", "author"=>"H", "title"=>"NULL");
	$abc = $a->searchArticle($search);
	echo $abc;
?>
