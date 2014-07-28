<?php namespace yorn\h2o\processing;

use \yorn\h2o\content\Document;

/**
 * Preprocessor that will use the raw input word for word.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class VerbatimPreprocessor implements Preprocessor {

	public function preprocess( Document $document ) {
		$document->setPreprocessedContent( $document->getRawContent() );
	}

}
