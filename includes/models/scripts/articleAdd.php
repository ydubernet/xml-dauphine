<?php
    
    $result = true;

    $_xmlDoc = new DOMDocument();
    $_xmlDoc->validateOnParse = true;
    $_xmlDoc->load("xml/article.xml");
    
    foreach($_POST as $index=>$valeur){
        
        if(!isempty($valeur)){
            $elements = expand(";", $valeur);
            foreach($elements as $e){
                //Ajout dans le XML

            }
        }
    }
    
    if($result === false){
         echo "<span class='failure'> L'ajout de la publication a échoué. </span>";
    } else {
        echo "<span class='success'> L'ajout de la publication a réussi. </span>";
    }
    
?>