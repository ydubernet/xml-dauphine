<?php
	//Recup des GET
	isset($_GET['pg_SERIE'])?$pg_SERIE = $_GET['pg_SERIE']:$pg_SERIE='';
	isset($_GET['pg_CODE_SERIE'])?$pg_CODE_SERIE = $_GET['pg_CODE_SERIE']:$pg_CODE_SERIE='';
	isset($_GET['pg_SIZE'])?$pg_SIZE = $_GET['pg_SIZE']:$pg_SIZE=100;
	isset($_GET['pg_BEGIN'])?$pg_BEGIN = $_GET['pg_BEGIN']:$pg_BEGIN=0;
?>

<div id="journals">
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
                            <td>Code :</td>
                            <td><input type="text" name="pg_CODE_SERIE" value="<?php echo $pg_CODE_SERIE ?>"/></td>
                    </tr>
                    <tr>
                            <td>Contient :</td>
                            <td><input type="text" name="pg_SERIE" value="<?php echo $pg_SERIE ?>"/></td>
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
		<a href="<?php echo '?pg_CODE_SERIE=sci'.'&pg_SIZE='.$pg_SIZE; ?>">SCI</a>
		<a href="<?php echo '?pg_CODE_SERIE=rnti'.'&pg_SIZE='.$pg_SIZE; ?>">RNTI</a>
		<a href="<?php echo '?pg_CODE_SERIE=sfsc'.'&pg_SIZE='.$pg_SIZE; ?>">SFSC</a>
		<a href="<?php echo '?pg_CODE_SERIE=ais'.'&pg_SIZE='.$pg_SIZE; ?>">AIS</a>
		<a href="<?php echo '?pg_CODE_SERIE=sbcs'.'&pg_SIZE='.$pg_SIZE; ?>">SBCS</a>
	</td>
	</tr>
    </table>
    </form>
</div>
	
	
<?php
	//En production :
	//require_once "includes/bean/Series.php";
	//Pour Florian :
	require_once "../../bean/Series.php";
	$a = new series();
	
	$search['code_serie']=$pg_CODE_SERIE;
	$search['serie']=$pg_SERIE;
	$search['begin']=$pg_BEGIN;
	$search['end']=($pg_BEGIN+$pg_SIZE);
	$abc = $a->searchSerie($search);
	
	echo $abc;

?>
