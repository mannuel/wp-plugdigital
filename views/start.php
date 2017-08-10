<div class="wrap">
	<h1><?php esc_html_e( 'Optimization and Performance', 'PlugDigital' ); ?></h1>
	<h4>Plug Digital - <a href="https://www.plugdigital.net">www.plugdigital.net</a></h4>

	<div class="card">
		<h2>Googla Analytics</h2>

		<form action="" method="post">
			<?php wp_nonce_field( pdmx::NONCE ) ?>
			<input type="hidden" name="action" value="enter-pdmx-google-analytics-id">
			<label>Google Analytics ID</label>
			<input type="text" name="pdmx-google-analytics-id" placeholder="UA-XXXXXX" value="<?php echo get_option( 'pdmx_google_analytics_id' ); ?>">

			<input type="submit" name="submit" id="submit" class="button button-primary button-large pdmx-button" value="<?php _e( 'Save', 'PlugDigital' );?>">
		</form>

		<p><?php _e( 'Get your Google Analytics ID here <a href="https://analytics.google.com/" target="_blank">Google Analytics</a>','PlugDigital' ); ?></p>
	</div>

	<div class="card">
		<h2>Facbook Pixel</h2>

		<form action="" method="post">
			<?php wp_nonce_field( pdmx::NONCE ) ?>
			<input type="hidden" name="action" value="enter-pdmx-facebook-pixel-id">
			<label>Facebook Pixel</label>
			<input type="text" name="pdmx-facebook-pixel-id" placeholder="XXXXXXXXX" value="<?php echo get_option( 'pdmx_facebook_pixel_id' ); ?>">

			<input type="submit" name="submit" id="submit" class="button button-primary button-large pdmx-button" value="<?php _e( 'Save', 'PlugDigital' );?>">
		</form>

		<p><?php _e( 'Get your Facebook Pixel here <a href="https://www.facebook.com/ads/manager/pixel" target="_blank">Facebook Pixel</a>','PlugDigital' ); ?></p>
	</div>
</div>