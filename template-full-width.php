<?php
/**
 * Template Name: Full width page
 *
 * @package WordPress
 * @subpackage Blue Jay
 * @since Blue Jay 1.0.0
 */
?>


<?php get_header(); ?>

<main>
	<div class="banner" style="
	<?php
		if(has_post_thumbnail()) {
			echo "background-image:url('";
			the_post_thumbnail_url('full');
			echo "')";
		} else {
			echo "background-image:url('".get_template_directory_uri()."/img/banner-small-01.jpg')";
		}
	?>">
		<div class="banner-content">
			<hr>
			<?php 
				$page_title = get_the_title();
				echo format_header_title($page_title); // look in functions.php to edit this function
			?>
		</div>	
	</div>
	
	<div class="container content">
	    <?php if (have_posts()) : while (have_posts()) : the_post();?>
	    <h2>
	    	<?php the_title(); ?>
	    </h2>	
		<?php the_content(); ?>
		<?php endwhile; endif; ?>	

		<!-- Side bar -->
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>