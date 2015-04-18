
	
	
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
	
	require_once "includes/bean/Articles.php";
	$a = new articles("xml/article.xml");

?>

