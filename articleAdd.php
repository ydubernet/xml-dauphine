<?php
    require_once 'includes/bean/Articles.php';
    //print_r($_POST);
    //$result = true;
    
    $a = new articles();
    
    $result = $a->addArticles($_POST);
    
    if($result === false){
         echo "<span class='failure'> L'ajout de la publication a échoué. </span>";
    } else {
        echo "<span class='success'> L'ajout de la publication a réussi. </span>";
    }
    
?>