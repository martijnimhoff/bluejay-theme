<?php
/**
 * Template Name: Woocommerce page
 *
 * @package WordPress
 * @subpackage Blue Jay
 * @since Blue Jay 1.0.0
 */
?>


<?php get_header(); ?>

<main>
	<div class="banner" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/banner-small-01.jpg')">
		<div class="banner-content">
		</div>	
	</div>

	
	<div class="container content">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<?php woocommerce_content(); ?>
		</div>
	</div>

<?php get_footer(); ?>