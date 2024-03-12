<?php get_header(); ?>
<header class="content-header mt-3 mt-md-5">
    <div class="meta mb-3">
        <small class="badge bg-secondary"><?= get_the_date() ?></small>
        <h1><?php the_title(); ?></h1>
    </div>

</header>
<div class="container mt-3">

    <div class="row">
        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>
<?php get_footer(); ?>