<?php
/**
 * Plugin Name: PlugDigital
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