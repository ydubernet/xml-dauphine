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
         $_xslDoc = new DOMDocument();
        $_xslDoc->load("includes/xslt/book.xsl");
        
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
        // TODO: free memory associated with the DOMDocument
    }

    public function searchBook($searchArray) {
        // TODO: return an array with properties of a book 
    }

    public function addBook($isbn, $title, $author, $genre, $chapters) {
        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'booktitle', $search['booktitle']);
        $xsltProcessor->setParameter('', 'publisher', $search['publisher']);  
        $result =  $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }

    public function deleteBook($isbn) {
        // TODO: Delete a book from the library
    }
}
