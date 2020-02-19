# add-ons

# Where To Add Your Code

# functions.php

add_action( 'vc_before_init', 'vc_before_init_actions' );
function vc_before_init_actions() {
  require_once( get_stylesheet_directory().'/vc_templates/vc_hover_boxs.php' );
}

<b>Theme inside create folder name "vc_templates" and paste all file</b>
