<?php
get_header(); 
?>

<div class="container-xxl main-single-post">
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
                    </div>
                    <hr>
                </div>
            <?php 
            endwhile;
        else :
            _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
        endif;
    ?>
</div>

<?php
get_footer(); 
?>