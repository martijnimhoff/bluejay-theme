<?php get_header(); ?>

<main>
	<div class="slider owl-carousel">


		<?php

		$args = array(
			'post_type' 	=> 'home-slider',
			'numberposts'	=> 3,
			'orderby'		=> 'date',
			'order'         => 'DESC'
		);

		$posts = get_posts( $args );

		if($posts) :
			foreach ( $posts as $post) : setup_postdata($post); ?>			
				<div class="item" style="background-image: url('<?php the_post_thumbnail_url('small') ?>');">
					<div class="item-content">
						<hr>
						<?php the_content(); ?>
					</div>	
				</div>	
				<?php 
			endforeach;
			wp_reset_postdata();
		endif;
		?>

	</div>

	<div class="container">
		
		<?php if ( is_active_sidebar( 'home_team_quote' ) ) : ?>
			<?php dynamic_sidebar( 'home_team_quote' ); ?>
		<?php endif; ?>
		
	</div>

	<div class="blue-section">
		
		<?php if ( is_active_sidebar( 'home_vision' ) ) : ?>
			<?php dynamic_sidebar( 'home_vision' ); ?>
		<?php endif; ?>

	</div>

	<?php 
	$about_drone_post = get_post(8);
	$about_drone_post_thumbnail = get_the_post_thumbnail_url($about_drone_post);

	if(!$about_drone_post_thumbnail) {
		$about_drone_post_thumbnail = "background-image:url('".get_template_directory_uri()."/img/about-drone-photo-01.jpg')";
	} else {
		$about_drone_post_thumbnail = "background-image:url('".$about_drone_post_thumbnail."')";
	}
	?>

	<div class="photo-section" style="<?= $about_drone_post_thumbnail ?>">
		
		<?php if ( is_active_sidebar( 'home_about_drone' ) ) : ?>
			<?php dynamic_sidebar( 'home_about_drone' ); ?>
		<?php endif; ?>
			
	</div>

	<div class="news-section">
		<div class="container text-center">
			<h2>News</h2>
			<hr>

			<?php
			$args = array('posts_per_page' => 3);

			$blogposts = get_posts($args);

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

			<?php wp_reset_postdata(); ?>


			<div class="clearfix"></div>

			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="btn btn-blue btn-hover-black">More news</a>

		</div>
	</div>

	<div class="blue-section">
		<div class="container follow-us">
			<h2>Follow <span>us</span></h2>
			<hr>

			<div class="col-md-5 col-sm-6 col-xs-12 col-md-offset-1">
				<?php if ( is_active_sidebar( 'home_follow_left' ) ) : ?>
					<?php dynamic_sidebar( 'home_follow_left' ); ?>
				<?php endif; ?>
			</div>

			<div class="col-md-4 col-sm-5 col-xs-12 col-md-offset-1 social-media">
				<?php if ( is_active_sidebar( 'home_follow_right' ) ) : ?>
					<?php dynamic_sidebar( 'home_follow_right' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php 
	$team_post = get_post(52);
	$team_post_thumbnail = get_the_post_thumbnail_url($team_post);

	if(!$team_post_thumbnail) {
		$team_post_thumbnail = "background-image:url('".get_template_directory_uri()."/img/team-together-01.jpg')";
	} else {
		$team_post_thumbnail = "background-image:url('".$team_post_thumbnail."')";
	}
	?>

	<div class="photo-section" style="<?= $team_post_thumbnail ?>">
		
		<?php if ( is_active_sidebar( 'home_about_team' ) ) : ?>
			<?php dynamic_sidebar( 'home_about_team' ); ?>
		<?php endif; ?>
			
	</div>

	<div class="container testimonials">
		<h2><span>Our</span> fans</h2>
		<hr>

		<?php

		$args = array(
			'post_type' 	=> 'testimonials',
			'numberposts'	=> 4,
			'orderby'		=> 'date',
			'order'         => 'DESC'
		);

		$posts = get_posts( $args );

		if($posts) :
			foreach ( $posts as $post) : setup_postdata($post); ?>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<img src="<?php the_post_thumbnail_url('small'); ?>" alt="onze fans" class="testimonials-pic">
					<h3><?php the_title() ?></h3>
					<?php the_content(); ?>
				</div>


				<?php 
			endforeach;
			wp_reset_postdata();
		endif;
		?>
		
	</div>

<?php get_footer(); ?>