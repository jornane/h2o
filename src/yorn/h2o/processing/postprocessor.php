<?php namespace yorn\h2o\processing;

/**
 * A postprocessor will convert preprocessed content.
 * This conversion happens every time the content is requested,
 * and should therefore be as fast as possible.
 * 
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

interface Postprocessor {

	/**
	 * Postprocess the content of a document.
	 *
	 * This function will return the processed content.
	 * If this postprocessor does not process content,
	 * it must return the content unchanged.
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	function postprocessContent( $content );

	/**
	 * Postprocess the title of a document.
	 *
	 * This function will return the processed title.
	 * If this postprocessor does not process titles,
	 * it must return the title unchanged.
	 *
	 * @param string $title
	 *
	 * @return string
	 */
	function postprocessTitle( $title );

}
