<?php

require_once 'Element.php';

class articles {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;
    private $element;

    public function __construct() {

        $_xslDoc = new DOMDocument(); 
	//En production :
        $_xslDoc->load("includes/xslt/articles.xsl");
	$xmlPath = 'includes/xml/dblp_prod.xml';
		//Pour Florian :
		//$_xslDoc->load("../../xslt/articles.xsl");
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
			
            $test = $node->getElementsByTagName('pages');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('pages');
				$nod->nodeValue = $pages;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('pages')->item(0)->nodeValue = $pages;
			}
			$test = $node->getElementsByTagName('journal');
			if ($test->length==0){
				$nod = $this->xmlDoc->createElement('journal');
				$nod->nodeValue = $journal;
				$node->appendChild($nod);
			}
			else{
				$node->getElementsByTagName('journal')->item(0)->nodeValue = $journal;
			}
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

    /**
     * Fonction générique étant capable de créer n'importe quel type d'élément.
     * TODO : Envisager de la déplacer dans une classe mère.
     * TODO : Envisager de ne pas créer les éléments/attributs s'ils sont vides dans le $tabInput.
     * 
     * @param type $tabInput
     * @param type $nomElementRacine
     * @return type
     */
    public function addArticles($tabInput, $nomElementRacine){
        $this->element = new Element($tabInput);
        
        $newArticle = $this->xmlDoc->createElement($nomElementRacine);    
        $this->xmlDoc->documentElement
                ->appendChild($newArticle);
        
        // Attributs de article
        $newArticle->setAttributeNode(new DOMAttr("key", $this->element->getKey()));
        $newArticle->setAttributeNode(new DOMAttr("mdate", $this->element->getMdate()));
        $newArticle->setAttributeNode(new DOMAttr("publtype", $this->element->getPubltype()));
        
        if("article" === $nomElementRacine){
            $newArticle->setAttributeNode(new DOMAttr("reviewid", $this->element->getReviewid()));
            $newArticle->setAttributeNode(new DOMAttr("rating", $this->element->getRating()));
        }
        // Eléments de article, et leurs attributs si nécessaire
        // author
        $i = 0;
        foreach(explode(";", $this->element->getAuthor()) as $e){
            $authors[$i] = $this->xmlDoc
                ->createElement("author", $e);
            $i ++;
        }
        $i = 0;
        foreach(explode(";", $this->element->getBibtexAuthor()) as $a){
            $authors[$i]->setAttributeNode(new DOMAttr("bibtex", $a));
            $i++;
        }
        
        foreach($authors as $author){
           $newArticle->appendChild($author);
        }
        
        // editor
        foreach(explode(";", $this->element->getEditor()) as $e){
            $editor = $this->xmlDoc->createElement("editor", $e);
            $newArticle->appendChild($editor);
        }
        
        // address
        foreach(explode(";", $this->element->getAddress()) as $e){
            $address = $this->xmlDoc->createElement("address", $e);
            $newArticle->appendChild($address);
        }
        
        // title
        $i = 0;
        foreach(explode(";", $this->element->getTitle()) as $e){
            $titles[$i] = $this->xmlDoc->createElement("title", $e);
            $i++;     
        }
        
        $i = 0;
        foreach(explode(";", $this->element->getBibtexTitle()) as $a){
            $titles[$i]->setAttributeNode(new DOMAttr("bibtex", $a));
            $i++;
        }
        
        foreach($titles as $title){
            $newArticle->appendChild($title);
        }
        
        // booktitle
        foreach(explode(";", $this->element->getBooktitle()) as $e){
            $booktitle = $this->xmlDoc->createElement("booktitle", $e);
            $newArticle->appendChild($booktitle);
        }
        
        // pages
        foreach(explode(";", $this->element->getPages()) as $e){
            $pages = $this->xmlDoc->createElement("pages", $e);
            $newArticle->appendChild($pages);
        } 
        
        // year
        foreach(explode(";", $this->element->getYear()) as $e){
            $year = $this->xmlDoc->createElement("year", $e);
            $newArticle->appendChild($year);
        }
        
        // journal
        foreach(explode(";", $this->element->getJournal()) as $e){
            $journal = $this->xmlDoc->createElement("journal", $e);
            $newArticle->appendChild($journal);
        }
        
        // volume
        foreach(explode(";", $this->element->getVolume()) as $e){
            $volume = $this->xmlDoc->createElement("volume", $e);
            $newArticle->appendChild($volume);
        }
        
        // number
        foreach(explode(";", $this->element->getNumber()) as $e){
            $number = $this->xmlDoc->createElement("number", $e);
            $newArticle->appendChild($number);
        }
        
        // month
        foreach(explode(";", $this->element->getMonth()) as $e){
            $month = $this->xmlDoc->createElement("month", $e);
            $newArticle->appendChild($month);
        }
        
        // url
        foreach(explode(";", $this->element->getUrl()) as $e){
            $url = $this->xmlDoc->createElement("url", $e);
            $newArticle->appendChild($url);
        }
        
        // ee
        foreach(explode(";", $this->element->getEe()) as $e){
            $ee = $this->xmlDoc->createElement("ee", $e);
            $newArticle->appendChild($ee);
        }
        
        // cite
        $i = 0;
        foreach(explode(";", $this->element->getCite()) as $e){
            $cites[$i] = $this->xmlDoc->createElement("cite", $e);
            $i++;
        }
        $i = 0;
        foreach(explode(";", $this->element->getLabel()) as $a){
            $cites[$i]->setAttributeNode(new DOMAttr("label", $a));
        }
        
        foreach($cites as $cite){
            $newArticle->appendChild($cite);
        }
        
        // school
        foreach(explode(";", $this->element->getSchool()) as $e){
            $school = $this->xmlDoc->createElement("school", $e);
            $newArticle->appendChild($school);
        }
        
        // publisher
        $i = 0;
        foreach(explode(";", $this->element->getPublisher()) as $e){
            $publishers[$i] = $this->xmlDoc->createElement("publisher", $e);
            $i++;
        }
        $i = 0;
        foreach(explode(";", $this->element->getHrefPublisher()) as $a){
            $publishers[$i]->setAttributeNode(new DOMAttr("href", $a));
        }
        
        foreach($publishers as $publisher){
            $newArticle->appendChild($publisher);
        }
        
        // note
        $i = 0;
        foreach(explode(";", $this->element->getNote()) as $e){
            $notes[$i] = $this->xmlDoc->createElement("note", $e);
            $i++;
        }
        
        $i = 0;
        foreach(explode(";", $this->element->getType()) as $a){
            $notes[$i]->setAttributeNode(new DOMAttr("type", $a));
        }
        
        foreach($notes as $note){
            $newArticle->appendChild($note);
        }
        
        // cdrom
        foreach(explode(";", $this->element->getCdrom()) as $e){
            $cdrom = $this->xmlDoc->createElement("cdrom", $e);
            $newArticle->appendChild($cdrom);
        }
        
        // crossref
        foreach(explode(";", $this->element->getCrossref()) as $e){
            $crossref = $this->xmlDoc->createElement("crossref", $e);
            $newArticle->appendChild($crossref);
        }
        
        // isbn
        foreach(explode(";", $this->element->getIsbn()) as $e){
            $isbn = $this->xmlDoc->createElement("isbn", $e);
            $newArticle->appendChild($isbn);
        }
        
        // chapter
        foreach(explode(";", $this->element->getChapter()) as $e){
            $chapter = $this->xmlDoc->createElement("chapter", $e);
            $newArticle->appendChild($chapter);
        }
        
        // series
        $i = 0;
        foreach(explode(";", $this->element->getSeries()) as $e){
            $series[$i] = $this->xmlDoc->createElement("series", $e);
            $i++;
        }
        
        $i = 0;
        foreach(explode(";", $this->element->getHrefSeries()) as $a){
            $series[$i]->setAttributeNode(new DOMAttr("href", $a));
            $i++;
        }
        
        foreach($series as $serie){
            $newArticle->appendChild($serie);
        }
        
        
        // layout
        /*$i = 0;
        foreach(explode(";", $this->element->getLayout()) as $e){
            $layouts[$i] = $this->xmlDoc->createElement("layout", $e);
            $i++;
        }
        
        $i = 0;
        foreach(explode(";", $this->element->getLogo()) as $a){
            $layouts[$i]->setAttributeNode(new DOMAttr("logo", $a));
            $i++;
        }*/
        
        /*foreach($layouts as $layout){
            $newArticle->appendChild($layout);
        }*/
        
        // save the document 
        $result = $this->xmlDoc->save($this->xmlPath);
        return !$result ? $result : true;
    }

}
