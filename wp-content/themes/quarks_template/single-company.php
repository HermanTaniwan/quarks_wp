<?php
/*
Template Name: Company Snapshot Template
Template Post Type: post
*/
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<?php get_header(); ?>

<body data-bs-theme="dark">

    <?php include get_template_directory() . '/sections/navigation.php'; ?>

    <div class="inline-block" style="height: 50px;"></div>

    <div class="container-fluid">

        <div class="wrapper row">
            <?php
            get_template_part('template-parts/content', 'sidenav_desktop');
            ?>

            <main class="col-md-9 ms-sm-auto col-lg-6 px-md-4 workspace resource-area">

                <?php
                get_template_part('template-parts/content', 'sidenav_mobile');
                ?>

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


            </main>

            <div class="col-lg-2"></div>
        </div>
    </div>

    <?php get_footer(); ?>
</body>

</html>