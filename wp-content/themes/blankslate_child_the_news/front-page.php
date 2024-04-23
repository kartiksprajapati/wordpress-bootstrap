<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blankslate_Child_The_News
 */

get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <main id="primary" class="site-main">
                <?php
                // while (have_posts()):
                //     the_post();
                
                //     get_template_part('template-parts/content', 'page');
                
                //     // If comments are open or we have at least one comment, load up the comment template.
                //     if (comments_open() || get_comments_number()):
                //         comments_template();
                //     endif;
                
                // endwhile; // End of the loop.
                ?>

            </main>
        </div>
        <div class="col-md-4">
            <?php #$get_sidebar(); ?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="position-relative d-flex align-items-center justify-content-center mt-2 mb-2">
                <hr class="border border-primary border-1 w-100">
                <h3
                    class="text-primary text-responsive d-inline w-25 bg-black mr-2 ml-2 pl-2 pr-2 text-center position-absolute top-0 start-50 translate-middle-x">
                    Latest News
                </h3>
            </div>
            <?php
            $categories = get_categories();
            ?>

            <?php
            foreach ($categories as $category) {
                $icon_name = get_category_icon_name($category->term_id);
                ?>
                <h4 class="text-primary pb-2">
                    <i class="fas fa-<?= $icon_name ?> my-0 text-secondary"></i>
                    <?= $category->name ?>
                </h4>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'cat' => $category->term_id,
                    'date_query' => array(
                        array(
                            'after' => '15 days ago'
                        ),
                    )
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    echo '<div class="row">';
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <img src="<?= get_the_post_thumbnail_url() ?>" class="card-img-top h-50" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= get_the_title() ?></h5>
                                    <p class="card-text"><?= get_the_excerpt() ?></p>
                                    <a href="<?= get_the_permalink() ?>" class="btn btn-primary text-black fw-medium">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                } else {
                    echo '<p class="text-white">No news found</p>';
                }

                wp_reset_postdata();
            }
            ?>
        </div>
    </div>

    <div class="row pb-2 pt-2">
        <div class="col-md-12">
            <div class="position-relative d-flex align-items-center justify-content-center m-2">
                <hr class="border border-primary border-1 w-100">
                <h3
                    class="text-primary text-responsive d-inline w-25 bg-black mr-2 ml-2 pl-2 pr-2 text-center position-absolute top-0 start-50 translate-middle-x">
                    Media Partners
                </h3>
            </div>
            <?= dynamic_sidebar('media-partners') ?>
        </div>
    </div>
</div>

<?php
get_footer();
