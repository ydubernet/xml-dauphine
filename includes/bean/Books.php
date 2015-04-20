<?php


class books {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;

    public function __construct() {

        $_xslDoc = new DOMDocument(); 
	//En production :
        $_xslDoc->load("includes/xslt/book.xsl");
	$xmlPath = 'includes/xml/dblp_prod.xml';
	
        //Pour Florian :
	//$_xslDoc->load("../../xslt/books.xsl");
	//$xmlPath = "../../xml/dblp_prod.xml";
        $_xmlDoc = new DOMDocument();
        $_xmlDoc->load($xmlPath,LIBXML_NOENT | LIBXML_DTDVALID);

        $this->xmlDoc = $_xmlDoc;
        $this->xslDoc = $_xslDoc;
        $this->xmlPath = $xmlPath;
    }

    public function __destruct() {
        unset($this->domDocument);
    }

    public function searchBook($search) {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'title', $search['title']);
        $xsltProcessor->setParameter('', 'author', $search['author']);
        $xsltProcessor->setParameter('', 'year', $search['year']);
		$xsltProcessor->setParameter('', 'publisher', $search['publisher']);
        $xsltProcessor->setParameter('', 'order', $search['order']);
        $xsltProcessor->setParameter('', 'order_type', $search['order_type']);
        $xsltProcessor->setParameter('', 'end', $search['end']);
        $xsltProcessor->setParameter('', 'begin', $search['begin']);
        $result = $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function updateBook($key, $title,$series,$volume,$pages,$publisher,$isbn) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "/dblp/book[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node) {
            $node->getElementsByTagName('series')->item(0)->nodeValue = $series;
            $node->getElementsByTagName('title')->item(0)->nodeValue = $title;
			$test = $node->getElementsByTagName('volume');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('volume');
				$nod->nodeValue = $volume;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('volume')->item(0)->nodeValue = $volume;
			}
            $test = $node->getElementsByTagName('publisher');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('publisher');
				$nod->nodeValue = $publisher;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('publisher')->item(0)->nodeValue = $publisher;
			}
			$test = $node->getElementsByTagName('isbn');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('isbn');
				$nod->nodeValue = $isbn;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('isbn')->item(0)->nodeValue = $isbn;
			}
            
			$test = $node->getElementsByTagName('pages');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('pages');
				$nod->nodeValue = $pages;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('pages')->item(0)->nodeValue = $pages;
			}
        }
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

    public function deleteBook($key) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "//dblp/book[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node)
            $node->parentNode->removeChild($node);
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

}
