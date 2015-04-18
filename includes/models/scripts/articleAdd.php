<?php
    
    print_r($_POST);
    $result = true;
    
    $xmlPath = "../../../xml/article.xml";

    $xmlDoc = new DOMDocument();
    $xmlDoc->validateOnParse = true;
    $xmlDoc->load($xmlPath);
    
    // On crée un nouvel élément de type typeArticle au xml déjà existant.
    $root = $xmlDoc->createElement($_POST["typeArticle"]);
    $xmlDoc->appendChild($root);
    
    $xpath = new DOMXPath($xmlDoc);
    $query="//dblp/".$_POST['typeArticle'];
    $nodeList = $xpath->query($query);
    
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