<?php
/**
 * Blankslate_Child_The_News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blankslate_Child_The_News
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blankslate_child_the_news_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blankslate_Child_The_News, use a find and replace
	 * to change 'blankslate_child_the_news' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('blankslate_child_the_news', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'blankslate_child_the_news'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blankslate_child_the_news_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'blankslate_child_the_news_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blankslate_child_the_news_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blankslate_child_the_news_content_width', 640);
}
add_action('after_setup_theme', 'blankslate_child_the_news_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blankslate_child_the_news_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'blankslate_child_the_news'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'blankslate_child_the_news'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Media Partners', 'blankslate_child_the_news'),
			'id' => 'media-partners',
			'description' => esc_html__('Add Media Partners Here', 'blankslate_child_the_news'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'blankslate_child_the_news_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function blankslate_child_the_news_scripts()
{
	wp_enqueue_style('blankslate_child_the_news-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('blankslate_child_the_news-main', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION);
	wp_enqueue_style('blankslate_child_the_news-fontawesome', get_template_directory_uri() . '/css/fontawesome/css/all.css', array(), _S_VERSION);

	wp_style_add_data('blankslate_child_the_news-style', 'rtl', 'replace');

	wp_enqueue_script('blankslate_child_the_news-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('blankslate_child_the_news-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blankslate_child_the_news_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Custom functions

function add_extra_category_fields($taxonomy)
{
	?>
	<div class="form-field term-icon-name-wrap">
		<label for="meta-icon-name"><?php _e('Icon Name', 'blankslate_child_the_news'); ?></label>
		<input type="text" id="meta-icon-name" name="meta-icon-name" placeholder="baseball">
		<p id="name-description">The icon is how it appears before the category name. Get the icon name from the fontawesome
			website.</p>
	</div>
	<?php
}
add_action('category_add_form_fields', 'add_extra_category_fields', 10, 2);


function edit_extra_category_fields($term)
{
	$icon_name = get_term_meta($term->term_id, 'meta-icon-name', true);
	?>
	<tr class="form-field term-icon-name-wrap">
		<th scope="row"><label for="icon-name"><?php _e('Icon Name', 'blankslate_child_the_news'); ?></label></th>
		<td>
			<input name="meta-icon-name" id="meta-icon-name" type="text"
				value="<?php echo esc_attr($icon_name) ? esc_attr($icon_name) : ''; ?>" placeholder="baseball">
			<p class="description" id="icon-name-description">The icon is how it appears before the category name. Get the
				icon name from the
				fontawesome
				website.</p>
		</td>
	</tr>
	<?php
}
add_action('category_edit_form_fields', 'edit_extra_category_fields', 10, 2);

function save_extra_category_fields($term_id)
{
	if (isset($_POST['meta-icon-name'])) {
		update_term_meta($term_id, 'meta-icon-name', sanitize_text_field($_POST['meta-icon-name']));
	}
}

add_action('created_category', 'save_extra_category_fields', 10, 1);
add_action('edited_category', 'save_extra_category_fields', 10, 1);

function get_category_icon($category_id)
{
	$icon_name = get_term_meta($category_id, 'meta-icon-name', true);
	if ($icon_name) {
		return '<i class="fas fa-' . $icon_name . '"></i>';
	}
	return '';
}

function get_category_icon_name($category_id)
{
	$icon_name = get_term_meta($category_id, 'meta-icon-name', true);
	if ($icon_name) {
		return $icon_name;
	}
}

// Custom Utils
function get_custom_logo_url()
{
	return esc_url(wp_get_attachment_url(get_theme_mod('custom_logo')));
}

// WP-Admin Login Page Functions
function custom_login_logo()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) ?>);
			width: 12rem;
			height: 10rem;
			background-size: 12rem;
			background-repeat: no-repeat;
			padding-bottom: 1rem;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');

function custom_login_logo_url_title()
{
	return get_option('name');
}
add_filter('login_headertext', 'custom_login_logo_url_title');

function truncate($text, $chars = 120) {
	if(strlen($text) > $chars) {
		$text = $text.' ';
		$text = substr($text, 0, $chars);
		$text = substr($text, 0, strrpos($text ,' '));
		$text = $text.'...';
	}
	return $text;
}