<?php
/**
* pdmx - PlugDigital México
*/
class pdmx {
	const NONCE               = 'plugdigital';
	private static $initiated = false;

	public static function init() {
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'enter-pdmx-google-analytics-id' ) {
			self::enter_pdmx_google_analytics_id();
		}

		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	/**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;

		add_action( 'wp_before_admin_bar_render', array( 'pdmx', 'pdmx_add_our_link' ) );
		add_action( 'login_footer', array( 'pdmx', 'pdmx_login_powered' ) );
		add_action( 'admin_menu', array( 'pdmx', 'pdmx_settings_menu' ) );
		add_action( 'wp_head', array( 'pdmx', 'pdmx_google_analytics_code' ) );
	}

	/**
	 * Add Plug Digital link at top bar
	 */
	public static function pdmx_add_our_link(){
		global $wp_admin_bar;

		$wp_admin_bar->add_menu( array(
			'id'    => 'plugdigital-site',
			'title' => 'Plug Digital',
			'href'  => 'https://www.plugdigital.net'
		) );
	}

	/**
	 * Add Powered By Plug Digital at login form
	 */
	public static function pdmx_login_powered() {
		pdmx::view('powered-by');
	}


	public static function pdmx_start_page() {
		pdmx::view('start');
	}

	public static function view( $name, array $args = array() ) {
		$args = apply_filters( 'pdmx_view_arguments', $args, $name );
		
		foreach ( $args AS $key => $val ) {
			$$key = $val;
		}
		
		load_plugin_textdomain( 'PlugDigital' );

		$file = PLUGDIGITAL__PLUGIN_DIR . 'views/'. $name . '.php';

		include( $file );
	}

	// Add options page
	public static function pdmx_settings_menu() {
		add_options_page( 'Optimización y Rendimiento', 'Optimización y Rendimiento', 'manage_options', 'pdmx-settings-menu', 'pdmx::pdmx_start_page' );
	}


	public static function enter_pdmx_google_analytics_id() {
		if ( !wp_verify_nonce( $_POST['_wpnonce'], self::NONCE ) )
			return false;

		update_option( 'pdmx_google_analytics_id', $_POST['pdmx-google-analytics-id'] );

		return true;
	}

	/**
	 * Add Google Analytics ID to the head
	 */
	public static function pdmx_google_analytics_code( ) {
		if ( get_option( 'pdmx_google_analytics_id' ) ): ?>
			<!-- Google Analytics -->
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo get_option( 'pdmx_google_analytics_id' ); ?>', 'auto');
				ga('send', 'pageview');
			</script>
			<!-- END Google Analytics -->
		<?php endif;
	}
} // class pdmx end




















