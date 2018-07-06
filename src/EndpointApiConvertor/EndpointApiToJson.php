<?php

namespace EndpointApiConvertor;

use Exception;
use EndpointApiConvertor\Curls\Curl;
use EndpointApiConvertor\Convertors\Convertor;
use EndpointApiConvertor\Filters\Filter;


class EndpointApiToJson
{
	public function start( string $url, string $fileDir ) : void
	{
		try{
			// $resources 			=json_decode(file_get_contents('test.json'));
			$curl 				= new Curl( $url );
			$resources 			= $curl->getDecodeJson();
			$data				= $curl->getData($resources);
			
			$sort 				= new Filter();
			$SortedProducts		= $sort->getUSort( $data );

			$convertor 			= new Convertor( $fileDir );
			$status 			= $convertor->convertArrayToCsv( $SortedProducts  );

			header('Location: ./public/csv/file.csv');
		}
		catch(Throwable $e){
			echo '<h3 style="color: red; text-align: center">' . $e->getMessage() . '</h3>';
		}
	}
	
}



?>