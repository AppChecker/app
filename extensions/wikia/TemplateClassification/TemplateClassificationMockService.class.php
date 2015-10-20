<?php
/**
 * Mock service class for TemplateClassification
 */

class TemplateClassificationMockService extends WikiaService {

	/**
	 * @param int $articleId
	 * @return string
	 */
	public function getTemplateType( $articleId ) {
		/* Use cache to have consistent results for same pages due to randomization */
		$type = WikiaDataAccess::cache(
			wfMemcKey( 'template-classification-type-for-page', $articleId ),
			WikiaResponse::CACHE_STANDARD,
			function () {
				$types = TemplateClassification::$templateTypes;
				return $types[array_rand( $types )];
			}
		);
		return $type;
	}
}
