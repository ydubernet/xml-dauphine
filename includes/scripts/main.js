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


function ajouterModifierArticle(act, val){
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
                "bibtex":$("#bibtex_add").val(),
                "type":$("#note_add").val(),
                "label":$("#label_add").val(),
                "href":$("#href_add").val(),
                
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
        },
        dataType: "html"
    }).done(function(data){
        if(data === "1"){
            $("#key_add").css('border', '');
            
        }else if(data === "0"){
            alert("La clé associée a cet article existe déjà.\n Merci de le modifier.");
            $("#key_add").css('border', '2px solid red');
            ret = false;
        }
    });
    return ret;
    
}

