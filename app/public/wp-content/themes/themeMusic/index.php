<?php 
//To get our header
get_header(); 
?>

<!-- Hero Section -->
<?php

// first we should get the menu items from the "Hero Section":
//use a function to get info about registered menu by its name:
$hero_menu = wp_get_nav_menu_object('Hero_Section');

//retrieve the menu items associated with a specific menu.
$menu_items = wp_get_nav_menu_items($hero_menu->term_id);

//We use a loop to iterate through the menu items retrieved from the "Hero_Section" menu
foreach ($menu_items as $item) {
    //From the items in the her section menu:
    $background_image = get_post_meta($item->ID, '_menu_item_background_image', true);//3 params taken, menu id, name of the field, and retrieving a single value will be set to true 
    $album_name = $item->title;
    $artist_name = get_post_meta($item->ID, '_menu_item_artist_name', true);
    $album_url = get_post_meta($item->ID, '_menu_item_album_url', true);
    ?>

    <!--Output the hero Section Content:--->
    <section class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>')">
    <div class="hero-content">
            <h1><?php echo $album_name; ?></h1>
            <h2><?php echo $artist_name; ?></h2>
            <a href="<?php echo esc_url($album_url); ?>" class="button">Show All Music</a>
        </div>
    </section>
    <?php
}
?>
<!-- Displaying the List of Artists -->
<h1>List of Artists</h1>

<!--We will use the ul because our items don't have a specific order-->
<ul class="artist-list">
    <?php
    //This is a wordPress function that is used to retrieve tags from a specific in taxonomy
    $artists = get_terms(array(
        'taxonomy' => 'artists', 
    ));

    //loop that will display our list:
    foreach ($artists as $artist) {
        echo '<li>' . $artist->name . '</li>';
    }
    ?>
</ul>

<?php 
//To get our footer:
get_footer(); 
?>
