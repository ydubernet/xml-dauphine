<?php
    require_once '../../bean/Articles.php';
    //print_r($_POST);
    $result = true;
    
    $a = new articles();
    
    foreach($_POST as $index=>$valeur){
        if($index==="typeArticle"){
            // On a déjà traité la valeur liée au type d'article.
            continue;
        }
        if(in_array($const_attributs, $index)){
            
        }
        
        $result = $xmlDoc->save($xmlPath);
    }
    
    
    if($result === false){
         echo "<span class='failure'> L'ajout de la publication a échoué. </span>";
    } else {
        echo "<span class='success'> L'ajout de la publication a réussi. </span>";
    }
    
?>