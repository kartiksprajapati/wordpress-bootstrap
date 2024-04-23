<?php
/**
 * Template Name: Two Page Layout
 */

?>

<!doctype html>
<html <?= language_attributes() ?> <?= blankslate_schema_type() ?>>

<head>
    <meta charset="<?= bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= wp_head() ?>
</head>

<body <?= body_class() ?>>
    <?= wp_body_open() ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= get_categories() ?>
            </div>
            <div class="col-md-4">
                <?= get_sidebar() ?>
            </div>
        </div>
    </div>

    <?= wp_footer() ?>
</body>

</html>