<?php
/*
Plugin Name: Custom Music Plugin
Description: This plugin works on adding a cutom post type, taxonomy and a release date for a music post
Version: 1.0
Author: Widad Shamy
 */

//Starting with: 1 custom post type
//Defining the custom post type:
function custom_music_post_type() {

     //define labels using an array for our post:
        $labels = array (
            //give our post a name: those labels are used in the admin interface :
            'name' => 'Music',
            'singular_name' => 'Music'
        );

    //defining an array of arguments to specify how our post will behave:
        $args = array (
            'labels' => $labels, //we get this from the defined array
            'public' => true,    //to allow our post to be accessible 
            'has_archive' => true, //to set if our post can open an archive page that dispalys all the posts of this type
            'rewrite' => array( 'slug' => 'music'), //to control our url => it will be: ../music
            'taxonomies' => array('artists','albums'), // Associate the music post type with the artist and album taxonomies
        );
    
    //Registring our post with wordPress:
    register_post_type('music' , $args); //it takes as parameters the name of the post and the array of args I defined
}
    //Calling an action in order to run our function:
    add_action('init' , 'custom_music_post_type' );


//Creating 2 taxonomies:
//Defining the custom taxonomies:
function custom_music_taxonomies() {

    //for artists:
     $taxonomy_labels = array(
        'name' => 'Artists',
        'singular_name' => 'Artist'
     );
     $taxonomy_args = array (
        'labels' => $taxonomy_labels
     );

    //registering our taxonomy with wordPress:
    register_taxonomy('artists' ,'music' , $taxonomy_args);

    //For Albums:
    $taxonomy_labels = array (
        'name' =>'Albums',
        'singular_name' => 'Album'
    );
    $taxonomy_args = array (
        'labels' =>$taxonomy_labels
    );
    register_taxonomy('albums' , 'music' , $taxonomy_args);
}
 //call our function:
 add_action('init','custom_music_taxonomies');

 //to add custom date field for adding a release date for the music custom post type
 //we can use add_meta_box

 //register the meta box:
 function add_release_date() {
    add_meta_box(
        'music_release_date', //id
        'Release Date', //title
        'display_music_release_date', //callback
        'music', //post type name
        'normal', 
        'default'
    );
 }
  //call our function
  add_action('add_meta_boxes' , 'add_release_date');

  //Display our meta box:
  function display_music_release_date($post) {
    $release_date= get_post_meta($post -> ID,'release_date',true);
 

  //Output the field:
  ?>
  <label for="music_release_date">Release Date:</label>
  <input type=date id="music_release_date" name="music_release_date" value="<?php echo esc_attr($release_date); ?>">
  <?php
  }

  //Saving the date:
  function save_release_date($post_Id) {
    //we should avoid auto save:
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 
    
    //Take the value:
    if (isset($_POST['music_release_date'])) {
        //For security and to check that there is no malicious code
        $release_date = sanitize_text_field($_POST['music_release_date']);
        update_post_meta($post_Id, 'release_date', $release_date);
    }
    else{
       
        delete_post_meta($post_Id,'release_date','');
    }
}
add_action('save_post', 'save_release_date');
 
//Displaying the date in the template:
$release_date = get_post_meta(get_the_ID(), 'release_date', true);
if (!empty($release_date)) {
    echo 'Release Date: ' . $release_date;
}

?>

  
