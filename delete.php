<?php

$doc = new DOMDocument();
$doc -> load('xml/dblp_1000000_lignes.xml',LIBXML_NOERROR);

$key = $_GET['key'];
if (!is_null($key)){
    $xpath = new DOMXPath($doc);
	$query="//dblp/article[@key='$key']";
	$result = $xpath->query($query);
	if (!$result){
		$dblp_xml->removeChild($result);
	}
}

	
?>