<?php

function removeExtension($strName) {
    $ext = strrchr($strName, '.');
    if ($ext)
        $strName = substr($strName, 0, -strlen($ext));
    return $strName;
}


function redirect($page) {
    header('Location: ' . $page);
}

?>