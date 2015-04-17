<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of books
 *
 * @author MinhHieu
 */
class books {

    private $xmlPath;
    private $domDocument;

    public function __construct($xmlPath) {
        //loads the document 
        $doc = new DOMDocument();
        $doc->load($xmlPath);

        //is this a library xml file? 
        If ($doc->doctype->name != "dblp" ||
                $doc->doctype->systemId != "dblp.dtd") {
            throw new Exception("Incorrect document type");
        }

        //is the document valid and well-formed? 
        if ($doc->validate()) {
            $this->domDocument = $doc;
            $this->xmlPath = $xmlPath;
        } else {
            throw new Exception("Document did not validate");
        }
    }

    public function __destruct() {
        // TODO: free memory associated with the DOMDocument
    }

    public function getBookByKey($key) {
        // TODO: return an array with properties of a book 
    }

    public function addBook($isbn, $title, $author, $genre, $chapters) {
        // TODO: add a book to the library 
    }

    public function deleteBook($isbn) {
        // TODO: Delete a book from the library
    }

    public function findBooksByGenre($genre) {
        // TODO: Return an array of books
    }

}
