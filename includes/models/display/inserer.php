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


<div id="article-inserer">
    <form>
        <p>Pour chaque élément, il est possible d'en préciser plusieurs en les séparant par un ; . Ceci n'est pas possible pour les attributs.</p>
        <p>Exemple : votre article a 3 auteurs, pour author, faire : "Toi;Moi;Lui". Mais vous ne pouvez pas faire key : "journals/acta/Saxena96;journals/acta/Saxena95".</p>
        <table cellpadding="15px" cellspacing="0">
            <tr>
                <td>Type de contenu </td>
                <td>
                    <select id='typeArticle_add_part' >
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
            <tr>
                <td>key *</td>
                <td><input type="text" id="key_add"/></td>
            </tr>
            <tr>
                <td>mdate</td>
                <td><input type="text" id="mdate_add"/></td>
            </tr>
            <tr>
                <td>publtype</td>
                <td><input type="text" id="publtype_add"/></td>
            </tr>

            <tr id="reviewid">
                <td>reviewid</td>
                <td><input type="text" id="reviewid_add"/></td>
            </tr>
            <tr id="rating">
                <td>rating</td>
                <td><input type="text" id="rating_add"/></td>
            </tr>
            
            <?php
               $tous = "author|editor|title|booktitle|pages|year|address|journal|volume|number|month|url|ee|cdrom|cite|publisher|note|crossref|isbn|series|school|chapter";
               $tab_tous = explode("|", $tous);
               foreach($tab_tous as $un){
                 echo "
                    <tr>
                        <td>$un</td>
                        <td><input type='text' id='".$un . "_add'/></td>
                    </tr>  ";
                 
                  // Gestion de cas particuliers :
                  /* Attributs */
                  // TODO : Ne les faire apparaître que si l'utilisateur remplit le champ associé
                  if($un === "title"){
                      echo "
                          <tr>
                            <td>bibtext title</td>
                            <td><input type='text' id='bibtex_add'/></td>
                          </tr> ";
                  } else if($un === "note"){
                      echo "
                         <tr>
                            <td>type note</td>
                            <td><input type='text' id='type_add'/></td>
                         </tr> ";
                  } else if($un === "cite"){
                      echo "
                        <tr>
                           <td>label cite</td>
                           <td><input type='text' id='label_add'/></td>
                        </tr> ";
                  } else if($un === "series"){
                      echo "
                        <tr>
                           <td>href series</td>
                           <td><input type='text' id='href_add'/></td>
                        </tr> ";
                  }
               }
               
            ?>
            <!--
            <tr>
                <td>Auteur</td>
                <td><input type="text" id="author_add"/></td>
            </tr>
            
            <tr>
                <td>Editeur</td>
                <td><input type="text" id="editor_add"/>
            </tr>
            <tr>
                <td>Titre</td>
                <td><input type="text" id="titre_add"/></td>
            </tr>
            <tr>
                <td>Titre du livre</td>
                <td><input type="text" id="booktitle_add"/></td>
            </tr>
            <tr>
                <td>Nombre de pages</td>
                <td><input type="text" id="pages_add"/></td>
            </tr>
            <tr>
                <td>Année de publication</td>
                <td><input type="text" id="year_add"/></td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td><textarea id="address_add"></textarea></td>
            </tr>
            
            <tr>
                <td>Journal de publication</td>
                <td><input type="text" id="journal_add"/></td>
            </tr>
            <tr>
                <td>Volume</td>
                <td><input type="text" id="volume_add"/></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" id="nombre_add"/></td>
            </tr>
            <tr>
                <td>Mois</td>
                <td><input type="text" id="month_add" /></td>
            </tr>
            <tr>
                <td>URL</td>
                <td><input type="text" id="url_add" /></td>
            </tr>
            <tr>
                <td>EE</td> // TODO : Voir à quoi ça correspond en français dans le texte... 
                <td><input type="text" id="ee_add"/></td>
            </tr>
            <tr>
                <td>CD Rom</td>
                <td><input type="text" id="cdrom_add"/></td>
            </tr>
            -->
            
            <!-- 
                Et puis flemme !
                On va automatiser tout ça... 
            -->
            
        </table>
        <input type="button" value="Ajouter" onclick="ajouterModifierArticle('add');"/>
        <input type="button" value="Effacer" onclick="if(confirm('Souhaitez-vous effacer tous les champs ?'))this.form.reset();"/>  
    </form>
    <div id="resultAdd"></div>
</div>