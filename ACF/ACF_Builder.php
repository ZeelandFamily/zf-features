<?php
namespace ZF_Features\ACF;

class ACF_Builder {

	/**
	 * Builds a new custom metabox object.
	 *
	 * @param  string $name         Custom meta box name.
	 * @param  string $field_prefix Field prefix.
	 * @param  array  $location Where is this displayed
	 * @return object The custom meta object that was built.
	 */
	public function build( string $id, string $name, string $field_prefix = '', array $location = [] ) {
		$classname = __NAMESPACE__ . "\\" . $name;

		if ( ! class_exists( $classname ) ) {
			return new \WP_Error( 'invalid-custom-meta', __( 'The custom meta box you attempting to create does not have a class to instance. Possible problems: your configuration does not match the class file name; the class file name does not exist.', 'zf-features' ), $classname );
		}

		return new $classname( $id, $name, $location, $field_prefix );
	}

}
