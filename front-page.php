<?php
get_header(); 
?>
<div class="container-xxl px-0">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <?php
                        // Arguments
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'carousel'
                        );

                        // The Query
                        $the_query = new WP_Query( $args );

                        // The Loop
                        if ( $the_query->have_posts() ) {

                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); ?>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if ($the_query->current_post == 0) { echo ' active'; } ?>" aria-current="<?php if ($the_query->current_post == 0) { echo 'true'; } ?>" aria-label="<?php echo get_the_title(); ?>"></button>
                                <?php
                            }

                        } 
                        /* Restore original Post Data */
                        wp_reset_postdata(); ?>
                </div>
                
                <div class="carousel-inner">
                    <?php
                        // Arguments
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'carousel'
                        );

                        // The Query
                        $the_query = new WP_Query( $args );

                        // The Loop
                        if ( $the_query->have_posts() ) {

                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); ?>
                                    <div class="carousel-item<?php if ($the_query->current_post == 0) { echo ' active'; } ?>">
                                        <div class="carousel-item--image d-block w-100" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);"></div>
                                        <div class="carousel-caption d-none d-md-block">
                                        <h5><?php the_title(); ?></h5>
                                        <?php echo wp_trim_words(get_the_content(), 20); ?>
                                        </div>
                                    </div>


                                    
                                <?php
                            }

                        } 
                        /* Restore original Post Data */
                        wp_reset_postdata(); ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>


            </div>
    </div>
    
</div>

<?php
get_footer(); 
?>