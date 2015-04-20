<?php


class proceedings {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;

    public function __construct() {

        $_xslDoc = new DOMDocument(); 
	
        //En production :
        $_xslDoc->load("includes/xslt/Proceedings.xsl");
	$xmlPath = $const_xmlfile;
		
        //Pour Florian :
	// $_xslDoc->load("../../xslt/Proceedings.xsl");
	// $xmlPath = "../../xml/dblp_prod.xml";
        $_xmlDoc = new DOMDocument();
        $_xmlDoc->load($xmlPath,LIBXML_NOENT | LIBXML_DTDVALID);

        $this->xmlDoc = $_xmlDoc;
        $this->xslDoc = $_xslDoc;
        $this->xmlPath = $xmlPath;
    }

    public function __destruct() {
        unset($this->domDocument);
    }

    public function searchProceeding($search) {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'title', $search['title']);
        $xsltProcessor->setParameter('', 'editor', $search['editor']);
        $xsltProcessor->setParameter('', 'year', $search['year']);
		$xsltProcessor->setParameter('', 'publisher', $search['publisher']);
		$xsltProcessor->setParameter('', 'book', $search['book']);
        $xsltProcessor->setParameter('', 'order', $search['order']);
        $xsltProcessor->setParameter('', 'order_type', $search['order_type']);
        $xsltProcessor->setParameter('', 'end', $search['end']);
        $xsltProcessor->setParameter('', 'begin', $search['begin']);
        $result = $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function updateProceeding($key, $title,$book,$series,$volume,$publisher) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "/dblp/proceedings[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node) {
            
            $node->getElementsByTagName('title')[0]->nodeValue = $title;
			$test = $node->getElementsByTagName('volume');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('volume');
				$nod->nodeValue = $volume;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('volume')[0]->nodeValue = $volume;
			}
			$test = $node->getElementsByTagName('series');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('series');
				$nod->nodeValue = $series;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('series')[0]->nodeValue = $series;
			}
            $test = $node->getElementsByTagName('publisher');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('publisher');
				$nod->nodeValue = $publisher;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('publisher')[0]->nodeValue = $publisher;
			}
			$test = $node->getElementsByTagName('booktitle');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('booktitle');
				$nod->nodeValue = $book;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('booktitle')[0]->nodeValue = $book;
			}
            
        }
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

    public function deleteProceeding($key) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "//dblp/proceedings[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node)
            $node->parentNode->removeChild($node);
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

}
