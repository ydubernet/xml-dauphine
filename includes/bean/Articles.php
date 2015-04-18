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
        $xsltProcessor->setParameter('', 'year', $search['year']);
        $xsltProcessor->setParameter('', 'order', $search['order']);
        $xsltProcessor->setParameter('', 'order_type', $search['order_type']);
        $xsltProcessor->setParameter('', 'end', $search['end']);
        $xsltProcessor->setParameter('', 'begin', $search['begin']);
        $result = $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function getAllArticles() {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $result = $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function updateArticle($key, $title, $pages, $volume, $journal) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "//dblp/article[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node) {
            $node->getElementsByTagName('title')[0]->nodeValue = $title;
            $node->getElementsByTagName('pages')[0]->nodeValue = $pages;
            $node->getElementsByTagName('volume')[0]->nodeValue = $volume;
            $node->getElementsByTagName('journal')[0]->nodeValue = $journal;
        }
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

    public function deleteArticle($key) {
        $xpath = new DOMXPath($this->xmlDoc);
        $query = "//dblp/article[@key='$key']";
        $nodeList = $xpath->query($query);
        if (!$nodeList || $nodeList->length == 0)
            return false;
        foreach ($nodeList as $node)
            $node->parentNode->removeChild($node);
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

    public function addArticle($key, $mdate, $title, $author, $page, $year, $volume, $journal, $url, $ee) {
        $newArticle = $this->xmlDoc->createElement("article");    
        $this->xmlDoc->documentElement
                ->appendChild($newArticle);

        $keyAttribute = new DOMAttr("key", $key);
        $newArticle->setAttributeNode($keyAttribute);
        
        $mdateAttribute = new DOMAttr("mdate", $mdate);
        $newArticle->setAttributeNode($mdateAttribute);

        $titleElement = $this->xmlDoc
                ->createElement("title", $title);
        $newArticle->appendChild($titleElement);

        $authorElement = $this->xmlDoc
                ->createElement("author", $author);
        $newArticle->appendChild($authorElement);
        
        $pageElement = $this->xmlDoc
                ->createElement("page", $page);
        $newArticle->appendChild($pageElement);
        
        $yearElement = $this->xmlDoc
                ->createElement("year", $year);
        $newArticle->appendChild($yearElement);
        
        $volumeElement = $this->xmlDoc
                ->createElement("volume", $volume);
        $newArticle->appendChild($volumeElement);
        
        $journalElement = $this->xmlDoc
                ->createElement("journal", $journal);
        $newArticle->appendChild($journalElement);
        
        $urlElement = $this->xmlDoc
                ->createElement("url", $url);
        $newArticle->appendChild($urlElement);
        
        $eeElement = $this->xmlDoc
                ->createElement("ee", $ee);
        $newArticle->appendChild($eeElement);

        // save the document 
        $this->xmlDoc->save($this->xmlPath);
    }
}
