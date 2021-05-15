<?php
/**
 * Class for ACF mods.
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Model\Meta;
use function Env\env;

/**
 * ACF class
 * --> Handle ACF related settings
 * --> Add custom meta save point
 * --> Add custom meta load point
 */
class ACF {

	/**
	 * Class constructor
	 */
	public function __construct() {
		add_filter( 'acf/settings/load_json', array( $this, 'add_acf_json_load_point' ), 99 );
		add_filter( 'acf/settings/save_json', array( $this, 'add_acf_json_save_point' ), 99 );
		add_filter('acf/fields/google_map/api', array( $this, 'acf_google_maps_api_key' ), 99);
	}

	/**
	 * Register custom load point for ACF meta
	 *
	 * @param array $paths of json load points.
	 */
	public function add_acf_json_load_point( $paths ) {
		$paths[] = __DIR__ . '/Migrations/';
		return $paths;
	}

	/**
	 * Register custom save oint for ACF meta
	 *
	 * @param string $path of json save point.
	 */
	public function add_acf_json_save_point( $path ) {
		$path = __DIR__ . '/Migrations/';
		return $path;
	}

	function acf_google_maps_api_key( $api ){
		$api_key = env('GOOGLE_API_KEY') ? env('GOOGLE_API_KEY') : null;

		if(isset($api_key)) {
			$api['key'] = $api_key;
		}
		
		return $api;
	}

}
