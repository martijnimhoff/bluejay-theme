<?php get_header(); ?>

<main>
	<div class="banner banner-tiny" style="background: #009ADD">
	</div>

	<div class="container content">
		<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <h2>
		    	<?php the_title(); ?>
		    </h2>	
			<?php the_content(); ?>
			<?php 
			$link = get_post_meta(get_the_ID(), 'link', true);
			?>
			<a href="<?= $link ?>" target="_BLANK">
		   		<img src="<?php the_post_thumbnail_url(); ?>" alt="logo <?php the_title(); ?>" class="aligncenter">
		   	</a>
		   	<br />
		   	<br />
			<p>
		   		<a href="<?= $link ?>" target="_BLANK">Visit the website of <?php the_title(); ?></a>
		   	</p>	
			<?php endwhile; endif; ?>	
		</div>

		<!-- Side bar -->
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>