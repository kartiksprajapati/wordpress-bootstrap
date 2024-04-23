<!doctype html>
<html <?= language_attributes() ?> <?= blankslate_schema_type() ?>>

<head>
    <meta charset="<?= bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= wp_head() ?>
</head>

<body <?= body_class() ?>>
    <?= wp_body_open() ?>

    <!-- Header -->
    <div class="row">

    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-3">
            <?php get_sidebar('main-left') ?>
        </div>

        <!-- Main Content -->
        <div class="col-6">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post() ?>
                    <article id="post-<?php the_ID() ?>" <?php post_class() ?>>
                        <header>
                            <h2><a href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a></h2>
                        </header>
                        <div>
                            <?php the_content() ?>
                        </div>
                    </article>
                <?php endwhile ?>
            <?php else: ?>
                <h2>No posts found</h2>
            <?php endif ?>
        </div>

        <!-- Right Sidebar -->
        <div class="col-3">
            <?php get_sidebar('right') ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="row"></div>

    <?= wp_footer() ?>
</body>

</html>