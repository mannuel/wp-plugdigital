<h1><?php esc_html_e( 'Optimization and Performance', 'PlugDigital' ); ?></h1>
<h4>Plug Digital - <a href="https://www.plugdigital.net">www.plugdigital.net</a></h4>

<form action="" method="post">
	<?php wp_nonce_field( pdmx::NONCE ) ?>
	<input type="hidden" name="action" value="enter-pdmx-google-analytics-id">
	<label>Google Analytics ID</label>
	<input type="text" name="pdmx-google-analytics-id" placeholder="UA-XXXXXX" value="<?php echo get_option( 'pdmx_google_analytics_id' ); ?>" required>

	<input type="submit" name="submit" id="submit" class="button button-primary button-large pdmx-button" value="<?php esc_attr_e( 'Save', 'PlugDigital' );?>">
</form>