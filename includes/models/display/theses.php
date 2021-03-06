<?php
	//Recup des POST
	isset($_POST['pp_AUTHOR'])?$pp_AUTHOR = $_POST['pp_AUTHOR']:$pp_AUTHOR='';
	isset($_POST['pp_TITLE'])?$pp_TITLE = $_POST['pp_TITLE']:$pp_TITLE='';
	isset($_POST['pp_YEAR'])?$pp_YEAR = $_POST['pp_YEAR']:$pp_YEAR='';
	isset($_POST['pp_SCHOOL'])?$pp_SCHOOL = $_POST['pp_SCHOOL']:$pp_SCHOOL='';
	isset($_POST['pp_ORDER_TYPE'])?$pp_ORDER_TYPE = $_POST['pp_ORDER_TYPE']:$pp_ORDER_TYPE='ascending';
	isset($_POST['pp_ORDER'])?$pp_ORDER = $_POST['pp_ORDER']:$pp_ORDER='title';
	isset($_POST['pp_SIZE'])?$pp_SIZE = $_POST['pp_SIZE']:$pp_SIZE=50;
	isset($_POST['pp_BEGIN'])?$pp_BEGIN = $_POST['pp_BEGIN']:$pp_BEGIN=0;
?>

<div id="theses">
    <form method="POST">
    <table style="margin-left: auto; margin-right: auto;" cellpadding=20 >
    <tr>
            <td>
                    Taille du tableau : 
                    <select name="pp_SIZE" onChange="submit()">
                               <option value="25" <?php if ($pp_SIZE==25){echo 'selected';} ?> >25</option>
                               <option value="50" <?php if ($pp_SIZE==50){echo 'selected';} ?>>50</option>
                               <option value="75" <?php if ($pp_SIZE==75){echo 'selected';} ?>>75</option>
                               <option value="100" <?php if ($pp_SIZE==100){echo 'selected';} ?>>100</option>
                            </select>
            </td>

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
							   <option value="school" <?php if ($pp_ORDER=='school'){echo 'selected';} ?>>Ecoles</option>
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
                            <td>Ecole :</td>
                            <td><input type="text" name="pp_SCHOOL" value="<?php echo $pp_SCHOOL ?>"/></td>
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
	require_once ("includes/bean/Thesis.php");
	//Pour Florian :
	//require_once ("../../bean/Thesis.php");
	$a = new thesis();
	
	//Gestion de la suppression et de la modification
	if (isset($_POST['REF'])){	
		if ($_POST['MODE']=='S'){
			//echo 'demande delete : '.$_POST['REF'];
			$a->deleteThesis($_POST['REF']);
		}
		else if ($_POST['MODE']=='M'){
			//echo 'demande modif : '.$_POST['REF'];
			$a->updateThesis($_POST['REF'],$_POST['author'],$_POST['title'],$_POST['school'],$_POST['isbn'],$_POST['pages']);
		}
	}
	
	$search['title']=$pp_TITLE;
	$search['author']=$pp_AUTHOR;
	$search['year']=$pp_YEAR;
	$search['school']=$pp_SCHOOL;
	$search['order']=$pp_ORDER;
	$search['order_type']=$pp_ORDER_TYPE;
	$search['begin']=$pp_BEGIN;
	$search['end']=($pp_BEGIN+$pp_SIZE);
	$abc = $a->searchThesis($search);
	
	echo $abc;

?>