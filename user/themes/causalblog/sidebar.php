<!-- sidebar -->
<?php Plugins::act( 'theme_sidebar_top' ); ?>

		<div id="search">
		<h2><?php _e('Search'); ?></h2>
<?php $theme->display ('searchform' ); ?>
		</div>

		<div class="sb-about">
		<h2><?php _e('About'); ?></h2>
		<p><?php Options::out('about'); ?></p>
		</div>

<?php Plugins::act( 'theme_sidebar_bottom' ); ?>
<!-- /sidebar -->
