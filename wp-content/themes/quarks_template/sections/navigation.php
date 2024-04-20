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