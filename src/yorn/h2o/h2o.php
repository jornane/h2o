<?php namespace yorn\h2o;

use \yorn\h2o\processing\Preprocessor;
use \yorn\h2o\security\AuthenticationController;
use \yorn\h2o\storage\Storage;

/**
 * H2O application class.
 * This class functions as a singleton; the constructor is private and can only be executed once.
 * On construction, it reads ../etc/h2o.conf.php
 *  and makes the configuration settings available through its public methods.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

final class H2O {
	
	/**
	 * @var H2O Application instance 
	 */
	private static $instance;

	/**
	 * @var object[] Configuration
	 */
	private $config;

	/**
	 * Return the only H2O application instance.
	 * If the instance is not created yet, this function call will create it.
	 *
	 * @return H2O Application instance
	 */
	public static function getInstance() {
		if ( is_null( static::$instance ) ) {
			new H2O;
		}
		return static::$instance;
	}

	/**
	 * Read the configuration file and store it in a private variable.
	 */
	private function __construct() {
		if ( isset( static::$instance ) ) {
			throw new RuntimeException( 'Tried to instantiate H2O application class more than once.' );
		}
		$this->config = require dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'h2o.conf.php';
		static::$instance = $this;
	}

	/**
	 * Get the configured storage engine.
	 *
	 * @return Storage The configured storage engine.
	 */
	public function getStorage() {
		return $this->config->storage;
	}

	/**
	 * Get the configured preprocessor.
	 *
	 * @return Preprocessor The configured preprocessor.
	 */
	public function getPreprocessor() {
		return $this->config->preprocessor;
	}

	/**
	 * Get the configured authentication controller.
	 *
	 * @return AuthenticationController The configured authentication controller.
	 */
	public function getAuthenticationConnector() {
		return $this->config->authenticationConnector;
	}

}
