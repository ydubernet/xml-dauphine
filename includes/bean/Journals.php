<?php

class journals {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;
	
    public function __construct() {
		
        $_xslDoc = new DOMDocument();
        //En production :
        //$_xslDoc->load("includes/xslt/authors.xsl");
		//$xmlPath = $const_xmlfile;
		//Pour Florian :
		$_xslDoc->load("../../xslt/journals.xsl");
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

    public function searchJournal($search) {

        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'begin_journal', $search['begin_journal']);
        $xsltProcessor->setParameter('', 'journal', $search['journal']);
		$xsltProcessor->setParameter('', 'begin', $search['begin']);
		$xsltProcessor->setParameter('', 'end', $search['end']);
        $result =  $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }
	
	public function getXmlDoc(){
		return $this->xmlDoc;
	}

}
