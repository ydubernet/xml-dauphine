<?php
	//Recup des GET
	isset($_GET['pg_EDITOR'])?$pg_EDITOR = $_GET['pg_EDITOR']:$pg_EDITOR='';
	isset($_GET['pg_TITLE'])?$pg_TITLE = $_GET['pg_TITLE']:$pg_TITLE='';
	isset($_GET['pg_YEAR'])?$pg_YEAR = $_GET['pg_YEAR']:$pg_YEAR='';
	isset($_GET['pg_PUBLISHER'])?$pg_PUBLISHER = $_GET['pg_PUBLISHER']:$pg_PUBLISHER='';
	isset($_GET['pg_BOOK'])?$pg_BOOK = $_GET['pg_BOOK']:$pg_BOOK='';
	isset($_GET['pg_ORDER_TYPE'])?$pg_ORDER_TYPE = $_GET['pg_ORDER_TYPE']:$pg_ORDER_TYPE='ascending';
	isset($_GET['pg_ORDER'])?$pg_ORDER = $_GET['pg_ORDER']:$pg_ORDER='title';
	isset($_GET['pg_SIZE'])?$pg_SIZE = $_GET['pg_SIZE']:$pg_SIZE=50;
	isset($_GET['pg_BEGIN'])?$pg_BEGIN = $_GET['pg_BEGIN']:$pg_BEGIN=0;
?>

<div id="books">
    <form method="GET">
    <table style="margin-left: auto; margin-right: auto;" cellpadding=20 >
    <tr>
            <td>
                    Taille du tableau : 
                    <select name="pg_SIZE" onChange="submit()">
                               <option value="25" <?php if ($pg_SIZE==25){echo 'selected';} ?> >25</option>
                               <option value="50" <?php if ($pg_SIZE==50){echo 'selected';} ?>>50</option>
                               <option value="75" <?php if ($pg_SIZE==75){echo 'selected';} ?>>75</option>
                               <option value="100" <?php if ($pg_SIZE==100){echo 'selected';} ?>>100</option>
                            </select>
            </td>

            <td>	
            <table style="text-align:center;"><caption>Tri</caption>
                    <tr>
                            <td><input type="radio" name="pg_ORDER_TYPE" value="ascending" <?php if ($pg_ORDER_TYPE=='ascending'){echo 'checked';} ?>/>Ascendant</td>
                            <td><input type="radio" name="pg_ORDER_TYPE" value="descending" <?php if ($pg_ORDER_TYPE=='descending'){echo 'checked';} ?>/>Descendant</td>
                    </tr>
                    <tr>
                            <td>Champ : </td>
                            <td><select name="pg_ORDER">
                               <option value="title" <?php if ($pg_ORDER=='title'){echo 'selected';} ?> >Titres</option>
                               <option value="author" <?php if ($pg_ORDER=='author'){echo 'selected';} ?>>Auteurs</option>
                               <option value="year" <?php if ($pg_ORDER=='year'){echo 'selected';} ?>>Années</option>
							   <option value="publisher" <?php if ($pg_ORDER=='publisher'){echo 'selected';} ?>>Publieur</option>
							   <option value="booktitle" <?php if ($pg_ORDER=='booktitle'){echo 'selected';} ?>>Livre</option>
                            </select></td>
                    </tr>
                    <tr>
                            <td colspan="2"><input type="submit" value="Trier"/><td>
                    </tr>
            
            </table>
            </td>
            <td>
            <table style="text-align:center;"><caption>Recherche</caption>
                    <tr>
                            <td>Editeur :</td>
                            <td><input type="text" name="pg_EDITOR" value="<?php echo $pg_EDITOR ?>"/></td>
                    </tr>
                    <tr>
                            <td>Titre :</td>
                            <td><input type="text" name="pg_TITLE" value="<?php echo $pg_TITLE ?>"/></td>
                    </tr>
                    <tr>
                            <td>Année :</td>
                            <td><input type="text" name="pg_YEAR" value="<?php echo $pg_YEAR ?>"/></td>
                    </tr>
					<tr>
                            <td>Publieur :</td>
                            <td><input type="text" name="pg_PUBLISHER" value="<?php echo $pg_PUBLISHER ?>"/></td>
                    </tr>
					<tr>
                            <td>Livre :</td>
                            <td><input type="text" name="pg_BOOK" value="<?php echo $pg_BOOK ?>"/></td>
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
</div>
	

	
<?php
	//En production :
	require_once ("includes/bean/Proceedings.php");
	//Pour Florian :
	//require_once ("../../bean/Proceedings.php");
	$a = new proceedings();
	
	//Gestion de la suppression et de la modification
	if (isset($_GET['REF'])){	
		if ($_GET['MODE']=='S'){
			//echo 'demande delete : '.$_GET['REF'];
			$a->deleteProceeding($_GET['REF']);
		}
		else if ($_GET['MODE']=='M'){
			//echo 'demande modif : '.$_GET['REF'];
			$a->updateProceeding($_GET['REF'],$_GET['title'],$_GET['book'],$_GET['series'],$_GET['volume'],$_GET['publisher']);
		}
	}
	
	$search['title']=$pg_TITLE;
	$search['editor']=$pg_EDITOR;
	$search['year']=$pg_YEAR;
	$search['publisher']=$pg_PUBLISHER;
	$search['book']=$pg_BOOK;
	$search['order']=$pg_ORDER;
	$search['order_type']=$pg_ORDER_TYPE;
	$search['begin']=$pg_BEGIN;
	$search['end']=($pg_BEGIN+$pg_SIZE);
	$abc = $a->searchProceeding($search);
	
	echo $abc;

?>