<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once "includes/bean/articles.php";
        /*$doc = new DOMDocument();
        $doc->validateOnParse = true;
        $doc->load('xml/article.xml');

        $query = "/dblp/article";

        $xpath = new DOMXPath($doc);
        $result = $xpath->query($query);
        echo "author<br/>";
        foreach ($result as $article) {
            $authors = $article->getElementsByTagName("author");
            $author = $authors->item(0)->nodeValue;
            echo "$author<br/>";
        }*/

        /*$xslDoc = new DOMDocument();
        $xslDoc->load("includes/xslt/article.xsl");

        $xmlDoc = new DOMDocument();
        $xmlDoc->validateOnParse = true;
        $xmlDoc->load("xml/article.xml");

        $xsltProcessor = new XSLTProcessor();
        $xsltProcessor->registerPHPFunctions();
        $xsltProcessor->importStyleSheet($xslDoc);
        $xsltProcessor->setParameter('', 's_key', 'journals/acta/Saxena96');*/
       
        //echo $xsltProcessor->transformToXML($xmlDoc);
        /*$result =  $xsltProcessor->transformToXML($xmlDoc);
        
        echo $result;
        */
        $a = new articles("xml/article.xml");
        //$searchStr = '&apos;journals/acta/Saxena96&apos;';
        //echo $searchStr;
        $search = array("_title"=>"0", "_author"=>"1", "author"=>"Hans", "title"=>"NULL");
        $abc = $a->searchArticle($search);
        echo $abc;
        ?>
    </body>
</html>
