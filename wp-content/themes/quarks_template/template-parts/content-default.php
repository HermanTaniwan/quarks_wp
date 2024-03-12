<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 ps-0 pb-2 mb-3">
    <article>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'archive');
                break;
            }
        }
        ?>
    </article>
</div>