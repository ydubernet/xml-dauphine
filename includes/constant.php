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
    "field" => "author|editor|title|booktitle|pages|year|address|journal|volume|number|month|url|ee|cdrom|cite|publisher|note|crossref|isbn|series|school|chapter",
    "titlecontents" => "sub|sup|i|tt|ref"
);

// Pour vérifier que l'utilisateur rentre une seule valeur pour un attribut donné.
$const_attributs = array("key", "mdate", "publtype", "reviewid", "rating", "bibtex", "href", "type", "label", "logo");

/* --[ PAGES ]-- */


$const_pages = array(
    //URL=>array(Titre de la page, Title au survol de la souris, Titre du contenu de la page)
    'presentation' => array('Accueil', 'Accueil', 'Accueil'),
    'rechercher' => array('Recherche', 'Rechercher des publications', 'Recherche de publications'),
    'inserer' => array('Insertion', 'Insérer des publications', 'Insertion de publications'),
    'supprimer' => array('Suppression', 'Supprimer des publications', 'Suppression de publications'),
    'modifier' => array('Modification', 'Modifier des publications', 'Modification de publications'),
    'propos' => array('Aide', 'Aide', 'Aide'),
    //-- ERROR --//
    '404' => array('Erreur 404', 'Erreur 404', 'Erreur 404'),
    '401' => array('Erreur 401', 'Erreur 401', 'Erreur 401'),
    '403' => array('Erreur 403', 'Erreur 403', 'Erreur 403'),
    '500' => array('Erreur 500', 'Erreur 500', 'Erreur 500')
);

$const_menu = array(
    'presentation',
    'rechercher',
    'inserer',
    'modifier',
    'supprimer',
    'propos'
);


// Les sections ci-dessous servent pour les sous-menus.

//$const_sub_menu_title = array('part' => 'Partenaires');

/*
 * $arrayContact = array('contact-chercher', 'contact-ajouter', 'contact-valider','contact-importer', 'contact-aide', );
 * $arrayPartenaire = array('partenaire-chercher'  ,'partenaire-chercherAvance', 'partenaire-ajouter', 'partenaire-taxe', 'partenaire-valider', 'partenaire-aide');
 * $arrayRole = array('role-chercher'  , 'role-ajouter', 'role-importer', 'role-exporter', 'role-aide');
 */

/*
$const_sub_menu = array(
    'partenaires' => $arrayPartenaire,
    'contacts' => $arrayContact,
    'roles' => $arrayRole,
    
    'contact-valider' => $arrayContact,
    'contact-chercher' => $arrayContact,
    'contact-ajouter' => $arrayContact,
    'contact-aide' => $arrayContact,
    'contact-importer' => $arrayContact,
    
    'partenaire-valider' => $arrayPartenaire,
    'partenaire-chercher' => $arrayPartenaire,
    'partenaire-chercherAvance' => $arrayPartenaire,
    'partenaire-taxe' => $arrayPartenaire,
    'partenaire-ajouter' => $arrayPartenaire,

    'partenaire-aide' => $arrayPartenaire,
    
    'role-chercher' => $arrayRole,
    'role-ajouter' => $arrayRole,
    'role-importer' => $arrayRole,
    'role-exporter' => $arrayRole,
    'role-aide' => $arrayRole
    
);
*/
/*
$const_submenu_reverse = array(
    'contacts' => 'contacts',
    'contact-chercher' => 'contacts',
    'contact-valider' => 'contacts',
    'contact-ajouter' => 'contacts',
    'contact-aide' => 'contacts',
    'contact-importer' => 'contacts',
    
    'partenaire-valider' => 'partenaires',
    'partenaire-chercher' => 'partenaires',
    'partenaire-chercherAvance' => 'partenaires',
    'partenaire-ajouter' => 'partenaires',
    'partenaire-taxe' => 'partenaires',

    'partenaire-aide' => 'partenaires',
    'partenaires' => 'partenaires',
    
    'role-chercher' => 'roles',
    'role-ajouter' => 'roles',
    'role-importer' => 'roles',
    'role-exporter' => 'roles',
    'role-aide' => 'roles',
    'roles' => 'roles'
);
*/


?>