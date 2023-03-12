<?php
get_header(); 
?>

<div class="container-xxl main-index-post">
    <div class="row">
        <div class="col-12">
        <h1 class="page-title">
            <?php printf( __( 'Search Results for: %s', 'wooden-business' ), get_search_query() ); ?>
        </h1>
        <p class="text-center">Need another search? </p>
        <?php get_search_form( array('aria_label' => 'visible') ); ?>
        </div>
    </div>
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-12 col-lg-8 main-index-post--image">
                        <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" />
                    </div>
                    <div class="col-12 col-lg-4 main-index-post--content">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo wp_trim_words(get_the_content(), 50); ?> <a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
                    </div>
                    <hr>
                </div>
            <?php 
            endwhile; ?>
            <div class="row">
                <div class="col-12 paginate-links">
                    <?php echo paginate_links(); ?>
                </div>
            </div>
        <?php 
            
        else :
            esc_html_e( 'Sorry, no posts matched your criteria.', 'wooden-business' );
        endif;
        
    ?>
</div>

<?php
get_footer(); 
?>