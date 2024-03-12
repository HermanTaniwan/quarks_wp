<?php


function quarks_menus()
{
    $locations = array(
        'primary' => 'Primary Menu Items',
        'footer' => 'Footer Menu Items'
    );

    register_nav_menus($locations);
}

add_action('init', 'quarks_menus');



function quarks_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'quarks_theme_support');

function quarks_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('quarks-font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), "5.13.0", "all");
    wp_enqueue_style('quarks-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), "4.4.1", "all");
    wp_enqueue_style('quarks-style', get_template_directory_uri() . "/style.css", array(), $version, "all");
}

add_action('wp_enqueue_scripts', 'quarks_register_styles');

function quarks_register_scripts()
{
    wp_enqueue_script('quarks-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "", "all", true);
    wp_enqueue_script('quarks-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "", "all", true);
    wp_enqueue_script('quarks-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "", "all", true);
    wp_enqueue_script('quarks-js', get_template_directory_uri() . "/assets/js/main.js", array(), "", "all", true);
}

add_action('wp_enqueue_scripts', 'quarks_register_scripts');;


function custom_query_vars_filter($vars)
{

    $vars[] .= 'data';
    return $vars;
}
add_filter('query_vars', 'custom_query_vars_filter');




abstract class WPOrg_Meta_Box
{


    /**
     * Set up and add the meta box.
     */
    public static function add()
    {
        $screens = ['post', 'wporg_cpt'];
        foreach ($screens as $screen) {
            add_meta_box(
                'wporg_box_id',          // Unique ID
                'Info Emiten', // Box title
                [self::class, 'html'],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }


    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save(int $post_id)
    {
        if (array_key_exists('kode_emiten', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key_kode',
                $_POST['kode_emiten']
            );
        }
        if (array_key_exists('kategori_emiten', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key_kategori',
                $_POST['kategori_emiten']
            );
        }
    }


    /**
     * Display the meta box HTML to the user.
     *
     * @param WP_Post $post   Post object.
     */
    public static function html($post)
    {
        $kode = get_post_meta($post->ID, '_wporg_meta_key_kode', true);
        $kategori = get_post_meta($post->ID, '_wporg_meta_key_kategori', true);
?>
        <label for="wporg_field">Kode Emiten</label>
        <input name="kode_emiten" class="components-text-control__input" value="<?= $kode ?>" /> <br><br>
        <label for="wporg_field">Kategori Emiten</label>
        <input name="kategori_emiten" class="components-text-control__input" value="<?= $kategori ?>" />
        <!-- <select name="kode_emiten" id="wporg_field" class="postbox">
            <option value="">Select something...</option>
            <option value="something" <?php selected($kode, 'something'); ?>>Something</option>
            <option value="else" <?php selected($kode, 'else'); ?>>Else</option>
        </select> -->
<?php
    }
}

add_action('add_meta_boxes', ['WPOrg_Meta_Box', 'add']);
add_action('save_post', ['WPOrg_Meta_Box', 'save']);
?>