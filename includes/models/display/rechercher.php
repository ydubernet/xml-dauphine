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
    <form method="post" action="test.php">
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
            <tr>
                <td>Auteur</td>
                <td><input type="text" id="author_add"/></td>
            </tr>
            <tr>
                <td>Titre</td>
                <td><input type="text" id="titre_add"/></td>
            </tr>        
            <!-- 
                Et puis flemme !
                On va automatiser tout ça... 
            -->
            
        </table>
        <input type="button" type="submit" name="recherche" value="Recherche"/>
        <input type="button" value="Effacer" onclick="if(confirm('Souhaitez-vous effacer tous les champs ?'))this.form.reset();"/>  
    </form>
    <div id="resultAdd"></div>
</div>