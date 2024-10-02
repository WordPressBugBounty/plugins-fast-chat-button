<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

// ========================================================================================================
// Get all the data and ouput it into the page
// ========================================================================================================

$getting_plugin_data = get_option($wp_options_name);

if( !empty($getting_plugin_data) ) {

    // ----------------------------------------------
    // breaking the string into to 2 variables. the array namd and vakue  
    // ----------------------------------------------  
    
    $break_array = explode("***", $getting_plugin_data);

    $item_name = explode("####", $break_array[0]);
    $key_name = explode("####", $break_array[1]);

    $array_count = count($key_name);

    // ----------------------------------------------
    // creating an organized array with all values
    // ----------------------------------------------      

    for($count_number = 0; $count_number < $array_count; $count_number++) {
    	$yydev_chat_btn_data_array[ $item_name[$count_number] ] = $key_name[$count_number];
    } // for($count_number = 0; $count_number < $array_count; $count_number++) {

    // ----------------------------------------------
    // gettting all the plugin data
    // ----------------------------------------------   

    $display_button_checkbox = intval($yydev_chat_btn_data_array['display_button_checkbox']);
    $chat_number = esc_attr($yydev_chat_btn_data_array['chat_number']);
    $chat_message = esc_attr($yydev_chat_btn_data_array['chat_message']);
    $button_width = esc_attr($yydev_chat_btn_data_array['button_width']);
    $button_height = esc_attr($yydev_chat_btn_data_array['button_height']);
    $horizontal_position = esc_attr($yydev_chat_btn_data_array['horizontal_position']);
    $horizontal_spacing = esc_attr($yydev_chat_btn_data_array['horizontal_spacing']);
    $vertical_position = esc_attr($yydev_chat_btn_data_array['vertical_position']);
    $vertical_spacing = esc_attr($yydev_chat_btn_data_array['vertical_spacing']);
    $button_z_index = intval($yydev_chat_btn_data_array['button_z_index']);
    $icon_image_url = esc_url($yydev_chat_btn_data_array['icon_image_url']);
    $hide_button_on_desktop = intval($yydev_chat_btn_data_array['hide_button_on_desktop']);
    $hide_button_on_mobile = intval($yydev_chat_btn_data_array['hide_button_on_mobile']);
    $mobile_width = intval($yydev_chat_btn_data_array['mobile_width']);
    $mobile_button_position_checkbox = intval($yydev_chat_btn_data_array['mobile_button_position_checkbox']);
    $mobile_horizontal_position = esc_attr($yydev_chat_btn_data_array['mobile_horizontal_position']);
    $mobile_horizontal_spacing = esc_attr($yydev_chat_btn_data_array['mobile_horizontal_spacing']);
    $mobile_vertical_position = esc_attr($yydev_chat_btn_data_array['mobile_vertical_position']);
    $mobile_vertical_spacing = esc_attr($yydev_chat_btn_data_array['mobile_vertical_spacing']);
     
    // ----------------------------------------------
    // dealing with exclude or include pages
    // ----------------------------------------------

    $yydev_chat_btn_exclude_option = esc_attr($yydev_chat_btn_data_array['exclude_option']);
    $exclude_ids = esc_attr($yydev_chat_btn_data_array['exclude_ids']);

    // creating an array with all the ids
    $yydev_chat_btn_exclude_ids_array = [];
    $exclude_ids_explode = explode( ',', $exclude_ids);
    
    foreach($exclude_ids_explode as $exclude_id) {

        $exclude_id = intval( trim($exclude_id) );

        if( !empty($exclude_id) ) {
            $yydev_chat_btn_exclude_ids_array[] = $exclude_id;
        } // if( !empty($exclude_id) ) {

    } // foreach($exclude_ids_explode as $exclude_id) {


    // making sure the back to top button active 
    if( $display_button_checkbox == 1 ) {
    
        // ----------------------------------------------
        // create button css code
        // ----------------------------------------------
        
        $chat_output_message = "";
        if( !empty($chat_message ) ) {
            $chat_output_message = "&text=" . rawurlencode($chat_message);
        } // if( !empty($chat_message ) ) {

        $button_html_code = "<a href='https://api.whatsapp.com/send?phone=" . $chat_number . $chat_output_message . "' class='yydev-chat-button activeButtons' data-activevalue='#whatsapp-button'><span></span></a>";

        // ----------------------------------------------
        // create button css code
        // ----------------------------------------------

        $chat_btn_style = '';

        // dealing with button style
        $chat_btn_style .= '<style>';
            $chat_btn_style .= 'a.yydev-chat-button {';

                $chat_btn_style .= 'width:' . $button_width . 'px;';
                $chat_btn_style .= 'height:' . $button_height . 'px;';
                $chat_btn_style .= $horizontal_position . ':' . $horizontal_spacing . ';';
                $chat_btn_style .= $vertical_position . ':' . $vertical_spacing . ';';
                $chat_btn_style .= 'text-indent:-9999px;';
                $chat_btn_style .= 'position:fixed;';
                
                $current_button_z_index = "9999";
                if(!empty($button_z_index)) { $current_button_z_index = $button_z_index; }
                $chat_btn_style .= 'z-index:' . $current_button_z_index . ';';

                // if we hide this one desktop
                if($hide_button_on_desktop == 1) {        
                    $chat_btn_style .= 'display:none;';
                } else { // if($hide_button_on_desktop == 1) {
                    $chat_btn_style .= 'display:block;';
                } // } else { // if($hide_button_on_desktop == 1) {

           $chat_btn_style .= '}';

            $chat_btn_style .= 'a.yydev-chat-button span {';

                $chat_btn_style .= 'display:block;';
                $chat_btn_style .= 'height: 100%;';
                $chat_btn_style .= 'width: 100%;';
                $chat_btn_style .= 'background: url(' . $icon_image_url .') no-repeat 50% 50%;';

           $chat_btn_style .= '}';

           // dealing with button mobile style
           $chat_btn_style .= '@media only screen and (max-width: ' . $mobile_width . 'px) {';

                $chat_btn_style .= 'a.yydev-chat-button {';

                    if($mobile_button_position_checkbox == 1 ) {
                        $chat_btn_style .= $horizontal_position . ':auto;';
                        $chat_btn_style .= $vertical_position . ':auto;';
                        $chat_btn_style .= $mobile_horizontal_position . ':' . $mobile_horizontal_spacing . ';';
                        $chat_btn_style .= $mobile_vertical_position . ':' . $mobile_vertical_spacing . ';';
                    } // if($mobile_button_position_checkbox == 1 ) {

                    // if the button is showed only on desktop
                    if($hide_button_on_mobile == 1) {
                        $chat_btn_style .= 'display:none;';
                    } else { // if($hide_button_on_mobile == 0) {
                        $chat_btn_style .= 'display:block;';
                    } // } else { // if($hide_button_on_mobile == 0) {

                $chat_btn_style .= '}';

           $chat_btn_style .= '}';
       $chat_btn_style .= '</style>';

        // ----------------------------------------------
        // add css and javascript code to header
        // ----------------------------------------------   

        add_action( 'wp_head', function() use ($chat_btn_style, $yydev_chat_btn_exclude_option, $yydev_chat_btn_exclude_ids_array) {
        	 
            $page_id = yydev_chat_btn_find_page_id();
            $yydev_chat_btn_exclude_option = $yydev_chat_btn_exclude_option; // checking if we should exclude or include pages
            $exclude_ids = $yydev_chat_btn_exclude_ids_array; // pages we should display on or ignore
            $output_menu_now = 1;

            // incase we exclude pages
            if( $yydev_chat_btn_exclude_option === 'exclude' ) {

                // incase we choose to exclude an id
                if( in_array( $page_id, $exclude_ids) ) {
                    $output_menu_now = 0;
                } // if( in_array( $page_id, $exclude_ids) ) {

            } // if( $yydev_chat_btn_exclude_option === 'exclude' ) {

            // incase we exclude pages
            if( $yydev_chat_btn_exclude_option === 'include' ) {

                // incase we choose to include only on some pages
                if( !in_array( $page_id, $exclude_ids) ) {
                    $output_menu_now = 0;
                } // if( !in_array( $page_id, $exclude_ids) ) {

            } // if( $yydev_chat_btn_exclude_option === 'exclude' ) {

            // checking if we should output the button
            if( $output_menu_now ) {

                // echo css code to page
                echo $chat_btn_style;

            } // if( $output_menu_now ) {

        }); // add_action( 'wp_head', function() use ($chat_btn_style, $yydev_chat_btn_exclude_option, $yydev_chat_btn_exclude_ids_array) {

        // ----------------------------------------------
        // add the button html to footer
        // ---------------------------------------------- 

        add_action( 'wp_footer', function() use ($button_html_code, $yydev_chat_btn_exclude_option, $yydev_chat_btn_exclude_ids_array) {
        	 
            $page_id = yydev_chat_btn_find_page_id();
            $yydev_chat_btn_exclude_option = $yydev_chat_btn_exclude_option; // checking if we should exclude or include pages
            $exclude_ids = $yydev_chat_btn_exclude_ids_array; // pages we should display on or ignore
            $output_menu_now = 1;

            // incase we exclude pages
            if( $yydev_chat_btn_exclude_option === 'exclude' ) {

                // incase we choose to exclude an id
                if( in_array( $page_id, $exclude_ids) ) {
                    $output_menu_now = 0;
                } // if( in_array( $page_id, $exclude_ids) ) {

            } // if( $yydev_chat_btn_exclude_option === 'exclude' ) {

            // incase we exclude pages
            if( $yydev_chat_btn_exclude_option === 'include' ) {

                // incase we choose to include only on some pages
                if( !in_array( $page_id, $exclude_ids) ) {
                    $output_menu_now = 0;
                } // if( !in_array( $page_id, $exclude_ids) ) {

            } // if( $yydev_chat_btn_exclude_option === 'exclude' ) {

            // checking if we should output the button
            if( $output_menu_now ) {

                // echo html button
                echo $button_html_code;

            } // if( $output_menu_now ) {

        }); // add_action( 'wp_footer', function() use ($button_html_code, $yydev_chat_btn_exclude_option, $yydev_chat_btn_exclude_ids_array) {

    } // if( $display_button_checkbox == 1 ) {

} // if( !empty($getting_plugin_data) ) {

