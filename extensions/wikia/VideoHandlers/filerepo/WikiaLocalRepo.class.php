<?php
/**
 * A repository that stores files in the local filesystem and registers them
 * in the wiki's own database.
 *
 * Extends most commonly used repository class to allow us to use some extra file functions.
 * 
 * @ingroup FileRepo
 */
class WikiaLocalRepo extends LocalRepo {
	var $fileFactory = array( 'WikiaLocalFile', 'newFromTitle' );
	var $oldFileFactory = array( 'OldLocalFile', 'newFromTitle' );
	var $fileFromRowFactory = array( 'WikiaLocalFile', 'newFromRow' );
	var $oldFileFromRowFactory = array( 'OldLocalFile', 'newFromRow' );
}

