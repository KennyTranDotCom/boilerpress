<?php

// Add Menus
if (has_nav_menu('menu_header')) {
    $context['menu_header'] = new TimberMenu('menu_header');
}
