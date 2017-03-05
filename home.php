<?php get_header(); ?>

<?php 
// get the banner image of this page
$post_banner_url = apply_filters( 'the_page_thumbnail_url', get_the_post_thumbnail_url( get_option( 'page_for_posts' ) ) );
$fallback_banner_url = "background-image:url('".get_template_directory_uri()."/img/banner-small-01.jpg')";
if(!$post_banner_url) {
	$post_banner_url = $fallback_banner_url;
} else {
	$post_banner_url = "background-image:url('{$post_banner_url}')";
}
?>

<main>
	<div class="banner" style="<?= $post_banner_url ?>">
		<div class="banner-content">
			<hr>
			<?php 
				$page_title = apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) );
				echo format_header_title($page_title); // look in functions.php to edit this function
			?>
		</div>	
	</div>

	<div class="news-section">
		<div class="container text-center">
			<h2>News</h2>
			<hr>

			<div class="news-masonry">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<div class="col-md-4 col-sm-6 col-xs-12 news-block">
							<a href="<?php echo get_permalink(); ?>" class="news-item">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="news-image">
										<div class="hoveroverlay">
											<div class="btn btn-blue btn-active">read more</div>
										</div>
										<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="news item"/>
									</div>
								<?php endif; ?>
								<h3><?php the_title(); ?></h3>
								<p class="date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									 <?php the_time('j F Y'); ?>
								</p>
								<p class="excerpt">
									<?php the_excerpt(); ?>
								</p>
							</a>
						</div>


					<?php endwhile; else: ?>
					<?php _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?>
				<?php endif; ?>
			</div>	

			<div class="clearfix"></div>
		</div>
	</div>
<?php get_footer(); ?>