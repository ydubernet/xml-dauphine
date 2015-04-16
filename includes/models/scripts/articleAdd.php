<?php

     echo "<span class='failure'> L'ajout du contact a échoué. </span>";
    
    print_r($_POST);
    
    echo "<span class='success'> L'id est : " . $_POST['key'] . ".";
?>