<?php

try{
	require_once __DIR__ . '/../vendor/autoload.php';
	require_once __DIR__ . '/../config/conf.php';
	
	$env = require_once __DIR__ . '/../env.php';

	$url = 'https://api.instagram.com/' . 
		$env['version'] .
		'/tags/'.$env['tag'] .
		'/media/recent?access_token=' . $env['token'] . 
		'&count=' . $env['filter'];

	$endpointApiToJson = new EndpointApiConvertor\EndpointApiToJson();
	$endpointApiToJson->start($url, $env['fileDir']);

}
catch (Throwable $e) {
    echo json_encode( $e->getMessage());
}

?>
