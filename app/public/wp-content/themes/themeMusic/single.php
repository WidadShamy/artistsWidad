<?php
/*
Template Name: Music Archive
*/
get_header();

// first we should get the menu items from the "Hero Section":
//use a function to get info about registered menu by its name:
$hero_menu = wp_get_nav_menu_object('Hero_Section');

//retrieve the menu items associated with a specific menu.
$menu_items = wp_get_nav_menu_items($hero_menu->term_id);

//We use a loop to iterate through the menu items retrieved from the "Hero_Section" menu
foreach ($menu_items as $item) {
    $artist_name = get_post_meta($item->ID, '_menu_item_artist_name', true);
    ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="all-music-section">
            
            <h1>All Music by <?php echo $artist_name; ?></h1>
            <ul class="music-list">
                <?php
                //used to customize the query for fetching music posts associated with the specific artist
                $args = array(
                    'post_type' => 'music',
                    'posts_per_page' => -1, //retrieve all posts:

                    //This is an array used to filter posts by a specific taxonomy term
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'artists', 
                            'field'    => 'name', 
                            'terms'    => $artist_name,
                        ),
                    ),
                );
                $music_query = new WP_Query($args);

                if ($music_query->have_posts()) {
                    while ($music_query->have_posts()) {
                        $music_query->the_post();
                        echo '<li>' . get_the_title() . '</li>';
                    }
                } else {
                    echo 'No music found for ' . $artist_name;
                }
            }
                wp_reset_postdata();
                ?>
            </ul>
        </section>
    </main>
</div>

<?php 
get_footer();
?>
