<?php
/**
 * Description of articles
 *
 * @author MinhHieu
 */
class articles {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;
	
    public function __construct($xmlPath) {
		
        $_xslDoc = new DOMDocument();
        $_xslDoc->load("includes/xslt/articles.xsl");
        
        $_xmlDoc = new DOMDocument();
        $_xmlDoc->validateOnParse = true;
        $_xmlDoc->load($xmlPath);

		$this->xmlDoc = $_xmlDoc;
		$this->xslDoc = $_xslDoc;
		$this->xmlPath = $xmlPath;

    }

    public function __destruct() {
        unset($this->domDocument);
    }

    public function searchArticle($search) {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'title', $search['title']);
        $xsltProcessor->setParameter('', 'author', $search['author']);  
        $result =  $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }
	
	public function getAllArticles() {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->importStyleSheet($this->xslDoc); 
        $result =  $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function updateArticle($key, $title, $pages, $volume,$journal) {
        $xpath = new DOMXPath($this->xmlDoc);
		$query="//dblp/article[@key='$key']";
		$nodeList = $xpath->query($query);
		if (!$nodeList || $nodeList->length==0)
			return false;
		foreach ($nodeList as $node){
			$node->getElementsByTagName('title')[0]->nodeValue = $title;
			$node->getElementsByTagName('pages')[0]->nodeValue = $pages;
			$node->getElementsByTagName('volume')[0]->nodeValue = $volume;
			$node->getElementsByTagName('journal')[0]->nodeValue = $journal;
		}
		$result = $this->xmlDoc->save($this->xmlPath);
		return !$result?$result:true;
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
