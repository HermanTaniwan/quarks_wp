<?php
/*
Template Name: Statistic Template
Template Post Type: post
*/
?>
<?php get_header(); ?>
<header class="content-header mt-3 mt-md-5">
    <div class="meta mb-3">
        <h1><?php the_title(); ?></h1>
    </div>

</header>
<div class="container mt-3">
    <div class="row">
        <canvas class="w-100 chart-canvas mt-2 " id="chart" width="900" height="350"></canvas>
        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>
<?php get_footer(); ?>