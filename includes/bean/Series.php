<?php

class series {

    private $xmlPath;
    private $xslDoc;
    private $xmlDoc;
	
    public function __construct() {
		
        $_xslDoc = new DOMDocument();
        //En production :
        //$_xslDoc->load("includes/xslt/series.xsl");
		//$xmlPath = $const_xmlfile;
		//Pour Florian :
		$_xslDoc->load("../../xslt/series.xsl");
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

    public function searchSerie($search) {

        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($this->xslDoc);
        $xsltProcessor->setParameter('', 'code_serie', $search['code_serie']);
        $xsltProcessor->setParameter('', 'serie', $search['serie']);
		$xsltProcessor->setParameter('', 'begin', $search['begin']);
		$xsltProcessor->setParameter('', 'end', $search['end']);
        $result =  $xsltProcessor->transformToXML($this->xmlDoc);
        return $result;
    }
	
	public function getXmlDoc(){
		return $this->xmlDoc;
	}

}
