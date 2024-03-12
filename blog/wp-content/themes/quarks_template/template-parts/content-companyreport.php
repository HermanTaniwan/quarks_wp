<?php

require "lib/EncryptionWP.php";
require "lib/LaporanWP.php";

?>



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 ps-0 pb-2 mb-3">
    <article>
        <h2>Dokumen</h2>

        <table class="table table-striped table-sm">
            <thead class="">
                <?php echo LaporanWP::renderTabelHeader(); ?>
            </thead>
            <tbody class="">
                <?php echo LaporanWP::renderTabel(get_post_meta($post->ID, '_wporg_meta_key_kategori    ', true), get_post_meta($post->ID, '_wporg_meta_key_kode', true)); ?>
            </tbody>
        </table>

    </article>
</div>