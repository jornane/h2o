<?php namespace yorn\h2o\storage;

/**
 * Interface for persistent storage for pages.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

interface Storage {

	/**
	 * Store a document.
	 *
	 * @param string $shortName Short name of the document, this name will be used in the URL.
	 * @param Document $document The document to be stored.
	 */
	function put( $shortName, Document $document );

	/**
	 * Retrieve a document.
	 *
	 * @param string $shortName Short name of the document, this name is used in the URL.
	 */
	function get( $shortName );

	/**
	 * Remove a document
	 *
	 * @param string $shortName Short name of the document, this name is used in the URL.
	 */
	function remove( $shortName );

}
