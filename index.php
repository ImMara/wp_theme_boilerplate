<!--ref to header.php-->
<?php get_header() ?>

<div class="row min-vh-100">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div class="col-12 mt-5">
            <div class="container">
                <h1><?php wp_title(); ?></h1>
                <?= the_content()?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php else: ?>
    <p>Aucun article :(</p>
<?php endif; ?>

<!--ref to footer.php-->
<?php get_footer() ?>