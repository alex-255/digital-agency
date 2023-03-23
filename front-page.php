<?php
get_header(); 
?>

<section id="welcome-screen" class="container-xxl">
    <div class="text">
        <h1 class="title">
            <span class="first-word"><?php echo esc_html(get_theme_mod( 'da_title_before_selected' )); ?></span>
            <span class="selected-word">
                <?php echo esc_html(get_theme_mod( 'da_title_selected_word' )); ?>
                <span class="frame">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </span>
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
    <div class="container-xxl p-5">
        <div class="row">
            <div class="col-12 col-lg-6 solutions-text">
                <h2>Want you to boost your business growth? Solution is here.</h2>
                <p>We provide various services to make your business grow and get bigger. Your satisfaction is our first priority.</p>
                <a href="#our-works"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/button-with-arrow-black.svg"/></a>
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

<section id="statistic" class="container-xxl">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="statistic-item">
                <h2 id="happy-clients" data-max="40">0</h2>
                <p>Happy Clients</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="statistic-item">
                <h2 id="projects-completed" data-max="540">0</h2>
                <p>Projects Completed</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="statistic-item">
                <h2><span id="members" data-max="300">0</span>+</h2>
                <p>Dedicated Members</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="statistic-item">
                <h2 id="awards" data-max="25">0</h2>
                <p>Awards Won</p>
            </div>
        </div>
    </div>
</section>

<section id="our-works" class="container-xxl">
    <h2 class="our-works__header" data-after="<?php echo get_template_directory_uri() . "/assets/images/star-in-header.svg"; ?>">
        Our works
    </h2>
    <div id="our-works-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            <?php
                // Arguments
                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'work',
                    'order' => "ASC"
                );

                // The Query
                $the_query = new WP_Query( $args );

                // The Loop
                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                            <div class="carousel-item<?php if ($the_query->current_post == 0) { echo ' active'; } ?>">
                                <div class="carousel-item--image d-block w-100" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                                    
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="<?php the_permalink(); ?>"></a>
                                </div>
                            </div>
                        <?php
                    }

                } 
                /* Restore original Post Data */
                wp_reset_postdata(); ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#our-works-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#our-works-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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