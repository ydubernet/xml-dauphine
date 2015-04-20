<div id="stats">
    <div id="title_core">
        Projet XML Dauphine
    </div>
	
	<?php
		$xslDoc = new DOMDocument();
        $xslDoc->load("includes/xslt/stats.xsl");
        $xmlDoc = new DOMDocument();

        $xmlDoc->load('includes/xml/dblp_prod.xml',LIBXML_NOENT | LIBXML_DTDVALID);
		$xsltProcessor = new XSLTProcessor();
        $xsltProcessor->importStyleSheet($xslDoc); 
        $result =  $xsltProcessor->transformToXML($xmlDoc);
		echo $result;
	
	?>
	
</div>
