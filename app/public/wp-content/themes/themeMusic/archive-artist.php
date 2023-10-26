<?php
/*
Template Name: Artists Page
*/

//Display our header:
get_header(); 
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="artists-archive">
            <h1>All Artists</h1>
            <ul class="artist-list">
                <?php
                //function in wordPress to retrieve tags from a specific in taxonomy
                $artists = get_terms(array(
                    'taxonomy' => 'artists',
                ));

                //display our list:
                foreach ($artists as $artist) {
                    echo '<li>';
                    echo  $artist->name;
                    echo '</li>';
                }
                ?>
            </ul>
        </section>
    </main>
</div>

<?php 
//Display our footer:
get_footer();?>

