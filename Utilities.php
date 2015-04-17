<?php
 
class Utilities {
 
   CONST DIRFILES ='xml/';
   
   public static function getDOMxml($fileName){
		$doc = new DOMDocument();
		$doc -> load(self::DIRFILES.$fileName.'.xml',LIBXML_NOERROR);
		return $doc;
   }
   
}
 
?>