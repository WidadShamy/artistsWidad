<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
    //this function is used to inject various elements and resources into the <head> section
    wp_head(); 
    ?>
    
</head>
<body>
<header class="header">
    <nav class="header-menu navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'navbar-nav',
                'container' => false, //This is used to tell wp if to wrap the elements and we set it to false beacuse bootstrap handles it
            ));
            ?>
            </div>
        </nav>
</header>
   

