<!DOCTYPE html>
<html <?= language_attributes() ?>>

<head>
    <meta charset="<?= bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply'); ?>
    <?= wp_head() ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><?= bloginfo('title') ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <?php

                            $menu_name = 'primary';
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object($locations[$menu_name]);
                            $menuitems = wp_get_nav_menu_items($menu->term_id);
                            ?>

                            <?php foreach ($menuitems as $item): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $item->url ?>"><?= $item->title ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row mt-4">
            <div class="col-md-9">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()):
                        the_post(); ?>
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= the_post_thumbnail_url() ?>" class="img-fluid rounded-start" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body overflow-hidden">
                                        <a style="text-decoration: none" href="<?= the_permalink() ?>">
                                            <h5 class="card-title"><?= the_title() ?></h5>
                                        </a>
                                        <span
                                            class="badge rounded-pill text-bg-warning"><?= get_the_category()[0]->name ?></span>
                                        <p class="card-text"><?= wp_trim_excerpt() ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-3">

            </div>
        </div>
    </div>
    <?= wp_footer() ?>
</body>

</html>