<?php


class articles {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;

    public function __construct($xmlPath) {

        $_xslDoc = new DOMDocument(); 
		//En production :
        //$_xslDoc->load("includes/xslt/articles.xsl");
		//$xmlPath = $const_xmlfile;
		//Pour Florian :
		$_xslDoc->load("../../xslt/articles.xsl");
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

    
    public function addArticles($tabInput){
        $element = new Element($tabInput);
        
        $newArticle = $this->xmlDoc->createElement("article");    
        $this->xmlDoc->documentElement
                ->appendChild($newArticle);
        
        // Attributs de article
        $newArticle->setAttributeNode(new DOMAttr("key", $element->getBean()->getKey()));
        $newArticle->setAttributeNode(new DOMAttr("mdate", $element->getBean()->getMdate()));
        $newArticle->setAttributeNode(new DOMAttr("publtype", $element->getBean()->getPubltype()));
        $newArticle->setAttributeNode(new DOMAttr("reviewid", $element->getBean()->getReviewid()));
        $newArticle->setAttributeNode(new DOMAttr("rating", $element->getBean()->getRating()));
        
        // Eléments de article, et leurs attributs si nécessaire
        // author
        $i = 0;
        foreach(explode(";", $element->getBean()->getAuthor()) as $e){
            $authors[$i] = $this->xmlDoc
                ->createElement("author", $e);
            $i ++;
        }
        $i = 0;
        foreach(explode(";", $element->getBean()->getBibtexAuthor()) as $a){
            $authors[$i]->setAttributeNode(new DOMAttr("bibtex", $a));
            $i++;
        }
        
        foreach($authors as $author){
           $newArticle->appendChild($author);
        }
        
        // editor
        foreach(explode(";", $element->getBean()->getEditor()) as $e){
            $editor = $this->xmlDoc->createElement("editor", $e);
            $newArticle->appendChild($editor);
        }
        
        // address
        foreach(explode(";", $element->getBean()->getAddress()) as $e){
            $address = $this->xmlDoc->createElement("address", $e);
            $newArticle->appendChild($address);
        }
        
        // title
        $i = 0;
        foreach(explode(";", $element->getBean()->getTitle()) as $e){
            $titles[$i] = $this->xmlDoc->createElement("title", $e);
            $i++;     
        }
        
        $i = 0;
        foreach(explode(";", $element->getBean()->getBibtexTitle()) as $a){
            $titles[$i]->setAttributeNode(new DOMAttr("bibtex", $a));
            $i++;
        }
        
        foreach($titles as $title){
            $newArticle->appendChild($title);
        }
        
        // booktitle
        foreach(explode(";", $element->getBean()->getBooktitle()) as $e){
            $booktitle = $this->xmlDoc->createElement("boktitle", $e);
            $newArticle->appendChild($booktitle);
        }
        
        // pages
        foreach(explode(";", $element->getBean()->getPages()) as $e){
            $pages = $this->xmlDoc->createElement("pages", $e);
            $newArticle->appendChild($pages);
        } 
        
        // year
        foreach(explide(";", $element->getBean()->getYear()) as $e){
            $year = $this->xmlDoc->createElement("year", $e);
            $newArticle->appendChild($year);
        }
        
        // journal
        foreach(explode(";", $element->getBean()->getJournal()) as $e){
            $journal = $this->xmlDoc->createElement("journal", $e);
            $newArticle->appendChild($journal);
        }
        
        // volume
        foreach(explode(";", $element->getBean()->getVolume()) as $e){
            $volume = $this->xmlDoc->createElement("volume", $e);
            $newArticle->appendChild($volume);
        }
        
        // number
        foreach(explode(";", $element->getBean()->getNumber()) as $e){
            $number = $this->xmlDoc->createElement("number", $e);
            $newArticle->appendChild($number);
        }
        
        // month
        foreach(explode(";", $element->getBean()->getMonth()) as $e){
            $month = $this->xmlDoc->createElement("month", $e);
            $newArticle->appendChild($month);
        }
        
        // url
        foreach(explode(";", $element->getBean()->getUrl()) as $e){
            $url = $this->xmlDoc->createElement("url", $e);
            $newArticle->appendChild($url);
        }
        
        // ee
        foreach(explode(";", $element->getBean()->getEe()) as $e){
            $ee = $this->xmlDoc->createElement("ee", $e);
            $newArticle->appendChild($ee);
        }
        
        // cite
        // TODO ajouter son attribut "label"
        foreach(explode(";", $element->getBean()->getCite()) as $e){
            $cite = $this->xmlDoc->createElement("cite", $e);
            $newArticle->appendChild($cite);
        }
        
        // school
        foreach(explode(";", $element->getBean()->getSchool()) as $e){
            $school = $this->xmlDoc->createElement("school", $e);
            $newArticle->appendChild($school);
        }
        
        // publisher
        $i = 0;
        foreach(explode(";", $element->getBean()->getPublisher()) as $e){
            $publishers[$i] = $this->xmlDoc->createElement("publisher", $e);
            $i++;
        }
        $i = 0;
        foreach(explode(";", $element->getBean()->getHrefPublisher()) as $a){
            $publishers[$i]->setAttributeNode(new DOMAttr("href", $a));
        }
        
        foreach($publishers as $publisher){
            $newArticle->appendChild($publisher);
        }
        
        // note
        $i = 0;
        foreach(explode(";", $element->getBean()->getNote()) as $e){
            $notes[$i] = $this->xmlDoc->createElement("note", $e);
            $i++;
        }
        
        $i = 0;
        foreach(explode(";", $element->getBean()->getType()) as $a){
            $notes[$i]->setAttributeNode(new DOMAttr("type", $a));
        }
        
        foreach($notes as $note){
            $newArticle->appendChild($note);
        }
        
        // cdrom
        foreach(explode(";", $element->getBean()->getCdrom()) as $e){
            $cdrom = $this->xmlDoc->createElement("cdrom", $e);
            $newArticle->appendChild($cdrom);
        }
        
        // crossref
        foreach(explode(";", $element->getBean()->getCrossref()) as $e){
            $crossref = $this->xmlDoc->createElement("crossref", $e);
            $newArticle->appendChild($crossref);
        }
        
        // isbn
        foreach(explode(";", $element->getBean()->getIsbn()) as $e){
            $isbn = $this->xmlDoc->createElement("isbn", $e);
            $newArticle->appendChild($isbn);
        }
        
        // chapter
        foreach(explide(";", $element->getBean()->getChapter()) as $e){
            $chapter = $this->xmlDoc->createElement("chapter", $e);
            $newArticle->appendChild($chapter);
        }
        
        
        
        // TODO : terminer...
        
        
        // save the document 
        $this->xmlDoc->save($this->xmlPath);
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
