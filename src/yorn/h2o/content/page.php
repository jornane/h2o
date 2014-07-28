<?php namespace yorn\h2o\content;

/**
 * Web page.
 *
 * The result of #getContent() can be included in the content area of the template,
 * the result of #getTitle() can be used for the <title> tag.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class Page extends Document {

	public function getContentType() {
		return 'text/html';
	}

}
