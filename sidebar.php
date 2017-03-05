<div class="clearfix"></div>

<?php
$args = array('posts_per_page' => 3);

$blogposts = get_posts($args);

if(!empty($blogposts)) :

	?>
	<div class="news-section">
		<h2>News</h2>
		<hr>

		<?php

		foreach( $blogposts as $post ) : setup_postdata( $post ); ?>

			<div class="col-md-4 col-sm-6 col-xs-12">
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

		<?php endforeach; ?>

		<div class="clearfix"></div>

		<a href="/category/blog/" class="btn btn-blue btn-hover-black">More news</a>
	</div>

	<?php 
	wp_reset_postdata(); 

endif;

?>