<?php

/**
 * CuratedContentValidatorComponent: API endpoint for validation
 */
class CuratedContentValidatorController extends WikiaController {

	private $validator;

	public function __construct() {
		parent::__construct();
		$this->validator = new CuratedContentValidator();
	}

	public function validateSection() {
		$section = $this->request->getVal( 'section' );

		if ( empty( $section ) ) {
			$this->respondWithErrors();
		} else {
			$this->validator->validateSection( $section );
			$this->respond( $this->validator->getErrors() );
		}
	}

	public function validateSectionWithItems() {
		$section = $this->request->getVal( 'section' );

		if ( empty( $section ) ) {
			$this->respondWithErrors();
		} else {
			$this->validator->validateSection( $section );
			$this->validator->validateItemsExists( $section );
			$this->validator->validateItems( $section );
			$this->validator->validateItemsTypes( $section );
			$this->validator->validateDuplicatedTitles();
			$this->respond( $this->validator->getErrors() );
		}
	}

	public function validateItem() {
		$item = $this->request->getVal( 'item' );
		$isFeatured = $this->request->getBool( 'isFeatured', false );

		if ( empty( $item ) ) {
			$this->respondWithErrors();
		} else {
			$this->validator->validateItem( $item );
			if ( !$isFeatured ) {
				$this->validator->validateItemTypes( $item );
			}
			$this->respond( $this->validator->getErrors() );
		}
	}

	private function respond( $errors ) {
		if ( !empty( $errors ) ) {
			$this->respondWithErrors( $errors );
		} else {
			$this->respondWithStatus( true );
		}
	}

	private function respondWithErrors( Array $errors = null ) {
		if ( !empty( $errors ) ) {
			$this->response->setVal('error', $errors);
		}
		$this->respondWithStatus( false );
	}

	private function respondWithStatus( $status ) {
		$this->response->setFormat( WikiaResponse::FORMAT_JSON );
		$this->response->setVal( 'status', $status );
		// TODO: CONCF-961 Set more restrictive header
		$this->response->setHeader( 'Access-Control-Allow-Origin', '*' );
	}
}
