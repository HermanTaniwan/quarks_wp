<?php get_header(); ?>
<script>
    window.location.href = "<?= get_permalink(get_the_ID()) ?>";
</script>
<?php get_footer(); ?>