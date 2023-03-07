<?php
get_header(); 
?>

<div class="container-xxl main-index-post">
    <div class="row main-index-main-row" style="<?php echo (get_theme_mod( 'wb_sidebar_position' ) == "left") ? "" : "flex-direction: row-reverse;" ; ?>">
        <div class="col-12 col-lg-3">
            <?php if ( is_active_sidebar( 'primary' ) ) { ?>
                <?php dynamic_sidebar('primary'); ?>
            <?php } ?>
        </div>
        <div class="col-12 col-lg-9">
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
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            endif;
            
            ?>
        </div>
    </div>
    
</div>

<?php
get_footer(); 
?>