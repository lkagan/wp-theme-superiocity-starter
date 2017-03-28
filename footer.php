	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div class="footer-widgets">
				<?php dynamic_sidebar( 'footer' ); ?>
            </div>
		<?php endif; ?>
		<span class="footer-item">&copy; <?php echo date('Y') . ' ' . get_bloginfo( 'name' ) ?></span>
		<?php if ( is_active_sidebar( 'copyright' ) ) : ?>
            <span class="footer-item">
				<?php dynamic_sidebar( 'copyright' ); ?>
            </span>
		<?php endif; ?>
        <span class="sep">|</span>
        <span class="footer-item signature"><a target="superiocity" href="http://www.superiocity.com">Website by Superiocity</a></span>
	</footer><!-- .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
