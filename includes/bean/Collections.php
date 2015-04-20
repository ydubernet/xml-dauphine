<?php


class collections {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;

    public function __construct() {

        $_xslDoc = new DOMDocument(); 
		//En production :
        //$_xslDoc->load("includes/xslt/collections.xsl");
		//$xmlPath = $const_xmlfile;
		//Pour Florian :
		$_xslDoc->load("../../xslt/collections.xsl");
		$xmlPath = "../../xml/dblp_prod.xml";
        $_xmlDoc = new DOMDocument();
        $_xmlDoc->load($xmlPath,LIBXML_NOENT | LIBXML_DTDVALID);

        $this->xmlDoc = $_xmlDoc;
        $this->xslDoc = $_xslDoc;
        $this->xmlPath = $xmlPath;
    }

    public function __destruct() {
        unset($this->domDocument);
    }

    public function searchCollection($search) {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'title', $search['title']);
        $xsltProcessor->setParameter('', 'author', $search['author']);
        $xsltProcessor->setParameter('', 'year', $search['year']);
		$xsltProcessor->setParameter('', 'book', $search['book']);
        $xsltProcessor->setParameter('', 'order', $search['order']);
        $xsltProcessor->setParameter('', 'order_type', $search['order_type']);
        $xsltProcessor->setParameter('', 'end', $search['end']);
        $xsltProcessor->setParameter('', 'begin', $search['begin']);
        $result = $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function updateCollection($key, $title,$pages,$book) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "/dblp/incollection[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node) {
            $node->getElementsByTagName('title')[0]->nodeValue = $title;
            $test = $node->getElementsByTagName('booktitle');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('booktitle');
				$nod->nodeValue = $book;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('booktitle')[0]->nodeValue = $book;
			}            
			$test = $node->getElementsByTagName('pages');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('pages');
				$nod->nodeValue = $pages;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('pages')[0]->nodeValue = $pages;
			}
        }
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

    public function deleteCollection($key) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "//dblp/incollection[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node)
            $node->parentNode->removeChild($node);
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

}
