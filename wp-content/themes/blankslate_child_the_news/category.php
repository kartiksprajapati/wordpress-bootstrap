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

<main id="primary" class="site-main">

    <div class="container">
        <h1 class="page-title text-primary mt-2 d-flex align-items-center">
            <i class="fas me-2  fa-<?= get_category_icon_name(get_queried_object_id()) ?>"></i>
            <?php single_term_title(); ?>
        </h1>
        <div class="row mt-2">
            <div class="col-12 col-sm-9">
                <div class="row">
                    <?php
                    while (have_posts()):
                        echo '<div class="col-sm-6">';
                        the_post();

                        get_template_part('template-parts/content', 'page');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()):
                            comments_template();
                        endif;
                        echo '</div>';
                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();
