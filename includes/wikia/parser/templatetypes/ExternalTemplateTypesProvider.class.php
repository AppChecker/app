<?php

use Swagger\Client\ApiException;

class ExternalTemplateTypesProvider {
	const ERROR_MESSAGE = 'ExternalTemplateTypesProviderError';

	private $tcs;

	function __construct( $tcs ) {
		$this->tcs = $tcs;
	}

	/**
	 * @desc gets template type from Template title object
	 *
	 * @param int $wikiId
	 * @param Title $title
	 *
	 * @return string - template type
	 */
	public function getTemplateTypeFromTitle( $wikiId, $title ) {
		return $title ? $this->getTemplateType( $wikiId, $title->getArticleID() ) :
			AutomaticTemplateTypes::TEMPLATE_UNCLASSIFIED;
	}

	/**
	 * @desc gets template type from template ID
	 *
	 * @param $wikiId
	 * @param $templateId
	 *
	 * @return string - template type
	 */
	public function getTemplateType( $wikiId, $templateId ) {
		$type = AutomaticTemplateTypes::TEMPLATE_UNCLASSIFIED;

		try {
			$type = $this->tcs->getType( $wikiId, $templateId );
		} catch ( ApiException $exception ) {
			$context = [ 'TCSApiException' => $exception ];
			$this->handleException( $context );
		}

		return $type;
	}

	/**
	 * @desc handle exceptions
	 *
	 * @param array $context
	 */
	private function handleException( $context ) {
		\Wikia\Logger\WikiaLogger::instance()->error( self::ERROR_MESSAGE, $context );
	}
}
