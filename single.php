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
    <div class="row">
        <div class="col-12">
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