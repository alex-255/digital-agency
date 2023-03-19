<?php
get_header(); 
?>

<section id="welcome-screen">
    <h1 class="title">
        <span class="first-word"><?php echo esc_html(get_theme_mod( 'da_title_before_selected' )); ?></span>
        <span class="selected-word"><?php echo esc_html(get_theme_mod( 'da_title_selected_word' )); ?></span>
        <span class="rest-text"><?php echo esc_html(get_theme_mod( 'da_title_after_selected' )); ?></span>
    </h1>
<p class="subtitle"><?php echo esc_html(get_theme_mod( 'da_subtitle_welcome' )); ?></p>
<div class="further-link">
    <img src="<?php echo esc_url(get_theme_mod( 'da_welcome_screen_curve' )); ?>" class="curve-line"/>
    <a href="<?php echo esc_url(get_theme_mod( 'da_welcome_screen_button' )); ?>"></a>
</div>
</section>



<!-- Hero images carousel -->
<div class="container-xxl">
    <div class="row">
        <div class="col-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
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
                            'post_type' => 'carousel',
                            'order' => "ASC"
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
                                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
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
<div class="container-xxl main-post">

    <?php
    // Arguments
    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'post'
    );

    // The Query
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {
            $the_query->the_post(); ?>
                <div class="row">
                    <div class="col-12 col-lg-7 main-post--image">
                        <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" />
                    </div>
                    <div class="col-12 col-lg-5 main-post--content">
                        <h2><?php the_title(); ?><?php echo (is_sticky(get_the_ID())) ? ' <i class="bi bi-star-fill"><span class="tooltiptext">Sticky post</span></i>' : "" ; ?></h2>
                        <p><?php echo wp_trim_words(get_the_content(), 50); ?> <a href="<?php the_permalink(); ?>" class="read-more-link">Read more &raquo;</a></p>
                    </div>
                    <hr>
                </div>
            <?php
        }
    } 
    /* Restore original Post Data */
    wp_reset_postdata(); ?>

</div>

<?php
get_footer(); 
?>