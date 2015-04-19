<div id="article-inserer">
    <form>
        <input type="hidden" name="MODE"  value="I"/>
        <p>Pour chaque élément, il est possible d'en préciser plusieurs en les séparant par un ; . Ceci n'est pas possible pour les attributs.</p>
        <p>Exemple : votre article a 3 auteurs, pour author, faire : "Toi;Moi;Lui". Mais vous ne pouvez pas faire key : "journals/acta/Saxena96;journals/acta/Saxena95".</p>
        <table cellpadding="15px" cellspacing="0">
            <tr>
                <td>Type de contenu *</td>
                <td>
                    
                    
                    <select id="typeArticle_add" >
                        <?php
                          echo "<option value='' selected></option>";
                          foreach(explode("|",$const_xml["dblp"]) as $dblp){
                              echo "<option value='".$dblp."'>".ucwords($dblp)."</option>";
                          }
                          ?>
                          

                          
                    </select>
                          
                    
                </td>
            </tr>
            
            <!-- Attributs -->
            <tr id="key">
                <td>key *</td>
                <td><input type="text" id="key_add"/></td>
            </tr>
            <tr id="mdate">
                <td>mdate</td>
                <td><input type="text" id="mdate_add"/></td>
            </tr>
            <tr id="publtype">
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
            $tous = $const_xml["field"];
               $tab_tous = explode("|", $tous);
               foreach($tab_tous as $un){
                 echo "
                    <tr id='".$un."' >
                        <td>$un</td>
                        <td><input type='text' id='".$un . "_add'/></td>
                    </tr>  ";
                 
                  // Gestion de cas particuliers :
                  /* Attributs */
                  if($un === "title"){
                      echo "
                          <tr id='bibtex'>
                            <td>Bibtex Title</td>
                            <td><input type='text' class='bibtex' id='bibtex_add'/></td>
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
                            <td><input type='text' class='bibtex' id='bibtex_author_add'/></td>
                          </tr> ";
                  
                  } else if($un === "note"){
                      echo "
                         <tr id='type'>
                            <td>Type Note</td>
                            <td><input type='text' class='type' id='type_add'/></td>
                         </tr> ";
                  } else if($un === "cite"){
                      echo "
                        <tr id='label'>
                           <td>Label cite</td>
                           <td><input type='text' class='label' id='label_add'/></td>
                        </tr> ";
                  } else if($un === "publisher") {
                      echo "
                       <tr id='href_publisher'>
                          <td>href publisher</td>
                          <td><input type='text' class='href' id='href_publisher_add' /></td>
                       </tr> ";
                  } else if($un === "series"){
                      echo "
                        <tr id='href_series'>
                           <td>href series</td>
                           <td><input type='text' class='href' id='href_series_add'/></td>
                        </tr> ";
                  } else if($un === "layout") {
                       echo "
                        <tr id='logo'>
                           <td>Logo</td>
                           <td><input type='text' class='logo' id='logo_add'/></td>
                        </tr> ";
                  } else if($un === "ref"){
                       echo "
                        <tr id='href_ref'>
                           <td>href ref</td>
                           <td><input type='text' class='href' id='href_ref_add'/></td>
                        </tr> ";
                  }
               }
               
            ?>            
        </table>
        <input type="button" value="Insérer" onclick="ajouterModifierArticle('add');"/>
        <input type="button" value="Effacer" onclick="if(confirm('Souhaitez-vous effacer tous les champs ?'))this.form.reset();"/>  
    </form>
    <div id="resultAdd"></div>
</div>