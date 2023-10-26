<?php 
/*
Template Name: Music Archive
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="all-music-section">
            
            <h1>All Music</h1>
            <ul class="music-list">
                <?php
                $args = array(
                    //Mention our post name:
                    'post_type' => 'music', 

                    //to display all our music :
                    'posts_per_page' => -1, 
                );

                //fetch custom content from your WordPress database : like custom post type
                $music_query = new WP_Query($args);

                //check if the posts exist:
                if ($music_query->have_posts()) {
                    //iterate through the posts in the query
                    while ($music_query->have_posts()) {

                        //to set up the data for the current post.
                        $music_query->the_post();
                        echo '<li>' . get_the_title() . '</li>';
                    }
                } else {
                    echo 'No music found.';
                }

                //it resets the global $post variable to the main query's post data
                wp_reset_postdata();
                ?>
            </ul>
        </section>
    </main>
</div>

<?php 
//add the footer:
get_footer();
?>
