<?php
    require_once '../../bean/Articles.php';
    //print_r($_POST);
    $result = true;
    
    if($result === false){
         echo "<span class='failure'> L'ajout de la publication a échoué. </span>";
    } else {
        echo "<span class='success'> L'ajout de la publication a réussi. </span>";
    }
    
?>