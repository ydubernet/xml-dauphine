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

