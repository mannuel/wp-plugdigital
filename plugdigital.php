<?php
/**
 * Plugin Name: Plug Digital
 * Description: Optimización y componentes de PlugDigital.com
 * Plugin URI: https://www.plugdigital.com
 * Author: Manuel Padilla
 * Author URI: https://www.plugdigital.com/manuel-padilla
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: PlugDigital
 * Domain Path: /languages/
 */

/*
PlugDigital is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

PlugDigital is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with PlugDigital. If not, see {URI to Plugin License}.
*/

defined( 'ABSPATH' ) or exit;

function pdmx_add_our_link(){
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'id'    => 'plugdigital-site',
		'title' => 'Plug Digital',
		'href'  => 'https://www.plugdigital.net'
	) );
}
add_action( 'wp_before_admin_bar_render', 'pdmx_add_our_link' );

// Add Powered By Plug Digital at login form
function pdmx_login_powered() { ?>
	<div style="text-align: center">
		<div style="padding: 2em 0 1em">
			Diseño y Desarrollo Web por <strong><a href="https://www.plugdigital.net" title="Diseño y Desarrollo de Páginas Web en Cuernavava, Morelos">Plug Digital</a></strong>
		</div>
		<div>
			<a href="https://www.plugdigital.net" title="Diseño y Desarrollo de Páginas Web en Cuernavava, Morelos"><img src="https://www.plugdigital.net/wp-content/uploads/2017/05/plug-mini.png" title="Diseño y Desarrollo de Páginas Web en Cuernavava, Morelos"></a>
		</div>
	</div>
<?php }
add_action( 'login_footer', 'pdmx_login_powered' );