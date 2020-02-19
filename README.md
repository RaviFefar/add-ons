# add-ons

# Where To Add Your Code

<b>Add below code into functions.php file</b>

    add_action( 'vc_before_init', 'vc_before_init_actions' );
    function vc_before_init_actions() {
        require_once( get_stylesheet_directory().'/vc_templates/vc_hover_boxs.php' );
    }

<b>Create folder "vc_templates" inside theme and paste all the files.</b>
