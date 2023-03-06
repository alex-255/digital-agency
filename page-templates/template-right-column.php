<?php /* Template Name: Template with right column */ ?>
<?php
get_header(); 
?>

<div class="container-xxl main-page-post template-right-column">
    <div class="row">
        <div class="col-12 col-lg-9">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="main-page-post--image">
                        <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" />
                    </div>
                    <div class="main-page-post--content">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                    <hr>
                <?php 
                endwhile;
            else :
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            endif;
            ?>
        </div>
        <div class="col-12 col-lg-3">
            <?php if ( is_active_sidebar( 'primary' ) ) { ?>
                <?php dynamic_sidebar('primary'); ?>
            <?php } ?>
        </div>
    </div>
    
</div>

<?php
get_footer(); 
?>