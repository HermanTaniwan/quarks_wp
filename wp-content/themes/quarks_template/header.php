<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="UTF-8" />
    <title><?php echo get_bloginfo('name') ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="Alat untuk mempermudah analisa seorang investor fundamental" />
    <link href="https://cdn.jsdelivr.net/npm/modern-normalize@v2.0.0/modern-normalize.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/img/favicons/atom.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/img/favicons/atom.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">

    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="apple-touch-icon.png">
    <meta property="og:title" content=Fundamental Investor Tools>
    <meta property="og:site_name" content="Quarks.id">
    <meta property="og:url" content="<?= site_url() ?>">
    <meta property="og:description" content="Alat untuk mempermudah analisa seorang investor fundamental">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="quarks">
    <meta name="twitter:description" content="Alat untuk mempermudah analisa seorang investor fundamental">

    <link href="<?= get_template_directory_uri() ?>/assets/style/dashboard.css" rel="stylesheet">
    <link href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css" rel="stylesheet">

    <meta name="theme-color" content="#712cf9">

<body data-bs-theme="dark">

    <nav class=" position-fixed w-100 z-3 navbar navbar-expand-sm bg-dark navbar-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url() ?>"><img style="padding-bottom:5px" src="<?= get_template_directory_uri() ?>/assets/img/favicons/atom.png" /> Quarks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
                    // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

                    $menuID = $menuLocations['primary']; // Get the *primary* menu ID

                    $category = get_the_category();
                    //var_dump($category);

                    $primaryNav = wp_get_nav_menu_items($menuID);
                    foreach ($primaryNav as $navItem) {
                        $active = ($category[0]->name == $navItem->title) ? 'active' : '';
                        // var_dump($category->ID);
                        //var_dump($navItem->ID);

                        echo '<li class="nav-item">';
                        echo '<a class="nav-link btn-resource ' . $active . '" aria-current="page" href="' . $navItem->url . '" title="' . $navItem->title . '">' . $navItem->title . '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
                <span class="navbar-text">
                    <a class="nav-link align-items-center gap-2 " aria-current="page" href="https://forms.gle/Yrg5ngyAvb9W26QS8" target="_blank">
                        <span>Got Feedback ?</span>
                        <span class="text-warning">Share it here. <i class="bi bi-heart"></i></span>
                    </a>
                </span>
            </div>
        </div>
    </nav>

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