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

/* --[ PAGES ]-- */


$const_pages = array(
    //URL=>array(Titre de la page, Title au survol de la souris, Titre du contenu de la page)
    'presentation' => array('Accueil', 'Accueil', 'Accueil'),
    'partenaires' => array('Partenaires', 'Les partenaires', 'Les partenaires'),
    'contacts' => array('Contacts', 'Les contacts', 'Les contacts'),
    'roles' => array('Rôles', 'Les rôles', 'Les rôles'),
    'propos' => array('Aide', 'Aide', 'Aide'),
    /* Sous parties partenaire */
    'partenaire-chercher' => array('Rechercher un partenaire', 'Chercher', 'Rechercher des partenaires'),
    'partenaire-chercherAvance' => array('Recherche avancée ', 'Recherche avancée', 'Recherche avancée des partenaires'),
    'partenaire-taxe' => array('Ajouter une taxe','Ajouter une taxe','Ajouter une taxe d\'apprentissage'),
    'partenaire-valider' => array('Validation des modifications', 'Valider', 'Validation des modifications'),
    'partenaire-ajouter' => array('Ajouter un partenaire', 'Ajouter', 'Ajouter un partenaire'),
    //'partenaire-importer' => array('Importer des partenaires', 'Importer', 'Importer des partenaires'),
    'partenaire-aide' => array('Aide', 'Aide', 'Aide'),
    /* Sous parties contacts */
    'contact-chercher' => array('Rechercher un contact', 'Chercher', 'Rechercher des contacts'),
    'contact-valider' => array('Validation des modifications', 'Valider', 'Validation des modifications'),
    'contact-ajouter' => array('Ajouter un contact', 'Ajouter', 'Ajouter un contact'),
    'contact-importer' => array('Importer des contacts', 'Importer', 'Importer des contacts'),
    'contact-aide' => array('Aide', 'Aide', 'Aide'),
    /* Sous parties roles */
    'role-chercher' => array('Rechercher un rôle', 'Chercher', 'Rechercher des rôles'),
    'role-ajouter' => array('Ajouter un rôle', 'Attribution', 'Attribuer un rôle'),
    'role-importer' => array('Importer des rôles', 'Importer', 'Importer des rôles'),
    'role-exporter' => array('Exporter les rôles', 'Exporter', 'Exporter les rôles'),
    'role-aide' => array('Aide', 'Aide', 'Aide'),
    //-- ERROR --//
    '404' => array('Erreur 404', 'Erreur 404', 'Erreur 404'),
    '401' => array('Erreur 401', 'Erreur 401', 'Erreur 401'),
    '403' => array('Erreur 403', 'Erreur 403', 'Erreur 403'),
    '500' => array('Erreur 500', 'Erreur 500', 'Erreur 500')
);

$const_menu = array(
    'presentation',
    'partenaires',
    'contacts',
    'roles',
    'propos'
);


$const_sub_menu_title = array('part' => 'Partenaires');
$arrayContact = array('contact-chercher', 'contact-ajouter', 'contact-valider','contact-importer', 'contact-aide', );
$arrayPartenaire = array('partenaire-chercher'  ,'partenaire-chercherAvance', 'partenaire-ajouter', 'partenaire-taxe', 'partenaire-valider', 'partenaire-aide');
$arrayRole = array('role-chercher'  , 'role-ajouter', 'role-importer', 'role-exporter', 'role-aide');

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



?>