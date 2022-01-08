<?php

// Register sidebar and initiate widgets
function boilerpress_widgets_init() {
    register_sidebar([
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="%2$s">',
        'after_widget' => '</div>',
    ]);
}
//add_action('widgets_init', 'boilerpress_widgets_init');
