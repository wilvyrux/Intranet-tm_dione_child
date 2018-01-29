
<?php
/***************/
// [my_custom_address_shortcode ]
function details_address_shortcode( $atts ) {
    
    $a = shortcode_atts( array(
        'text_attr' => 'insert address',
        'text_attr2' => 'insert telephone',
        'text_attr3' => 'insert fax',
        'text_attr4' => 'insert email',
    ), $atts );
    
    $text_value = $a['text_attr'];
    $text_value2 = $a['text_attr2'];
    $text_value3 = $a['text_attr3'];
    $text_value4 = $a['text_attr4'];
        
        $html .= '<ul class="wx-details custom-details-display">';
        $html .= '<li><i class="fa fa-map-marker" aria-hidden="true"></i> '. $text_value .'</li>';
        $html .= '<li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:'. $text_value2 .'"> '. $text_value2 .' </a> </li>';
        $html .= '<li><i class="fa fa-fax" aria-hidden="true"></i> <a href="tel:'. $text_value3 .'"> '. $text_value3 .' </a></li>';
        $html .= '<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:'. $text_value4 .'"> '. $text_value4 .' </a> </li>';
        $html .= '</ul>';
    
       
    return $html;
    
    
    
    
}
add_shortcode( 'my_custom_details_shortcode', 'details_address_shortcode' );


add_action( 'vc_before_init', 'my_custom_details_shortcode_vs' );
function my_custom_details_shortcode_vs() {
   vc_map( array(
      "name" => __( "WX Contact Details", "my-dropdown-domain" ),
      "base" => "my_custom_details_shortcode",
      "class" => "",
      "category" => __( "WX Custom Shortcode", "my-text-domain"),
      "params" => array(
       
         array(
            "type" => "textfield",
            "heading" => __( "Insert Address", "my-text-domain" ),
            "param_name" => "text_attr",
            "value" => __( "insert address", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "", "my-text-domain" )
         ),
       
       
        array(
            "type" => "textfield",
            "heading" => __( "Telephone", "my-text-domain" ),
            "param_name" => "text_attr2",
            "value" => __( "insert telephone number", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "", "my-text-domain" ),
         ),
       
       
        array(
            "type" => "textfield",
            "heading" => __( "Fax", "my-text-domain" ),
            "param_name" => "text_attr3",
            "value" => __( "insert telephone number", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "", "my-text-domain" ),
         ),
       
         array(
            "type" => "textfield",
            "heading" => __( "Email", "my-text-domain" ),
            "param_name" => "text_attr4",
            "value" => __( "insert telephone number", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "", "my-text-domain" ),
         ),
       
      )
   ) );
}

?>