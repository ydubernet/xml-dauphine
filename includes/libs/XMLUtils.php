<?php


class XMLUtils {

// XML -> PHP

/**
 * From an XML file to its corresponding PHP object
 * 
 * @param type $fileName
 * @return \stdClass|boolean
 */
  public static function fileToObject($fileName) {
 
    // création du nouvel objet document
    $dom = new DomDocument();
 
    // chargement à partir du fichier
    $dom->load($fileName);
 
    // validation à partir de la DTD référencée dans le document.
    // En cas d'erreur, on ne va pas plus loin
    if (!@$dom->validate()) {
      return false;
    }
 
    // création de l'objet résultat
    $object = new stdClass();
 
    // on référence l'adresse du fichier source
    $object->source = $fileName;
 
    // on récupère l'élément racine, on le met dans un membre
    // de l'objet nommé "root"
    $root = $dom->documentElement;
    $object->root = new stdClass();
 
    // appel d'une fonction récursive qui traduit l'élément XML
    // et passe la main à ses enfants, en parcourant tout l'arbre XML.
    getElement($root, $object->root);
 
    return $object;
  }
  
  /**
   * Recursively gets all XML Elements 
   * 
   * @param type $dom_element
   * @param type $object_element
   */
   public static function getElement($dom_element, $object_element) {
 
    // récupération du nom de l'élément
    $object_element->name = $dom_element->nodeName;
 
    // récupération de la valeur CDATA, 
    // en supprimant les espaces de formatage.
    $object_element->textValue = trim($dom_element->firstChild->nodeValue);
 
    // Récupération des attributs
    if ($dom_element->hasAttributes()) {
      $object_element->attributes = array();
        foreach($dom_element->attributes as $attName=>$dom_attribute) {
          $object_element->attributes[$attName] = $dom_attribute->value;
        }
    }
 
    // Récupération des éléments fils, et parcours de l'arbre XML
    // on veut length >1 parce que le premier fils est toujours 
    // le noeud texte
    if ($dom_element->childNodes->length > 1) {
      $object_element->children = array();
      foreach($dom_element->childNodes as $dom_child) {
        if ($dom_child->nodeType == XML_ELEMENT_NODE) {
          $child_object = new stdClass();
          getElement($dom_child, $child_object);
          array_push($object_element->children, $child_object);
        }
      }
    }
  }


// PHP -> XML

/**
 * From a PHP object to its corresponding XML file
 * 
 * @param type $xmlObject
 */
 public static function ObjectToFile($xmlObject) {
 
    // Création d'un nouvel objet document
    $dom = new DomDocument();
 
    // Création de l'élément racine
    $root = $dom->createElement($xmlObject->root->name);
    $dom->appendChild($root);
 
    // appel d'une fonction récursive qui construit l'élément XML
    // à partir de l'objet, en parcourant tout l'arbre de l'objet.
    setElement($dom, $xmlObject->root, $root);
 
    // Mise à jour du fichier source original
    $dom->save($xmlObject->source);
    echo $xmlObject->source;
  }
  
  /**
   * Sets the XML element
   * @param type $dom_document
   * @param type $object_element
   * @param type $dom_element
   */
   public static function setElement($dom_document, $object_element, $dom_element) {
 
    // récupération de la valeur CDATA de l'élément
    if (isset($object_element->textValue)) {
      $cdata = $dom_document->createTextNode($object_element->textValue);
      $dom_element->appendChild($cdata);
    }
 
    // récupération des attributs
    if (isset($object_element->attributes)) {
      foreach($object_element->attributes as $attName=>$attValue) {
        $dom_element->setAttribute($attName, $attValue);
      }
    }
 
    // construction des éléments fils, et parcours de l'arbre
    if (isset($object_element->children)) {
      foreach($object_element->children as $childObject) {
        $child = $dom_document->createElement($childObject->name);
        setElement($dom_document, $childObject, $child);
        $dom_element->appendChild($child);			
      }
    }	
  }
  
  
}