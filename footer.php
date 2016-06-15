<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<span class="footer-item">&copy; <?php echo date('Y') . ' ' . get_bloginfo( 'name' ) ?></span>
		<span class="sep">|</span>
		<span class="footer-item signature">Website by <a target="superiocity" href="http://www.superiocity.com">Superiocity</a></span>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
