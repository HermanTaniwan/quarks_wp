<?php
/*
Template Name: Company Snapshot Template
Template Post Type: post
*/
?>
<?php get_header(); ?>
<header class="content-header mt-3 mt-md-5">
    <div class="meta mb-3">
        <h1><?php the_title(); ?></h1>
        <!-- <h1><?php echo get_post_meta($post->ID, '_wporg_meta_key_kode', true) ?></h1>
        <h1><?php echo get_post_meta($post->ID, '_wporg_meta_key_revenue', true) ?></h1> -->
    </div>

</header>
<div class="container mt-3">
    <div class="row">
        <?php get_template_part('template-parts/content', 'default'); ?>
        <?php get_template_part('template-parts/content', 'companyreport'); ?>
    </div>
</div>
<?php get_footer(); ?>