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
            $("#bibtex_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#bibtex").show('slow');
            $("#bibtex_add").prop('disabled', false);
        }
    });
    
     $("#author_add").blur(function() {
        if(!$("#author_add").val()){ //Input à valeur vide.
            $("#bibtex_author").hide();
            $("#bibtex_author_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#bibtex_author").show('slow');
            $("#bibtex_author_add").prop('disabled', false);
        }
    });
    
     $("#note_add").blur(function() {
        if(!$("#note_add").val()){ //Input à valeur vide.
            $("#type").hide();
            $("#type_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#type").show('slow');
            $("#type_add").prop('disabled', false);
        }
    }); 
    
    $("#cite_add").blur(function() {
        if(!$("#cite_add").val()){ //Input à valeur vide.
            $("#label").hide();
            $("#label_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#label").show('slow');
            $("#label_add").prop('disabled', false);
        }
    }); 
    
    $("#series_add").blur(function() {
        if(!$("#series_add").val()){ //Input à valeur vide.
            $("#href_series").hide();
            $("#href_series_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#href_series").show('slow');
            $("#href_series_add").prop('disabled', false);
        }
    });
    
    $("#publisher_add").blur(function() {
        if(!$("#publisher_add").val()){ //Input à valeur vide.
            $("#href_publisher").hide();
            $("#href_publisher_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#href_publisher").show('slow');
            $("#href_publisher_add").prop('disabled', false);
        }
    });
    
    $("#ref_add").blur(function() {
        if(!$("#ref_add").val()){ //Input à valeur vide.
            $("#href_ref").hide();
            $("#href_ref_add").prop('disabled', true); // Important pour ne pas envoyer ce champ lors de la soumission.
        } else { //Input non vide
            $("#href_ref").show('slow');
            $("#href_ref_add").prop('disabled', false);
        }
    });
   
}

function ajouterArticle(){
    $("#resultAdd").empty();
    $("#resultAdd").append('Envoi en cours  <progress>working...</progress>');
    if($("#key_add").val() === ""){
        alert("Vous devez renseigner l'attribut key de votre article.");
        return false;
    }
    else if(testExistsArticle()){
        //On ne teste l'existance d'un article que si l'on essaye de l'ajouter.
        return false;
    }
    else{
        url = "articleAdd.php";//"includes/models/scripts/articleAdd.php";
        
        /* Appel ajax - récupération des données selon les critères */
        $.ajax({
            type: "POST",
            url: url,
            data: {
                //Type de la publication
                "typeArticle":$("#typeArticle_add").val(),
                
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
                "chapter":$("#chapter_add").val(),
                
            },
            dataType: "html"
        }).done(function(data){
            $("#resultAdd").html(data);
        });
    }
}
    
    

function testExistsArticle(){
     var ret = false;
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
        if(data === "0"){
            $("#key_add").css('border', '');
            
        }else if(data === "1"){
            alert("La clé associée a cet article existe déjà.\n Merci de la modifier.");
            $("#key_add").css('border', '2px solid red');
            ret = true;
        }
    });
    return ret;
    
}
