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

	<div class="card">
		<h2>Login Image</h2>

		<p><?php _e( 'Change the login form image' ); ?></p>

		<form action="" method="post">
			<?php wp_nonce_field( pdmx::NONCE ) ?>
			<input type="hidden" name="action" value="enter-pdmx-login-image">
			<label>Image</label>
			<input type="button" class="button button-secondary" value="Upload login image" id="upload-login-image-button">
			<input type="hidden" name="pdmx-login-image" id="pdmx-login-image" value="<?php echo get_option( 'pdmx_login_image' ); ?>">

			<input type="submit" name="submit" id="submit" class="button button-primary button-large pdmx-button" value="<?php _e( 'Save', 'PlugDigital' );?>">
		</form>

		<?php if (get_option( 'pdmx_login_image' )): ?>
			<h3><?php _e( 'Current image', 'PlugDigital' ); ?></h3>
			<div id="login-image-current" style="background-image: url(<?php echo get_option( 'pdmx_login_image' ); ?>);"></div>
		<?php endif; ?>
	</div>
</div>