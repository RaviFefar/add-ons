<?php
/*
Element Description: VC Tabs Box
*/
 
// Element Class 
class vcTabBox extends WPBakeryShortCode {
     
    // Element Init
    function __construct()
    {
        vc_lean_map( 'info-box-shortcode', array( 'vcTabBox', 'vc_tooltip_mapping' ) );
        add_shortcode('vc_tooltip', array($this, 'vc_tooltip_html'));
        add_action('wp_enqueue_scripts', array(&$this, 'custom_vc_hover_template'), 999);
    }

    function custom_vc_hover_template(){
        wp_enqueue_style('custom-vc-hover', get_template_directory_uri(). '/vc_templates/css/tool-tip-style.css', array());
    }

    // Element Mapping
    public static function vc_tooltip_mapping() { 

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }

        // Map the block with vc_map()
            return array(
                'name' => __('VC Tooltip Box', 'text-domain'),
                'base' => 'vc_tooltip',
                'description' => __('Tooltip Hover Box', 'text-domain'),
                'category' => __('Custom Visual Composer Elements', 'text-domain'),
                'icon' => get_template_directory_uri().'/vc_templates/images/devnote.png',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __('Title', 'text-domain'),
                        'param_name' => 'maintitle',
                        'value' => __('', 'text-domain'),
                        'description' => __('Title', 'text-domain'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'sub-title-class',
                        'heading' => __('Sub Title', 'text-domain'),
                        'param_name' => 'subtitle',
                        'value' => __('', 'text-domain'),
                        'description' => __('Sub Title', 'text-domain'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __('Tooltip Hover Description', 'text-domain'),
                        'param_name' => 'content',
                        'value' => __('', 'text-domain'),
                        'description' => __('Content Hover Description', 'text-domain'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Extra class name', 'js_composer' ),
                        'param_name' => 'el_class',
                        'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
                    ),
                ),
            );
    }
     
    // Element HTML
    public function vc_tooltip_html( $atts, $content = null) {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'maintitle'   => '',
                    'subtitle'   => '',
                    'el_class'   => '',
                ), 
                $atts
            )
        );
        $content = wpb_js_remove_wpautop($content, true);

        // Fill $html var with data
        $html = '<div class ="hover" onclick="void(0)">
            <div class="vc-infobox-wrap ">         
                <h4 class="vc-infobox-title" style="text-align: center;text-transform: uppercase;">' . $maintitle . '</h4>
                    <div class="vc-infobox-text tooltip-new arrow_box '.$el_class.'">' . do_shortcode($content) . '</div>           
            </div>
        </div>';

        return $html;
    }
     
} // End Element Class
?>

<?php  
// Element Class Init
new vcTabBox(); 