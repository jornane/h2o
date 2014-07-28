<?php namespace yorn\h2o\processing;

use \yorn\h2o\content\Document;

/**
 * Preprocessor that will escape HTML markup.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class HTMLEscapePreprocessor implements Preprocessor {

	public function preprocess( Document $document ) {
		$document->setPreprocessedContent( htmlspecialchars( $document->getRawContent() ) );
	}

}
