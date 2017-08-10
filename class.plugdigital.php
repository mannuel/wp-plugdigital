<?php
/**
* pdmx - PlugDigital México
* Author: Manuel Padilla manuel@plugdigital.net
*/

class pdmx {
	const NONCE = 'plugdigital';

	private static $initiated = false;

	public static function init() {
		// Google Analytics ID?
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'enter-pdmx-google-analytics-id' ) {
			self::enter_pdmx_google_analytics_id();
		}

		// Facebook Pixel ID?
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'enter-pdmx-facebook-pixel-id' ) {
			self::enter_pdmx_facebook_pixel_id();
		}

		// Facebook Pixel ID?
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'enter-pdmx-login-image' ) {
			self::enter_pdmx_login_image();
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
		add_action( 'wp_head', array( 'pdmx', 'pdmx_facebook_pixel_code' ) );
		add_action( 'admin_enqueue_scripts', array( 'pdmx', 'pdmx_admin_scripts' ) );
	}

	/**
	 * Enqueue Scripts
	 */
	public static function pdmx_admin_scripts() {
		wp_register_style( 'pdmx-admin-styles', plugin_dir_url( __FILE__ ) . 'assets/css/plugdigital.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'pdmx-admin-styles' );

		wp_enqueue_media();

		wp_register_script( 'pdmx-admin-script', plugin_dir_url( __FILE__ ) . 'assets/js/plugdigital.admin.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'pdmx-admin-script' );
	}

	/**
	 * Add Plug Digital link at top bar
	 */
	public static function pdmx_add_our_link() {
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

	/**
	 * Google Analytics ID DB Save
	 */
	public static function enter_pdmx_google_analytics_id() {
		if ( !wp_verify_nonce( $_POST['_wpnonce'], self::NONCE ) )
			return false;

		update_option( 'pdmx_google_analytics_id', $_POST['pdmx-google-analytics-id'] );

		return true;
	}

	/**
	 * Facebook Pixel ID DB Save
	 */
	public static function enter_pdmx_facebook_pixel_id() {
		if ( !wp_verify_nonce( $_POST['_wpnonce'], self::NONCE ) )
			return false;

		update_option( 'pdmx_facebook_pixel_id', $_POST['pdmx-facebook-pixel-id'] );

		return true;
	}

	/**
	 * Login image DB Save
	 */
	public static function enter_pdmx_login_image() {
		if ( !wp_verify_nonce( $_POST['_wpnonce'], self::NONCE ) )
			return false;

		update_option( 'pdmx_login_image', $_POST['pdmx-login-image'] );

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


	/**
	 * Add Facebook Pixel to the head
	 */
	public static function pdmx_facebook_pixel_code( ) {
		if ( get_option( 'pdmx_facebook_pixel_id' ) ): ?>
			<!-- Facebook Pixel Code -->
			<script>
				!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
				n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
				document,'script','https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '<?php echo get_option( 'pdmx_facebook_pixel_id' ); ?>'); // Insert your pixel ID here.
				fbq('track', 'PageView');
			</script>
			<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo get_option( 'pdmx_facebook_pixel_id' ); ?>&ev=PageView&noscript=1" /></noscript>
			<!-- END Facebook Pixel Code -->
		<?php endif;
	}
} // class pdmx end




















