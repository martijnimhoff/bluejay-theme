<?php get_header(); ?>

<main>
	<div class="banner" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/banner-small-03.jpg');">
		<div class="banner-content">
			<hr>
			<h1><span>Our</span></h1>
			<h1>Partners</h1>
		</div>	
	</div>

	<div class="partners">
		<div class="container">
			<h2><span>Many</span> thanks</h2>
			<hr>
			<p class="intro">To all these partners that helped us build the world’s first domestic drone.</p>
		</div>

		<div class="partners-platinum">
			<div class="container">
				<h2>platinum <span>partners</span></h2>
				<hr>
			</div>

			<div class="container masonry">
				<?php
					get_partners(13, 'col-md-6 col-sm-6 col-xs-12 col-md-offset-3', true);
				?>			
			</div>	
		</div>

		<div class="partners-gold">
			<div class="container">
				<h2>gold <span>partners</span></h2>
				<hr>
			</div>

			<div class="container masonry">
				<?php
					get_partners(14, 'col-md-4 col-sm-6 col-xs-12', true);
				?>			
			</div>
		</div>

		<div class="partners-silver">
			<div class="container">
				<h2>silver <span>partners</span></h2>
				<hr>
			</div>

			<div class="container masonry">
				<?php
					get_partners(15, 'col-md-3 col-sm-4 col-xs-12', true);
				?>	
			</div>	
		</div>

		<div class="partners-bronze">
			<div class="container">
				<h2>bronze <span>partners</span></h2>
				<hr>
			</div>

			<div class="container masonry">
				<?php
					get_partners(16, 'col-md-2 col-sm-3 col-xs-6', false);
				?>	
			</div>	
		</div>

		<div class="partners-donor">
			<div class="container">
				<h2>donor <span>partners</span></h2>
				<hr>
			</div>

			<div class="container masonry">
				<?php
					get_partners(17, 'col-md-2 col-sm-3 col-xs-6', false);
				?>	
		</div>
	</div>

<?php get_footer(); ?>