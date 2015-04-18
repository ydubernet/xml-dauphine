<div id="account">
    <div id="menu">
        <?php
            // Calcul de la taille de chaque bouton 
            $taille = (874 / count($const_menu)) - 30;
            
        if (!empty($const_menu)) {
            ?>
            <ul>
                <?php
                foreach ($const_menu as $menu) {
                    //title
                   echo ' <li class="menu';
                    if (CONTENT == $menu)
                        echo ' selected';
                    echo '">';
                    echo '<div class="menu_horiz_left_'.$menu.'" id="menu_horiz_left"></div>
                        <div class="menu_horiz_repeat_'.$menu.'" id="menu_horiz_repeat" style="width:'.$taille.'px;">';
                    echo '<a title="', $const_pages[$menu][1], '" href="', $menu, '.html">', $const_pages[$menu][0], '</a>';
                  
                    echo '</div>
                        <div class="menu_horiz_right_'.$menu.'" id="menu_horiz_right"></div></li>';
                }
                ?>
            </ul>
        <?php } ?>
    </div>

    <div class="clear"></div>
</div>
