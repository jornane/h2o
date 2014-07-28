<?php
/**
 * Register SPL autoloading for the current directory.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

spl_autoload_extensions( '.php' );
spl_autoload_register();
set_include_path( get_include_path().PATH_SEPARATOR.__DIR__ );
