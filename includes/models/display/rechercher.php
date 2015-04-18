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
<div id="rcorners2">
    <form method="post" action="searchResult.php">
        <input type="hidden" name="MODE"  value="R"/>
        <table cellpadding="15px" cellspacing="0">
            <tr>
                <td>Type de contenu </td>
                <td>
                    <select name='type_search' >
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
                <td>Author :</td>
                <td><input type="text" name="r_author" value="<?php isset($_POST['r_author']) ? $_POST['r_author'] : '' ?>"/></td>
            </tr>
            <tr>
                <td>Titre :</td>
                <td><input type="text" name="r_title" value="<?php isset($_POST['r_title']) ? $_POST['r_title'] : '' ?>"/></td>
            </tr> 
            <tr>
                <td colspan="2">
                    <input type="submit" value="Rechercher"/>
                </td>
                <td>
                    <input type="button" value="Effacer" onclick="if (confirm('Souhaitez-vous effacer tous les champs ?'))
                                this.form.reset();"/>  
                </td>
            </tr>
            <!-- 
                Et puis flemme !
                On va automatiser tout ça... 
            -->

        </table>
    </form>
    <div id="resultAdd">
        <?php
        $abc = "";
        if (isset($_POST['MODE']) && $_POST['MODE'] == 'R') {
            if ($_POST['type_search'] == 'article') {
                require_once "includes/bean/articles.php";
                $a = new articles("xml/article.xml");
                echo $_POST['r_title'];
                echo $_POST['r_author'];
                $search['title'] = $_POST['r_title'];
                $search['author'] = $_POST['r_author'];
                $abc = $a->searchArticle($search);
            }
        } else
            //$abc = $a->getAllArticles();

        echo $abc;
        ?>
    </div>
</div>