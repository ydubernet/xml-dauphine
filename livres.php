<?php
	$name = 'Serge';
	$doc = new DOMDocument();
	$doc->load('Book.xml');
	$xpath = new DOMXPath($doc);
	$query="//book[authors/name='$name']";
	$result = $xpath->query($query);
	foreach($result as $r){
		echo "Coucou";
	}   

?>