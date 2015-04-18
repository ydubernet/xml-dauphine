/* Generic functions */

function showHideData(dataItem, plusMinusItem) {
    var dataObj = document.getElementById(dataItem);
    var plusMinusObj = document.getElementById(plusMinusItem);
    //$(document).ready(function() { useless, isn't it ?
    // toggle
    if ($("#" + dataItem).is(":hidden")) { // expand
        $("#" + plusMinusItem)[0].innerHTML = "[-]";
    } else { // collapse
        $("#" + plusMinusItem)[0].innerHTML = "[+]";
    } 
    $("#" + dataItem).slideToggle("slow"); // ou fadeToggle("slow") 
//});
}

function clear_form_elements(ele) {

    $(ele).find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

}

// Presentation functions
$(document).ready(function() {
    $('progress').hide();
    
    // Premier chargement
    $("#key").hide();
    $("#mdate").hide();
    $("#publtype").hide();
    $("#reviewid").hide();
    $("#rating").hide();
    
    $("#bibtex").hide();
    $("#bibtex_author").hide();
    $("#type").hide();
    $("#label").hide();
    $("#href_publisher").hide();
    $("#href_series").hide();
    $("#href_ref").hide();
    $("#logo").hide();
    
    $("#key_add").change(function(){
        testExistsArticle();
    });
    onChangeTypeArticle();
    onChangeInputsPourAttributs();
});

function onChangeTypeArticle(){
    $("#typeArticle_add").change(function(){
        switch(this.value){
            case "article":
                $("#key").show('slow');
                $("#mdate").show('slow');
                $("#publtype").show('slow');
                $("#reviewid").show('slow');
                $("#rating").show('slow');
                break;
                
            case "inproceedings":
            case "proceedings" :
            case "book" :
            case "incollection" :
            case "phdthesis" :
            case "mastersthesis" :
            case "www":
                $("#key").show('slow');
                $("#mdate").show('slow');
                $("#publtype").show('slow');
                $("#reviewid").hide();
                $("#rating").hide();
                break;
            default: //Input vide
                $("#key").hide();
                $("#mdate").hide();
                $("#publtype").hide();
                $("#reviewid").hide();
                $("#rating").hide();  
                break;
        }
    });
}

function onChangeInputsPourAttributs(){
    $("#title_add").blur(function() {
        if(!$("#title_add").val()){ //Input à valeur vide.
            $("#bibtex").hide();
            $(this).val(''); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#bibtex").show('slow');
        }
    });
    
     $("#author_add").blur(function() {
        if(!$("#author_add").val()){ //Input à valeur vide.
            $("#bibtex_author").hide();
            $(":input","#bibtex_author_add").val(''); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#bibtex_author").show('slow');
        }
    });
    
     $("#note_add").blur(function() {
        if(!$("#note_add").val()){ //Input à valeur vide.
            $("#type").hide();
            $("#type_add").empty(); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#type").show('slow');
        }
    }); 
    
    $("#cite_add").blur(function() {
        if(!$("#cite_add").val()){ //Input à valeur vide.
            $("#label").hide();
            $("#label_add").empty(); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#label").show('slow');
        }
    }); 
    
    $("#href_series_add").blur(function() {
        if(!$("#href_series_add").val()){ //Input à valeur vide.
            $("#href_series").hide();
            $("#href_series_add").empty(); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#href_series").show('slow');
        }
    });
    
    $("#href_publisher_add").blur(function() {
        if(!$("#href_publisher_add").val()){ //Input à valeur vide.
            $("#href_publisher").hide();
            $("#href_publisher_add").empty(); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#href_publisher").show('slow');
        }
    });
    
    $("#href_ref_add").blur(function() {
        if(!$("#href_ref_add").val()){ //Input à valeur vide.
            $("#href_ref").hide();
            $("#href_ref_add").empty(); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#href_ref").show('slow');
        }
    });
    
    $("#logo_add").blur(function(){
       if(!$("#logo_add").val()){ //Input à valeur vide.
           $("#logo").hide();
           $("#logo_add").empty();// Important pour ne pas envoyer ce champ lors de la soumission.
       } else { //Input non vide
           $("#logo").show('slow');
       }
    });
}


function rechercherBlabla(){
    $("#resultSearch").empty();
    /* Construction du Json */
    jsondata ={
        "data":[]
    };
    
    for(i=0; i< this.counterP; i++){
        jsondata.data.push({
            "column": $("#blabla_search_"+i).val(),
            "type": $("#blibli_search_"+i).val(), 
            "value": $("#bloblo_text_"+i).val()
        });
    }
    /* Appel ajax - récupération des données selon les critères */
    $.ajax({
        type: "POST",
        url: "includes/models/scripts/blabla.php",
        data: jsondata,
        dataType: "html"
    }).done(function(data){
        $("#resultSearch").append(data);
    });
    
}


