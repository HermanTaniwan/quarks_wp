<nav class="sidebar border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item small pe-3">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#Coal-collapse">Menu Tersedia </a>
                    <div class="collapse show" id="Coal-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" id="list-sidebar">
                            <?php

                            $currPostID = get_the_ID();
                            $category = null;
                            if ($currPostID) {
                                $category = get_the_category($currPostID);
                            }

                            if ($category != null) {
                                $args = array(
                                    'category_name' => $category[0]->slug, //Category Slug name
                                    'posts_per_page' => -1  // Number Of Post,Use -1 For All Post related This category
                                );

                                $post_content = get_posts($args);
                                foreach ($post_content as $singlePost) {
                                    $active = ($singlePost->ID == $currPostID) ? 'active' : '';
                                    echo '<li class="nav-item"><a href="' . get_permalink($singlePost) . '" class="rounded ' . $active . '">' . $singlePost->post_title . '</a></li>';
                                };
                            }

                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>