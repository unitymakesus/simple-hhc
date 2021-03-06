<?php

$settings = \FLCacheClear\Plugin::get_settings();
?>

	<h3 class="fl-settings-form-header"><?php _e( 'Cache Clearing Tool', 'fl-builder' ); ?></h3>
	<form id="cache-plugins-form" action="<?php FLBuilderAdminSettings::render_form_action( 'tools' ); ?>" method="post">

		<div class="fl-settings-form-content">
<p>
	<?php _e( 'This tool applies to caches created by the following:', 'fl-builder' ); ?>
	<ul>
		<li>AutoOptimize</li>
		<li>Breeze</li>
		<li>Cache Enabler</li>
		<li>Swift</li>
		<li>WP Fastest Cache</li>
		<li>WP Super Cache</li>
		<li>W3 Total Cache</li>
		<li>LiteSpeed Plugin</li>
		<li>Pagely Hosting</li>
		<li>SiteGround Hosting</li>
		<li>WPEngine Hosting</li>
	</ul>
</p>
<p>
	<?php _e( 'Enable the following setting to clear the caches created by any of these caching plugins. If enabled, cache clearing occurs when layouts and templates are saved and when WordPress finishes updating plugins and themes. This setting also defines the DONOTCACHEPAGE constant, which is respected by most cache plugins, to keep the page from being cached when the Beaver Builder editor is active.
', 'fl-builder' ); ?>
<p>
				<label>
					<input type="checkbox" name="fl-cache-plugins-enabled" value="1" <?php checked( $settings['enabled'], 1 ); ?> />
					<span><?php _e( 'Enable the Cache Clearing Tool', 'fl-builder' ); ?></span>
				</label>
			</p>

			<?php if ( $settings['enabled'] ) : ?>
			<div class="fl-cache-plugins-settings">

				<p>
					<?php _e( 'Some hosts use a proxy cache like Varnish or Litespeed.  The following setting attempts to invalidate the cache using a remote request. If you are unsure what this does, leave it disabled.', 'fl-builder' ); ?>
				</p>
				<p>
					<label>
						<input type="checkbox" name="fl-cache-varnish-enabled" value="1" <?php checked( $settings['varnish'], 1 ); ?> />
						<span><?php _e( 'Enable proxy cache clearing', 'fl-builder' ); ?></span>
					</label>
				</p>
			</div>

		<?php endif; ?>

		</div>
		<p class="submit">
			<input type="submit" name="update" class="button-primary" value="<?php esc_attr_e( 'Save Cache Clearing Tool Settings', 'fl-builder' ); ?>" />
			<?php wp_nonce_field( 'cache-plugins', 'fl-cache-plugins-nonce' ); ?>
		</p>
	</form>
	<hr>