function ajouterModifierArticle(act){
    $("#resultAdd").empty();
    $("#resultAdd").append('Envoi en cours  <progress>working...</progress>');
    if($("#key_add").val() === ""){
        alert("Vous devez renseigner l'attribut id de votre article.");
        return false;
    }
    else if(act !== "modifier" && testExistsArticle()){
        //On ne teste l'existance d'un article que si l'on essaye de l'ajouter.
        return false;
    }
    else{
        if(act === "modifier")
            url = "includes/models/scripts/articleModify.php";
        else
            url = "includes/models/scripts/articleAdd.php";
        
        /* Appel ajax - récupération des données selon les critères */
        $.ajax({
            type: "POST",
            url: url,
            data: {
                // Attributs
                "key":$("#key_add").val(),
                "mdate":$("#mdate_add").val(),
                "publtype":$("#publtype_add").val(),
                "reviewid":$("#reviewid_add").val(),
                "rating":$("#rating_add").val(),
                "bibtex_title":$("#bibtex_add").val(),
                "bibtex_author":$("#bibtex_author_add").val(),
                "type":$("#note_add").val(),
                "label":$("#label_add").val(),
                "href_publisher":$("#href_publisher_add").val(),
                "href_series":$("#href_series_add").val(),
                "href_ref":$("#href_ref_add").val(),
                "logo":$("#logo_add").val(),
                
                
                //Elements
                "author":$("#author_add").val(),
                "editor":$("#editor_add").val(),
                "title":$("#title_add").val(),
                "booktitle":$("#booktitle_add").val(),
                "pages":$("#pages_add").val(),
                "year":$("#year_add").val(),
                "address":$("#address_add").val(),
                "journal":$("#journal_add").val(),
                "volume":$("#volume_add").val(),
                "number":$("#number_add").val(),
                "month":$("#month_add").val(),
                "url":$("#url_add").val(),
                "ee":$("#ee_add").val(),
                "cdrom":$("#cdrom_add").val(),
                "cite":$("#cite_add").val(),
                "publisher":$("#publisher_add").val(),
                "note":$("#note_add").val(),
                "crossref":$("#crossref_add").val(),
                "isbn":$("#isbn_add").val(),
                "series":$("#series_add").val(),
                "school":$("#school_add").val(),
                "chapter":$("#chapter_add").val()
                
            },
            dataType: "html"
        }).done(function(data){
            $("#resultAdd").html(data);
        });
    }
}
    
    

function testExistsArticle(){
     var ret = true;
    /* Vérification que le nom n'existe pas déjà en base */
    $.ajax({
        type: "POST",
        url: "includes/models/scripts/articleExists.php",
        async: false,
        data: {
            key:$("#key_add").val()
        },
        dataType: "html"
    }).done(function(data){
        if(data === "1"){
            $("#key_add").css('border', '');
            
        }else if(data === "0"){
            alert("La clé associée a cet article existe déjà.\n Merci de la modifier.");
            $("#key_add").css('border', '2px solid red');
            ret = false;
        }
    });
    return ret;
    
}


function addTitreElement()
{
 // Déclaration et initialisation d'une variable statique
    if ( typeof this.counter == 'undefined' ) this.counter = 0;
    divCurrent = "recherche_partenaire_"+counter;
    
    $("#critere-glob-partenaires").append("<div id=\""+divCurrent+"\" class=\"research\"></div>");
   
    $("#"+divCurrent).append("<select name=\"column_partenaire_search_"+counter+"\" id=\"column_partenaire_search_"+counterP+"\">\n\
    <option value=\"nom\">Nom</option>\n\
    <option value=\"groupe\">Groupe</option>\n\
    <option value=\"type\">Type de l'entreprise</option>\n\
    <option value=\"siret\">Numéro SIRET</option>\n\
    <option value=\"codePostal\">Code postal</option>\n\
    <option value=\"ville\">Ville</option>\n\
    <option value=\"pays\">Pays</option>\n\
    <option value=\"nbreEmployes\">Nombre d'employés</option>\n\
    <option value=\"web\">Site Web</option>\n\
    <option value=\"telephone\">Téléphone</option>\n\
    </select>");
    
    $("#"+divCurrent).append("<select name=\"critere_partenaire_search_"+counter+"\" id=\"critere_partenaire_search_"+counter+"\"><option value=\"egal\">est égal à</option>\n\
    <option value=\"contient\">contient</option>\n\</select>");
    
    $("#"+divCurrent).append("<input type=\"text\" id=\"partenaire_text_"+counter+"\" name=\"partenaire_text_"+counter+"\"/>");
    $("#nbcriteres").val(counter+1);
    this.counter++;
}

