<?php
/*
Plugin Name: Custom Hero Fields Plugin
Description: Add custom fields to menu items for the hero section.
Version: 1.0
Author: Widad Shamy
*/

// this function is used to handle the addition of custom fields to menu items.
function add_menu_item_custom_fields() {

    //This function in wp is used to modify or add custom functionality to existing WordPress actions or processes
    add_filter('wp_setup_nav_menu_item', 'add_custom_fields_to_menu_item');
}

//Call our function:
add_action('admin_init', 'add_menu_item_custom_fields');

// Define a function 
//it takes a param which represents an object that contains information about the menu item.
function add_custom_fields_to_menu_item($menu_item) {

    //retrieve the value of each custom field:
    //This allows the plugin to store the background image URL associated with this menu item.
    $menu_item->background_image = get_post_meta($menu_item->ID, '_menu_item_background_image', true);

    //It assigns this value to the album_url property of the menu item object, storing the album URL.
    $menu_item->album_url = get_post_meta($menu_item->ID, '_menu_item_album_url', true);
    
    $menu_item->artist_name = get_post_meta($menu_item->ID, '_menu_item_artist_name', true);

    // it allows the modified menu item to be used in other parts of the code or by other functions.
    return $menu_item;
}

//responsible for updating the custom fields associated with a menu item when the menu is saved.
function update_custom_fields_for_menu_item($menu_id, $menu_item_db_id, $menu_item_args) {

    // This conditional statement checks if the menu-item-background-image field exists in the $_POST superglobal, and if it's an array. 
    //This is used to ensure that the custom field data for background image exists in the form data submitted when the menu is saved.
    if (is_array($_POST['menu-item-background-image'])) {
        update_post_meta($menu_item_db_id, '_menu_item_background_image', $_POST['menu-item-background-image'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_album_url', $_POST['menu-item-album-url'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_artist_name', $_POST['menu-item-artist-name'][$menu_item_db_id]); 
    }
}

//10:mid priority and 3:nb of arguments:
add_action('wp_update_nav_menu_item', 'update_custom_fields_for_menu_item', 10, 3);

//This action is used to add custom fields to menu items in the WordPress admin.

//depth:used to control the styling
function menu_item_custom_fields($item_id, $item, $depth, $args) {
    ?>
    <div class="custom-menu-item">
        <p class="field-background-image description description-thin">
            <label for="menu-item-background-image-<?php echo $item_id; ?>">Background Image URL<br>
            <input type="text" id="menu-item-background-image-<?php echo $item_id; ?>" class="widefat code edit-menu-item-background-image" name="menu-item-background-image[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->background_image); ?>">
            </label>
        </p>
        <p class="field-album-url description description-thin">
            <label for="menu-item-album-url-<?php echo $item_id; ?>">Album URL<br>
            <input type="text" id="menu-item-album-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-album-url" name="menu-item-album-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->album_url); ?>">
            </label>
        </p>
        <p class="field-artist-name description description-thin">
            <label for="menu-item-artist-name-<?php echo $item_id; ?>">Artist Name<br>
            <input type="text" id="menu-item-artist-name-<?php echo $item_id; ?>" class="widefat code edit-menu-item-artist-name" name="menu-item-artist-name[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->artist_name); ?>">
            </label>
        </p>
    </div>
    <?php
}
// used to register this custom field output function, and it specifies that the function should receive four arguments 
add_action('wp_nav_menu_item_custom_fields', 'menu_item_custom_fields', 10, 4);
