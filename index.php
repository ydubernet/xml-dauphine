<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
define('LANG', 'fr');
define('ENCODING', 'utf-8');
define('TIMEZONE', 'Europe/Paris');

// Parametrage du fuseau horaire
date_default_timezone_set(TIMEZONE);

// Chargement des librairies
require_once('includes/libs.php'); // Fichier d'inclusion des librairies

ini_set("url_rewriter.tags", "input=src");

//On regarde si on appelle un script (connexion, deco, etc...)
if (!empty($_GET['script'])) {
    //Verif l'existance du script
    !file_exists('includes/models/scripts/' . $_GET['script'] . '.php') && die('Script ' . $_GET['script'] . ' not found');
    //Appel du script
    require('includes/models/scripts/' . $_GET['script'] . '.php');
}

//On stocke la page ou on se trouve dans un constante
define('CONTENT', empty($_GET['content']) ? 'presentation' : $_GET['content']);

//On regarde si la page existe dans nos constantes, sinon on redirige vers l'accueil (presentation.php)
(!array_key_exists(CONTENT, $const_pages)) && redirect('presentation.html');
!file_exists('includes/models/display/' . CONTENT . '.php') && !file_exists('includes/models/error/' . CONTENT . '.php') && die('Page ' . CONTENT . ' not found');

// Définition du header
header('Content-type: text/html; charset=' . ENCODING);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <?php
//Affichage de l'en tête, déclaration des scripts css, js, referencement
    require('includes/views/display/head.php');
    ?>

    <body>	
        <div id="body">
            <table cellspacing="0" cellpadding="0" id="tableGeneral">
                <tr>
                    <td id="backgroundGauche"></td>
                    <td>            <div id="in">
                            <div id="header">
                                <div id="logoDauphine"></div>
                                <div id="menuheader">
                                    <div id="logoright"> Projet XML Dauphine

                                    </div>
                                    <?php
                                    //Affichage du header
                                    require('includes/views/display/header.php');
                                    ?>
                                </div>
                            </div>
                            <div class="clr"></div>
                          
                            <div id="middle_in">
                                <h1> <div id="title"> <?php echo $const_pages[CONTENT][2]; ?> </div> </h1>
                                <div id="menu_left">
                                    <?php
                                    // Affichage du sous-menu de gauche
                                    require('includes/views/display/submenus.php');
                                    ?>
                                </div>
                                <div id="content">

                                    <?php
                                    if (!empty($_GET['error'])) {
                                        require('includes/models/error/' . CONTENT . '.php');
                                    } else {
                                        require('includes/models/display/' . CONTENT . '.php');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <div id="resultSearch"></div>
                            <?php
                            //Affichage du pied de page
                            require('includes/views/display/footer.php');
                            ?>

                        </div>
                    </td>
                    <td id="backgroundDroite"> </td>
                </tr>
            </table>

        </div>
    </body>
</html>
