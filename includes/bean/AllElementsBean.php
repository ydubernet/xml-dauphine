<?php

/**
 * A Bean containing all possible attributes for a dblp element.
 * @author Yoann
 */
class allElementsBean {
    // Contains the dblp element type
    private $dblp;
    
    // All possible field elements
    private $author;
    private $editor;
    private $title;
    private $booktitle;
    private $pages;
    private $year;
    private $address;
    private $journal;
    private $volume;
    private $number;
    private $month;
    private $url;
    private $ee;
    private $cdrom;
    private $cite;
    private $publisher;
    private $note;
    private $crossref;
    private $isbn;
    private $series;
    private $school;
    private $chapter;
    //private $layout;
    
    
    // All possible field attributes
     private $key;
     private $mdate;
     private $publtype;
     private $reviewid;
     private $rating;
     private $bibtexTitle;
     private $bibtexAuthor;
     private $type;
     private $label;
     private $hrefPublisher;
     private $hrefSeries;
     //private $logo;
        
    
    public function getDblp() {
        return $this->dblp;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getEditor() {
        return $this->editor;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getBooktitle() {
        return $this->booktitle;
    }

    public function getPages() {
        return $this->pages;
    }

    public function getYear() {
        return $this->year;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getJournal() {
        return $this->journal;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getEe() {
        return $this->ee;
    }

    public function getCdrom() {
        return $this->cdrom;
    }

    public function getCite() {
        return $this->cite;
    }

    public function getPublisher() {
        return $this->publisher;
    }

    public function getNote() {
        return $this->note;
    }

    public function getCrossref() {
        return $this->crossref;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getSeries() {
        return $this->series;
    }

    public function getSchool() {
        return $this->school;
    }

    public function getChapter() {
        return $this->chapter;
    }

    public function setDblp($dblp) {
        $this->dblp = $dblp;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setEditor($editor) {
        $this->editor = $editor;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setBooktitle($booktitle) {
        $this->booktitle = $booktitle;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setJournal($journal) {
        $this->journal = $journal;
    }

    public function setVolume($volume) {
        $this->volume = $volume;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function setMonth($month) {
        $this->month = $month;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setEe($ee) {
        $this->ee = $ee;
    }

    public function setCdrom($cdrom) {
        $this->cdrom = $cdrom;
    }

    public function setCite($cite) {
        $this->cite = $cite;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setCrossref($crossref) {
        $this->crossref = $crossref;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setSeries($series) {
        $this->series = $series;
    }

    public function setSchool($school) {
        $this->school = $school;
    }

    public function setChapter($chapter) {
        $this->chapter = $chapter;
    }

    /*public function getLayout() {
        return $this->layout;
    }*/

    public function getKey() {
        return $this->key;
    }

    public function getMdate() {
        return $this->mdate;
    }

    public function getPubltype() {
        return $this->publtype;
    }

    public function getReviewid() {
        return $this->reviewid;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getBibtexTitle() {
        return $this->bibtexTitle;
    }

    public function getBibtexAuthor() {
        return $this->bibtexAuthor;
    }

    public function getType() {
        return $this->type;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getHrefPublisher() {
        return $this->hrefPublisher;
    }

    public function getHrefSeries() {
        return $this->hrefSeries;
    }
    
    /*public function getLogo() {
        return $this->logo;
    }*/

    /*public function setLayout($layout) {
        $this->layout = $layout;
    }*/

    public function setKey($key) {
        $this->key = $key;
    }

    public function setMdate($mdate) {
        $this->mdate = $mdate;
    }

    public function setPubltype($publtype) {
        $this->publtype = $publtype;
    }

    public function setReviewid($reviewid) {
        $this->reviewid = $reviewid;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function setBibtexTitle($bibtexTitle) {
        $this->bibtexTitle = $bibtexTitle;
    }

    public function setBibtexAuthor($bibtexAuthor) {
        $this->bibtexAuthor = $bibtexAuthor;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setHrefPublisher($hrefPublisher) {
        $this->hrefPublisher = $hrefPublisher;
    }

    public function setHrefSeries($hrefSeries) {
        $this->hrefSeries = $hrefSeries;
    }

    /*public function setLogo($logo) {
        $this->logo = $logo;
    }*/


}


?>