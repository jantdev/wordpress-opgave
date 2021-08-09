<?php get_header(); ?>
    <div class="main-container">
      

        <?php
      $opgave_parallax_background_image_frontend = '';
      if(get_theme_mod('opgave_parallax_background_image')){
         $opgave_parallax_background_image_frontend= get_theme_mod( 'opgave_parallax_background_image' ); 
   
      }else{
        $opgave_parallax_background_image_frontend = get_template_directory_uri() . '/assets/images/photo-1579403124614-197f69d8187b.jpg';
      }
      ?>
      <div class="image2" style="background-image:url(<?php echo $opgave_parallax_background_image_frontend;?>"></div>
        <div class="parallexImage3">
          
      <?php
      $opgave_parallax_scroll_image_frontend = '';
      if(get_theme_mod('opgave_parallax_scroll_image')){
         $opgave_parallax_scroll_image_frontend = get_theme_mod( 'opgave_parallax_scroll_image' ); 
      }else{
        $opgave_parallax_scroll_image_frontend =  get_template_directory_uri() . '/assets/images/photo-1542546068979-b6affb46ea8f.jpg';
      } 
      ?>
      <div class="image3" style="background-image:url(<?php echo $opgave_parallax_scroll_image_frontend;?>)"></div>
        </div>
        <div class="reference-block">
          <div class="reference-text">
           <?php
        $args = array(
          'category_name' => 'opgave'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
 
    // Start looping over the query results.
    while ( $query->have_posts() ) {
 
        $query->the_post();
      echo '<h2>'.get_the_title().'</h2>';
      echo get_the_content( );
        // Contents of the queried post results go here.
 
    }
 
}
 
// Restore original post data.
wp_reset_postdata();
?>
          
          </div>
        </div>
        <div class="carousel">
          <div class="carousel-navigation">
            <div class="back icon">
              <span class="material-icons">arrow_back</span>
            </div>
            <div class="next icon">
              <span class="material-icons">arrow_forward</span>
            </div>
          </div>

          <div class="carousel-items">
            <?php 
            $opgave_image_count = 1;
            foreach($GLOBALS['OPGAVE_CARUOSEL'] as $item => $path){

              
              $image_path = $path;
              echo sprintf('<div id="slider%s" class="slider-item" style="background-image: url(%s)"></div>',$opgave_image_count,$image_path);
              ++$opgave_image_count;
            }?> 
           
          </div>
          <div class="carousel-dot"></div>
        </div>
      </div>

<?php get_footer(); ?>