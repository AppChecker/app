<?php

class PrototypeApiWrapper extends ApiWrapper{


	function getTitle( ){
		return 'prototypeTitle';
	}

	function getDescription( ){
		return 'prototype description';
	}

	function getMetadata( ){
		return array(
			'test0' => '0text0',
			'test1' => '1text1',
			'test2' => '2text2',
		);
	}

	function getThumbnailUrl( ){
		return 'http://img.youtube.com/vi/FRKUuSnEDkU/0.jpg';
	}
}