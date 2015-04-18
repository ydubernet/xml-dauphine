<?php
/**
 * Description of articles
 *
 * @author MinhHieu
 */
class authors {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;
	
    public function __construct($xmlPath) {
		
        $_xslDoc = new DOMDocument();
        $_xslDoc->load("includes/xslt/article.xsl");
        
        $_xmlDoc = new DOMDocument();
        $_xmlDoc->validateOnParse = true;
        $_xmlDoc->load($xmlPath);

        //is this a library xml file? 
        If ($_xmlDoc->doctype->name != "dblp" ||
                $_xmlDoc->doctype->systemId != "dblp.dtd") {
            throw new Exception("Incorrect document type");
        }

        //is the document valid and well-formed? 
        if ($_xmlDoc->validate()) {
            $this->xmlDoc = $_xmlDoc;
            $this->xslDoc = $_xslDoc;
            $this->xmlPath = $xmlPath;
        } else {
            throw new Exception("Document did not validate");
        }
    }

    public function __destruct() {
        unset($this->domDocument);
    }

    public function searchArticle($search) {

        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', '_title', $search['_title']);
        $xsltProcessor->setParameter('', '_author', $search['_author']);
        $xsltProcessor->setParameter('', 'title', $search['_title']);
        $xsltProcessor->setParameter('', 'author', $search['author']);  
        $result =  $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function addArticle($isbn, $title, $author, $genre, $chapters) {
        // TODO: add a book to the library 
    }
	
	public function getXmlDoc(){
		return $this->xmlDoc;
	}

    public function deleteArticle($key) {
        $xpath = new DOMXPath($this->xmlDoc);
		$query="//dblp/article[@key='$key']";
		$nodeList = $xpath->query($query);
		if (!$nodeList || $nodeList->length==0)
			return false;
		foreach ($nodeList as $node)
			$node->parentNode->removeChild($node);
		$result = $this->xmlDoc->save($this->xmlPath);
		return !$result?$result:true;
    }

}
