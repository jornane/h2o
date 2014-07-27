<?php namespace yorn\h2o\processing;

use \yorn\h2o\content\Document;

/**
 * A preprocessor will convert raw content.
 * This conversion happens only once when the raw content is changed,
 * and is not repeated for every request.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

interface Preprocessor {

	/**
	 * Preprocess a document.
	 *
	 * Typically, this will read the content and title using
	 * Document#getRawContent() and Document#getRawTitle(),
	 * do some conversion, and write the results back using
	 * Document#setPreprocessedContent() and Document#setPreprocessedTitle().
	 *
	 * This method does not return anything.
	 *
	 * @param Document $document
	 */
	function preprocess( Document $document );

}
