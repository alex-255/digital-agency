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
            <h1><?php esc_html_e( 'Not Found', 'digital-agency' ); ?></h1>
            <h2><?php esc_html_e( 'This is somewhat embarrassing, isn’t it?', 'digital-agency' ); ?></h2>
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'digital-agency' ); ?></p>

            <?php get_search_form( array('aria_label' => 'visible') ); ?>
        </div>
    </div>
</div>

<?php
get_footer(); 
?>