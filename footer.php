
			<div class="blue-section">

				<?php if ( is_active_sidebar( 'footer_contactform' ) ) : ?>
					<?php dynamic_sidebar( 'footer_contactform' ); ?>
				<?php endif; ?>
				
			</div>
		</main>

		<footer>
			<div class="container">
				<?php if ( is_active_sidebar( 'footer_section_1' ) ) : ?>
					<?php dynamic_sidebar( 'footer_section_1' ); ?>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'footer_section_2' ) ) : ?>
					<?php dynamic_sidebar( 'footer_section_2' ); ?>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer_section_3' ) ) : ?>
					<?php dynamic_sidebar( 'footer_section_3' ); ?>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'footer_section_4' ) ) : ?>
					<?php dynamic_sidebar( 'footer_section_4' ); ?>
				<?php endif; ?>

				<div class="clearfix"></div>

				<?php if ( is_active_sidebar( 'footer_social_media' ) ) : ?>
					<?php dynamic_sidebar( 'footer_social_media' ); ?>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer_credits' ) ) : ?>
					<?php dynamic_sidebar( 'footer_credits' ); ?>
				<?php endif; ?>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<!-- Carousel -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js"></script>

		<!-- Masonry -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.min.js"></script>

		<!-- Form auto grow -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.ns-autogrow.min.js"></script>

		<!-- Custom script -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

		 <?php wp_footer(); ?> 
	</body>
</html>