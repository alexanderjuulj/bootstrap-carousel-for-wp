<?php
/**
 * Carousel Block Using Bootstrap v5.2.x
 * Add the following snippet to your functions.php file
 * Don't replace your existing functions.php file!
 *
 */
add_action('acf/init', 'my_theme_acf_init_block_types');
function my_theme_acf_init_block_types() {

  // Check function exists.
  if( function_exists('acf_register_block_type') ) {

    // Register a carousel block.
    acf_register_block_type(array(
        'name'              => 'bootstrap-carousel',
        'title'             => __('Carousel'),
        'description'       => __('A slideshow component for cycling through elements—images or slides of text—like a carousel.'),
        'render_template'   => 'template-parts/blocks/bootstrap-carousel/bootstrap-carousel.php',
        'category'          => 'formatting',
        'keywords'          => array( 'carousel', 'bootstrap' ),
        'enqueue_assets' 	=> 	function()
        {
            wp_enqueue_style( 'css-bootstrap-carousel', get_stylesheet_directory_uri() . '/template-parts/blocks/bootstrap-carousel/bootstrap-carousel.css', array(), '1.0.0' );
        },
    ));
    
  }
}