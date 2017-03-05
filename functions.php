<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


 // Remove comments
 // Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

add_theme_support( 'post-thumbnails' ); 


/**
 * Formatting a header title
 *
 */
function format_header_title($title) {
	$split_title = explode(' ', $title, 4);

	$word_count = str_word_count($title);

	switch ($word_count) {
		case 0:
			return $title;
			break;
		case 1:
			return "<h1>{$title}</h1>";
			break;
		case 2:
			return "<h1><span>{$split_title[0]}</span></h1><h1>{$split_title[1]}</h1>";
			break;
		case 3:
			return "<h1><span>{$split_title[0]}</span></h1><h1>{$split_title[1]} {$split_title[2]}</h1>";
			break;
		default:
			return "<h1><span>{$split_title[0]} {$split_title[1]}</span></h1><h1>{$split_title[2]} {$split_title[3]}</h1>";
			break;
	}				
}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function bluejay_widgets_init() {
	register_sidebar( array(
		'name'          => 'Homepage Team Quote',
		'id'            => 'home_team_quote',
		'before_widget' => '<div class="team-quote">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => 'Homepage Vision',
		'id'            => 'home_vision',
		'description'	=> '',
		'before_widget' => '<div class="container vision">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2><hr>',
	) );

	register_sidebar( array(
		'name'          => 'Homepage About Drone',
		'id'            => 'home_about_drone',
		'before_widget' => '<div class="container about-drone"><div class="col-md-5 col-sm-8 col-xs-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<hr><h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Homepage Follow us left',
		'id'            => 'home_follow_left',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Homepage Follow us right',
		'id'            => 'home_follow_right',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Homepage About Team',
		'id'            => 'home_about_team',
		'before_widget' => '<div class="container about-team"><div class="col-md-5 col-sm-5 col-xs-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<hr><h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer contactform',
		'id'            => 'footer_contactform',
		'before_widget' => '<div class="container contact-us">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2><hr>',
	) );

	register_sidebar( array(
		'name'          => 'Footer section 1',
		'id'            => 'footer_section_1',
		'before_widget' => '<div class="col-md-3 col-sm-3 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer section 2',
		'id'            => 'footer_section_2',
		'before_widget' => '<div class="col-md-3 col-sm-3 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer section 3',
		'id'            => 'footer_section_3',
		'before_widget' => '<div class="col-md-3 col-sm-3 col-xs-12 newsletter">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer section 4',
		'id'            => 'footer_section_4',
		'before_widget' => '<div class="col-md-3 col-sm-3 col-xs-12 contact">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer social media',
		'id'            => 'footer_social_media',
		'before_widget' => '<div class="social-media">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => 'Footer credits',
		'id'            => 'footer_credits',
		'before_widget' => '<div class="credits">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'bluejay_widgets_init' );


/**
 * Register some custom style for the back end
 *
 */
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .widgets-holder-wrap .sidebar-description, .widgets-holder-wrap .sidebar-name {
    	-ms-user-select: text;
    	-moz-user-select: text; 
    	-webkit-user-select: text; /* does not work in Safari, use only "none" or "text", or else it will allow to type in the html container*/
    	user-select:text;
    }
  </style>';
}


/**
 * Register the partners content type
 *
 */

add_action( 'init', 'create_post_type' );
function create_post_type() {
	
	register_taxonomy_for_object_type('category', 'partners',
		array(
			'description' => 'The type of a partner',
			array(
				'label' => __( 'Partners' ),
				'public' => false,
	            'rewrite' => false,
	            'hierarchical' => true,
			)
		)
	);

	register_post_type( 'partners',
		array(
			'labels' => array(
				'name' => __( 'Partners' ),
				'singular_name' => __( 'Partner' ),
				'not_found' => __( 'No partners found' )
			),
			'description' => 'The partners of Blue Jay',
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
			'taxonomies' => array('category')
		)
	);

	register_post_type( 'testimonials',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' ),
				'not_found' => __( 'No testimonials found' )
			),
			'description' => 'The testimonials of Blue Jay (or better known as our fans)',
			'public' => true,
    		'show_in_nav_menus' => false,
    		'exclude_from_search' => true,
			'menu_icon' => 'dashicons-format-quote',
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);

	register_post_type( 'home-slider',
		array(
			'labels' => array(
				'name' => __( 'Home page slider' ),
				'singular_name' => __( 'slider' ),
				'not_found' => __( 'No sliders found' )
			),
			'menu_position' => 20,
			'description' => 'The slider item on the homepage',
			'public' => true,
    		'show_in_nav_menus' => false,
    		'exclude_from_search' => true,
			'menu_icon' => 'dashicons-slides',
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);
}

function get_partners($id, $classes, $excerpt) {

	$args = array(
		'post_type' => 'partners',
		'numberposts' => -1, 
		'category' => $id
	);
	$posts = get_posts( $args );

	if($posts) {
		foreach ( $posts as $post) : 
			setup_postdata($post);
		    /*
			$link = get_post_meta($post->ID, 'link', true);
			if($link) { ?>
				<a href="<?= $link ?>" target="_blank" class="partner <?= $classes ?>">
			<?php } else { ?>
				<a class="no-link partner <?= $classes ?>">
			<?php } 
			*/
			?>
			<a href="<?php echo get_permalink($post->ID); ?>" class="partner <?= $classes ?>">	
				<div class="partner-content">
					<?php 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); 

					if ($image) : ?>
					    <img src="<?php echo $image[0]; ?>" alt="" />
					<?php endif; ?> 

					<p><?php echo $excerpt ? get_the_excerpt($post->ID) : get_the_title($post->ID); ?></p>
				</div>
			</a>
			<?php 
		endforeach;
		wp_reset_postdata();
	}
}

/**
 * Confirm Woocommerce theme support
 *
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Change the add to cart text on single product pages
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );  
function woo_custom_cart_button_text() {
    return __( 'Select package', 'woocommerce' );
}

/**
 * Change the add to cart text on product archives
 */
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );
function woo_archive_custom_cart_button_text() {
	return __( 'Select package', 'woocommerce' );
}

/**
 * Remove product tabs
 *
 */
function woo_remove_product_tab($tabs) {

    unset( $tabs['description'] );      		// Remove the description tab
    unset( $tabs['reviews'] ); 					// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

 	return $tabs;
 
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tab', 98);

/*
 * wc_remove_related_products
 * 
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.  
 */
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 


function woo_custom_add_to_cart( $cart_item_data ) {

    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'woo_custom_add_to_cart' );

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Add payment method to admin new order email
 *
 */
add_action( 'woocommerce_email_after_order_table', 'woo_add_payment_method_to_admin_new_order', 15, 2 ); 

function woo_add_payment_method_to_admin_new_order( $order, $is_admin_email ) { 
	if ( $is_admin_email ) { 
	echo '<p><strong>Payment Method:</strong> ' . $order->payment_method_title . '</p>'; 
	} 
}

function your_add_to_cart_message() {

	if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) :
		$message = sprintf( '%s<a href="%s">%s</a>', 
			__( 'You have selected a package', 'woocommerce' ), 
			esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ), 
			__( '', 'woocommerce' ) 
		);
	else :
	    $message = sprintf( '%s<a href="%s">%s</a>',
			__( 'You have selected a package' , 'woocommerce' ),
			esc_url( get_permalink( woocommerce_get_page_id( 'cart' ) ) ),
			__( '', 'woocommerce' ) 
		);
	endif;
	return $message;
}
add_filter( 'wc_add_to_cart_message', 'your_add_to_cart_message' );

?>