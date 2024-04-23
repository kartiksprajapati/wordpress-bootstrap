<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blankslate_Child_The_News
 */
$primary_menu_name = 'menu-1';
$primary_menu_items = wp_get_nav_menu_items($primary_menu_name);

$featured_articles_menu_name = 'featured-articles';
$featured_articles = wp_get_nav_menu_items($featured_articles_menu_name);

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<style>
		.breaking-news {
			font-weight: bold;
			font-size: 1rem;
		}

		.page {
			margin: 0 0 0 0 !important;
		}

		.menu-item:hover {
			background-color: #a37c08;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e('Skip to content', 'blankslate_child_the_news'); ?></a>

		<div class="container-fluid breaking-news">
			<div class="row">
				<div class="col-auto pt-1 pb-1 breaking-news__title d-flex align-items-center bg-primary ">
					BREAKING NEWS
				</div>
				<div class="col breaking-news__content d-flex align-items-center bg-white text-black">
					<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
						<?php if (count($featured_articles)): ?>
							<?php foreach ($featured_articles as $key => $article):
								if (count($featured_articles) - 1 == $key) {
									echo $article->title;
								} else {
									echo $article->title . ' | ';
								}
								?>
							<?php endforeach; ?>
						<?php else: ?>
							No breaking news
						<?php endif; ?>
					</marquee>
				</div>
			</div>
		</div>

		<header id="masthead" class="site-header">
			<div class="container pt-4 pb-2">
				<div class="row">
					<div class="col-md-12 site-header__logo d-flex justify-content-center justify-content-md-start ">
						<?= the_custom_logo(); ?>
					</div>

					<div class="col">
						<!-- something to do over here -->
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<?= get_search_form(); ?>
			</div>

			<div class="container-fluid bg-primary mt-2 h-10">
				<nav id="site-navigation" class="main-navigation">
					<div class="container d-flex justify-content-center ">
						<button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
							data-bs-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<ul class="list-unstyled" id="primary-menu">
							<?php
							foreach ($primary_menu_items as $menu_item):
								?>
								<li class="px-4 py-2 menu-item d-flex align-items-center">
									<a href="<?= $menu_item->url ?>" class="text-black">
										<span class="text-black"><?= get_category_icon($menu_item->object_id) ?></span>
										<?= $menu_item->title ?></a>
								</li>
								<?php
							endforeach;
							?>
						</ul>

					</div>
				</nav>
			</div>

			<!-- <div class="container">
				<div class="position-relative d-flex align-items-center justify-content-center m-2">
					<hr class="border border-primary border-1 w-100">
					<h3
						class="text-primary d-inline w-25 bg-black mr-2 ml-2 pl-2 pr-2 text-center position-absolute top-0 start-50 translate-middle-x">
						Latest News
					</h3>
				</div>
			</div> -->
		</header>