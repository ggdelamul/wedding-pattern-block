 <?php
/*
 * Plugin Name: wedding-design-pattern
 * Version: 1
 * Author: Jérémy Legendre
 * Description: pattern pour administrer des partie de pages avec inclusion de la librairie gsap 
 */
function wedding_register_pattern_categories() {
  register_block_pattern_category( 
    'wedding-pattern-design',
    array( 'label' => __( 'wedding-pattern-design', 'wedding_plugin' ) )
  );
}
add_action( 'init', 'wedding_register_pattern_categories' );

function wedding_design_plug_in(){
    register_block_pattern(
        'wedding_plugin/background-image_and_fadeIn-dvi',
        array(
            'title'=> __('background-image_and_fadeIn-div', 'wedding_plugin'),
            'description'=> _x('une image de fond avec un block image plus texte apparaissant au scroll', 'Block pattern description', 'wedding-design-pattern'),
           
            'content'=> '
            <!-- wp:group {"tagName":"section","className":"background","layout":{"type":"constrained"}} -->
                            <section class="wp-block-group background"><!-- wp:image {"id":263,"width":2500,"sizeSlug":"large","linkDestination":"none"} -->
                            <figure class="wp-block-image size-large is-resized"><img src="http://vegaphotographe.local/wp-content/uploads/2023/07/Services-porfolio-photo-vegaphotographe-vegportrait-femme-63-1024x683.jpg" alt="" class="wp-image-263" width="2500"/></figure>
                            <!-- /wp:image -->

                            <!-- wp:media-text {"mediaId":232,"mediaLink":"http://vegaphotographe.local/portafolio-prestationphoto-grossesse-studio-26/","mediaType":"image"} -->
                            <div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="http://vegaphotographe.local/wp-content/uploads/2023/07/Portafolio-Prestationphoto-grossesse-studio-26-683x1024.jpg" alt="" class="wp-image-232 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Contenu…"} -->
                            <p>ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum non consectetur a erat nam at lectus urna duis convallis convallis</p>
                            <!-- /wp:paragraph --></div></div>
                            <!-- /wp:media-text --></section>
                            <!-- /wp:group --> 
                            ',
                             'categories'  => array( 'wedding-pattern-design' ),
        )
    );
    register_block_pattern(
        'wedding_plugin/switch-image',
        array(
            'title'=> __('switch-image', 'wedding_plugin'),
            'description'=> _x('une image changeant tout les 2 secondes', 'Block pattern description', 'wedding-design-pattern'),
            'content'=> '
                <!-- wp:group {"tagName":"section","className":"switch-container","layout":{"type":"constrained"}} -->
                <section class="wp-block-group switch-container">
                <!-- wp:image {"className":"vide"} -->
                <figure class="wp-block-image vide"><img alt="" /></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":292,"sizeSlug":"large","linkDestination":"none","className":"switch un"} -->
                <figure class="wp-block-image size-large switch un">
                    <img
                    src="http://vegaphotographe.local/wp-content/uploads/2023/07/IMG_5857-1024x683.jpg"
                    alt=""
                    class="wp-image-292"
                    />
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":296,"sizeSlug":"large","linkDestination":"none","className":"switch deux"} -->
                <figure class="wp-block-image size-large switch deux">
                    <img
                    src="http://vegaphotographe.local/wp-content/uploads/2023/07/IMG_5855-1024x683.jpg"
                    alt=""
                    class="wp-image-296"
                    />
                </figure>
                <!-- /wp:image -->
                </section>
                <!-- /wp:group -->
                ',
            'categories'  => array( 'wedding-pattern-design' ),
        )
    );
}
add_action( 'init', 'wedding_design_plug_in' );

function wedding_register_assets(){
    wp_enqueue_style( 
        'background-image_and_fadeIn-dvi/css', 
        plugin_dir_url(__FILE__ ) . 'wedding.css' , 
        '1.0',
        5
    );
    wp_enqueue_script(
        'gsap', 
        'https://cdn.jsdelivr.net/npm/gsap@3.9.1', 
        array(), 
        '3.9.1', 
        true,
        1
    );
    wp_enqueue_script(
        'custom',
        plugin_dir_url(__FILE__ ) . 'wedding.js',
        // array('jquery'),
        '1.0',
        true,
        2
    );
}
add_action('wp_enqueue_scripts', 'wedding_register_assets');