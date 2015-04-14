<?php

//Affichage du sous menu

if(array_key_exists(CONTENT, $const_sub_menu)){
echo '<ul>';
foreach ($const_sub_menu[CONTENT] as $submenu) {
    echo '<li class="submenu_'.$const_submenu_reverse[CONTENT];
    
    if (CONTENT == $submenu)
        echo ' submenuselected';
    
    echo '">
        <a title="', $const_pages[$submenu][1], '" href="', $submenu, '.html">', $const_pages[$submenu][0], 
            '</a></li>';
}

echo '</ul>';
}
?>