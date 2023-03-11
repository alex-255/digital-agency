<?php
get_header(); 
?>

<div class="container-xxl main-single-post">
    <div class="row">
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
                            <div class="col-12 main-single-post--image">
                                <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" />
                            </div>
                            <div class="col-12 main-single-post--content">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                                <?php edit_post_link(); ?>
                                <?php 
                                // if "Hide previous and next post links" checkbox unchecked, then show this code.
                                if ( get_theme_mod( 'wb_hide_prev_next_links' ) == false ) { ?>
                                    <div class="post-links">
                                        <span><?php previous_post_link(); ?></span><span><?php next_post_link(); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr>
                        </div>
                    <?php 
                    endwhile;
                else :
                    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
                endif;
            ?>
            <div class="comments">
            <?php 
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer(); 
?>