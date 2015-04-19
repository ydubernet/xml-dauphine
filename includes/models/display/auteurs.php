<?php
	//Recup des GET
	isset($_GET['pg_AUTHOR'])?$pg_AUTHOR = $_GET['pg_AUTHOR']:$pg_AUTHOR='';
	isset($_GET['pg_BEGIN_AUTHOR'])?$pg_BEGIN_AUTHOR = $_GET['pg_BEGIN_AUTHOR']:$pg_BEGIN_AUTHOR='';
	isset($_GET['pg_SIZE'])?$pg_SIZE = $_GET['pg_SIZE']:$pg_SIZE=100;
	isset($_GET['pg_BEGIN'])?$pg_BEGIN = $_GET['pg_BEGIN']:$pg_BEGIN=0;
?>

<div id="auteurs">
    <form method="GET">
    <table style="margin-left: auto; margin-right: auto;" cellpadding=20 >
    <tr>
            <td>
                    Nombre d'entrées : 
                    <select name="pg_SIZE" onChange="submit()">
                               <option value="100" <?php if ($pg_SIZE==100){echo 'selected';} ?> >100</option>
                               <option value="200" <?php if ($pg_SIZE==200){echo 'selected';} ?>>200</option>
                               <option value="300" <?php if ($pg_SIZE==300){echo 'selected';} ?>>300</option>
                               <option value="400" <?php if ($pg_SIZE==400){echo 'selected';} ?>>400</option>
                            </select>
            </td>

            
            <td>
            <table style="text-align:center;"><caption>Recherche</caption>
                    <tr>
                            <td>Commence par :</td>
                            <td><input type="text" name="pg_BEGIN_AUTHOR" value="<?php echo $pg_BEGIN_AUTHOR ?>"/></td>
                    </tr>
                    <tr>
                            <td>Contient :</td>
                            <td><input type="text" name="pg_AUTHOR" value="<?php echo $pg_AUTHOR ?>"/></td>
                    </tr>
                    <tr>
                            <td colspan="2">
                                    <input type="submit" value="Rechercher"/>
                            </td>
                    </tr>
            </table>
            </td>
    </tr>
	<tr>
	<td colspan=2>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=A'.'&pg_SIZE='.$pg_SIZE; ?>">A</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=B'.'&pg_SIZE='.$pg_SIZE; ?>">B</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=C'.'&pg_SIZE='.$pg_SIZE; ?>">C</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=D'.'&pg_SIZE='.$pg_SIZE; ?>">D</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=E'.'&pg_SIZE='.$pg_SIZE; ?>">E</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=F'.'&pg_SIZE='.$pg_SIZE; ?>">F</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=G'.'&pg_SIZE='.$pg_SIZE; ?>">G</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=H'.'&pg_SIZE='.$pg_SIZE; ?>">H</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=I'.'&pg_SIZE='.$pg_SIZE; ?>">I</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=J'.'&pg_SIZE='.$pg_SIZE; ?>">J</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=K'.'&pg_SIZE='.$pg_SIZE; ?>">K</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=L'.'&pg_SIZE='.$pg_SIZE; ?>">L</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=M'.'&pg_SIZE='.$pg_SIZE; ?>">M</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=N'.'&pg_SIZE='.$pg_SIZE; ?>">N</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=O'.'&pg_SIZE='.$pg_SIZE; ?>">O</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=P'.'&pg_SIZE='.$pg_SIZE; ?>">P</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=Q'.'&pg_SIZE='.$pg_SIZE; ?>">Q</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=R'.'&pg_SIZE='.$pg_SIZE; ?>">R</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=S'.'&pg_SIZE='.$pg_SIZE; ?>">S</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=T'.'&pg_SIZE='.$pg_SIZE; ?>">T</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=U'.'&pg_SIZE='.$pg_SIZE; ?>">U</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=V'.'&pg_SIZE='.$pg_SIZE; ?>">V</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=W'.'&pg_SIZE='.$pg_SIZE; ?>">W</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=X'.'&pg_SIZE='.$pg_SIZE; ?>">X</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=Y'.'&pg_SIZE='.$pg_SIZE; ?>">Y</a>
		<a href="<?php echo '?pg_BEGIN_AUTHOR=Z'.'&pg_SIZE='.$pg_SIZE; ?>">Z</a>
	</td>
	</tr>
    </table>
    </form>
</div>
	
	
<?php
	//En production :
	//require_once "includes/bean/Authors.php";
	//Pour Florian :
	require_once "../../bean/Authors.php";
	$a = new authors();
	
	$search['begin_author']=$pg_BEGIN_AUTHOR;
	$search['author']=$pg_AUTHOR;
	$search['begin']=$pg_BEGIN;
	$search['end']=($pg_BEGIN+$pg_SIZE);
	$abc = $a->searchAuthor($search);
	
	echo $abc;

?>
