<?php

namespace WPM\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Class WPM_Widgets
 * @package WPM\Core
 * @author   VaLeXaR
 */
class WPM_Widgets {

	/**
	 * WPM_Widgets constructor.
	 */
	public function __construct() {
		add_filter( 'widget_display_callback', 'wpm_translate_value', 0 );
		add_filter( 'widget_display_callback', array( $this, 'widget_display' ) );
	}


	/**
	 * Filter widget by language
	 *
	 * @param $instance
	 *
	 * @return bool|array
	 */
	public function widget_display( $instance ) {
		if ( isset( $instance['languages'] ) && is_array( $instance['languages'] ) && ! in_array( wpm_get_user_language(), $instance['languages'] ) ) {
			return false;
		}

		return $instance;
	}
}
