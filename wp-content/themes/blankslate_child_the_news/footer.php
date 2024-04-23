<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blankslate_Child_The_News
 */

?>


<div class="container pb-2 pt-2 mb-2">
	<hr>
</div>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 d-flex justify-content-center align-items-center">
				<img width="240px" class="img-fluid" alt="<?= bloginfo('title') ?>" src="<?= get_custom_logo_url() ?>">
			</div>
			<div class="col-md-9 mt-4 mt-md-0">
				<div class="row g-2">
					<div class="col-md-6">
						<h5 class="text-primary text-center ">Categories</h5>
						<?php
						$categories = get_categories(5);
						if ($categories) {
							echo '<ul class="list-group">';
							foreach ($categories as $category) {
								echo '<li class="list-group-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
							}
							echo '</ul>';
						}
						?>
					</div>
					<div class="col-md-6">
						<h5 class="text-primary text-center ">Popular News</h5>
						<?php
						?>
						<!-- <div class="card">
								<div class="card-body">
									<h5 class="card-title">Special title treatment</h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional
										content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-primary ">
		<div class="col-md-6"></div>
	</div>

	<div class="container-fluid bg-primary fw-medium text-black mt-4 d-flex align-items-center">
		<div class="container">
			<div class="row d-flex align-items-center py-1">
				<div class="col-md-6 d-flex justify-content-center justify-content-md-start">
					<span>© <?= date('Y') ?> <?= bloginfo('title') ?>. All Rights Reserved.</span>
				</div>
				<div class="col-md-6 d-flex justify-content-center justify-content-md-end ">
					<span>Theme made by Kartik S Prajapati with
						<i class="fas fa-heart fa-beat text-danger "></i>
					</span>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>


</html>