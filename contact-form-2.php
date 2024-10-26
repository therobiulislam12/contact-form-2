<?php

/**
 * Plugin Name:       Contact Form 2
 * Description:       This is contact form 2
 * Plugin URI:        #
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul.net/about
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:       contact-form-2
 */

if ( !defined( 'ABSPATH' ) ) {
    exit();
}

/**
 * Final class
 */
final class Contact_Form_2 {

    /**
     * Create a variable
     * @var string $version
     */
    const VERSION = '1.0.0';

    /**
     * create a public instance
     * @var bool $_instance
     */
    public static $_instance = null;

    /**
     * Main constructor method
     */
    private function __construct() {

        // call constant function
        $this->define_constant();

        // after plugins load
        add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );

    }

    /**
     * After all plugins loaded call this function
     * 
     * @return void
     */
    public function init_plugin(){
        
        if(is_admin()){
            require_once CF2_FILE . '/includes/Admin.php';
            new Admin();
        } 
    }

    /**
     * Define all constant
     * @return void
     */
    public function define_constant() {
        define( 'CF2_VERSION', self::VERSION );
        define( 'CF2_FILE', __DIR__ );
    }

    /**
     * get class instance
     * @return bool
     */
    public static function getInstance() {
        if ( !self::$_instance ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}

// kick of the function
Contact_Form_2::getInstance();