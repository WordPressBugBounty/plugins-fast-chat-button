<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

include('settings.php'); // Load the files to get the databse info

// ----------------------------------------------
// checking if the data existing on the db and 
// if not we will create it with initial settings
// ----------------------------------------------    

if( !get_option($wp_options_name) ) {

    // ----------------------------------------------
    // getting all the values and clear data
    // ----------------------------------------------    

    $display_button_checkbox = 1;
    $chat_number = '';
    $chat_message = '';
    $button_width = 80;
    $button_height = 80;
    $horizontal_position = 'right';
    $horizontal_spacing = '30px';
    $vertical_position = 'bottom';
    $vertical_spacing = '30px';
    $button_z_index = '9999';
    $hide_button_on_desktop = 0;
    $hide_button_on_mobile = 0;
    $mobile_width = 960;
    $mobile_button_position_checkbox = 0;
    $mobile_horizontal_position = 'right';
    $mobile_horizontal_spacing = '30px';
    $mobile_vertical_position = 'bottom';
    $mobile_vertical_spacing = '30px';

    // getting the image arrow icon
    $icon_image_url = plugin_dir_url(dirname(__FILE__)) . 'images/chat-button1.png';
    $chat_button_type = $icon_image_url;

    $exclude_option = '';
    $exclude_ids = '';

    // ----------------------------------------------
    // insert the data into an array
    // ----------------------------------------------  

    $plugin_data_array = array(
        'display_button_checkbox' => $display_button_checkbox,
        'chat_number' => $chat_number,
        'chat_message' => $chat_message,
        'button_width' => $button_width,
        'button_height' => $button_height,
        'horizontal_position' => $horizontal_position,
        'horizontal_spacing' => $horizontal_spacing,
        'vertical_position' => $vertical_position,
        'vertical_spacing' => $vertical_spacing,
        'button_z_index' => $button_z_index,
        'hide_button_on_desktop' => $hide_button_on_desktop,
        'hide_button_on_mobile' => $hide_button_on_mobile,
        'mobile_width' => $mobile_width,
        'mobile_button_position_checkbox' => $mobile_button_position_checkbox,
        'mobile_horizontal_position' => $mobile_horizontal_position,
        'mobile_horizontal_spacing' => $mobile_horizontal_spacing,
        'mobile_vertical_position' => $mobile_vertical_position,
        'mobile_vertical_spacing' => $mobile_vertical_spacing,
        'icon_image_url' => $icon_image_url,
        'chat_button_type' => $chat_button_type,

        'exclude_option' => $exclude_option,
        'exclude_ids' => $exclude_ids,
    ); // $creating_data_array = array(

    // ----------------------------------------------
    // creating a value with all the array data
    // ----------------------------------------------  
    
    $array_key_name = "";
    $array_item_value = "";
    
    foreach($plugin_data_array as $key=>$item) {
        $array_key_name .= "####" . $key;
    	$array_item_value .= "####" . $item;
    } // foreach($medical_form_array as $key=>$item) {

    // ----------------------------------------------
    // inserting all the data to datbase
    // ----------------------------------------------  

    $plugin_data = $array_key_name . "***" . $array_item_value;
    $plugin_data = sanitize_text_field($plugin_data);

    // update optuon on the database into wp_options
    update_option($wp_options_name, $plugin_data);    

} // if( !get_option($wp_options_name) ) {