<div class="d-block d-md-none selector-wrapper">
    <select class="form-select" id="data-selector" data-live-search="true">
        <?php

        // var_dump(get_the_ID());
        $category = null;
        if (get_the_ID()) {
            $category = get_the_category(get_the_ID());
        }

        if ($category != null) {
            $args = array(
                'category_name' => $category[0]->slug, //Category Slug name
                'posts_per_page' => -1  // Number Of Post,Use -1 For All Post related This category
            );

            $post_content = get_posts($args);
            foreach ($post_content as $singlepost) {
                echo '<option data="' . get_permalink($singlepost) . '" selected>' . $singlepost->post_title . ' </option>';
            };
        }

        ?>
    </select>
</div>