	<footer class="clearfix" id="colophon" role="contentinfo">
		<?php dynamic_sidebar('footer-area'); ?>
		<?php
			$footer_text = get_theme_mod('awesome_footer_text');
			if($footer_text):
				echo '<div class="custom-footer-text">' . $footer_text . '</div>';
			endif;
		?>
	</footer><!-- end footer -->
</div><!-- closes #wrapper opened in header.php -->
<?php 
//must call wp_footer right before </body> for JS and plugins to run!
wp_footer();  ?>
</body>
</html>