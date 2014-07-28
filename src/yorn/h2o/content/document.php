<?php namespace yorn\h2o\content;

/**
 * Document (raw and preprocessed), title and modification date.
 * Raw content is content as is input by the webmaster,
 * and preprocessed content is HTML code that can be injected unchanged into a web page.
 *
 * Preprocessing is done only once per change by the webmaster.
 * The preprocessed content is cached on server and not processed again for each request.
 *
 * When server configuration is changed, existing pages will keep using their old preprocessor.
 * This makes transitions easier. For this, the configuration of a preprocessor must be stored with a page,
 * and the preprocessor class must not be removed when it is deprecated, until all pages have transitioned to the new preprocessor.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

abstract class Document {

	/** @var string */
	protected $title;
	/** @var string */
	protected $rawContent;
	/** @var string */
	protected $preprocessedContent;
	/** @var Preprocessor */
	protected $preprocessor;

	/**
	 * Instantiate a document, be it existing or new.
	 * Without argument, it will construct an empty document.
	 * With argument, it will call a setter for every key in the array.
	 *
	 * @param array $data Properties of this document
	 */
	public function __construct( array $data = [] ) {
		foreach( $data as $setter => $value ) {
			$this->{ 'set'.ucfirst( $setter ) }( $value );
		}
		if ( is_null( $this->preprocessor ) ) {
			$this->preprocessor = H2O::getInstance()->getPreprocessor();
		}
	}

	/**
	 * Get the Content-Type of this document.
	 * This is implementation specific.
	 * The Content-Type applies to the result of #getContent().
	 *
	 * @return string Content-Type of this document, can be used in an HTTP header.
	 */
	abstract public function getContentType();

	/**
	 * Set the raw content of this document.
	 * Raw content is content as is input by the webmaster.
	 *
	 * @param string $rawContent The new raw content of this document
	 */
	public function setRawContent( $rawContent ) {
		assert( 'is_string( $rawContent )' );
		$this->rawContent = $rawContent;
	}

	/**
	 * Get the raw content of this document.
	 * Raw content is content as is input by the webmaster.
	 *
	 * @return string The new raw content of this document
	 */
	public function getRawContent() {
		return $this->rawContent;
	}

	/**
	 * Set the preprocessed content of this document.
	 * Preprocessed content is calculated once when the raw content is changed,
	 * and is cached server-side.
	 * This function is typically used by a preprocessor after preprocessing,
	 * or by a storage adapter.
	 *
	 * @param string $preprocessedContent The preprocessed content of this document
	 */
	public function setPreprocessedContent( $preprocessedContent ) {
		assert( 'is_string( $preprocessedContent ) || is_null( $preprocessedContent )' );
		$this->preprocessedContent = $preprocessedContent;
	}

	/**
	 * Get the preprocessed content of this document.
	 * Preprocessed content is calculated once when the raw content is changed,
	 * and is cached server-side.
	 *
	 * @return string The preprocessed content of this document
	 */
	public function getPreprocessedContent() {
		if ( is_null( $this->preprocessedContent ) ) {
			$preprocessor->preprocess( $this );
		}
		if ( is_null( $this->preprocessedContent ) ) {
			throw new DomainException( 'Preprocessor did not generate preprocessed content.' );
		}
		return $this->preprocessedContent;
	}

	/**
	 * Shorthand for #getPreprocessedContent()
	 *
	 * @return string The preprocessed content of this document
	 */
	public function getContent() {
		return $this->getPreprocessedContent();
	}

	/**
	 * Set the title of this document.
	 *
	 * @param string $title The title
	 */
	public function setTitle( $title ) {
		assert( 'is_string( $title )' );
		$this->title = $title;
	}

	/**
	 * Get the title of this document.
	 *
	 * @return string The title
	 */
	public function getTitle() {
		return $this->title;
	}

}
