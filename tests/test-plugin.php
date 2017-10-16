<?php

/**
 * WordPress unit test plugin.
 *
 * @package     LoginCustomizer
 * @subpackage  Tests
 * @copyright   Copyright (c) 2017, Marius Cristea
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since 3.0.10
 */
class Test_LoginCustomizer extends WP_UnitTestCase {

	public function generic() {
		$this->assertTrue( class_exists( 'ThemeIsle_SDK_Loader' ) );
	}
}
