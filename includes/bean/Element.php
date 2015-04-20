<?php

/**
 * Description of Element
 *
 * @author Yoann
 */
class Element {
    private $bean;
    
    public function __construct($tableauInput){
        $bean = new allElementsBean();
        
        // Type d'article
        $bean->setDblp($tableauInput["typeArticle"]); 
        
        // Eléments
        $bean->setAddress($tableauInput["address"]);
        $bean->setAuthor($tableauInput["author"]);
        $bean->setBooktitle($tableauInput["booktitle"]);
        $bean->setCdrom($tableauInput["cdrom"]);
        $bean->setChapter($tableauInput["chapter"]);
        $bean->setCite($tableauInput["cite"]);
        $bean->setCrossref($tableauInput["crossref"]);
        $bean->setEditor($tableauInput["editor"]);
        $bean->setEe($tableauInput["ee"]);
        $bean->setIsbn($tableauInput["isbn"]);
        $bean->setJournal($tableauInput["journal"]);
        $bean->setMonth($tableauInput["month"]);
        $bean->setNote($tableauInput["note"]);
        $bean->setNumber($tableauInput["number"]);
        $bean->setPages($tableauInput["pages"]);
        $bean->setPublisher($tableauInput["publisher"]);
        $bean->setSchool($tableauInput["school"]);
        $bean->setSeries($tableauInput["series"]);
        $bean->setTitle($tableauInput["title"]);
        $bean->setUrl($tableauInput["url"]);
        $bean->setVolume($tableauInput["volume"]);
        $bean->setYear($tableauInput["year"]);
        $bean->setLayout($tableauInput["layout"]);
        
        // Attributs
        $bean->setKey($tableauInput["key"]);
        $bean->setMdate($tableauInput["mdate"]);
        $bean->setPubltype($tableauInput["publtype"]);
      
        //Attributs spécifiques à l'objet de type article
        if($bean->getDblp() === "article"){
            $bean->setReviewid($tableauInput["reviewid"]);
            $bean->setRating($tableauInput["rating"]);
        }
        
        // Pour chaque élément, s'il a été saisi, alors on enregistre son attribut si saisi.
        if(isset($bean->getAuthor()) && $bean->getAuthor() != ""){
            $bean->setBibtexAuthor($tableauInput["bibtex_author"]);
        }
        
        if(isset($bean->getTitle()) && $bean->getTitle() != ""){
            $bean->setBibtexTitle($tableauInput["bibtex_title"]);
        }
        if(isset($bean->getNote()) && $bean->getNote() != ""){
            $bean->setType($tableauInput["type"]);
        }
        if(isset($bean->getCite()) && $bean->getCite() != ""){
           $bean->setLabel($tableauInput["label"]);
        }
        if(isset($bean->getPublisher()) && $bean->getPublisher() != ""){
           $bean->setHrefPublisher($tableauInput["href_publisher"]);
        }
        if(isset($bean->getSeries()) && $bean->getSeries() != ""){
           $bean->setHrefSeries($tableauInput["href_series"]);
        }
        if(isset($bean->getLayout()) && $bean->getLayout() != ""){
           $bean->setLogo($tableauInput["logo"]);
        }
    }
    
    public function __destruct(){
        unset($bean);
    }
    
    public function getBean(){
        return $this->bean;
    }
    
    public function setBean($bean){
        $this->bean = $bean;
    }
    
}   
