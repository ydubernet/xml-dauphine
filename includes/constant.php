<?php

/* --[ MAXUPLOADSIZE ]-- */
$const_maxupload = 10000000;

/* --[ CONTACT MAIL ]-- */
$const_mail = array('contact' => '');

/* --[ AUTHOR ]-- */
$const_author = array('name' => '');

/* --[ STYLES ]-- */
//$const_styles = array('main', 'slider');

/* --[ SCRIPTS ]-- 
$const_scripts = array('jquery-1.6.4.min', 'main', 'easySlider1.7', 'jquery.rating');
*/
/* --[ LANGS & TIMEZONES ]-- */
$const_langs = array();
$const_langs['fr'] = array('title' => 'Français', 'timezone' => 'Europe/Paris');

/* --[ DAYS & MONTHS ]-- */
$const_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
$const_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre');


/* --[ XML MAIN ATTRIBUTES ] -- */
$const_xml = array(
    "dblp" => "article|inproceedings|proceedings|book|incollection|phdthesis|mastersthesis|www",
    "field" => "author|editor|title|booktitle|pages|year|address|journal|volume|number|month|url|ee|cdrom|cite|publisher|note|crossref|isbn|series|school|chapter|layout",//On rajoute layout car il est dépendant de rien du tout.
    "titlecontents" => "sub|sup|i|tt|ref"
);

// Pour vérifier que l'utilisateur rentre une seule valeur pour un attribut donné.
$const_attributs = array("key", "mdate", "publtype", "reviewid", "rating", "bibtex", "href", "type", "label", "logo");

// Fichier de lecture du XML
$const_xmlfile = 'includes/xml/dblp_prod.xml';

/* --[ PAGES ]-- */
$const_pages = array(
    //URL=>array(Titre de la page, Title au survol de la souris, Titre du contenu de la page)
    'presentation' => array('Accueil', 'Accueil', 'Accueil'),
    'rechercher' => array('Recherche', 'Rechercher des publications', 'Recherche de publications'),
    'inserer' => array('Insertion', 'Insérer des publications', 'Insertion de publications'),
    'stats' => array('Statistiques', 'Statistiques', 'Statistiques'), 
    //'supprimer' => array('Suppression', 'Supprimer des publications', 'Suppression de publications'),
    //'modifier' => array('Modification', 'Modifier des publications', 'Modification de publications'),
    'propos' => array('Aide', 'Aide', 'Aide'),
    
    // Sous-menu section recherche
    'journals' => array('Rechercher sur les journaux', 'Rechercher sur les journaux', 'Recherche de journaux'),
    'articles' => array('Rechercher sur les articles', 'Rechercher sur les articles', 'Recherche d\'articles'),
    'auteurs' => array('Rechercher sur les auteurs', 'Rechercher sur les auteurs', 'Recherche d\'auteurs'),
    'books' => array('Rechercher sur les livres', 'Rechercher sur les livres', 'Recherche de livres'),
    'collections' => array('Rechercher sur les collections', 'Rechercher sur les collections', 'Recherche de collections'),
    'proceedings' => array('Rechercher sur les conférences/workshops', 'Rechercher sur les conférences/workshops', 'Recherche de conférences/workshops'),
    'series' => array('Rechercher sur les séries', 'Rechercher sur les séries', 'Recherche de séries'),
    'theses' => array('Rechercher sur les thèses', 'Rechercher sur les thèses', 'Recherche de thèses'),
    'auteurs' => array('Rechercher sur les auteurs', 'Rechercher sur les auteurs', 'Recherche d\'auteurs'),    
    
    
    
    //-- ERROR --//
    '404' => array('Erreur 404', 'Erreur 404', 'Erreur 404'),
    '401' => array('Erreur 401', 'Erreur 401', 'Erreur 401'),
    '403' => array('Erreur 403', 'Erreur 403', 'Erreur 403'),
    '500' => array('Erreur 500', 'Erreur 500', 'Erreur 500')
);

$const_menu = array(
    'presentation',
    'rechercher',
    'stats',
    'inserer',
    //'modifier',
    //'supprimer',
    'propos'
);

$arrayRecherche = array('articles', 'journals', 'auteurs', 'books', 'collections', 'proceedings', 'series', 'theses');

// Les sections ci-dessous servent pour les sous-menus.

$const_sub_menu = array(
    'rechercher' => $arrayRecherche,
    'inserer' => array(),
    'stats' => array(),
    'propos' => array()
    //'modifier' => array(),
    //'supprimer' => array()
);



$const_submenu_reverse = array(
    'rechercher' => 'rechercher',
    'articles' => 'rechercher',
    'journals' => 'rechercher',
    'auteurs' => 'rechercher',
    'books' => 'rechercher',
    'collections' => 'rechercher',
    'proceedings' => 'rechercher', 
    'series' => 'rechercher', 
    'theses' => 'rechercher'
    
);


?>