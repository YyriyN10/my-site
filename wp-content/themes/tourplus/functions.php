<?php
/**
 * TourPlus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TourPlus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tourplus_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on TourPlus, use a find and replace
		* to change 'tourplus' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tourplus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'tourplus' ),
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
			'tourplus_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'tourplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tourplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tourplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'tourplus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tourplus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tourplus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tourplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tourplus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tourplus_scripts() {
	wp_enqueue_style( 'tourplus-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'tourplus-style-main', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'tourplus-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'tourplus_scripts' );

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
 * Carbon init
 */

require get_template_directory() . '/inc/carbon-init.php';

/**
 * Custom post types
 */

require get_template_directory() . '/inc/custom-post-types.php';

	add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
	function myajax_data(){

		wp_localize_script('tourplus-main-js', 'myajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);

	}

	add_action('wp_ajax_open_tour', 'open_tour_callback');
	add_action('wp_ajax_nopriv_open_tour', 'open_tour_callback');

	function open_tour_callback(){

		$tourId = $_POST['tourId'];


		 	$catArgs = array(
		 		'post_type'  => 'tour',
		 		'post_status'    => 'publish',
		 		'page_id' => $tourId
		 	);

		 	$postList = new WP_Query( $catArgs );

		 		  if ( $postList->have_posts() ) :?>

		 			 <?php while ( $postList->have_posts() ) : $postList->the_post(); ?>

					      <div class="text">
						      <h3 class="name"><?php the_title();?></h3>
						      <?php echo wpautop( carbon_get_post_meta(get_the_ID(), 'yuna_tour_card_description'));?>
					      </div>

					      <h3 class="form-title">Order a consultation about the tour "<?php the_title();?>"</h3>
					      <p>We will contact you in a way convenient for you at a time convenient for you</p>
					      <form method="post">
						      <input type="hidden" name="tour-name" value="<?php the_title();?>">
						      <div class="form-group">
							      <input type="text" name="name" class="form-control" placeholder="Enter your name">
						      </div>
						      <div class="form-group">
							      <input type="tel" class="form-control" placeholder="Enter your your phone number">
						      </div>
						      <div class="form-group">
							      <input type="email" class="form-control" placeholder="Enter your email">
						      </div>
						      <div class="form-group textarea-group">
							      <textarea name="massage" class="form-control" placeholder="Enter your massage"></textarea>
						      </div>
						      <div class="time-to-call">
							      <p>Choose a convenient time for the call</p>
							      <div class="time-list">
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input">
										      <span>9 PM - 10 PM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>10 PM - 11 PM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>11 PM - 12 PM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>12 PM - 1 AM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>1 AM - 2 AM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>2 AM - 3 AM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>3 AM - 4 AM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input" >
										      <span>4 AM - 5 AM</span>
									      </label>
								      </div>
								      <div class="form-check">
									      <label class="form-check-label">
										      <input type="radio" name="call-time" class="form-check-input">
										      <span>5 AM - 6 AM</span>
									      </label>
								      </div>
							      </div>
						      </div>
						      <button type="submit" class="button">send a message</button>
					      </form>

		 		<?php endwhile;?>
		 	<?php endif; ?>
		 <?php wp_reset_postdata();

		wp_die();
	}