<?php
    $key = $_POST['key'];
    
    $document = new DOMDocument();
    $document->validateOnParse = true;
    $document->load("../../../xml/dblp_100000_lignes.xml");
    
    $xpath = new DOMXPath($document);
    
    $query="//*[@key='$key']";

    $nodeList = $xpath->query($query);
    
    if ($nodeList && $nodeList->length==1) {
        echo "1";
    } else {
        echo "0";
    }
?>
