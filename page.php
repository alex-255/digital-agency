<?php
get_header(); 
?>

<div class="container-xxl main-page-post">
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-12 main-page-post--image">
                        <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" />
                    </div>
                    <div class="col-12 main-page-post--content">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php 
            endwhile;
        else :
            esc_html_e( 'Sorry, no posts matched your criteria.', 'digital-agency' );
        endif;
    ?>
</div>

<?php
get_footer(); 
?>