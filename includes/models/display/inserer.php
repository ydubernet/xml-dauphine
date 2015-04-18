<!--
 Types possibles à insérer :

    article|inproceedings|proceedings|book|incollection|
                phdthesis|mastersthesis|www

 Tous peuvent avoir les champs suivants :
   author|editor|title|booktitle|pages|year|address|journal
  |volume|number|month|url|ee|cdrom|cite|publisher|note|crossref|isbn|series|school|chapter

 Article a les attributs suivants :
    key CDATA #REQUIRED
    mdate CDATA #IMPLIED
    publtype CDATA #IMPLIED
    reviewid CDATA #IMPLIED
    rating CDATA #IMPLIED

 Inproceedings, proceedings, book, incollection, phdthesis, mastersthesis, www ont les attributs suivants :
    key CDATA #REQUIRED
    mdate CDATA #IMPLIED
    publtype CDATA #IMPLIED

 title, sub, sup, i, tt ont les champs suivants :
    #PCDATA|sub|sup|i|tt|ref

 title a l'attribut suivant :
    bibtex CDATA #IMPLIED

 note a l'attribut suivant :
    type CDATA #IMPLIED

 cite a l'attribut suivant :
    label CDATA #IMPLIED

 series a l'attribut suivant :
    href CDATA #IMPLIED

 layout peut contenir n'importe quoi (<!ELEMENT layout    ANY>)
 layout a l'attribut suivant :
    logo CDATA #IMPLIED

 ref a l'attribut suivant :
    href CDATA #IMPLIED

 


 

-->


<div id="inserer">
    <form method="post" action="insererAction.php">
        <input type="hidden" name="MODE"  value="I"/>
        <p>Pour chaque élément, il est possible d'en préciser plusieurs en les séparant par un ; . Ceci n'est pas possible pour les attributs.</p>
        <p>Exemple : votre article a 3 auteurs, pour author, faire : "Toi;Moi;Lui". Mais vous ne pouvez pas faire key : "journals/acta/Saxena96;journals/acta/Saxena95".</p>
        <table cellpadding="15px" cellspacing="0">
            <tr>
                <td>Type de contenu *</td>
                <td>
                    
                    
                    <select name="type_add" >
                        <?php
                          /*echo "<option value=&quot;&quot; selected></option>";
                          foreach(explode("|",$const_xml["dblp"]) as $dblp){
                              echo "<option value='".$dblp."'>".ucwords($dblp)."</option>";
                          }*/
                          ?>
                          
                            <option value="article">Article</option>
                            <option value="inproceedings">Inproceedings</option>
                            <option value="proceedings">Proceedings</option>
                            <option value="book">Book</option>
                            <option value="incollection">Incollection</option>
                            <option value="phdthesis">Phd Thesis</option>
                            <option value="masterthesis">Master Thesis</option>
                            <option value="www">WWW</option>
                          
                    </select>
                          
                    
                </td>
            </tr>
            
            <!-- Attributs -->
            <tr id="key">
                <td>key *</td>
                <td><input type="text" name="key_add"/></td>
            </tr>
            <tr id="mdate">
                <td>mdate</td>
                <td><input type="text" name="mdate_add"/></td>
            </tr>
            <tr id="publtype">
                <td>publtype</td>
                <td><input type="text" name="publtype_add"/></td>
            </tr>

            <tr id="reviewid">
                <td>reviewid</td>
                <td><input type="text" name="reviewid_add"/></td>
            </tr>
            <tr id="rating">
                <td>rating</td>
                <td><input type="text" name="rating_add"/></td>
            </tr>
            
            <?php
            $tous = $const_xml["field"];
               $tab_tous = explode("|", $tous);
               foreach($tab_tous as $un){
                 echo "
                    <tr id='".$un."' >
                        <td>$un</td>
                        <td><input type='text' name='".$un . "_add'/></td>
                    </tr>  ";
                 
                  // Gestion de cas particuliers :
                  /* Attributs */
                  if($un === "title"){
                      echo "
                          <tr id='bibtex'>
                            <td>Bibtex Title</td>
                            <td><input type='text' class='bibtex' name='bibtex_add'/></td>
                          </tr> ";
                      
                      
                      //Code structure de la publication (titres, sous-titres, etc...)
                   /*   echo "
                      <div id='addCritereTitre'>
                        <img class='img_clickable' onclick='javascript:addTitreElement();' alt='ajouter une structure' src='img-PlusOrange.png'>
                        <a class='clickLink' href='javascript:addTitreElement();'>Ajouter un critère</a>
                      </div> ";
                    */
                      
                    
                  } else if($un === "author"){
                      echo "
                          <tr id='bibtex_author'>
                            <td>Bibtex Author Title</td>
                            <td><input type='text' class='bibtex' name='bibtex_author_add'/></td>
                          </tr> ";
                  
                  } else if($un === "note"){
                      echo "
                         <tr id='type'>
                            <td>Type Note</td>
                            <td><input type='text' class='type' name='type_add'/></td>
                         </tr> ";
                  } else if($un === "cite"){
                      echo "
                        <tr id='label'>
                           <td>Label cite</td>
                           <td><input type='text' class='label' name='label_add'/></td>
                        </tr> ";
                  } else if($un === "publisher") {
                      echo "
                       <tr id='href_publisher'>
                          <td>href publisher</td>
                          <td><input type='text' class='href' name='href_publisher_add' /></td>
                       </tr> ";
                  } else if($un === "series"){
                      echo "
                        <tr id='href_series'>
                           <td>href series</td>
                           <td><input type='text' class='href' name='href_series_add'/></td>
                        </tr> ";
                  } else if($un === "layout") {
                       echo "
                        <tr id='logo'>
                           <td>Logo</td>
                           <td><input type='text' class='logo' name='logo_add'/></td>
                        </tr> ";
                  } else if($un === "ref"){
                       echo "
                        <tr id='href_ref'>
                           <td>href ref</td>
                           <td><input type='text' class='href' name='href_ref_add'/></td>
                        </tr> ";
                  }
               }
               
            ?>            
        </table>
        <!--<input type="button" value="Ajouter" onclick="ajouterModifierArticle('add');"/>-->
        <input type="submit" value="Rechercher"/>
        <input type="button" value="Effacer" onclick="if(confirm('Souhaitez-vous effacer tous les champs ?'))this.form.reset();"/>  
    </form>
    <div id="resultAdd"></div>
</div>