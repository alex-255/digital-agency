<?php
get_header(); 
?>

<section id="welcome-screen" class="container-xxl">
    <div class="text">
        <h1 class="title">
            <span class="first-word"><?php echo esc_html(get_theme_mod( 'da_title_before_selected' )); ?></span>
            <span class="selected-word"><?php echo esc_html(get_theme_mod( 'da_title_selected_word' )); ?><span></span><span></span><span></span><span></span></span>
            <span class="rest-text"><?php echo esc_html(get_theme_mod( 'da_title_after_selected' )); ?></span>
        </h1>
        <p class="subtitle"><?php echo esc_html(get_theme_mod( 'da_subtitle_welcome' )); ?></p>
        <img src="<?php echo esc_url(get_theme_mod( 'da_welcome_screen_curve' )); ?>" class="curve-line"/>
    </div>
    <div class="further-link">
        
        <a href="#solutions"><img src="<?php echo esc_url(get_theme_mod( 'da_welcome_screen_button' )); ?>" /></a>
    </div>
</section>

<section id="solutions">
    <div class="container-xxl">
        <div class="row">
            <div class="col-12 col-lg-6 solutions-text">
                <h2>Want you to boost your business growth? Solution is here.</h2>
                <p>We provide various services to make your business grow and get bigger. Your satisfaction is our first priority.</p>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/button-with-arrow-black.svg"/>
            </div>
            <div class="col-12 col-lg-6 solutions-items">
                <div class="row gx-4 gy-4">
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="solutions-item">
                            <h2 class="solutions-item-number">01</h2>
                            <h2 class="solutions-item-title">Web Content</h2>
                            <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="solutions-item">
                            <h2 class="solutions-item-number">02</h2>
                            <h2 class="solutions-item-title">Branding</h2>
                            <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="solutions-item">
                            <h2 class="solutions-item-number">03</h2>
                            <h2 class="solutions-item-title">SEO Consultancy</h2>
                            <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="solutions-item">
                            <h2 class="solutions-item-number">04</h2>
                            <h2 class="solutions-item-title">Market Analysis</h2>
                            <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

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